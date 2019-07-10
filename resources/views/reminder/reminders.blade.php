@extends('layouts.standard') 
@section('content')
@include('reminder.modalaggiungireminder')
@include('reminder.modalmodificareminder')
@include('reminder.modaleliminareminder')
@include('layouts.errors')

{{-- <div class="container-fluid" style="width: 100%; float: right; margin-top: 2%"> --}}
        <div class="container-fluid" style="margin-top: 1%">

    
<div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
        <button id="nuovareminder" name="nuovareminder" onclick="" type="button" class="btn btn-success"
            data-toggle="modal" data-target="#modalaggiungireminder" data-titolo="Aggiungi nuovo reminder">+ aggiungi reminder
        </button>
    </div>
        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" >Reminder</th>
                <th scope="col" >Testo</th>
                <th scope="col" >Lingua</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            @foreach($reminders as $a)

            <tr>
                <td>{{$a->nomereminder}}</td>
                <td>{{$a->testoreminder}}</td>
                <td>{{$a->linguareminder}}</td>

                <td>
                        <button id="modificareminder" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificareminder" data-titolo="Modifica reminder" data-linguareminder="{{$a->linguareminder}}" data-reminder="{{$a}}"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="{{$a->id}}" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminareminder" data-titolo="Conferma eliminazione reminder" data-messaggioinizio="Vuoi eliminare il reminder"
                    data-messaggiometa="{{$a->nomereminder}}" data-messaggiofine="?" data-idreminder="{{$a->id}}">
                    <i class="far fa-times-circle cstm-icn"></i>
                                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection