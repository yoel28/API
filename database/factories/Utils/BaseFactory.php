<?php

function getBaseFactory (Faker\Generator $faker,$prefix='COD_') {
    $size = 1;
    return [
        'code'=>$prefix.$faker->unique()->countryCode,
        'title'=>$faker->name,
        'detail'=>$faker->text(10),
//        'images'=>image64($faker->image(null,$size,$size)),
        'editable'=>$faker->boolean,
        'enabled'=>$faker->boolean,
        'visible'=>$faker->boolean,
    ];
}
function getAuditFactory (Faker\Generator $faker) {
    return [
        'ip'=> $faker->ipv4,
    ];
}
function image64($path):string {
    return $path;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    return 'data:image/' . $type . ';base64,' . base64_encode($data);
}