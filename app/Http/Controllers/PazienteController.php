<?php

namespace MedicAppServer\Http\Controllers;


use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use Illuminate\Http\Request;
use Validator;


class PazienteController extends Controller
{
    public function create()
    {
        return view('pazienti.nuovopaziente');
        //return view('welcome');

    }

    public function store(Request $request)
    {

        $validazione = array(
            'regole' => array(
                'nome' => 'required|max:32',
                'cognome' => 'required|max:32',
                'sesso' => 'required|max:1',
                'indirizzo' => 'required|max:64',
                'citta' => 'required|max:64',
                'paese' => 'required|max:64',
            ),
            'messaggi' => array(
                'max' => 'Il campo :attribute non deve contenere più di :max caratteri.'
            )
        );

        $validator = Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = new Paziente([
            'nome' => $request['nome'],
            'cognome' => $request['cognome'],
            'sesso' => $request['sesso'],
            'datadinascita' => $request['datadinascita']
        ]);

        $recapitiPaziente = new RecapitiPaziente([
            'indirizzo' => $request['indirizzo'],
            'citta' => $request['citta'],
            'paese' => $request['paese'],
            'cap' => $request['cap'],
            'tel1' => $request['tel1'],
            'tel2' => $request['tel2']
        ]);

        $paziente->save();
        $paziente->recapitiPaziente()->save($recapitiPaziente);

    }

    public function indexAll()
    {
        $pazienti = Paziente::all();
        return view('patients.allpatients', array('patients' => $pazienti));

    }

}
