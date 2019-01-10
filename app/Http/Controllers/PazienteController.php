<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Medico;
use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use MedicAppServer\StoriaClinica;
use Validator;
use Illuminate\Support\Facades\Hash;


class PazienteController extends Controller {

    public function index() {
        $pazienti = Paziente::with('recapitiPaziente')->get();
        return view('pazienti.listapazienti')->with('pazienti', $pazienti);

    }

    public function create() {
        return view('pazienti.aggiungi.nuovopaziente');
    }

    public function store(Request $request) {

        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = new Paziente([
            'nome'          => $request['nome'],
            'cognome'       => $request['cognome'],
            'sesso'         => $request['sesso'],
            'datadinascita' => $request['datadinascita'],
            'password'      => Hash::make($request['password']),
        ]);

        $recapitiPaziente = new RecapitiPaziente([
            'indirizzo'     => $request['indirizzo'],
            'citta'         => $request['citta'],
            'paese'         => $request['paese'],
            'cap'           => $request['cap'],
            'tel1'          => $request['tel1'],
            'tel2'          => $request['tel2'],
            'email'         => $request['email'],
            'tipodocumento' => $request['tipodocumento'],
            'iddocumento'   => $request['iddocumento'],
        ]);

        $medico = new Medico([
            'nome'     => $request['medicocurante'],
            'cognome'  => $request['medicocurante'],
            'contatto' => $request['contattomedicocurante'],
            'recapito' => $request['recapitomedicocurante'],
        ]);

        $storiaClinica = new StoriaClinica([
            'data'          => $request['datastoriaclinica'],
            'storiaclinica' => $request['storiaclinica'],
        ]);

        $paziente->save();
        $paziente->recapitiPaziente()->save($recapitiPaziente);

        if ($medico->nome || $medico->cognome || $medico->contatto || $medico->recapito) {
            $paziente->medico()->save($medico);
        }

        if ($storiaClinica->data || $storiaClinica->storiaclinica) {
            $paziente->storiaClinica()->save($storiaClinica);
        }

        return redirect('/pazienti');
    }

    public function indexAll() {

        $pazienti = Paziente::all();
        return view('patients.allpatients', array('patients' => $pazienti));
    }

    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'nome'          => 'required|max:32',
                'cognome'       => 'required|max:32',
                'sesso'         => 'required|max:1',
                'datadinascita' => 'required|date',
                'indirizzo'     => 'required|max:64',
                'citta'         => 'required|max:64',
                'paese'         => 'required|max:64',
                'tel1'          => 'required|numeric|unique:recapiti_paziente,tel1',
                'tel2'          => 'nullable|numeric|unique:recapiti_paziente,tel2',
                'email'         => 'required|unique:recapiti_paziente,email',
                'centrovisita'  => 'required|max:64',
                'tipodocumento' => 'required',
                'iddocumento'   => 'required|unique:recapiti_paziente,iddocumento',
                'password'      => 'required|same:repassword|min:4|max:16',
            ),
            'messaggi' => array(
                'required'           => 'Il campo :attribute è richiesto.',
                'max'                => 'Il campo :attribute non deve contenere più di :max caratteri.',
                'numeric'            => 'Il campo :attribute deve essere un numero valido.',
                'email'              => 'Il campo :attribute deve essere una :attribute valida.',
                'email.unique'       => 'Questa :attribute è già stata usata.',
                'iddocumento.unique' => 'Questo :attribute è già stato usato.',
                'tel1.unique'        => 'Questo :attribute è già stato usato.',
                'tel2.unique'        => 'Questo :attribute è già stato usato.',
                'password.same'      => 'Le :attribute non coincidono.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}
