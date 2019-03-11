<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Diagnosi extends Model
{
    protected $table = 'diagnosi';

    protected $fillable = [
        'diagnosi', 'categoria'
    ];

    protected $attributes = [];
}
