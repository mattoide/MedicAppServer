<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Medicinale extends Model
{
    protected $table = 'medicinale';

    protected $fillable = [
        'nome', 'dosaggio', 'posologia', 'durata_terapia'
    ];

    protected $attributes = [];
}
