<?php

namespace MedicAppServer;

use Illuminate\Database\Eloquent\Model;

class Intervento extends Model {

    protected $_table = 'intervento';

    protected $_fillable = [
        'data','intervento'
    ];

    protected $_attributes = [];
}
