@extends('layouts.standard')

@section('content')

    <script>
        {{--@include('error.formerrors')--}}
    </script>

    <div class="container" style="margin-left: 10%!important;">

        <form method="POST" action="/nuovopaziente">
            {{ csrf_field() }}

            <h6>ANAGRAFICA</h6>

            <hr>

            <div class="container" style="margin-left: 3%!important;">

                <div class="row formrow">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nome" name="nome">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Cognome" name="cognome">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="M/F" name="sesso">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Data di nascita" name="datadinascita">
                    </div>
                </div>


                <div class="row formrow">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Città" name="citta">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Paese" name="paese">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Zip" name="zip">
                    </div>
                </div>


                <div class="row formrow">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tel 1" name="tel1">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tel 2" name="tel2">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                    </div>
                </div>


                <div class="row formrow">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Centro visita" name="visitcenter">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Tipo documento" name="documenttype">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="ID documento" name="documentid">
                    </div>
                </div>


                <div class="row formrow">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Medico curante" name="doctor">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Recapito medico curante"
                               name="doctordelivery">
                    </div>

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Contatto medico curante"
                               name="doctorcontact">
                    </div>
                </div>
            </div>

            <h6>DIAGNOSI</h6>
            <hr>


            <div class="container" style="margin-left: 3%!important;">

                <div class="row formrow">

                    <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosis1">

                    <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosis2">

                    <input type="text" class="form-control" placeholder="Diagnosi principale" name="diagnosis3">

                </div>

            </div>

            @include('pazienti.tabs')
<button type="submit" class="btn btn-success">Aggiungi</button>

        </form>
    </div>

@endsection
