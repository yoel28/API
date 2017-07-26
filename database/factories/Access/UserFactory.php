<?php


$factory->define(Api\Models\Access\UserModel::class, function (Faker\Generator $faker) {

    return array_merge(
        getBaseFactory($faker,'USER_'), [
            'email' => $faker->unique()->safeEmail,
            'username' => $faker->unique()->firstName,
            'name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'password' => bcrypt('123456'),
            'account_id'=>rand(1,10)
        ]
    );
});
