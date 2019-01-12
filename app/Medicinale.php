<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Medicinale extends Model
{
    protected $table = 'medicinale';

    protected $fillable = [
        'nome', 'quantita', 'voltealgiorno', 'durata'
    ];

    protected $attributes = [];
}
