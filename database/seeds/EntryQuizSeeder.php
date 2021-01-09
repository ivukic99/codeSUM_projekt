<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class EntryQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::insert([
            [
                "Naziv" => "entrance_quiz_1",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
