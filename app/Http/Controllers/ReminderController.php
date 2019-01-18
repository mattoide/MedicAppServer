<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Reminder;
use Validator;

class ReminderController extends Controller
{
    public function index() {
        $reminders = Reminder::all();
        return view('reminder.reminders')->with('reminders', $reminders);
    }

    public function store(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reminder = new Reminder([
            'nomereminder' => $request['nomereminder'],
            'testoreminder' => $request['testoreminder'],
            'dopomesi' => $request['dopomesi'],
        ]);

        $reminder->save();

        return redirect('/reminders');
    }

    public function update(Request $request) {
        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $reminder = Reminder::find($request['id']);

        $reminder->nomereminder = $request['nomereminder'];
        $reminder->testoreminder = $request['testoreminder'];
        $reminder->dopomesi = $request['dopomesi'];
        $reminder->save();

        return redirect('/reminders');
    }

    public function delete(Request $request) {

        Reminder::destroy($request["idreminder"]);
        return redirect('/reminders');
    }

    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'nomereminder' => 'required|max:32|unique:reminder',
            ),
            'messaggi' => array(
                'required' => 'Il campo :attribute è richiesto.',
                'unique'   => 'Esiste gia una :attribute con questo nome',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }
}
