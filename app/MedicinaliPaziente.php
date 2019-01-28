<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class MedicinaliPaziente extends Model
{
    protected $table = 'medicinali_paziente';

    protected $fillable = [
        'paiente_id', 'medicinale_id'
    ];
}
