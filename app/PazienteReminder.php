<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class PazienteReminder extends Model
{
    protected $table = 'paziente_reminder';

    protected $fillable = [
        'paziente_id', 'reminder_id', 'data'
    ];

    protected $attributes = [];
}
