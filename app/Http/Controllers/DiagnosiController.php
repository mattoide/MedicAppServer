<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosiController extends Controller
{
    public function index(){
        return view('diagnosi.diagnosi');
    }
}
