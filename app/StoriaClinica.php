<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class StoriaClinica extends Model
{
    protected $table = 'storia_clinica';

    protected $fillable = [
        // 'data', 'storiaclinica', 'categoria1','diagnosi1', 'categoria2', 'diagnosi2'
        'data', 'storiaclinica'
    ];

    protected $attributes = [];
}
