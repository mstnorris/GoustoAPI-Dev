<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,

//        'id' => $faker->name,
//        'created_at' => $faker->name,
//        'updated_at' => $faker->name,
//        'box_type' => $faker->name,
//        'title' => $faker->name,
//        'slug' => $faker->name,
//        'short_title' => $faker->name,
//        'marketing_description' => $faker->name,
//        'calories_kcal' => $faker->name,
//        'protein_grams' => $faker->name,
//        'fat_grams' => $faker->name,
//        'carbs_grams' => $faker->name,
//        'bulletpoint1' => $faker->name,
//        'bulletpoint2' => $faker->name,
//        'bulletpoint3' => $faker->name,
//        'recipe_diet_type_id' => $faker->name,
//        'season' => $faker->name,
//        'base' => $faker->name,
//        'protein_source' => $faker->name,
//        'preparation_time_minutes' => $faker->name,
//        'shelf_life_days' => $faker->name,
//        'equipment_needed' => $faker->name,
//        'origin_country' => $faker->name,
//        'recipe_cuisine' => $faker->name,
//        'in_your_box' => $faker->name,
//        'gousto_reference' => $faker->name
    ];
});
