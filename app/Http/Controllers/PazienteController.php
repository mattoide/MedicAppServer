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

        $paz = new Paziente([
            'nome' => "nome",
            'cognome' => "cognome"
        ]);

        $reca = new RecapitiPaziente([
            'indirizzo' => "via dio",
            'citta' => "citttaa",
            'paese' => "paesee",
            'cap' => "capp",
            'tel1' => "tel1",
            'tel2' => "tell2"
        ]);

        $paz->save();
        $paz->recapitiPaziente()->save($reca);

        $lastpaz = Paziente::find($paz->id);
        $lastrec = RecapitiPaziente::find($reca->id);
        $lastpaz->id_recapiti_paziente = $lastrec->id;
        $lastpaz->save();
    }

    public function indexAll()
    {
        $patients = Patient::all();
        return view('patients.allpatients', array('patients' => $patients));

    }
}
