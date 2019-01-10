<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medico';

    public function pazienti() {
        return $this->hasMany('MedicAppServer\Paziente');
    }

    protected $fillable = [
        'nome', 'cognome', 'contatto', 'recapito'
    ];

    protected $attributes = [];
}
