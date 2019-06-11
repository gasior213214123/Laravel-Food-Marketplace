    <?php

    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker; 

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            // $this->call(UsersTableSeeder::class);

        	$faker = Faker::create('pl_PL');

        	/* =============== VARIABLES =============== */

        	$number_of_users = 30;
        	$password = 'pass';

        	/* ======================================= */

        	for ($i = 1; $i <= $number_of_users; $i++) {

        		if ($i === 1) {

    		    	DB::table('users')->insert([
    		    		'name' => 'Szczepan Lis',
    		    		'email' => 'Szczepan.Lis@Restauracje.pl',
    		    		'occupation' => 'Admin',
    		    		'city' => 'Kielce',
    		    		'adress' => 'Kazimierza Wielkiego 29/19',
                        'phone' => '606255383',
    		    		'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
    		    	]);

        		} else 

        		if ($i === 2) {

    		    	DB::table('users')->insert([
    		    		'name' => 'Andrzej Andrzejczyk',
    		    		'email' => 'Andrzej.Andrzejczyk@giezet.pl',
    		    		'occupation' => 'Worker',
    		    		'city' => 'Kielce',
    		    		'adress' => 'Batalionów Chłopskich 12/10',
                        'phone' => '111222333',
    		    		'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
    		    	]);

        		} else 

        		if ($i === 3) {

    		    	DB::table('users')->insert([
    		    		'name' => 'Kuba Kubczyk',
    		    		'email' => 'Kuba.Kubczyk@pierogarnia.pl',
    		    		'occupation' => 'Worker',
    		    		'city' => 'Kielce',
    		    		'adress' => 'Żelazna 10/15',
                        'phone' => '333111222',
    		    		'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
    		    	]);
        		} else 

                if ($i === 4) {

                    DB::table('users')->insert([
                        'name' => 'Michal Michalczyk',
                        'email' => 'Michal.Michalczyk@zapiekanki.pl',
                        'occupation' => 'Worker',
                        'city' => 'Kielce',
                        'adress' => 'Żelazna 15/15',
                        'phone' => '333111333',
                        'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
                    ]);
                } else 

                if ($i === 5) {

                    DB::table('users')->insert([
                        'name' => 'Adam Adamczyk',
                        'email' => 'Adam.Adamczyk@burgerprince.pl',
                        'occupation' => 'Worker',
                        'city' => 'Warszawa',
                        'adress' => 'Kobaltowa 2/10',
                        'phone' => '123456789',
                        'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
                    ]);
                } else 

                if ($i === 6) {

                    DB::table('users')->insert([
                        'name' => 'Łukasz Łukawski',
                        'email' => 'Lukasz.Lukawski@pizzaitaliana.pl',
                        'occupation' => 'Worker',
                        'city' => 'Szczecin',
                        'adress' => 'Sienkiewicza 2/2',
                        'phone' => '123456789',
                        'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
                    ]);
                } else {

    	    		$sex = $faker->randomElement(['m', 'f']);

    	    		switch ($sex) {

    	    			case 'm':
    	    				$name = $faker->firstNameMale . ' ' . $faker->lastNameMale;
    	    				break;

    	    			case 'f':
    				    	$name = $faker->firstNameFemale . ' ' . $faker->lastNameFemale;
    	    				break;

    	    		}

    		    	DB::table('users')->insert([
    		    		'name' => $name,
    		    		'email' => str_replace('-', '.', str_slug($name)) . '@' . $faker->safeEmailDomain,
    		    		'occupation' => 'Client',
    		    		'city' => 'Kielce',
    		    		'adress' => $faker->streetAddress,
                        'phone' => $faker->e164PhoneNumber,
    		    		'password' => bcrypt($password),
                        'verified' => 1,
                        'created_at' => '2018-08-18 01:36:38',
                        'updated_at' => '2018-08-18 01:36:38',
    		    	]);

        		}

        	}

        	/* ================RESTAURANTS======================= */

        	DB::table('restaurants')->insert([
        		'name' => 'GieZet Bar',
        		'worker_id' => '2',
        		'city' => 'Kielce',
        		'adress' => 'Batalionow chlopskich 12/10',
        		'description' => 'Pizza, Kebab, Drób',
        		'type' => 'turkish',
        		'open_from' => '10:00',
        		'open_till' => '23:00',
        		'avg_wait' => '75',
                'created_at' => '2018-08-18 01:36:38',
                'updated_at' => '2018-08-18 01:36:38',
        	]); 

        	DB::table('restaurants')->insert([
        		'name' => 'Pierogarnia',
        		'worker_id' => '3',
        		'city' => 'Kielce',
        		'adress' => 'Żelazna 10/15',
        		'description' => 'Dania polskie, pierogi',
        		'type' => 'polish',
        		'open_from' => '11:00',
        		'open_till' => '24:00',
        		'avg_wait' => '60',
                'created_at' => '2018-08-18 01:36:38',
                'updated_at' => '2018-08-18 01:36:38',
        	]); 

            DB::table('restaurants')->insert([
                'name' => 'Zapiekanki',
                'worker_id' => '4',
                'city' => 'Kielce',
                'adress' => 'Sandomierska 11/11',
                'description' => 'Dania polskie, zapiekanki',
                'type' => 'polish',
                'open_from' => '8:00',
                'open_till' => '24:00',
                'avg_wait' => '30',
                'created_at' => '2018-08-18 01:36:38',
                'updated_at' => '2018-08-18 01:36:38',
            ]); 

            DB::table('restaurants')->insert([
                'name' => 'BurgerPrince',
                'worker_id' => '5',
                'city' => 'Warszawa',
                'adress' => 'Kobaltowa 2/10',
                'description' => 'Burgery, steki,, grill',
                'type' => 'american',
                'open_from' => '8:00',
                'open_till' => '23:00',
                'avg_wait' => '40',
                'created_at' => '2018-08-18 01:36:38',
                'updated_at' => '2018-08-18 01:36:38',
            ]); 

            DB::table('restaurants')->insert([
                'name' => 'Pizza Italiana',
                'worker_id' => '6',
                'city' => 'Szczecin',
                'adress' => 'Sienkiewicza 2/2',
                'description' => 'Pizza, pasta',
                'type' => 'italian',
                'open_from' => '8:00',
                'open_till' => '23:00',
                'avg_wait' => '60',
                'created_at' => '2018-08-18 01:36:38',
                'updated_at' => '2018-08-18 01:36:38',
            ]); 

        	/* ================Dishes======================= */

        	DB::table('dishes')->insert([
        		'name' => 'Pierogi z grzybami',
        		'restaurant_id' => '2',
                'category' => 'Pierogi',
        		'description' => '20 pierogów z grzybami',
        		'price' => '21',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Pierogi ruskie',
        		'restaurant_id' => '2',
                'category' => 'Pierogi',
        		'description' => '20 pierogów ruskich',
        		'price' => '25',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Pierogi z miesem',
        		'restaurant_id' => '2',
                'category' => 'Pierogi',
        		'description' => '20 pierogów z mięsem',
        		'price' => '20',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Pierogi z serem',
        		'restaurant_id' => '2',
                'category' => 'Pierogi',
        		'description' => '20 pierogów z serem',
        		'price' => '26',
        	]); 



        	DB::table('dishes')->insert([
        		'name' => 'Kebab w bulce kurczak',
        		'restaurant_id' => '1',
                'category' => 'Kebab',
        		'description' => 'Kebab kurczak w bułce z surówkami',
        		'price' => '15',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Kebab w bulce wolowina',
        		'restaurant_id' => '1',
                'category' => 'Kebab',
        		'description' => 'Kebab wołowina w bułce z surówkami',
        		'price' => '16',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Kebab w tortilli kurczak',
        		'restaurant_id' => '1',
                'category' => 'Kebab',
        		'description' => 'Kebab kurczak w tortilli z surówkami',
        		'price' => '17',
        	]); 
        	DB::table('dishes')->insert([
        		'name' => 'Kebab w tortilli wolowina',
        		'restaurant_id' => '1',
                'category' => 'Kebab',
        		'description' => 'Kebab wołowina w tortilli z surówkami',
        		'price' => '18',
        	]); 



            DB::table('dishes')->insert([
                'name' => 'Zapiekanka z szynka',
                'restaurant_id' => '3',
                'category' => 'Zapiekanki',
                'description' => 'Zapiekanka z szynka',
                'price' => '11',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Zapiekanka z pieczarkami',
                'restaurant_id' => '3',
                'category' => 'Zapiekanki',
                'description' => 'Zapiekanka z pieczarkami',
                'price' => '12',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Zapiekanka z szynka i pieczarkami',
                'restaurant_id' => '3',
                'category' => 'Zapiekanki',
                'description' => 'Zapiekanka z szynka i pieczarkami',
                'price' => '13',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Zapiekanka z bekonem',
                'restaurant_id' => '3',
                'category' => 'Zapiekanki',
                'description' => 'Zapiekanka z bekonem',
                'price' => '11',
            ]); 


            DB::table('dishes')->insert([
                'name' => 'Burger z bekonem',
                'restaurant_id' => '4',
                'category' => 'Burgery',
                'description' => 'Burger z kotletem 300g plus bekon',
                'price' => '8',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Burger Krolewski',
                'restaurant_id' => '4',
                'category' => 'Burgery',
                'description' => 'Podwójny burger 500g mięsa',
                'price' => '14',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Szaszlyki z grilla',
                'restaurant_id' => '4',
                'category' => 'Grill',
                'description' => '4 Szaszłyki grillowane',
                'price' => '7',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Kurczak grillowany',
                'restaurant_id' => '4',
                'category' => 'Grill',
                'description' => 'Połówka z kurczaka grillowana na ruszcie',
                'price' => '13',
            ]); 


            DB::table('dishes')->insert([
                'name' => 'Pizza Vesuvio',
                'restaurant_id' => '5',
                'category' => 'Pizza',
                'description' => 'Pizza z szynka i pieczarkami - 40cm średnica',
                'price' => '13',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pizza Dracula',
                'restaurant_id' => '5',
                'category' => 'Pizza',
                'description' => 'Pizza z szynka, czosnkiem i pieczarkami - 40cm średnica',
                'price' => '14',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pizza MeatBoy',
                'restaurant_id' => '5',
                'category' => 'Pizza',
                'description' => 'Pizza z szynka, salami, kiełbasą i pieczarkami - 40cm średnica',
                'price' => '15',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pizza Italiana',
                'restaurant_id' => '5',
                'category' => 'Pizza',
                'description' => '6 składników do wyboru(wybór podać w dodatkowych informacjach zamówienia) - 40cm średnica',
                'price' => '16',
            ]); 

            /* ================Napoje======================= */

            DB::table('dishes')->insert([
                'name' => 'Fanta',
                'restaurant_id' => '1',
                'category' => 'Napoje',
                'description' => 'Fanta 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pepsi',
                'restaurant_id' => '1',
                'category' => 'Napoje',
                'description' => 'Pepsi 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Sprite',
                'restaurant_id' => '1',
                'category' => 'Napoje',
                'description' => 'Sprite 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Mirinda',
                'restaurant_id' => '1',
                'category' => 'Napoje',
                'description' => 'Mirinda 0.5l',
                'price' => '5',
            ]); 



            DB::table('dishes')->insert([
                'name' => 'Fanta',
                'restaurant_id' => '2',
                'category' => 'Napoje',
                'description' => 'Fanta 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pepsi',
                'restaurant_id' => '2',
                'category' => 'Napoje',
                'description' => 'Pepsi 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Sprite',
                'restaurant_id' => '2',
                'category' => 'Napoje',
                'description' => 'Sprite 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Mirinda',
                'restaurant_id' => '2',
                'category' => 'Napoje',
                'description' => 'Mirinda 0.5l',
                'price' => '5',
            ]); 


            DB::table('dishes')->insert([
                'name' => 'Fanta',
                'restaurant_id' => '3',
                'category' => 'Napoje',
                'description' => 'Fanta 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pepsi',
                'restaurant_id' => '3',
                'category' => 'Napoje',
                'description' => 'Pepsi 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Sprite',
                'restaurant_id' => '3',
                'category' => 'Napoje',
                'description' => 'Sprite 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Mirinda',
                'restaurant_id' => '3',
                'category' => 'Napoje',
                'description' => 'Mirinda 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Fanta',
                'restaurant_id' => '4',
                'category' => 'Napoje',
                'description' => 'Fanta 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pepsi',
                'restaurant_id' => '4',
                'category' => 'Napoje',
                'description' => 'Pepsi 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Sprite',
                'restaurant_id' => '4',
                'category' => 'Napoje',
                'description' => 'Sprite 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Mirinda',
                'restaurant_id' => '4',
                'category' => 'Napoje',
                'description' => 'Mirinda 0.5l',
                'price' => '5',
            ]); 


            DB::table('dishes')->insert([
                'name' => 'Fanta',
                'restaurant_id' => '5',
                'category' => 'Napoje',
                'description' => 'Fanta 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Pepsi',
                'restaurant_id' => '5',
                'category' => 'Napoje',
                'description' => 'Pepsi 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Sprite',
                'restaurant_id' => '5',
                'category' => 'Napoje',
                'description' => 'Sprite 0.5l',
                'price' => '5',
            ]); 
            DB::table('dishes')->insert([
                'name' => 'Mirinda',
                'restaurant_id' => '5',
                'category' => 'Napoje',
                'description' => 'Mirinda 0.5l',
                'price' => '5',
            ]); 


        }
    }


