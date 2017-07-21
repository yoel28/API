<?php

use Api\Models\Access\RoleModel;

$factory->define(RoleModel::class, function (Faker\Generator $faker) {

    return getBaseFactory($faker);

});
