<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{
    protected $table = 'paziente';

    public function recapitiPaziente() {
        return $this->hasOne('MedicAppServer\RecapitiPaziente', "id_paziente");
    }

    protected $fillable = [
        'nome', 'cognome'
    ];

    protected $attributes = [];
}
