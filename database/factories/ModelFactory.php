<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Game::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'is_active' => $faker->boolean(),
        'name' => $faker->firstName,
        'owner_id' => $faker->sentence,
        'start_player_attempts' => $faker->randomNumber(5),
        'start_player_hp' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Gamer::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'donate_value' => $faker->randomNumber(5),
        'energy' => $faker->randomNumber(5),
        'in_game_value' => $faker->randomNumber(5),
        'nickname' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Item::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
