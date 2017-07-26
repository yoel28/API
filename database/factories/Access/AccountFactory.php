<?php

use Api\Models\Access\AccountModel;

$factory->define(AccountModel::class, function (Faker\Generator $faker) {
    $size = 1;

    return array_merge(
        getBaseFactory($faker,'ACCOUNT_'),
        [
            'address'=>$faker->address,
            'contact'=>$faker->jobTitle,
            'email'=>$faker->unique()->safeEmail,
//            'favicon'=>image64($faker->image(null,$size,$size)),
            'hostname'=>$faker->domainName,
//            'icon'=>image64($faker->image(null,$size,$size)),
            'max_user_count'=>rand(1,20),
            'message'=>$faker->text(20),
            'name'=>$faker->name,
            'title'=>$faker->name,
            'phone'=>$faker->phoneNumber,
            'url'=>$faker->url
        ]
    );

});
