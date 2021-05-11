<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'nour',
            'email' => 'nour@gmail.com',
            'password' => bcrypt('123'),
            'phone' => '389264873',
            'image' => 'default.png',
            'role' => 'admin'
        ]);
    }
}
