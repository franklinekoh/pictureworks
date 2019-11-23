<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Comment::class, function (Faker $faker){
    static $users;
    $users = $users ?: User::all();

    return [
        'body' => $faker->realText(),
        'user_id' => $users->random()->id
    ];
});
