<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Medicinale;
use Validator;

class MedicinaleController extends Controller {
    public function index() {
        $medicinali = Medicinale::all();
        return view('medicinali.medicinali')->with('medicinali', $medicinali);
    }

    public function store(Request $request) {

        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $medicinale = new Medicinale([
            'nome'           => $request['medicinale'],
            'dosaggio'       => $request['dosaggio'] . ' ' . $request['unitadosaggio'],
            'posologia'      => $request['posologia'] . ' ' . $request['volte'],
            'durata_terapia' => $request['durata'] . ' ' . $request['giorni'],
        ]);

        $med = Medicinale::
            where('nome', $medicinale->nome)
            ->where('dosaggio', $medicinale->dosaggio)
            ->where('posologia', $medicinale->posologia)
            ->where('durata_terapia', $medicinale->durata_terapia)->get();

        if (count($med) > 0) {
            return redirect()->back()->withErrors("E' gia presente un medicinale con le stesse caratteristiche")->withInput();
        }

        $medicinale->save();
        return redirect('/medicinali');
    }

    public function update(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $medicinale = Medicinale::find($request['id']);

        $medicinale->nome           = $request['medicinale'];
        $medicinale->dosaggio       = $request['dosaggio'] . ' ' . $request['unitadosaggio'];
        $medicinale->posologia      = $request['posologia'] . ' ' . $request['volte'];
        $medicinale->durata_terapia = $request['durata'] . ' ' . $request['giorni'];

        $med = Medicinale::
            where('nome', $medicinale->nome)
            ->where('dosaggio', $medicinale->dosaggio)
            ->where('posologia', $medicinale->posologia)
            ->where('durata_terapia', $medicinale->durata_terapia)->get();

        if (count($med) > 0) {
            return redirect()->back()->withErrors("E' gia presente un medicinale con le stesse caratteristiche")->withInput();
        }

        $medicinale->save();

        return redirect('/medicinali');
    }

    public function delete(Request $request) {

        Medicinale::destroy($request["idmedicinale"]);
        return redirect('/medicinali');
    }

    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'medicinale', 'dosaggio', 'posologia', 'durata' => 'required|max:32',
                'dosaggio', 'posologia', 'duarata' => 'numeric',

            ),
            'messaggi' => array(
                'required' => 'Il campo :attribute è richiesto.',
                'unique'   => 'Esiste gia una :attribute con questo nome',
                'numeric'  => 'Inserisci un numero nel campo :attribute.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}
