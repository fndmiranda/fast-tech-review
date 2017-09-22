<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\Modules\Beer\Entities\Beer::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'tagline' => $faker->text(255),
        'first_brewed' => $faker->date(),
        'description' => $faker->text(),
        'image_url' => $faker->randomElement([
            'https://images.punkapi.com/v2/22.png',
            'https://images.punkapi.com/v2/23.png',
            'https://images.punkapi.com/v2/24.png',
            'https://images.punkapi.com/v2/25.png',
        ]),
        'yeast' => $faker->randomElement([
            'Wyeast Pilsner Lager 2007™',
            'Wyeast 3711 - French Saison™',
            'Wyeast 3522 - Belgian Ardennes™',
            'Saflager S189',
        ]),
        'abv' => $faker->randomFloat(2),
        'ibu' => $faker->randomFloat(2),
        'target_fg' => $faker->randomNumber(),
        'target_og' => $faker->randomFloat(2),
        'ebc' => $faker->randomNumber(),
        'srm' => $faker->randomFloat(2),
        'ph' => $faker->randomFloat(2),
        'attenuation_level' => $faker->randomFloat(2),
        'volume' => [
            'value' => $faker->randomNumber(2),
            'unit' => 'liters',
        ],
        'boil_volume' => [
            'value' => $faker->randomNumber(2),
            'unit' => 'liters',
        ],
        'method' => [
            'mash_temp' => $faker->randomElements([
                [
                    'temp' => [
                        'value' => $faker->randomNumber(2),
                        'unit' => 'celsius',
                    ],
                    'duration' => $faker->randomNumber(2),
                ],
            ]),
            'fermentation' => $faker->randomElements([
                [
                    'temp' => [
                        'value' => $faker->randomNumber(2),
                        'unit' => 'celsius',
                    ],
                ],
            ]),
            'twist' => $faker->text(255),
        ],
    ];
});
