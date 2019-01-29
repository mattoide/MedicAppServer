@extends('layouts.standard') 
@section('content')
    @include('pazienti.modifica.modalaggiungistoriaclincia')


<div class="container-fluid" style="background-color: white">
    @include('layouts.errors')

    <form method="POST" action="/modificapaziente">
        {{ csrf_field() }}
        <h6 data-toggle="collapse" href="#collapseAnagraficaEdit" aria-expanded="false" aria-controls="collapseAnagraficaEdit">ANAGRAFICA +</h6>
        
        <hr>

        <div class="collapse show" id="collapseAnagraficaEdit">


            <div class="row formrow">
                <div class="col">
                    <input id="we" type="text" class="form-control" placeholder="Nome" name="nome" value="{{$paziente->nome}}" maxlength="32"
                        required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Cognome" name="cognome" value="{{$paziente->cognome}}" maxlength="32"
                        required>
                </div>

                <div class="col-1">
                    {{--<input type="text" class="form-control" placeholder="M/F" name="sesso" value="{{old('sesso')}}" maxlength="1"
                        required>--}}
                    <select class="form-control" id="sesso" name="sesso" value="{{$paziente->sesso}}"  required>
                            <option disabled selected value> -- M/F -- </option>
                            <option>F</option>
                            <option>M</option>
                        </select>
                </div>


                <div class="col">
                    <input type="date" class="form-control" placeholder="Data di nascita" name="datadinascita" value="{{$paziente->datadinascita}}"
                        onchange="calcolaEta(this.value)" required>
                </div>

                <div class="col-1">
                    <!-- <input id='eta' type="number" class="form-control" placeholder="Età" name="eta" value="{{old('eta')}}" min="0" disabled>-->
                    <p id='eta'>anni</p>

                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" value="{{$paziente->recapitiPaziente->indirizzo}}"
                        required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Città" name="citta" value="{{$paziente->recapitiPaziente->citta}}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Paese" name="paese" value="{{$paziente->recapitiPaziente->paese}}" required>
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="Zip" name="cap" value="{{$paziente->recapitiPaziente->cap}}" min="0"
                        required>
                </div>
            </div>


            <div class="row formrow">

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 1" name="tel1" value="{{$paziente->recapitiPaziente->tel1}}" maxlength="11"
                        required>
                </div>

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 2" name="tel2" value="{{$paziente->recapitiPaziente->tel2}}" maxlength="11">
                </div>
            </div>

            <div class="row formrow">
                <div class="col">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{$paziente->recapitiPaziente->email}}"
                        required>
                </div>
                <div class="col">
                    <input id='pass' type="password" class="form-control" placeholder="Password" name="password" onchange="verificaPass()" minlength="4"
                        maxlength="16" required value="{{$paziente->password}}">
                    <input id='passv' type="password" class="form-control" placeholder="Password" name="password" onchange="verificaPass()" minlength="4"
                        maxlength="16" required value="{{$paziente->password}}" hidden>
                </div>
                <div class="col">
                    <input id='repass' type="password" class="form-control" placeholder="Ripeti password" name="repassword" onchange="verificaPass()"
                        minlength="4" maxlength="16" required value="{{$paziente->password}}">
                    <input id='repassv' type="password" class="form-control" placeholder="Ripeti password" name="repassword" onchange="verificaPass()"
                        minlength="4" maxlength="16" required value="{{$paziente->password}}" hidden>
                </div>
            </div>

            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Centro visita" name="centrovisita" value="{{$paziente->recapitiPaziente->centrovisita}}"
                        required>
                </div>

                <div class="col">
                    <!--<input type="text" class="form-control" placeholder="Tipo documento" name="tipodocumento" value="{{old('tipodocumento')}}">-->
                    <select class="form-control" id="tipodocumento" name="tipodocumento" required>
                        <option disabled selected value> -- seleziona tipo di documento -- </option>
                        <option>Carta d' Identità</option>
                        <option>Patente</option>
                        <option>Codice Fiscale</option>
                    </select>
                </div>


                <div class="col">
                    <input type="text" class="form-control" placeholder="ID documento" name="iddocumento" value="{{$paziente->recapitiPaziente->iddocumento}}"
                        required>
                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Medico curante" name="medicocurante" value="@if($paziente->medico){{$paziente->medico->nome}}@endif">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Recapito medico curante" name="recapitomedicocurante" value="@if($paziente->medico){{$paziente->medico->recapito}}@endif">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Contatto medico curante" name="contattomedicocurante" value="@if($paziente->medico){{$paziente->medico->contatto}}@endif">
                </div>
            </div>
        </div>

        <h6 data-toggle="collapse" href="#collapseDiagnosiEdit" aria-expanded="false" aria-controls="collapseDiagnosiEdit">DIAGNOSI +</h6>
        <hr>

        <div class="collapse show" id="collapseDiagnosiEdit">


            <div class="container" style="margin-left: 3%!important;">

                <div class="row formrow">

                    <select class="form-control" id="diagnosi1" name="diagnosi1">
                            <option disabled selected> diagnosi 1 </option>
                            @foreach ($diagnosi as $a)
                            <option>{{$a->diagnosi}}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="row formrow">

                    <select class="form-control" id="diagnosi2" name="diagnosi2">
                                <option disabled selected value> diagnosi 2 </option>
                                @foreach ($diagnosi as $a)
                                <option>{{$a->diagnosi}}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="row formrow">

                    <select class="form-control" id="diagnosi3" name="diagnosi3">
                                    <option disabled selected> diagnosi 3 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select> {{-- <input type="text" class="form-control" placeholder="Diagnosi principale"
                        name="diagnosi1" value="@if($paziente->diagnosi1){{$paziente->diagnosi1->diagnosi}}@endif">
                    <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi2" value="@if($paziente->diagnosi2){{$paziente->diagnosi2->diagnosi}}@endif">
                    <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi3" value="@if($paziente->diagnosi3){{$paziente->diagnosi3->diagnosi}}@endif">                    --}}
                </div>
            </div>

        </div>
    @include('pazienti.modifica.tabsmodificapaziente')


        {{-- <button type="button" onclick="abilitaTutto()" class="btn btn-success">Modifica</button> --}}
        {{-- <button name="idpaz" id="idpaz" value="{{$paziente->id}}" type="submit" class="btn btn-warning" disabled>Salva modifiche</button> --}}
        <button name="idpaz" id="idpaz" value="{{$paziente->id}}" type="submit" class="btn btn-warning" >Salva modifiche</button>
        <button type="button" onclick="refresh()" class="btn btn-danger">Annulla modifiche</button>

    </form>
</div>

<script>
    $(document).ready(function () {

   // disabilitaTutto();
    calcolaEta('{{$paziente->datadinascita}}');

    $('#sesso').val('{{$paziente->sesso}}');

    let a = '{{$paziente->recapitiPaziente->tipodocumento}}';
    a = a.replace('&#039;','\'');
    $('#tipodocumento').val(a);

    
    @if ($paziente->diagnosi1)
        var dia1 ='{{$paziente->diagnosi1->diagnosi}}'
        $('#diagnosi1').val(dia1)
    @endif

    @if ($paziente->diagnosi2)
        var dia2 ='{{$paziente->diagnosi2->diagnosi}}'
        $('#diagnosi2').val(dia2)
    @endif

    @if ($paziente->diagnosi3)
        var dia3 ='{{$paziente->diagnosi3->diagnosi}}'
        $('#diagnosi3').val(dia3)
    @endif


@foreach($paziente->storiaClinica as $sc)
    @if ($sc->diagnosi1)
        var scdia1 ='{{$sc->diagnosi1}}'
        var scc1 =  '{{$sc->id}}'+'scdiagnosi1disbld';
        $('#'+scc1).val(scdia1)   
    @endif

    @if ($sc->diagnosi2)
        var scdia2 ='{{$sc->diagnosi2}}'
        var scc2 =  '{{$sc->id}}'+'scdiagnosi2disbld';
        $('#'+scc2).val(scdia2)   
    @endif


@endforeach

   

})

function refresh(){
    location.reload();

}

    function abilitaTutto(){

    var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {

            if(!inputs[i].id.includes('disbld'))
    inputs[i].removeAttribute('disabled');
}

var inputs = document.getElementsByTagName("select");
        for (var i = 0; i < inputs.length; i++) {
            if(!inputs[i].id.includes('disbld'))
            inputs[i].removeAttribute('disabled');
}

var inputs = document.getElementsByTagName("textarea");
        for (var i = 0; i < inputs.length; i++) {

            if(!inputs[i].id.includes('disbld'))
            inputs[i].removeAttribute('disabled');
}

$('#idpaz').removeAttr('disabled');

$('#pass').attr('disabled','disabled');
$('#repass').attr('disabled','disabled');
$('#nuovastoria').removeAttr('disabled');
$('#btnnuovaall').removeAttr('disabled');



}
    function disabilitaTutto(){

        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'datastoriaclinicam')
            inputs[i].setAttribute("disabled", "disabled");
}

var inputs = document.getElementsByTagName("select");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'scdiagnosi1m' && inputs[i].id != 'scdiagnosi2m')
            inputs[i].setAttribute("disabled", "disabled");
            else 
                inputs[i].removeAttribute("disabled");

}

var inputs = document.getElementsByTagName("textarea");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'storiaclinicam')
             inputs[i].setAttribute("disabled", "disabled");
}

let a = "{{$paziente->recapitiPaziente->tipodocumento}}";
let b = a.replace('&#039;', '\'')

$('#tipodocumento').val(b)
$('#sesso').val("{{$paziente->sesso}}")
$('#nuovastoria').attr('disabled', 'disabled');
$('#btnnuovaall').attr('disabled', 'disabled');
    }

</script>
@endsection