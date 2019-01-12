@extends('layouts.standard') 
@section('content')
@include('diagnosi.modalaggiungidiagnosi')
@include('diagnosi.modalmodificadiagnosi')
@include('diagnosi.modaleliminadiagnosi')
@include('layouts.errors')

<div class="row" style="float:left">

    <button id="nuovadiagnosi" name="nuovadiagnosi" onclick="" type="button" class="btn btn-success"
        data-toggle="modal" data-target="#modalaggiungidiagnosi" data-titolo="Aggiungi nuova diagnosi">+ aggiungi diagnosi
    </button>
</div>

<div class="container-fluid" style="width: 100%; float: right; margin-top: 2%">
    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Diagnosi</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            @foreach($diagnosi as $d)

            <tr>
                <th>{{$d->diagnosi}}</th>

                <td>
                        <button id="modificadiagnosi" onclick="" type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#modalmodificadiagnosi" data-titolo="Modifica diagnosi" data-diagnosi="{{$d}}">>
                    </button>

                    <button id="{{$d->id}}" type="submit" onclick="" type="button" class="btn btn-danger"
                        data-toggle="modal" data-target="#modaleliminadiagnosi" data-titolo="Conferma eliminazione diagnosi" data-messaggioinizio="Vuoi eliminare la diagnosi"
                    data-messaggiometa="{{$d->diagnosi}}" data-messaggiofine="?" data-iddiagnosi="{{$d->id}}">
                         <i class="fas fa-times"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection