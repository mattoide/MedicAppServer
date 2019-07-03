@extends('layouts.standard') 
@section('content')


<div class="container-fluid" style="background-color: white">
        @include('layouts.errors')

    <form method="POST" action="/nuovopaziente" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div id="generalpopup">

        </div>
        <h6 class="collapseclick" data-toggle="collapse" href="#collapseAnagraficaAdd" aria-expanded="false" aria-controls="collapseAnagrafica">ANAGRAFICA +</h6>


            <hr >
          
        <div class="collapse show" id="collapseAnagraficaAdd">

        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" name="nome"  value="{{old('nome')}}" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Cognome" name="cognome" value="{{old('cognome')}}" maxlength="32" required>
            </div>

            <div class="col-1">
                {{--<input type="text" class="form-control" placeholder="M/F" name="sesso" value="{{old('sesso')}}" maxlength="1"
                    required>--}}
                <select class="form-control" id="sesso" name="sesso" required>
                            <option disabled selected value> -- M/F -- </option>
                            <option>F</option>
                            <option>M</option>
                        </select>
            </div>


            <div class="col">
                <input type="date"  class="form-control" placeholder="Data di nascita" name="datadinascita" value="{{old('datadinascita')}}"
                    onchange="calcolaEta(this.value)" required>
            </div>

            <div class="col-1">
                <!-- <input id='eta' type="number" class="form-control" placeholder="Età" name="eta" value="{{old('eta')}}" min="0" disabled>-->
                <p id='eta'>anni</p>

            </div>
        </div>


        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" value="{{old('indirizzo')}}" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Città" name="citta" value="{{old('citta')}}" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Paese" name="paese" value="{{old('paese')}}" maxlength="32" required>
            </div>

            <div class="col">
                <input type="number" class="form-control" placeholder="Zip" name="cap" value="{{old('cap')}}" min="0" maxlength="10" required>
            </div>
        </div>


        <div class="row formrow">

            <div class="col">
                <input type="tel" class="form-control" placeholder="Tel 1" name="tel1" value="{{old('tel1')}}" maxlength="11" required>
            </div>

            <div class="col">
                <input type="tel" class="form-control" placeholder="Tel 2" name="tel2" value="{{old('tel2')}}"  maxlength="11">
            </div>
        </div>

        <div class="row formrow">
            <div class="col">
                <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{old('email')}}" required>
            </div>

            <div id="passpopup">

            </div>
            <div class="col">
                <input id='pass' type="password" class="form-control" placeholder="Password" name="password" minlength="4"
                    maxlength="16" required>
            </div>
            <div class="col">
                <input id='repass' type="password" class="form-control" placeholder="Ripeti password" name="repassword"
                    minlength="4" maxlength="16" required>
            </div>
        </div>

        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Centro visita" name="centrovisita" value="{{old('centrovisita')}}" maxlength="64" required>
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
                <input type="text" class="form-control" placeholder="ID documento" name="iddocumento" value="{{old('iddocumento')}}" maxlength="32" required>
            </div>
        </div>


        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Medico curante" name="medicocurante" value="{{old('medicocurante')}}" maxlength="32">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Recapito medico curante" name="recapitomedicocurante" value="{{old('recapitomedicocurante')}}" maxlength="32">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Contatto medico curante" name="contattomedicocurante" value="{{old('contattomedicocurante')}}" maxlength="32">
            </div>
        </div>
    </div>

        {{-- <h6 class="collapseclick" data-toggle="collapse" href="#collapseDiagnosiAdd" aria-expanded="false" aria-controls="collapseDiagnosi" >DIAGNOSI +</h6>
        <hr > --}}
          
        <!-- <div class="collapse show" id="collapseDiagnosiAdd">


        <div class="container" style="margin-left: 3%!important;">

            <div class="row formrow">
                <select class="form-control" id="diagnosi1" name="diagnosi1" >
                            <option disabled selected> diagnosi 1 </option>
                            @foreach ($diagnosi as $a)
                            <option>{{$a->diagnosi}}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="row formrow">
                        <select class="form-control" id="diagnosi2" name="diagnosi2" >
                                <option disabled selected value> diagnosi 2 </option>
                                @foreach ($diagnosi as $a)
                                <option>{{$a->diagnosi}}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="row formrow">
                            <select class="form-control" id="diagnosi3" name="diagnosi3" >
                                    <option disabled selected> diagnosi 3 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select>
                            </div>

                         {{-- <input type="text" class="form-control" placeholder="Diagnosi principale"
                    name="diagnosi1" value="{{old('diagnosi1')}}">
                <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi2" value="{{old('diagnosi2')}}">
                <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi3" value="{{old('diagnosi3')}}"> --}}
            </div>

        </div>-->
        {{-- <input type="text" class="form-control" placeholder="PROVA ARRAY" name="prova[]" value="val1"> --}} {{--
        <input type="text" class="form-control" placeholder="PROVA ARRAY" name="prova[]" value="val2"> --}} {{-- <input type="text"
            class="form-control" placeholder="PROVA ARRAY" name="prova[]" value="val3"> --}}
    @include('pazienti.aggiungi.tabs')



        <button style="float: right" type="submit"  class="btn btn-success">Salva</button>

        {{--<button type="button" onclick="verificaPass()" class="btn btn-success">Aggiungi</button>--}}

    </form>
</div>
@endsection

<script>

</script>
