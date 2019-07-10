<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use MedicAppServer\Protocollo;
use MedicAppServer\Esercizio;
use MedicAppServer\PazienteProtocollo;
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
        $eserciziTempoImg = Input::get('esercizitempoimg');

        $eserciziRipetizioni = Input::get('eserciziripetizioni');
        $eserciziRipetizioniImg = Input::get('eserciziripetizioniimg');

        $eserciziInterattivi = Input::get('eserciziinterattivi');
        $eserciziInterattiviImg = Input::get('eserciziinterattiviimg');


        $protocollo = new Protocollo([
            'nome'          => $request['protocollo'],
            
        ]);

        $protocollo->save();

        $esercizi = [];

    
        
        if (isset($eserciziTempo)) {
            $i = 0;
            foreach ($eserciziTempo as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'tempo',
                     'immagine' => $eserciziTempoImg[$i]
                    ]);
                    $i++;
            }
        }

        
        if (isset($eserciziRipetizioni)) {
            $i = 0;
            foreach ($eserciziRipetizioni as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'ripetizioni',
                     'immagine' => $eserciziRipetizioniImg[$i]
                    ]);
                    $i++;
            }
        }
        if (isset($eserciziInterattivi)) {
            $i = 0;
            foreach ($eserciziInterattivi as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'interattivi',
                     'immagine' => $eserciziInterattiviImg[$i]
                    ]);
                    $i++;
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
        $eserciziTempoImg = Input::get('esercizitempoeditimg');

        $eserciziRipetizioni = Input::get('eserciziripetizioniedit');
        $eserciziRipetizioniImg = Input::get('eserciziripetizionieditimg');

        $eserciziInterattivi = Input::get('eserciziinterattiviedit');
        $eserciziInterattiviImg = Input::get('eserciziinterattivieditimg');


        $esercizi = [];

    
        
        if (isset($eserciziTempo)) {
            $i = 0;
            foreach ($eserciziTempo as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'tempo',
                     'immagine' => $eserciziTempoImg[$i]
                    ]);
                    $i++;
            }
        }

        
        if (isset($eserciziRipetizioni)) {
            $i = 0;
            foreach ($eserciziRipetizioni as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'ripetizioni',
                     'immagine' => $eserciziRipetizioniImg[$i]
                    ]);
                    $i++;
            }
        }
        if (isset($eserciziInterattivi)) {
            $i = 0;
            foreach ($eserciziInterattivi as $es) {
                $esercizi[] = new Esercizio([
                     'nome' => $es,
                     'tipoesercizio' => 'interattivi',
                     'immagine' => $eserciziInterattiviImg[$i]
                    ]);
                    $i++;
            }
        }
        
  
       

        $protocollo->nome = $request->protocollo;

        $protocollo->save();

        $protocollo->esercizi()->saveMany($esercizi);

        return redirect('/protocolli');
    }

    public function remove(Request $request) {


        PazienteProtocollo::where('protocollo_id', $request->idprotoz)->delete();
        Protocollo::destroy($request->idprotoz);
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
