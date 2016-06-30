<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'title' => 'Administrator'
        ]);
        \App\Role::create([
            'title' => 'User'
        ]);

        \App\User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role_id' => 1,
        ]);
    }
}
