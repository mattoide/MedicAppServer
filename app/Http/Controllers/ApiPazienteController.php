<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use MedicAppServer\PazienteProtocollo;
use MedicAppServer\Protocollo;


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

            $protocollo = Protocollo::find($protocol->protocollo_id)->with('esercizi')->first();
$user->protocollo = $protocollo;

            return Response::json($user, 200);


        }
        else
        return Response::json("Email o password errati.", 404);

        //        return Response::json(['messaggio' => "Dispositivo non registrato"], 404);



        



        
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
