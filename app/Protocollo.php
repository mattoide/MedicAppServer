<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Protocollo extends Model
{
    protected $table = 'protocolli';

    protected $fillable = [
        'nome',
    ];

    protected $attributes = [];
}
