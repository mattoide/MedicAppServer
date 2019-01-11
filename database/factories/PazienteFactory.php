<?php

use Faker\Generator as Faker;

$factory->define(MedicAppServer\Paziente::class, function (Faker $faker) {
    return [
        'nome'          =>'nomeProva - ' . str_random(10),
        'cognome'       => 'cognomeProva - ' . str_random(10),
        'sesso'         => 'X',
        'datadinascita' => today(),
        'password'      => Hash::make(str_random(10))
    ];
});
