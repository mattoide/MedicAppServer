<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class RecapitiPaziente extends Model
{
    protected $table = 'recapiti_paziente';

    protected $fillable = [
        'indirizzo', 'citta', 'paese', 'cap', 'tel1', 'tel2', 'email'
    ];
}
