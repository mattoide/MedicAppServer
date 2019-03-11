<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Protocollo extends Model
{
    protected $table = 'protocolli';

    public function esercizi() {
        return $this->hasMany('MedicAppServer\Esercizio');
    }

    protected $fillable = [
        'nome'
    ];

    protected $attributes = [];
}
