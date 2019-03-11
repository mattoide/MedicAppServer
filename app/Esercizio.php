<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Esercizio extends Model
{
    protected $table = 'esercizi';


    protected $fillable = [
        'nome', 'tipoesercizio'
    ];

    protected $attributes = [];
}
