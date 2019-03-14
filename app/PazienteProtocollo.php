<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class PazienteProtocollo extends Model
{
    protected $table = 'paziente_protocollo';

    protected $fillable = [
        'paziente_id', 'protocollo_id'
    ];

    protected $attributes = [];
}
