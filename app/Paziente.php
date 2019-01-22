<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Paziente extends Model
{
    protected $table = 'paziente';

    public function recapitiPaziente() {
        return $this->hasOne('MedicAppServer\RecapitiPaziente');
    }
    public function allergiePaziente() {
        return $this->hasMany('MedicAppServer\AllergiePaziente');
    }

    public function medico() {
        return $this->hasOne('MedicAppServer\Medico');
    }

    public function diagnosi1() {
        return $this->hasOne('MedicAppServer\Diagnosi1');
    }

    public function diagnosi2() {
        return $this->hasOne('MedicAppServer\Diagnosi2');
    }

    public function diagnosi3() {
        return $this->hasOne('MedicAppServer\Diagnosi3');
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
