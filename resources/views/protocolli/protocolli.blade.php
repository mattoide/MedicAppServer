@extends('layouts.standard') 
@section('content')
@include('protocolli.modalaggiungiprotocollo')
@include('protocolli.modalmodificaprotocollo')
@include('protocolli.modaleliminaprotocollo')
@include('layouts.errors')



<div class="container-fluid" style="margin-top: 1%">
<div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">

        <button id="nuovoprotocollo" name="nuovoprotocollo" onclick="" type="button" class="btn btn-success"
            data-toggle="modal" data-target="#modalaggiungiprotocollo" data-titolo="Nuovo Protocollo">+ aggiungi protocollo
        </button>
    </div>

    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Protocollo</th>
              
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            @foreach($protocolli as $protocollo)

            <tr>
                <td>{{$protocollo->nome}}</td>
                

                <td>
                        <button id="modalmodificaprotocollo" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificaprotocollo" data-titolo="Modifica protocollo" data-protocollo="{{$protocollo}}"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="{{$protocollo->id}}" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminaprotocollo" data-titolo="Conferma eliminazione protocollo" data-messaggioinizio="Vuoi eliminare il protocollo"
                    data-messaggiometa="{{$protocollo->nome}}" data-messaggiofine="?" data-idprotocollo="{{$protocollo->id}}">
                    <i class="far fa-times-circle cstm-icn"></i>
                                        </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection