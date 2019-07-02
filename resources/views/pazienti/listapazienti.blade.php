@extends('layouts.standard') 
@section('content')
@include('pazienti.modaleliminapaziente')


{{-- <div class="container-fluid" style="width: 100%; float: right; margin-top: 2%"> --}}
        <div class="container-fluid" style="margin-top: 1%">
    
        <div class="row" style="float:right; margin-bottom: 2%;  margin-right: 1%">
                <button onclick="location.href = '/nuovopaziente';" type="button" class="btn btn-success">+ aggiungi paziente </button>
            </div>
    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Paziente</th>
                <th scope="col">Diagnosi primaria</th>
                <th scope="col">Diagnosi secondara</th>
                <th scope="col">Sede visita</th>
                <th scope="col">ID Documento</th>
                <th scope="col">Creazione paziente</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            @foreach($pazienti as $paziente)

            <tr>

           
                <td onmouseover="" style="cursor: pointer;" onclick="modificapaziente({{$paziente->id}})">{{$paziente->nome}} {{$paziente->cognome}}</td>
                <td> @if($paziente->diagnosi1){{$paziente->diagnosi1->diagnosi}}@endif </td>
                <td> @if($paziente->diagnosi2){{$paziente->diagnosi2->diagnosi}}@endif </td>
                <td>{{$paziente->recapitiPaziente->centrovisita}}</td>
                <td>{{$paziente->recapitiPaziente->iddocumento}}</td>
                <td>{{$paziente->created_at->formatLocalized('%d %B %Y')}}</td>

                <td>
                    <form style="display: inline" method="GET" action="/modificapaziente">
                        {{ csrf_field() }}
                        <button name='id' value="{{$paziente->id}}"  type="submit" class="btn btn-icn"><i class="far fa-edit cstm-icn"></i></button>
                    </form>

                    <button id="{{$paziente->id}}" name="idpaziente" value="{{$paziente->id}}"  type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#exampleModal" data-titolo="Conferma eliminazione paziente" data-messaggioinizio="Vuoi eliminare il paziente"
                        data-messaggiometa="{{$paziente->nome}} {{$paziente->cognome}}" data-messaggiofine="?" data-idpaziente="{{$paziente->id}}">
                        <i class="far fa-times-circle cstm-icn"></i>
                                            </button>

                                        <button style="height:100%" type="button" class="btn btn-icn"><i class="fas fa-print cstm-icn"></i></button>

                        
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<script>
function modificapaziente(val){

    console.log(val)
    let id = val
    let tkn = $('meta[name="csrf-token"]').attr('content')
    window.location = document.location.origin + '/modificapaziente?_token='+tkn+'&id='+id 

}
</script>
@endsection
