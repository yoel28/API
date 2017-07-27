<?php

use Api\Models\Access\PermissionModel;

$factory->define(PermissionModel::class, function (Faker\Generator $faker) {

    return array_merge(
        getBaseFactory($faker,'PERMISSION_'),
        [
            'module'=>$faker->jobTitle,
            'controller'=>$faker->jobTitle,
            'action'=>$faker->jobTitle
        ]
    );

});
