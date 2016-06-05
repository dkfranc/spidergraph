<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin User',
            'username' => 'admin_user',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'confirmed' => 1,
            'admin' => 1,
            'confirmation_code' => md5(microtime() . env('APP_KEY')),
        ]);

        \App\User::create([
            'name' => 'John Doe',
            'username' => 'test_user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'confirmed' => 1,
            'confirmation_code' => md5(microtime() . env('APP_KEY')),
        ]);
		
		\App\User::create([
            'name' => 'Brian',
            'username' => 'brian',
            'email' => 'brian@user.com',
            'password' => bcrypt('brian'),
            'confirmed' => 1,
            'confirmation_code' => md5(microtime() . env('APP_KEY')),
        ]);
    }
}
