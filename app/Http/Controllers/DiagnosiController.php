<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Diagnosi;
use MedicAppServer\PazienteDiagnosi;
use Validator;

class DiagnosiController extends Controller {
    public function index() {
        $diagnosi = Diagnosi::all();
        return view('diagnosi.diagnosi')->with('diagnosi', $diagnosi);
    }

    public function store(Request $request) {


        $validator = $this->getValidatore($request);

 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $diagnosi = new Diagnosi([
            'diagnosi' => $request['diagnosi'],
            'categoria' => $request['categoria'],
        ]);

        $diagnosi->save();

        return redirect('/diagnosi');
    }

    public function update(Request $request) {


        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $diagnosi = Diagnosi::find($request['id']);

        $diagnosi->diagnosi = $request['diagnosi'];
        $diagnosi->categoria = $request['categoria'];
        $diagnosi->save();

        return redirect('/diagnosi');
    }

    public function delete(Request $request) {


        Diagnosi::destroy($request["iddiagnosi"]);
        PazienteDiagnosi::where('diagnosi_id', $request["iddiagnosi"])->delete();
        return redirect('/diagnosi');
    }

    public function getDiagnosiByCategoria(Request $request, $categoriaDiagnosi){

        $diagnosi = Diagnosi::where('categoria', $categoriaDiagnosi)->get();
        return $diagnosi;
  
}

    public function getValidatore($request) {


        $validazione = array(
            'regole'   => array(
                'diagnosi' => 'required|max:32|unique:diagnosi,diagnosi,'.$request->diagnosi
            ),
            'messaggi' => array(
                'required' => 'Il campo :attribute è richiesto.',
                'unique'   => 'Esiste gia una :attribute con questo nome',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}
