@extends('layouts.standard') 
@section('content')
@include('allergie.modalaggiungiallergie')
@include('allergie.modalmodificaallergie')
@include('allergie.modaleliminaallergie')
@include('layouts.errors')



{{-- <div class="container-fluid" style="width: 100%; float: right; margin-top: 2%"> --}}
        <div class="container-fluid" style="margin-top: 1%">
                <div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
                        <button id="nuovaallergia" name="nuovaallergia" onclick="" type="button" class="btn btn-success"
                            data-toggle="modal" data-target="#modalaggiungiallergia" data-titolo="Aggiungi nuova allergia">+ aggiungi allergia
                        </button>
                    </div>
        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 90%">Allergia</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            @foreach($allergie as $a)

            <tr>
                <td>{{$a->allergia}}</td>

                <td>
                        <button id="modificaallergia" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificaallergia" data-titolo="Modifica allergia" data-allergia="{{$a}}"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="{{$a->id}}" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminaallergia" data-titolo="Conferma eliminazione allergia" data-messaggioinizio="Vuoi eliminare l' allergia"
                    data-messaggiometa="{{$a->allergia}}" data-messaggiofine="?" data-idallergia="{{$a->id}}">
                    <i class="far fa-times-circle cstm-icn"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection