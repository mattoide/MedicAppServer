<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Radiografia extends Model
{
    protected $table = 'radiografie';

    protected $fillable = [
        'radiografia'
    ];

    protected $attributes = [];
}
