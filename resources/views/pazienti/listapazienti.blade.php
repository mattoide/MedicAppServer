@extends('layouts.standard') 
@section('content')
    @include('layouts.modal')

<div class="row" style="float:left">
    <button onclick="location.href = '/nuovopaziente';" type="button" class="btn btn-success">+ aggiungi paziente </button>
</div>
<div class="container-fluid" style="width: 100%; float: right; margin-top: 2%">
    <table id="tablepazienti" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Id Documento</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            @foreach($pazienti as $paziente)

            <tr>
                <td>{{$paziente->nome}}</td>
                <td>{{$paziente->cognome}}</td>
                <td>{{$paziente->recapitiPaziente->tipodocumento}}</td>
                <td>{{$paziente->recapitiPaziente->iddocumento}}</td>

                <td>
                    <form method="POST" action="/modificapaziente" style="display: inline">
                        {{ csrf_field() }}
                        <button id="{{$paziente->id}}" onclick="" type="button" class="btn btn-warning"><i class="far fa-edit"></i></button>
                    </form>

                    <button id="{{$paziente->id}}" type="submit" name="idpaziente" value="{{$paziente->id}}" onclick="" type="button" class="btn btn-danger"
                        data-toggle="modal" data-target="#exampleModal" data-titolo="Conferma eliminazione paziente" data-messaggioinizio="Vuoi eliminare il paziente"
                        data-messaggiometa="{{$paziente->nome}} {{$paziente->cognome}}" data-messaggiofine="?" data-idpaziente="{{$paziente->id}}">
                         <i class="fas fa-times"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection