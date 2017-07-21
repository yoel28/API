<?php
use Api\Models\Business\RuleModel;

$factory->define(RuleModel::class, function (Faker\Generator $faker) {

    return array_merge(
        getBaseFactory($faker),
        ['account_id'=>rand(1,10)]
    );
});