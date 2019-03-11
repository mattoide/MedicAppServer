@extends('layouts.standard') 
@section('content')
@include('diagnosi.modalaggiungidiagnosi')
@include('diagnosi.modalmodificadiagnosi')
@include('diagnosi.modaleliminadiagnosi')
@include('layouts.errors')



{{-- <div class="container-fluid" style="width: 100%; float: right; margin-top: 2%"> --}}
        <div class="container-fluid" style="margin-top: 1%">
                <div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
                        <button id="nuovadiagnosi" name="nuovadiagnosi" onclick="" type="button" class="btn btn-success"
                            data-toggle="modal" data-target="#modalaggiungidiagnosi" data-titolo="Aggiungi nuova diagnosi">+ aggiungi diagnosi
                        </button>
                    </div>

        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                    <th scope="col" style="">Diagnosi</th>
                    <th scope="col" style="">Categoria</th>
                    <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            @foreach($diagnosi as $d)

            <tr>
                    <td>{{$d->diagnosi}}</td>
                    <td>{{$d->categoria}}</td>

                <td>
                        <button id="modificadiagnosi" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificadiagnosi" data-titolo="Modifica diagnosi" data-diagnosi="{{$d}}"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="{{$d->id}}" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminadiagnosi" data-titolo="Conferma eliminazione diagnosi" data-messaggioinizio="Vuoi eliminare la diagnosi"
                    data-messaggiometa="{{$d->diagnosi}}" data-messaggiofine="?" data-iddiagnosi="{{$d->id}}">
                    <i class="far fa-times-circle cstm-icn"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection