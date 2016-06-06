<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Survey;
use DB;
use Illuminate\Support\Collection;

class SurveyController extends Controller
{
	public function draw()
	{		
		$labels = DB::select('SELECT `SQ`.`question`, `SQ`.`id` FROM `survey_questions` AS `SQ`');
	
		$questColl = collect(DB::select('SELECT GROUP_CONCAT(`SQ`.`id`) AS `qid` FROM `survey_questions` AS `SQ` 
WHERE `SQ`.`survey_id` = (SELECT `SU`.`id` FROM `survey` AS `SU`)'));

		$userColl = collect(DB::select('SELECT `id`,`name` from `users` where `admin` != 1'));
		
		foreach($userColl as $ukey=>$value){
			$colourArr = array("rgba(179,181,198,0.2)", "rgba(134,194,75,0.2)", "rgba(0,255,0,0.2)");
			$fillcolor = array("rgba(134,195,74,0.5)","rgba(0,150,136,0.5)","rgba(123,170,202,0.5)");
			$highlight_fillcolor = array("rgba(134,195,74,1)","rgba(0,150,136,1)","rgba(123,170,202,1)");
			$strokecolor = array("rgba(134,195,74,1)","rgba(0,150,136,1)","rgba(123,170,202,1)");
			$labelsArr = $sgraphDatasetArr = array();
			
			foreach ($labels as $k=> $lab) {
				array_push($labelsArr, $lab->question);
			}
						
			foreach($questColl as $key=> $val){				
				$answersColl = collect(DB::select('SELECT `SA`.`answer`, `SA`.`survey_quest_id` FROM `survey_answers` AS `SA` 
	WHERE `SA`.`survey_quest_id` IN ('.$val->qid.') AND `SA`.`user_id` = '.$value->id.''));
				
				foreach($answersColl as $ans){
					$ansdata[] = $ans->answer;				
				}
				
				$sgraphDataset[] = array('label'=>$value->name,
									'backgroundColor'=>$colourArr[$ukey],
									'borderColor'=>"rgba(179,181,198,1)",
									'pointBackgroundColor'=>"rgba(179,181,198,1)",
									'pointBorderColor'=>"#fff",
									'pointHoverBackgroundColor'=>"#fff",
									'pointHoverBorderColor'=>"rgba(179,181,198,1)",
									'pointHighlightFill'=> $highlight_fillcolor[$ukey],
									'fillColor' => $fillcolor[$ukey],
									'strokeColor' => $strokecolor[$ukey],
									'data'=>$ansdata);
				unset($ansdata);				
			}
		}		

		$viewData = array('labels'=>$labelsArr, 'datasets'=>$sgraphDataset);			
		return view('survey', ['labels'=>$labelsArr, 'datasets'=>$sgraphDataset]);
	}
	
}