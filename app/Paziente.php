<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{
    protected $table = 'paziente';

    public function recapitiPaziente() {
        return $this->hasOne('MedicAppServer\RecapitiPaziente');
    }

    protected $fillable = [
        'nome', 'cognome', 'sesso', 'datadinascita'
    ];

    protected $attributes = [];
}
