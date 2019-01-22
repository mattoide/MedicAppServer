<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class AllergiePaziente extends Model
{
    protected $table = 'allergie_paziente';

    protected $fillable = [
        'allergia'
    ];
}
