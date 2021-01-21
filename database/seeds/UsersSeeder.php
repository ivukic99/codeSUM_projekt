<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Igor', 
                'surname' => 'Vukic', 
                'email' => 'igor.vukic8877@gmail.com',
                'password' => Hash::make("12345678"),
                'created_at'=> now(),
        		'updated_at'=> now()
            ],
            [
                'name' => 'Stanko', 
                'surname' => 'Bebek', 
                'email' => 'stanko.bebek82@gmail.com',
                'password' => Hash::make("12345678"),
                'created_at'=> now(),
        		'updated_at'=> now()
            ],
        ]);
    }
}
