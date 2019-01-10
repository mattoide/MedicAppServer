<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';

    protected $fillable = [
        'foto'
    ];

    protected $attributes = [];
}
