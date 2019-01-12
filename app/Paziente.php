<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{
    protected $table = 'paziente';

    public function recapitiPaziente() {
        return $this->hasOne('MedicAppServer\RecapitiPaziente');
    }

    public function medico() {
        return $this->hasOne('MedicAppServer\Medico');
    }

    public function diagnosi() {
        return $this->hasMany('MedicAppServer\Diagnosi');
    }

    public function medicinale() {
        return $this->hasMany('MedicAppServer\Medicinale');
    }

    public function storiaClinica() {
        return $this->hasMany('MedicAppServer\StoriaClinica');
    }
    public function intervento() {
        return $this->hasMany('MedicAppServer\Intervento');
    }
    public function foto() {
        return $this->hasMany('MedicAppServer\Foto');
    }

    public function radiografia() {
        return $this->hasMany('MedicAppServer\Radiografia');
    }

    protected $fillable = [
        'nome', 'cognome', 'sesso', 'datadinascita', 'password'
    ];

    protected $attributes = [];

    protected $hidden = [
        'password'
    ];
}
