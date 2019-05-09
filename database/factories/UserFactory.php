<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        // password
      'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Concert::class, function (Faker $faker) {
    return [
      'title' => 'Example Band',
      'subtitle' => 'with The Fake Openers',
      'date' => Carbon::parse('+2 weeks'),
      'ticket_price' => 2000,
      'venue' => 'The Example Theatre',
      'venue_address' => '123 Example Lane',
      'city' => 'Fakeville',
      'state' => 'ON',
      'zip' => '90210',
      'additional_information' => 'Some sample additional information.',
    ];
});

// published state
$factory->state(App\Concert::class, 'published', function ($faker) {
    return [
      'published_at' => Carbon::parse('-1 week'),
    ];
});

// uppublished state
$factory->state(App\Concert::class, 'unpublished', function ($faker) {
    return [
      'published_at' => null,
    ];
});