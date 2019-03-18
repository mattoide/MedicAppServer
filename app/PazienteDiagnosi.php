<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class PazienteDiagnosi extends Model
{
    protected $table = 'paziente_diagnosi';

    protected $fillable = [
        'paziente_id', 'diagnosi_id'
    ];

    protected $attributes = [];
}
