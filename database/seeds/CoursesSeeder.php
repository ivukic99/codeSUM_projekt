<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
        	[
        		'Naziv' => 'JavaScript',
        		'Opis' => 'Ovo je tečaj za početnike u kojem su obrađene osnove programiranja u programskom jeziku JavaScript.',
        		'Kategorije_id'=> 5,
        		'Kreator_id' => 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Naziv' => 'Baze podataka',
        		'Opis' => 'Ovo je tečaj za početnike u kojem su obrađene osnove baza podataka.',
        		'Kategorije_id'=> 3,
        		'Kreator_id' => 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Naziv' => 'Algoritmi',
        		'Opis' => 'Ovo je tečaj za početnike u kojem su obrađene osnove jednostavnih algoritama.',
        		'Kategorije_id'=> 2,
        		'Kreator_id' => 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],

        ]);
    }
}
