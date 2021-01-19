<?php

use Illuminate\Database\Seeder;
use App\User_course;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User_course::insert([
            [
                "User_id" => 1,
                "Tecaj_id" => 1,
            ],
            [
                "User_id" => 1,
                "Tecaj_id" => 2,
            ]
        ]);
    }
}
