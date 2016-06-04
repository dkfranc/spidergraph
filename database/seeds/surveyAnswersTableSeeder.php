<?php

use Illuminate\Database\Seeder;

class surveyAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create answers
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '1',
			'answer' => '65',
        ]);
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '2',
			'answer' => '59',
        ]);
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '3',
			'answer' => '90',
        ]);
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '4',
			'answer' => '81',
        ]);
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '5',
			'answer' => '56',
        ]);
		\App\SurveyAnswers::create([
            'user_id' => '1',
            'survey_quest_id' => '6',
			'answer' => '40',
        ]);
    }
}
