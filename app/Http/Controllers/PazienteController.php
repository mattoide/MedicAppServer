<?php

namespace MedicAppServer\Http\Controllers;


use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use Request;

class PazienteController extends Controller
{
    public function create()
    {
        return view('pazienti.nuovopaziente');
        //return view('welcome');

    }

    public function store(Request $request)
    {
       // print_r($request::all());
        $indirizzo = new RecapitiPaziente()
        $paz = new Paziente($request::all());
        $paz = new Paziente()->;
        $paz->save();
    }

    public function indexAll()
    {
        $patients = Patient::all();
        return view('patients.allpatients', array('patients' => $patients));

    }
}
