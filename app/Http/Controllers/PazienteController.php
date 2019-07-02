<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use MedicAppServer\Allergia;
use MedicAppServer\AllergiePaziente;
use MedicAppServer\Diagnosi1;
use MedicAppServer\Diagnosi2;
use MedicAppServer\Diagnosi3;
use MedicAppServer\Diagnosi;
use MedicAppServer\Medicinale;
use MedicAppServer\MedicinaliPaziente;
use MedicAppServer\Medico;
use MedicAppServer\Paziente;
use MedicAppServer\RecapitiPaziente;
use MedicAppServer\StoriaClinica;
use MedicAppServer\Protocollo;
use MedicAppServer\PazienteProtocollo;
use MedicAppServer\PazienteDiagnosi;
use MedicAppServer\Reminder;
use MedicAppServer\PazienteReminder;
use MedicAppServer\Intervento;
use MedicAppServer\Foto;
use MedicAppServer\Radiografia;
use Validator;

class PazienteController extends Controller {

    public function index() {
        $pazienti = Paziente::with('recapitiPaziente')->with('diagnosi1')->with('diagnosi2')->get();
        return view('pazienti.listapazienti')->with('pazienti', $pazienti);
    }

    public function create() {
        $diagnosi   = Diagnosi::distinct()->get(['categoria']);
        $allergie   = Allergia::all();
        $medicinali = Medicinale::all();
        $protocolli = Protocollo::all();
        $reminder         = Reminder::all();

        $diagnosiSpec   = Diagnosi::all();

        return view('pazienti.aggiungi.nuovopaziente')->with('diagnosi', $diagnosi)->with('allergie', $allergie)->with('medicinali', $medicinali)->with('protocolli', $protocolli)->with('reminder', $reminder)->with('diagnosiSpec', $diagnosiSpec);
    }

    public function store(Request $request) {

    // print_r($request->all());
    // return;

        
        if (\strpos($request['password'], " ") !== false) {
            return redirect()->back()->withErrors(["La password non può contenere spazi."])->withInput();
        }

        $datestoriecliniche = Input::get('datastoriaclinica');
        $storiecliniche     = Input::get('storiaclinica');
        $scdiagnosi1        = Input::get('scdiagnosi1');
        $scdiagnosi2        = Input::get('scdiagnosi2');

        $dateinterventi      = Input::get('dataintervento');
        $interventi          = Input::get('intervento');
        $intdiagnosi1        = Input::get('intdiagnosi1');
        $intdiagnosi2        = Input::get('intdiagnosi2');
        $interventi          = Input::get('intervento');


        $allergie           = Input::get('allergie');
        $medicinali         = Input::get('medicinali');
        $reminder           = Input::get('reminder');
        $datareminder       = Input::get('datareminder');
        $diagnosi           = Input::get('diagnosi');

        
        $foto                = $request['foto'];
        $rx                  = $request['radiografie'];




        $validator = $this->getValidatore($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = new Paziente([
            'nome'          => $request['nome'],
            'cognome'       => $request['cognome'],
            'sesso'         => $request['sesso'],
            'datadinascita' => $request['datadinascita'],
            'email'         => $request['email'],
           // 'password'      => Hash::make($request['password']),
           'password'      => $request['password'],
           'attivo'      => false,
           'tokenfirebase'      => '',

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

        $stories = [];
        if (isset($storiecliniche)) {
            $i = 0;
            foreach ($storiecliniche as $sc) {
                if (!isset($scdiagnosi1[$i]))
                $scdiagnosi1[$i] = '';

                if (!isset($scdiagnosi2[$i]))
                    $scdiagnosi2[$i] = '';
                

                $stories[] = new StoriaClinica([
                    'data'          => $datestoriecliniche[$i],
                    'storiaclinica' => $storiecliniche[$i],
                    'diagnosi1'     => $scdiagnosi1[$i],
                    'diagnosi2'     => $scdiagnosi2[$i],
                ]);

                $i++;
            }
        }

        $interventis = [];
        if (isset($interventi)) {
            $i = 0;
            foreach ($interventi as $int) {
                if (!isset($intdiagnosi1[$i]))
                $intdiagnosi1[$i] = '';

                if (!isset($intdiagnosi2[$i]))
                    $intdiagnosi2[$i] = '';
                

                $interventis[] = new Intervento([
                    'data'          => $dateinterventi[$i],
                    'intervento'    => $interventi[$i],
                    'diagnosi1'     => $intdiagnosi1[$i],
                    'diagnosi2'     => $intdiagnosi2[$i],
                ]);

                $i++;
            }
        }


        $allergies = [];
        if (isset($allergie)) {
            foreach ($allergie as $al) {
                $allergies[] = new AllergiePaziente([
                    'allergia' => $al,
                ]);
            }
        }

        $medicinalis = [];

        if (isset($medicinali)) {
            foreach ($medicinali as $med) {
                $medicinalis[] = new MedicinaliPaziente([
                    'medicinale_id' => $med[0],
                ]);
            }
        }



        // $storiaClinica = new StoriaClinica([
        //     'data'          => $request['datastoriaclinica'],
        //     'storiaclinica' => $request['storiaclinica'],
        //     'diagnosi1'     => $request['scdiagnosi1'],
        //     'diagnosi2'     => $request['scdiagnosi2'],
        // ]);

        $diagnosi1 = new Diagnosi1([
            'diagnosi' => $request['diagnosi1'],
        ]);

        $diagnosi2 = new Diagnosi2([
            'diagnosi' => $request['diagnosi2'],
        ]);

      /*  $diagnosi3 = new Diagnosi3([
            'diagnosi' => $request['diagnosi3'],
        ]);*/

        $paziente->save();

                
        $diagnosis = [];

        if (isset($diagnosi)) {
            foreach ($diagnosi as $diag) {
                $diagnosis[] = new PazienteDiagnosi([
                    'paziente_id' => $paziente->id,
                    'diagnosi_id' => $diag,
                ]);

                
            }
        }

        
        $reminderz = [];
        if (isset($reminder)) {
            $i = 0;
            foreach ($reminder as $sc) {
                if (!isset($datareminder[$i]))
                $datareminder[$i] = '';

                
                

                $reminderz [] = new PazienteReminder([
                    
                    'paziente_id'     => $paziente->id,
                    'reminder_id'     => $sc,
                    'data'          =>  $datareminder[$i],

                ]);

                $i++;
            }
        }

        $fotos = [];
        if(isset($foto)){
        foreach ($foto as $ft){
            $fotos[] = new Foto([
                'foto' => base64_encode(file_get_contents($ft))
            ]); 
        }
    }

        $rxs = [];
        if(isset($rx)){
        foreach ($rx as $r){
            $rxs[] = new Radiografia([
                'radiografia' => base64_encode(file_get_contents($r))
            ]); 
        }
    }

        $paziente->recapitiPaziente()->save($recapitiPaziente);

        if ($medico->nome || $medico->cognome || $medico->contatto || $medico->recapito) {
            $paziente->medico()->save($medico);
        }

        foreach ($stories as $s) {
            $paziente->storiaClinica()->save($s);
        }    
        
        foreach ($interventis as $i) {
            $paziente->intervento()->save($i);
        }

        foreach ($allergies as $a) {
            $paziente->allergiePaziente()->save($a);
        }

        foreach ($medicinalis as $m) {
            $paziente->medicinaliPaziente()->save($m);
        }

        foreach ($diagnosis as $d) {
            $d->save();
        }

        foreach ($reminderz as $r) {
            $r->save();
        }

        // if ($storiaClinica->data || $storiaClinica->storiaclinica) {
        //     $paziente->storiaClinica()->save($storiaClinica);
        // }

        if ($diagnosi1->diagnosi) {
            $paziente->diagnosi1()->save($diagnosi1);
        }

        if ($diagnosi2->diagnosi) {
            $paziente->diagnosi2()->save($diagnosi2);
        }

        foreach ($fotos as $f) {
            $paziente->foto()->save($f);
        }

        foreach ($rxs as $r) {
            $paziente->radiografia()->save($r);
        }
       /* if ($diagnosi3->diagnosi) {
            $paziente->diagnosi3()->save($diagnosi3);
        }*/

        if (isset($request['protocollo'])) 
            PazienteProtocollo::create(['paziente_id' => $paziente->id, 'protocollo_id' => $request['protocollo']]);
        

        return redirect('/pazienti');
    }

    public function createClinicStory(Request $request) {

        $validator = $this->getValidatoreForStoriaClinica($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = Paziente::with('storiaClinica')->find($request['idpaz']);

        $storiaClinica = new StoriaClinica([
            'data'          => $request['datastoriaclinicam'],
            'storiaclinica' => $request['storiaclinicam'],
            'diagnosi1'     => $request['scdiagnosi1m'],
            'diagnosi2'     => $request['scdiagnosi2m'],
        ]);

        $paziente->storiaClinica()->save($storiaClinica);

        return redirect()->back();
    }

    public function createAllergy(Request $request) {

        $validator = $this->getValidatoreForAllergy($request);

        if ($validator->fails()) {
            // header('HTTP/1.1 500');
            return ('Hai già inserito questa allergia');
        }

        $paziente = Paziente::with('allergiePaziente')->find($request['idpaz']);

        $allergia = new AllergiePaziente([
            'allergia' => $request['allergia'],
        ]);
        $paziente->allergiePaziente()->save($allergia);

        return 'success';
    }

    public function edit(Request $request) {

        $paziente         = Paziente::find($request['id']);
        $diagnosiCat   = Diagnosi::distinct()->get(['categoria']);
        $diagnosiSpec   = Diagnosi::all();
        $diagnosiPaziente = PazienteDiagnosi::where('paziente_id', $request['id'])->get();
        $pazienteReminders = PazienteReminder::where('paziente_id', $request['id'])->get();
        
        $allergie         = Allergia::all();
        $reminder         = Reminder::all();
        $medicinali       = Medicinale::all();
        $protocolli = Protocollo::all();
        $pazienteProto = PazienteProtocollo::where('paziente_id', $request['id'])->get();
        $pazienteProtocollo = '';


        $pazienteDiagnosi = [];
        foreach($diagnosiPaziente as $dp){
            $pazienteDiagnosi[] = Diagnosi::find($dp->diagnosi_id);
        }

        $pazienteReminder = [];
        foreach($pazienteReminders as $pr){
            $pazienteReminder[] = Reminder::find($pr->reminder_id);
        }
        
       /* foreach($pazienteDiagnosi as $dp){
            print_r($dp->categoria . " - " .$dp->diagnosi ); 
        }

        return;*/


        if(count($pazienteProto)<=0)
            $pazienteProt = [];
        else  $pazienteProt = $pazienteProto[0];

           
        // $pazienteProtocollo = Protocollo::find($pazienteProto[0]->protocollo_id);
      
        // print_r($paziente->recapitiPaziente);
        // return;


      
        return view('pazienti.modifica.modificapaziente')->with('paziente', $paziente)->with('diagnosiCat', $diagnosiCat)->with('allergie', $allergie)->with('medicinali', $medicinali)->with('protocolli', $protocolli)->with('pazienteProtocollo', $pazienteProt)->with('pazienteDiagnosi', $pazienteDiagnosi)->with('diagnosiSpec', $diagnosiSpec)->with('reminder', $reminder)->with('pazienteReminder', $pazienteReminder)->with('pazRemData', $pazienteReminders);
    }

    public function update(Request $request) {

    print_r($request->all());
    // return;
                if (\strpos($request['password'], " ") !== false) {
            return redirect()->back()->withErrors(["La password non può contenere spazi."])->withInput();
        }

        $datestoriecliniche = Input::get('datastoriaclinica');
        $storiecliniche     = Input::get('storiaclinica');
        $scdiagnosi1        = Input::get('scdiagnosi1');
        $scdiagnosi2        = Input::get('scdiagnosi2');
        $allergie           = Input::get('allergie');
        $medicinali         = Input::get('medicinali');
        $reminder           = Input::get('reminder');
        $datareminder       = Input::get('datareminder');
        $diagnosi           = Input::get('diagnosi');
        $dateinterventi      = Input::get('dataintervento');
        $interventi          = Input::get('intervento');
        $intdiagnosi1        = Input::get('intdiagnosi1');
        $intdiagnosi2        = Input::get('intdiagnosi2');
        $interventi          = Input::get('intervento');

        $foto                = $request['foto'];
        $fotoz                = $request['fotoz'];
        $rx                  = $request['radiografie'];
        $rxz                  = $request['radiografiez'];



        $validator = $this->getValidatoreForUpdate($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paziente = Paziente::with('recapitiPaziente')->find($request['idpaz']);

        $paziente->nome                        = $request['nome'];
        $paziente->cognome                     = $request['cognome'];
        $paziente->sesso                       = $request['sesso'];
        $paziente->email                       = $request['email'];
        $paziente->password                    = $request['password'];

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


        /************************************************************/

        $medico = new Medico([
            'nome'     => $request['medicocurante'],
            'cognome'  => $request['medicocurante'],
            'contatto' => $request['contattomedicocurante'],
            'recapito' => $request['recapitomedicocurante'],
        ]);

        $stories = [];

        if (isset($storiecliniche)) {
            $i = 0;
            foreach ($storiecliniche as $sc) {
                if (!isset($scdiagnosi1[$i]))
                $scdiagnosi1[$i] = '';

                if (!isset($scdiagnosi2[$i])) 
                    $scdiagnosi2[$i] = '';
                

                $stories[] = new StoriaClinica([
                    'data'          => $datestoriecliniche[$i],
                    'storiaclinica' => $storiecliniche[$i],
                    'diagnosi1'     => $scdiagnosi1[$i],
                    'diagnosi2'     => $scdiagnosi2[$i],
                ]);

                $i++;
            }
        }

        $interventis = [];
        if (isset($interventi)) {
            $i = 0;
            foreach ($interventi as $int) {
                if (!isset($intdiagnosi1[$i]))
                $intdiagnosi1[$i] = '';

                if (!isset($intdiagnosi2[$i]))
                    $intdiagnosi2[$i] = '';
                

                $interventis[] = new Intervento([
                    'data'          => $dateinterventi[$i],
                    'intervento'    => $interventi[$i],
                    'diagnosi1'     => $intdiagnosi1[$i],
                    'diagnosi2'     => $intdiagnosi2[$i],
                ]);

                $i++;
            }
        }

        $allergies = [];
        if (isset($allergie)) {
            foreach ($allergie as $al) {
                $allergies[] = new AllergiePaziente([
                    'allergia' => $al,
                ]);
            }
        }

        $medicinalis = [];

        if (isset($medicinali)) {
            foreach ($medicinali as $med) {
                $medicinalis[] = new MedicinaliPaziente([
                    'medicinale_id' => $med[0],
                ]);
            }
        }

        $diagnosi1 = new Diagnosi1([
            'diagnosi' => $request['diagnosi1'],
        ]);

        $diagnosi2 = new Diagnosi2([
            'diagnosi' => $request['diagnosi2'],
        ]);

        $diagnosi3 = new Diagnosi3([
            'diagnosi' => $request['diagnosi3'],
        ]);

        if ($medico->nome || $medico->cognome || $medico->contatto || $medico->recapito) {
            $paziente->medico()->save($medico);
        }

        $diagnosis = [];

        if (isset($diagnosi)) {
            foreach ($diagnosi as $diag) {
                $diagnosis[] = new PazienteDiagnosi([
                    'paziente_id' => $paziente->id,
                    'diagnosi_id' => $diag,
                ]);
            }
        }

        $reminderz = [];
        if (isset($reminder)) {
            $i = 0;
            foreach ($reminder as $sc) {
                if (!isset($datareminder[$i]))
                $datareminder[$i] = '';

                
                

                $reminderz [] = new PazienteReminder([
                    
                    'paziente_id'     => $paziente->id,
                    'reminder_id'     => $sc,
                    'data'          =>  $datareminder[$i],

                ]);

                $i++;
            }
        }


        $fotos = [];
        if(isset($foto)){
        foreach ($foto as $ft){
            $fotos[] = new Foto([
                'foto' => base64_encode(file_get_contents($ft))
            ]); 
        }
    }

    if(isset($fotoz)){
        foreach ($fotoz as $ft){
            $fotos[] = new Foto([
                'foto' => $ft
            ]); 

        }
    }

    

        $rxs = [];
        if(isset($rx)){
        foreach ($rx as $r){
            $rxs[] = new Radiografia([
                'radiografia' => base64_encode(file_get_contents($r))
            ]); 
        }
    }

    if(isset($rxz)){
        foreach ($rxz as $r){
            $rxs[] = new Radiografia([
                'radiografia' => $r
            ]); 
        }
    }
        
        

        StoriaClinica::where('paziente_id', $paziente->id)->delete();
        AllergiePaziente::where('paziente_id', $paziente->id)->delete();
        MedicinaliPaziente::where('paziente_id', $paziente->id)->delete();
        Diagnosi1::where('paziente_id', $paziente->id)->delete();
        Diagnosi2::where('paziente_id', $paziente->id)->delete();
        Diagnosi3::where('paziente_id', $paziente->id)->delete();
        PazienteReminder::where('paziente_id', $paziente->id)->delete();
        Intervento::where('paziente_id', $paziente->id)->delete();
        Foto::where('paziente_id', $paziente->id)->delete();
        Radiografia::where('paziente_id', $paziente->id)->delete();

        foreach ($stories as $s) {
            $paziente->storiaClinica()->save($s);
        }

        foreach ($interventis as $i) {
            $paziente->intervento()->save($i);
        }

        foreach ($allergies as $a) {
            $paziente->allergiePaziente()->save($a);
        }

        foreach ($medicinalis as $m) {
            $paziente->medicinaliPaziente()->save($m);
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

           foreach ($reminderz as $r) {
            $r->save();
        }

        foreach ($diagnosis as $d) {
            $d->save();
        }   
        
        foreach ($fotos as $f) {
            $paziente->foto()->save($f);
        }

        foreach ($rxs as $r) {
            $paziente->radiografia()->save($r);
        }


       // return redirect('/pazienti');

        /*************************************************************/

        // return redirect('/pazienti');

       

        if(isset($request['protocollo'])){
        PazienteProtocollo::where('paziente_id', $paziente->id)->delete();
        PazienteProtocollo::create(['paziente_id' => $paziente->id, 'protocollo_id' => $request['protocollo']]);
        } else {
            PazienteProtocollo::where('paziente_id', $paziente->id)->delete();

        }

        return redirect()->back();
    }

    public function delete(Request $request) {

        Paziente::destroy($request["idpaziente"]);
        PazienteProtocollo::where('paziente_id', $request["idpaziente"])->delete();
        PazienteDiagnosi::where('paziente_id',$request["idpaziente"])->delete();


        return redirect('/pazienti');
    }


    public function enableApp(Request $request) {
        $paziente = Paziente::find($request['idpaz']);

        $paziente->attivo = true;
        $paziente->save();

        return $request['idpaz'];
    }

    public function disableApp(Request $request) {
        $paziente = Paziente::find($request['idpaz']);

        $paziente->attivo = false;
        $paziente->save();
        return $request['idpaz'];

    }


    public function notifica(Request $request){

        $paziente = Paziente::find($request['idpaz']);

        define( 'API_ACCESS_KEY', 'AAAAUHkAQ8I:APA91bGE2yTBj-O_4Hln2RXHDFIinesnWvlFzYz8UJofh9rGkK2fnhO2RjTamUuobsKYnUw0JDBrGPgKvHnY1PyXd03dXJiwgOI3PLsBaiEaqZBoGHIsTI4CgNcT3aLX_JnVrzZq1Se3' );

        $token = $paziente->tokenfirebase;

        $payload = array(

            'to'=>$token,
            'priority'=>'high',
            'mutable_content'=>true,
            'notification'=>array(
                        'title'=> 'Ricorda',
                        'body'=> $request['messaggio']
                            ),
            // 'data'=>array(
            //     'a' => 'b',
            //     'a' => 'b'
            // )
          );

      $headers = array(
        'Authorization:key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
      );

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $payload ) );
      $result = curl_exec($ch );
      curl_close( $ch );
      var_dump($result);exit;

                
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
                'email'         => 'required|unique:paziente,email',
                'centrovisita'  => 'required|max:64',
                'tipodocumento' => 'required',
                'iddocumento'   => 'required|unique:recapiti_paziente,iddocumento',
                'password'      => 'required|same:repassword|min:4',
                // 'datastoriaclinica.*' => 'required_with:storiaclinica',
                // 'storiaclinica.*'     => 'required_with:datastoriaclinica',
            ),
            'messaggi' => array(
                'required'            => 'Il campo :attribute è richiesto.',
                'max'                 => 'Il campo :attribute non deve contenere più di :max caratteri.',
                'numeric'             => 'Il campo :attribute deve essere un numero valido.',
                'email'               => 'Il campo :attribute deve essere una :attribute valida.',
                'email.unique'        => 'Questa :attribute è già stata usata.',
                'iddocumento.unique'  => 'Questo :attribute è già stato usato.',
                'tel1.unique'         => 'Questo :attribute è già stato usato.',
                'tel2.unique'         => 'Questo :attribute è già stato usato.',
                'password.same'       => 'Le :attribute non coincidono.',
                // 'datastoriaclinica.*.required_with' => 'Il campo :attribute è richiesto quando il campo :values è presente.',
                 // 'storiaclinica.*.required_with'     => 'Il campo :attribute è richiesto quando il campo :values è presente.',
                 'diagnosi1.different' => 'Il campo :attribute e il campo :other devono essere differenti.',
            ),
        );
        try {
            return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);

        } catch (\Exception $e) {
            print_r($e);
            return;
        }
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
                'storiaclinica.*.required_with'     => 'Il campo :attribute è richiesto quando il campo :values è presente.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

    public function getValidatoreForStoriaClinica($request) {

        $validazione = array(
            'regole'   => array(
                'datastoriaclinicam' => 'required',
                'storiaclinicam'     => 'required',
            ),
            'messaggi' => array(

                'datastoriaclinicam.required' => 'Il campo data storia clinica è richiesto.',
                'storiaclinicam.required'     => 'Il campo storia clinica è richiesto.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

    public function getValidatoreForAllergy($request) {

        $validazione = array(
            'regole'   => array(
                'allergia' => 'unique:allergie_paziente,allergia',
            ),
            'messaggi' => array(

                'unique' => 'Hai già inserito questa allergia.',
            ),
        );

        return Validator::make($request->all(), $validazione['regole'], $validazione['messaggi']);
    }

}
