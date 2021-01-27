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
                'name' => 'Admin', 
                'surname' => 'Stranice', 
                'email' => 'admin.stranice@gmail.com',
                'password' => Hash::make("12345678"),
                'image' => 'random.png',
                'spol' => 'muško',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'name' => 'Igor', 
                'surname' => 'Vukic', 
                'email' => 'igor.vukic8877@gmail.com',
                'password' => Hash::make("12345678"),
                'image' => 'random.png',
                'spol' => 'muško',
                'created_at'=> now(),
        		'updated_at'=> now()
            ],
            [
                'name' => 'Stanko', 
                'surname' => 'Bebek', 
                'email' => 'stanko.bebek82@gmail.com',
                'password' => Hash::make("12345678"),
                'image' => 'random.png',
                'spol' => 'muško',
                'created_at'=> now(),
        		'updated_at'=> now()
            ],
        ]);
    }
}
