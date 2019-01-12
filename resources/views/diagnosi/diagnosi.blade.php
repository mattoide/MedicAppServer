@extends('layouts.standard') 
@section('content')
@include('layouts.modalaggiungidiagnosi')
@include('layouts.modalmodificadiagnosi')

<div class="row" style="float:left">
        @include('layouts.errors')

    <button id="nuovadiagnosi" name="nuovadiagnosi" onclick="" type="button" class="btn btn-danger"
        data-toggle="modal" data-target="#modalaggiungidiagnosi" data-titolo="Aggiungi nuova diagnosi" data-messaggioinizio="Vuoi eliminare il paziente"
        data-messaggiometa="" data-messaggiofine="?" data-idpaziente="">>
    </button>
</div>

<div class="container-fluid" style="width: 100%; float: right; margin-top: 2%">
    <table id="tablepazienti" class="table table-striped">
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
                        <button id="modificadiagnosi" name="modificadiagnosi" onclick="" type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#modalmodificadiagnosi" data-titolo="Modifica diagnosi" data-diagnosi="{{$d}}">>
                    </button>

                    <button id="{{$d->id}}" type="submit" name="idpaziente" value="{{$d->id}}" onclick="" type="button" class="btn btn-danger"
                        data-toggle="modal" data-target="#exampleModal" data-titolo="Conferma eliminazione paziente" data-messaggioinizio="Vuoi eliminare il paziente"
                        data-messaggiometa="" data-messaggiofine="?" data-idpaziente="{{$d->id}}">
                         <i class="fas fa-times"></i>
                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection