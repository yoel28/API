<?php
use Api\Models\Business\RuleModel;

$factory->define(RuleModel::class, function (Faker\Generator $faker) {

    return array_merge(
        getBaseFactory($faker,'RULE_'),
        ['account_id'=>rand(1,10)]
    );
});