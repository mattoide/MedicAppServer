@extends('layouts.standard') 
@section('content')

<div class="container" style="margin-left: 10%!important;">

    <form method="POST" action="/nuovopaziente">
        {{ csrf_field() }}

        <h6>ANAGRAFICA</h6>

        <hr>

        <div class="container" style="margin-left: 3%!important;">

            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nome" name="nome" value="{{old('nome')}}" maxlength="32" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Cognome" name="cognome" value="{{old('cognome')}}" maxlength="32" required>
                </div>

                <div class="col">
                    {{--<input type="text" class="form-control" placeholder="M/F" name="sesso" value="{{old('sesso')}}" maxlength="1"
                        required>--}}
                    <select class="form-control" id="exampleFormControlSelect1" name="sesso" required>
                            <option disabled selected value> -- seleziona il sesso -- </option>
                            <option>F</option>
                            <option>M</option>
                        </select>
                </div>


                <div class="col">
                    <input type="date" class="form-control" placeholder="Data di nascita" name="datadinascita" value="{{old('datadinascita')}}">
                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" value="{{old('indirizzo')}}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Città" name="citta" value="{{old('citta')}}" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Paese" name="paese" value="{{old('paese')}}" required>
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="Zip" name="cap" value="{{old('cap')}}">
                </div>
            </div>


            <div class="row formrow">

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 1" name="tel1" value="{{old('tel1')}}">
                </div>

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 2" name="tel2" value="{{old('tel2')}}">
                </div>

                <div class="col">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{old('email')}}">
                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Centro visita" name="centrovisita" value="{{old('centrovisita')}}">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Tipo documento" name="tipodocumento" value="{{old('tipodocumento')}}">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="ID documento" name="iddocumento" value="{{old('iddocumento')}}">
                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Medico curante" name="medicocurante" value="{{old('medicocurante')}}">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Recapito medico curante" name="recapitomedicocurante" value="{{old('recapitomedicocurante')}}">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Contatto medico curante" name="contattomedicocurante" value="{{old('contattomedicocurante')}}">
                </div>
            </div>
        </div>

        <h6>DIAGNOSI</h6>
        <hr>


        <div class="container" style="margin-left: 3%!important;">

            <div class="row formrow">
                <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi1" value="{{old('diagnosi1')}}">
                <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi2" value="{{old('diagnosi2')}}">
                <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosi3" value="{{old('diagnosi3')}}">
            </div>

        </div>

    @include('layouts.tabs')

        <button type="submit" class="btn btn-success">Aggiungi</button>

    </form>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection