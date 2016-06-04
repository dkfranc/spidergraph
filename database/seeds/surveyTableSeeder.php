<?php

use Illuminate\Database\Seeder;

class surveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//creating new survey 
        \App\Survey::create([
            'user_id' => '1',
            'title' => 'Habbits',
            'slug' => 'habbits',
            'description' => 'Survey to get all user habbits like drinking, swimming etc',
            'status' => 1,
        ]);
    }
}
