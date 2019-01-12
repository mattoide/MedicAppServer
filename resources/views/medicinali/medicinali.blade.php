@extends('layouts.standard') 
@section('content')
@include('medicinali.modalaggiungimedicinale')
@include('medicinali.modalmodificamedicinale')
@include('medicinali.modaleliminamedicinale')
@include('layouts.errors')

<div class="row" style="float:left">

    <button id="nuovomedicinale" name="nuovomedicinale" onclick="" type="button" class="btn btn-success"
        data-toggle="modal" data-target="#modalaggiungimedicinale" data-titolo="Aggiungi nuovo medicinale">+ aggiungi medicinale
    </button>
</div>

<div class="container-fluid" style="width: 100%; float: right; margin-top: 2%">
    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Medicinale</th>
                <th scope="col">Dosaggio</th>
                <th scope="col">Posologia</th>
                <th scope="col">Durata terapia</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            @foreach($medicinali as $medicinale)

            <tr>
                <td>{{$medicinale->nome}}</td>
                <td>{{$medicinale->dosaggio}}</td>
                <td>{{$medicinale->posologia}}</td>
                <td>{{$medicinale->durata_terapia}}</td>

                <td>
                        <button id="modalmodificamedicinale" onclick="" type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#modalmodificamedicinale" data-titolo="Modifica medicinale" data-medicinale="{{$medicinale}}">>
                    </button>

                    <button id="{{$medicinale->id}}" type="submit" onclick="" type="button" class="btn btn-danger"
                        data-toggle="modal" data-target="#modaleliminamedicinale" data-titolo="Conferma eliminazione medicinale" data-messaggioinizio="Vuoi eliminare il medicinale"
                    data-messaggiometa="{{$medicinale->nome}}" data-messaggiofine="?" data-idmedicinale="{{$medicinale->id}}">
                         <i class="fas fa-times"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection