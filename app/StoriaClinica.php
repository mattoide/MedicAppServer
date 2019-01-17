<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class StoriaClinica extends Model
{
    protected $table = 'storia_clinica';

    protected $fillable = [
        'data', 'storiaclinica', 'diagnosi1', 'diagnosi2'
    ];

    protected $attributes = [];
}
