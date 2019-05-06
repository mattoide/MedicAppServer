<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use MedicAppServer\PazienteProtocollo;
use MedicAppServer\Protocollo;
use MedicAppServer\Esercizio;


use Response;
use Validator;


class ApiPazienteController extends Controller
{
    public function login(Request $request){

        $validatore = $this->getValidatore($request);
        if ($validatore->fails())
        return Response::json($validatore->errors(), 500);

        $user = Paziente::where('email', $request->email)->where('password', $request->password)->with('recapitipaziente', 'allergiepaziente', 'medicinalipaziente')->first();
        
        
        if($user){

            $protocol = PazienteProtocollo::where('paziente_id', $user->id)->first();

            $protocoll = Protocollo::find($protocol->protocollo_id)->with('esercizi')->first();
            $protocollo = Esercizio::where('protocollo_id', $protocoll->id)->get();

            $user->esercizi = $protocollo;

            return Response::json($user, 200);


        }
        else
        return Response::json("Email o password errati.", 404);

        //        return Response::json(['messaggio' => "Dispositivo non registrato"], 404);



        



        
    }


    public function storeFirebaseToken(Request $request){

        $user = Paziente::where('email', $request->email)->where('password', $request->password)->first();

        $user->tokenfirebase = $request->firebasetoken;

        $user->save();
        return Response::json('Ok', 200);

    }

    
    public function getValidatore($request) {

        $validazione = array(
            'regole'   => array(
                'email' => 'required',
                'password' => 'required',
            ),
            'messaggi' => array(

                'required' => 'Il campo :attribute è richiesto.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }
}
