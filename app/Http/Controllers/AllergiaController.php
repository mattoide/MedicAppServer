<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Allergia;
use Validator;

class AllergiaController extends Controller
{
    public function index() {
        $allergie = Allergia::all();
        return view('allergie.allergie')->with('allergie', $allergie);
    }

    public function store(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $allergia = new Allergia([
            'allergia' => $request['allergia'],
        ]);

        $allergia->save();

        return redirect('/allergie');
    }

    public function update(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $allergia = Allergia::find($request['id']);

        $allergia->allergia = $request['allergia'];
        $allergia->save();

        return redirect('/allergie');
    }

    public function delete(Request $request) {

        Allergia::destroy($request["idallergia"]);
        return redirect('/allergie');
    }

    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'allergia' => 'required|max:32|unique:allergia',
            ),
            'messaggi' => array(
                'required' => 'Il campo :attribute è richiesto.',
                'unique'   => 'Esiste gia una :attribute con questo nome',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }
}
