@extends('layouts.standard') 
@section('content')
@include('reminder.modalaggiungireminder')
@include('reminder.modalmodificareminder')
@include('reminder.modaleliminareminder')
@include('layouts.errors')

<div class="row" style="float:left">
    <button id="nuovareminder" name="nuovareminder" onclick="" type="button" class="btn btn-success"
        data-toggle="modal" data-target="#modalaggiungireminder" data-titolo="Aggiungi nuovo reminder">+ aggiungi reminder
    </button>
</div>

<div class="container-fluid" style="width: 100%; float: right; margin-top: 2%">
        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 10%">Reminder</th>
                <th scope="col" style="width: 60%" >Testo</th>
                <th scope="col" >Attivato dopo mesi</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            @foreach($reminders as $a)

            <tr>
                <th>{{$a->nomereminder}}</th>
                <td>{{$a->testoreminder}}</td>
                <td>{{$a->dopomesi}}</td>

                <td>
                        <button id="modificareminder" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificareminder" data-titolo="Modifica reminder" data-reminder="{{$a}}"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="{{$a->id}}" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminareminder" data-titolo="Conferma eliminazione reminder" data-messaggioinizio="Vuoi eliminare il reminder"
                    data-messaggiometa="{{$a->nomereminder}}" data-messaggiofine="?" data-idreminder="{{$a->id}}">
                         <i class="fas fa-times cstm-icn"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection