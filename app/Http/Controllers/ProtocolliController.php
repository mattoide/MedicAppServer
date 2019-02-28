<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;

class ProtocolliController extends Controller
{
    public function index() {
        // $protocolli = Protocolli::all();
        $protocolli = [];
        return view('protocolli.protocolli')->with('protocolli', $protocolli);
    }

}
