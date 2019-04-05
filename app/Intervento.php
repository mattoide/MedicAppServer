<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Intervento extends Model {

    protected $table = 'intervento';

    protected $fillable = [
        'data','intervento','categoria1','diagnosi1', 'categoria2', 'diagnosi2'
    ];

    protected $attributes = [];
}
