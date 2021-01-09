<?php

use Illuminate\Database\Seeder;
use App\Answer;

class EntryAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::insert([

        	[
        		'Opis'=> 'Fascinira me sve vezano za računala i programiranje, principi dizajniranja i razvoja korisnih aplikacija i servisa.',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Više volim raditi sa podacima i detaljima, nego na razvoju novih ideja',
        		'Vrijednost'=> 4,
        		'Pitanja_id'=> 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Relativno dobre plaće',
        		'Vrijednost'=> 1,
        		'Pitanja_id'=> 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Prijtelji ili poznanici su mi predložili ovo područje i želim isprobati/istražiti.',
        		'Vrijednost'=> 4,
        		'Pitanja_id'=> 1,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Slagati puzzle',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 2,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Igrati kvizove',
        		'Vrijednost'=> 7,
        		'Pitanja_id'=> 2,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Pisati ili čitati',
        		'Vrijednost'=> 4,
        		'Pitanja_id'=> 2,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Igrati igre',
        		'Vrijednost'=> 2,
        		'Pitanja_id'=> 2,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Smatram da se kroz život stalno uči i da sam ja osoba koja stalno istražuje i uči nove stvari.',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 3,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Ne želim izgubiti ravnotežu posla i života uzimajući previše vremena za trening i učenje novih stvari',
        		'Vrijednost'=> 4,
        		'Pitanja_id'=> 3,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Ukoliko je potrebno dodatno učiti i raditi mogu to učiniti, ali inače to ne radim',
        		'Vrijednost'=> 6,
        		'Pitanja_id'=> 3,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Nisam osoba koja će odvajati dodatno vrijeme za učenje novih stvari.',
        		'Vrijednost'=> 1,
        		'Pitanja_id'=> 3,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Gledam samo je li mi se dopada na prvi dojam.',
        		'Vrijednost'=> 1,
        		'Pitanja_id'=> 4,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Razmišljam što ovu umjetninu čini posebnom, popularnom ili važnom',
        		'Vrijednost'=> 5,
        		'Pitanja_id'=> 4,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Zanimaju me tehnike i stilovi pomoću kojih je umjetnina napravljena.',
        		'Vrijednost'=> 9,
        		'Pitanja_id'=> 4,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Raspitujem se ili dodatno istražujem o umjetnini',
        		'Vrijednost'=> 7,
        		'Pitanja_id'=> 4,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Iskoristit ću informacije koje znam o školskim busevima i golf lopticama i napraviti procjenu, možda ću zatražiti da pokušam nacrtati svoje riješenje.',
        		'Vrijednost'=> 5,
        		'Pitanja_id'=> 5,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Pokušati ću postaviti nekoliko pitanja da saznam više informacija.',
        		'Vrijednost'=> 8,
        		'Pitanja_id'=> 5,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Dati ću odmah bilo kakav brzi odgovor',
        		'Vrijednost'=> 3,
        		'Pitanja_id'=> 5,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Neću odgovoriti.Kakvo je to pitanje?',
        		'Vrijednost'=> 1,
        		'Pitanja_id'=> 5,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Pratim upute sa recepta',
        		'Vrijednost'=> 6,
        		'Pitanja_id'=> 6,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Pogledam slike, i pokušavam kuhati bez strogih uputa',
        		'Vrijednost'=> 6,
        		'Pitanja_id'=> 6,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Kombiniram upute sa recepta i samostalno dodajem sastojke, stalno provjeravajući okus',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 6,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Kuham bez uputa, stalno provjeravajući okus.',
        		'Vrijednost'=> 5,
        		'Pitanja_id'=> 6,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Važnim životnim odlukama',
        		'Vrijednost'=> 6,
        		'Pitanja_id'=> 7,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Načinima na koje se mogu opustiti i zabaviti',
        		'Vrijednost'=> 8,
        		'Pitanja_id'=> 7,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Načinima na koje mogu poboljšati svoju ili svakodnevicu od nekog drugog',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 7,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Za dodatno učenje ili trening',
        		'Vrijednost'=> 9,
        		'Pitanja_id'=> 7,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Da je glazba vesela i zabavna',
        		'Vrijednost'=> 4,
        		'Pitanja_id'=> 8,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Da je glazba dinamična',
        		'Vrijednost'=> 7,
        		'Pitanja_id'=> 8,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Najvažniji su mi tekstovi pjesama',
        		'Vrijednost'=> 7,
        		'Pitanja_id'=> 8,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	],
        	[
        		'Opis'=> 'Volim opuštajuću glazbu',
        		'Vrijednost'=> 10,
        		'Pitanja_id'=> 8,
        		'created_at'=> now(),
        		'updated_at'=> now()
        	]
        ]);
    }
}
