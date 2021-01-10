<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
        	[
        		'Naziv' => 'Data science',
        		'Opis' => 'Znanost o podacima interdisciplinarno je područje koje koristi znanstvene metode, procese, algoritme i sustave za izvlačenje znanja i uvida iz mnogih strukturnih i nestrukturiranih podataka. Znanost o podacima povezana je s rudarstvom podataka, strojnim učenjem i velikim podacima.',
				'Bodovna_vrijednost' => 10,
				'created_at' => now(),
				'updated_at' => now()
        	],
        	[
        		'Naziv' => 'Algorithms',
        		'Opis' => 'U matematici i informatici, algoritam je konačni niz precizno definiranih, računalno izvedljivih uputa, tipično za rješavanje klase problema ili za izvršavanje računa. Algoritmi su uvijek nedvosmisleni i koriste se kao specifikacije za obavljanje izračuna, obrade podataka, automatiziranog zaključivanja i drugih zadataka.',
				'Bodovna_vrijednost' => 9,
				'created_at' => now(),
				'updated_at' => now()
        	],
        	[
        		'Naziv' => 'Databases',
        		'Opis' => 'Baza podataka je organizirani skup podataka. Termin je izvorno nastao unutar računalne industrije, a njegovo se značenje proširilo popularnom uporabom toliko da Europska direktiva za baze podataka (koja za baze podataka donosi prava za intelektualno vlasništvo) uključuje i neelektronske baze podataka unutar svoje definicije. Ovaj članak je ograničen više na tehničku upotrebu termina, iako čak i među računalnim profesionalcima neki pripisuju mnogo šire značenje riječi od drugih.',
				'Bodovna_vrijednost' => 8,
				'created_at' => now(),
				'updated_at' => now()
        	],
        	[
        		'Naziv' => 'Web development',
        		'Opis' => 'Web razvoj je posao koji se uključuje u razvoj web stranice za Internet ili intranet. Web razvoj može se kretati od razvijanja jednostavne pojedinačne statične stranice običnog teksta do složenih Internet aplikacija zasnovanih na Internetu, elektroničkog poslovanja i usluga društvenih mreža',
				'Bodovna_vrijednost' => 7,
				'created_at' => now(),
				'updated_at' => now()
        	],
        	[
        		'Naziv' => 'Basics of programming',
        		'Opis' => 'Što je računalno programiranje?
RAČUNALNO PROGRAMIRANJE korak je po korak postupak dizajniranja i razvoja različitih skupova računalnih programa za postizanje određenog računalnog ishoda. Proces uključuje nekoliko zadataka poput analize, kodiranja, generiranja algoritama, provjere točnosti i potrošnje resursa algoritama itd. Svrha računalnog programiranja je pronaći niz uputa koje rješavaju određeni problem na računalu.',
				'Bodovna_vrijednost' => 6,
				'created_at' => now(),
				'updated_at' => now()
        	],
        ]);
    }
}
