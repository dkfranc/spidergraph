<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(SurveyQuestionsTableSeeder::class);
        $this->call(SurveyAnswersTableSeeder::class);

        Model::reguard();
    }
}
