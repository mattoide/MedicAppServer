<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminder';

    protected $fillable = [
        'nomereminder', 'testoreminder', 'linguareminder'
    ];

    protected $attributes = [];
}
