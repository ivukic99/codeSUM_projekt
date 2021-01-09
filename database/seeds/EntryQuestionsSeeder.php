<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Quiz;

class EntryQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

    	$entrance_quiz = Quiz::where('Naziv', 'entrance_quiz_1')->first();

        Question::insert([
        	[
                "Opis" => "Što Vas najviše fascinira u polju razvoja softwer-a?",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Vrijeme ću radije provesti...",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Posao Vam zahtjeva stalno učenje i napredovanje, kako se ponašate?",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Kada vidim umjetninu...",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Na razgovoru za posao Vam je postavljeno sljedeće pitanje: Procijenite broj golf loptica koje mogu stati u školski autobus.Kako reagirate?",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Kada kuham...",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],

            [
                "Opis" => "Vrijeme volim provoditi razmišljući o...",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "Opis" => "Kod odabira glazbe mi je najbitnije...",
                "Kviz_id" => $entrance_quiz->id,
                "created_at" => now(),
                "updated_at" => now()
            ],


        ]);
    }
}
