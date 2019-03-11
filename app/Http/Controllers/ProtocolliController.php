<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use MedicAppServer\Protocollo;
use MedicAppServer\Esercizio;
use Validator;


class ProtocolliController extends Controller
{
    public function index() {
        $protocolli = Protocollo::with('esercizi')->get();
        //$protocolli = [];
        return view('protocolli.protocolli')->with('protocolli', $protocolli);
    }

    public function store(Request $request) {

        /*print_r($request->all());
        return;*/

      $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        $eserciziTempo = Input::get('esercizitempo');
        $eserciziRipetizioni = Input::get('eserciziripetizioni');
        $eserciziInterattivi = Input::get('eserciziinterattivi');


        $protocollo = new Protocollo([
            'nome'          => $request['protocollo'],
            
        ]);

        $protocollo->save();

        $esercizi = [];

    
        
        if (isset($eserciziTempo)) {
            foreach ($eserciziTempo as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'tempo'
                    ]);
            }
        }

        
        if (isset($eserciziRipetizioni)) {
            foreach ($eserciziRipetizioni as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'ripetizioni'
                    ]);
            }
        }
        if (isset($eserciziInterattivi)) {
            foreach ($eserciziInterattivi as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'interattivi'
                    ]);
            }
        }
        
  
       

        $protocollo->esercizi()->saveMany($esercizi);

        return redirect('/protocolli');
    }

    public function update(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        Esercizio::where('protocollo_id', $request->idprot)->delete();
        $protocollo = Protocollo::find($request->idprot);

        $eserciziTempo = Input::get('esercizitempoedit');
        $eserciziRipetizioni = Input::get('eserciziripetizioniedit');
        $eserciziInterattivi = Input::get('eserciziinterattiviedit');


        $esercizi = [];

    
        
        if (isset($eserciziTempo)) {
            foreach ($eserciziTempo as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'tempo'
                    ]);
            }
        }

        
        if (isset($eserciziRipetizioni)) {
            foreach ($eserciziRipetizioni as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'ripetizioni'
                    ]);
            }
        }
        if (isset($eserciziInterattivi)) {
            foreach ($eserciziInterattivi as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'interattivi'
                    ]);
            }
        }
        
  
       

        $protocollo->nome = $request->protocollo;

        $protocollo->save();

        $protocollo->esercizi()->saveMany($esercizi);

        return redirect('/protocolli');
    }

    public function remove(Request $request) {
    Protocollo::destroy($request->idprot);
        return redirect('/protocolli');
    }
    
    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'protocollo' => 'required|max:32|unique:protocolli,nome,'.$request->idprot,
            ),
            'messaggi' => array(
                'required' => 'Il campo :attribute è richiesto.',
                'unique'   => 'Esiste gia una :attribute con questo nome',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}
