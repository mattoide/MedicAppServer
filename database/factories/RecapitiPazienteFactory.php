<?php

use Faker\Generator as Faker;

$factory->define(MedicAppServer\RecapitiPaziente::class, function (Faker $faker) {
    return [
        'indirizzo'     => 'indirizzoProva - ' . str_random(10),
            'citta'         =>'cittaProva - ' . str_random(10),
            'paese'         =>'paeseProva - '. str_random(10),
            'cap'           =>'capProva',
            'tel1'          =>'tel1Prova - ' . str_random(2),
            'tel2'          => 'tel2Prova - ' . str_random(2),
            'email'         => 'emailProva - ' .  str_random(10),
            'tipodocumento' => 'tipodocumentoProva - ' . str_random(10),
            'iddocumento'   => 'iddocumentoProva - ' . str_random(10)
    ];
});
