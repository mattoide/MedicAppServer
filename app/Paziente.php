<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{
    protected $table = 'paziente';

    public function recapitiPaziente() {
        return $this->hasOne('App\RecapitiPaziente', "id_paziente");
    }

    protected $fillable = [
        'nome', 'cognome', 'indirizzo'
    ];

    protected $attributes = [
        'nome' => "nome"
    ];
}
