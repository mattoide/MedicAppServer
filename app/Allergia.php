<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Allergia extends Model
{
    protected $table = 'allergia';

    protected $fillable = [
        'allergia'
    ];

    protected $attributes = [];
}
