<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MedicAppServer\Diagnosi1;
use MedicAppServer\Diagnosi2;
use MedicAppServer\Diagnosi3;
use MedicAppServer\Medico;
use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use MedicAppServer\StoriaClinica;
use Validator;

class PazienteController extends Controller {

    public function index() {
        $pazienti = Paziente::with('recapitiPaziente')->with('diagnosi1')->with('diagnosi2')->get();
        return view('pazienti.listapazienti')->with('pazienti', $pazienti);

    }

    public function create() {
        return view('pazienti.aggiungi.nuovopaziente');
    }

    public function store(Request $request) {

//         $datestoriecliniche = Input::get('datastoriaclinica');
        //         $storiecliniche = Input::get('storiaclinica');

//         print_r($datestoriecliniche .'<br>');
        //         print_r($storiecliniche);

//         foreach ($datestoriecliniche as $quan) {
        //             print_r($quan);

//         }      foreach ($storiecliniche as $quan) {
        //             print_r($quan);
        //         }
        // return;
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
            'centrovisita'  => $request['centrovisita'],
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

        $diagnosi1 = new Diagnosi1([
            'diagnosi' => $request['diagnosi1'],
        ]);

        $diagnosi2 = new Diagnosi2([
            'diagnosi' => $request['diagnosi2'],
        ]);

        $diagnosi3 = new Diagnosi3([
            'diagnosi' => $request['diagnosi3'],
        ]);

        $paziente->save();
        $paziente->recapitiPaziente()->save($recapitiPaziente);

        if ($medico->nome || $medico->cognome || $medico->contatto || $medico->recapito) {
            $paziente->medico()->save($medico);
        }

        if ($storiaClinica->data || $storiaClinica->storiaclinica) {
            $paziente->storiaClinica()->save($storiaClinica);
        }

        if ($diagnosi1->diagnosi) {
            $paziente->diagnosi1()->save($diagnosi1);
        }

        if ($diagnosi2->diagnosi) {
            $paziente->diagnosi2()->save($diagnosi2);
        }

        if ($diagnosi3->diagnosi) {
            $paziente->diagnosi3()->save($diagnosi3);
        }

        return redirect('/pazienti');
    }

    public function createClinicStory(Request $request){

        $paziente = Paziente::with('storiaClinica')->find($request['idpaz']);

        $storiaClinica = new StoriaClinica([
            'data'          => $request['datastoriaclinicam'],
            'storiaclinica' => $request['storiaclinicam'],
        ]);

        $paziente->storiaClinica()->save($storiaClinica);

        return redirect()->back();
    }

    public function edit(Request $request) {
        $paziente = Paziente::find($request['id']);
        return view('pazienti.modifica.modificapaziente')->with('paziente', $paziente);
    }

    public function update(Request $request) {

        // $datestoriecliniche = Input::get('datastoriaclinica');
        // $storiecliniche = Input::get('storiaclinica');

        // print_r($datestoriecliniche);
        // print_r('<br>');
        // print_r($storiecliniche);

        // foreach ($datestoriecliniche as $quan) {
        //     print_r($quan);

        // }      foreach ($storiecliniche as $quan) {
        //     print_r($quan);
        // }
        // return;
        $validator = $this->getValidatoreForUpdate($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = Paziente::with('recapitiPaziente')->find($request['idpaz']);

        $paziente->nome                        = $request['nome'];
        $paziente->cognome                     = $request['cognome'];
        $paziente->sesso                       = $request['sesso'];
        $paziente->datadinascita               = $request['datadinascita'];
        $paziente->recapitiPaziente->indirizzo = $request['indirizzo'];

        $paziente->recapitiPaziente->citta         = $request['citta'];
        $paziente->recapitiPaziente->paese         = $request['paese'];
        $paziente->recapitiPaziente->cap           = $request['cap'];
        $paziente->recapitiPaziente->tel1          = $request['tel1'];
        $paziente->recapitiPaziente->tel2          = $request['tel2'];
        $paziente->recapitiPaziente->email         = $request['email'];
        $paziente->recapitiPaziente->tipodocumento = $request['tipodocumento'];
        $paziente->recapitiPaziente->iddocumento   = $request['iddocumento'];
        $paziente->recapitiPaziente->centrovisita  = $request['centrovisita'];

        $paziente->save();
        $paziente->recapitiPaziente()->save($paziente->recapitiPaziente);

        // return redirect('/pazienti');
        return redirect()->back();
    }

    public function delete(Request $request) {

        Paziente::destroy($request["idpaziente"]);
        return redirect('/pazienti');
    }

    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'nome'                => 'required|max:32',
                'cognome'             => 'required|max:32',
                'sesso'               => 'required|max:1',
                'datadinascita'       => 'required|date',
                'indirizzo'           => 'required|max:64',
                'citta'               => 'required|max:64',
                'paese'               => 'required|max:64',
                'tel1'                => 'required|numeric|unique:recapiti_paziente,tel1',
                'tel2'                => 'nullable|numeric|unique:recapiti_paziente,tel2',
                'email'               => 'required|unique:recapiti_paziente,email',
                'centrovisita'        => 'required|max:64',
                'tipodocumento'       => 'required',
                'iddocumento'         => 'required|unique:recapiti_paziente,iddocumento',
                'password'            => 'required|same:repassword|min:4',
                'datastoriaclinica.*' => 'required_with:storiaclinica',
                'storiaclinica.*'     => 'required_with:datastoriaclinica',
            ),
            'messaggi' => array(
                'required'                          => 'Il campo :attribute è richiesto.',
                'max'                               => 'Il campo :attribute non deve contenere più di :max caratteri.',
                'numeric'                           => 'Il campo :attribute deve essere un numero valido.',
                'email'                             => 'Il campo :attribute deve essere una :attribute valida.',
                'email.unique'                      => 'Questa :attribute è già stata usata.',
                'iddocumento.unique'                => 'Questo :attribute è già stato usato.',
                'tel1.unique'                       => 'Questo :attribute è già stato usato.',
                'tel2.unique'                       => 'Questo :attribute è già stato usato.',
                'password.same'                     => 'Le :attribute non coincidono.',
                'datastoriaclinica.*.required_with' => 'Il campo :attribute è richiesto quando il campo :values è presente.',
                'storiaclinica.*.required_with' => 'Il campo :attribute è richiesto quando il campo :values è presente.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

    public function getValidatoreForUpdate($request) {

        $validazione = array(
            'regole'   => array(
                'nome'                => 'required|max:32',
                'cognome'             => 'required|max:32',
                'sesso'               => 'required|max:1',
                'datadinascita'       => 'required|date',
                'indirizzo'           => 'required|max:64',
                'citta'               => 'required|max:64',
                'paese'               => 'required|max:64',
                'tel1'                => 'required|numeric',
                'tel2'                => 'nullable|numeric',
                'email'               => 'required',
                'centrovisita'        => 'required|max:64',
                'tipodocumento'       => 'required',
                'iddocumento'         => 'required',
                'password'            => 'required|same:repassword|min:4',
                'datastoriaclinica.*' => 'required_with:storiaclinica',
                'storiaclinica.*'     => 'required_with:datastoriaclinica',
            ),
            'messaggi' => array(
                'required'                          => 'Il campo :attribute è richiesto.',
                'max'                               => 'Il campo :attribute non deve contenere più di :max caratteri.',
                'numeric'                           => 'Il campo :attribute deve essere un numero valido.',
                'email'                             => 'Il campo :attribute deve essere una :attribute valida.',
                'email.unique'                      => 'Questa :attribute è già stata usata.',
                'iddocumento.unique'                => 'Questo :attribute è già stato usato.',
                'tel1.unique'                       => 'Questo :attribute è già stato usato.',
                'tel2.unique'                       => 'Questo :attribute è già stato usato.',
                'password.same'                     => 'Le :attribute non coincidono.',
                'datastoriaclinica.*.required_with' => 'Il campo :attribute è richiesto quando il campo :values è presente.',
                'storiaclinica.*.required_with' => 'Il campo :attribute è richiesto quando il campo :values è presente.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}