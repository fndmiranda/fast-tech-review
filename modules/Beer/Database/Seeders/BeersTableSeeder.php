<?php

namespace Modules\Beer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Beer\Entities\Beer;
use Modules\Beer\Entities\Ingredient;
use Faker\Factory as Faker;

class BeersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $faker = Faker::create();

		factory(Beer::class, 25)->create()->each(function ($beer) use ($faker) {
		    for ($i=1; $i<=random_int(3, 5); $i++) {
                $beer->malt()->save(factory(Ingredient::class)->make(), [
                    'amount' => json_encode([
                        'value' => $faker->randomNumber(2),
                        'unit' => 'grams',
                    ]),
                ]);
            }

            for ($i=1; $i<=random_int(3, 5); $i++) {
                $beer->hops()->save(factory(Ingredient::class)->make(), [
                    'add' => $faker->randomElement([
                        'start',
                        'middle',
                        'end',
                    ]),
                    'attribute' => $faker->randomElement([
                        'flavour',
                        'bitter',
                    ]),
                    'amount' => json_encode([
                        'value' => $faker->randomNumber(2),
                        'unit' => 'grams',
                    ]),
                ]);
            }
        });
	}

}