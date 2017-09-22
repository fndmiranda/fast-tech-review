<?php

namespace Modules\Beer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Beer\Entities\Ingredient;

class IngredientsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(Ingredient::class, 25)->create();
	}

}