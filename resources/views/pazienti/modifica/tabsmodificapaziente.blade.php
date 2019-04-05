<ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
        <a class="nav-link navtext-tab active" id="storiaclinica-tab" data-toggle="tab" href="#storiaclinica" role="tab"
           aria-controls="storiaclinica"
           aria-selected="true">Storia Clinica</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="alrgie-tab" data-toggle="tab" href="#alrgie" role="tab"
           aria-controls="alrgie" aria-selected="true">Allergie</a>
    </li>

    
<li class="nav-item">
    <a class="nav-link navtext-tab" id="diagnsi-tab" data-toggle="tab" href="#diagnsi" role="tab" aria-controls="diagnsi" aria-selected="true">Diagnosi</a>
</li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="interventi-tab" data-toggle="tab" href="#interventi" role="tab"
           aria-controls="interventi"
           aria-selected="false">Interventi</a>
    </li>

    
<li class="nav-item">
    <a class="nav-link navtext-tab" id="reminder-tab" data-toggle="tab" href="#remindr" role="tab" aria-controls="remindr"
        aria-selected="false">Reminders</a>
</li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto"
           aria-selected="false">Foto</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="rx-tab" data-toggle="tab" href="#rx" role="tab" aria-controls="rx"
           aria-selected="false">Rx</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="app-tab" data-toggle="tab" href="#app" role="tab" aria-controls="app"
           aria-selected="false">App</a>
    </li>
</ul>

<div class="container tabcontent-custom">

        
    <div class="tab-content" id="myTabContent">
        <!-- TAB STORIA CLINICA-->
        <div class="tab-pane fade show active" id="storiaclinica" role="tabpanel" aria-labelledby="storiaclinica-tab">

<button id="nuovastoria" name="nuovastoria" data-toggle="modal" data-target="#modalaggiungistoria"
        data-titolo="Aggiungi nuova storia clinica"
        data-idpaziente="{{$paziente->id}}" type="button" class="btn btn-outline-success"
        style="margin: 1%"> Aggiungi storia clinica
</button>
<br>


<div style="max-height: 23em; overflow-y: scroll">
     

            <div id='nuovastoria'></div>
            @php ($i = 0)
             @foreach ($paziente->storiaClinica as $storiaclinica)

                <div id="storiaclinica{{$i}}" style="width: 95%">
                    <table class="table table-bordered">
                        <tbody id="tablestoriaclinica">
                        <tr>
                            <td class="datetd">
                                {{-- <input id="{{$storiaclinica->id}}datastoriaclinicadisbld"
                                       class="form-control customdate" type="date" name="datastoriaclinicaa"
                                       value="@if($storiaclinica->data){{$storiaclinica->created_at->formatLocalized('%b %g')}}@endif"> --}}
                                       <input id="{{$storiaclinica->id}}datastoriaclinicadisbld"
                                       class="form-control customdate" type="date" name="datastoriaclinica[]"
                                       value="@if($storiaclinica->data){{$storiaclinica->data}}@endif">

                                       <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbld" name="scdiagnosi1[]" onchange="aggiungiDiagnosi(this)">
                                        <option disabled selected> diagnosi 1 </option>
                                        @foreach ($diagnosiSpec as $a)
                                        <option>{{$a->diagnosi}}</option>
                                        @endforeach
                                    </select>

                                    
                                    <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi2disbld" name="scdiagnosi2[]" onchange="aggiungiDiagnosi(this)">
                                        <option disabled selected> diagnosi 2 </option>
                                        @foreach ($diagnosiSpec as $a)
                                        <option>{{$a->diagnosi}}</option>
                                        @endforeach
                                    </select>

                                {{-- <p id="{{$storiaclinica->id}}scdiagnosi1disbld"></p>
                                <p id="{{$storiaclinica->id}}scdiagnosi2disbld"></p>
                                 <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbldcat" name="catscdiagnosi1[]" onchange="getDiagnosiModSc(this)">
                                  <option selected>{{$storiaclinica->categoria1}}</option>
                                    <option disabled selected> categoria diagnosi 1 </option>
                                    @foreach ($diagnosiCat as $a)
                                    <option>{{$a->categoria}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbld" name="scdiagnosi1[]" onchange="getDiagnosiMod(this)">
                                    <option disabled selected> diagnosi 1 </option>
                                    @foreach ($diagnosiCat as $a)
                                    <option>{{$a->categoria}}</option>
                                    @endforeach
                                </select>
                                    
                                <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi2disbldcat" name="catscdiagnosi2[]" onchange="getDiagnosiMod(this)">
                                    <option disabled selected> categoria diagnosi 2 </option>
                                    @foreach ($diagnosiCat as $a)
                                    <option>{{$a->categoria}}</option>
                                    @endforeach
                                </select> --}}

                            </td>

                            <td>
                                <textarea class="miatextarea" id="{{$storiaclinica->id}}storiaclinicadisbld" class="form-control" rows="3"
                                          name="storiaclinica[]">
                                      @if($storiaclinica){{$storiaclinica->storiaclinica}}@endif
                                    </textarea>

                                <button onclick="deleteStoriaClinica(storiaclinica{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>

                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div> 
                @php ($i++)

           @endforeach

</div>


           
{{-- 
                        @foreach ($paziente->storiaClinica as $storiaclinica)
                        <div style=width: 90%>
                             <table class=table table-bordered>
                                  <tbody id=tablestoriaclinica>
                                       <tr> 
                                           <td class=datetd> 
                                               <input class=form-control type=date id=datastoriaclinica name=datastoriaclinica[] value='{{old('datastoriaclinica')}}' required> 

                                               <select class=form-control id=scdiagnosi1 name=scdiagnosi1[] >
                                                    <option disabled selected> diagnosi 1 </option> 
                                                    @foreach ($diagnosiCat as $a)
                                                    <option>{{$a->diagnosi}}</option
                                                        >@endforeach 
                                                </select> 
                                                    
                                                    
                                                    
                                                    <select class=form-control id=scdiagnosi2 name=scdiagnosi2[]>
                                                         <option disabled selected> diagnosi 2 </option>
                                                         @foreach ($diagnosiCat as $a) <option>{{$a->diagnosi}}</option>
                                                           @endforeach
                                                    </select> 

                                                     </td>
                                                      <td> 
                                                          <textarea class=form-control rows=3 name=storiaclinica[] value='{{old('storiaclinica')}}' onchange=insertdate(this.value) required></textarea>
                                                        </td> 
                                                    </tr>
                                                 </tbody>
                                                </table>
                                            </div>
                                            @endforeach --}}
        </div>

        {{-- TAB ALLERGIE --}}

        <div class="tab-pane fade" id="alrgie" role="tabpanel" aria-labelledby="alrgie-tab">

            <div id="allergiepopup" style="width: 50%; margin-left: 1%">

                <br>
                <button id="btnnuovaall"   onclick="preparaAllergia({{$allergie}})"  data-titolo="Aggiungi nuova storia clinica"
            data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%" >+</button>

      
                {{-- <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaAllergia({{$allergie}}, this)" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                    <option disabled selected>allergia</option>
                    @foreach ($allergie as $a)
                    <option>{{$a->allergia}}</option>
                    @endforeach
                </select>  --}}


                <div class="row">
    <div class="col">
        <div id="nuovaall">
                @php ($i = 0)
                @foreach ($paziente->allergiePaziente as $alPaz)

<select style="margin-bottom: 1%; margin-top: 1%" class="form-control" id="allergie{{$i}}" name="allergie[]" onchange="aggiungiAllergia(this)">
            <option disabled selected>allergia</option>
            @foreach ($allergie as $a)
                <p>{{$alPaz->allergia}} // {{$a}}</p>
                @if ($alPaz->allergia == $a->allergia)
                    <option selected>{{$alPaz->allergia}}</option>
                @else
                    <option>{{$a->allergia}}</option>
                @endif
            @endforeach
        </select>

        @php ($i++)

    @endforeach
        </div>

    </div>
    <div class="col">
        <div id="nuovaalldel" style="width: 10%">
                @php ($i = 0)
                @foreach ($paziente->allergiePaziente as $alPaz)

                <button style="margin-top:10%" id="delallergie{{$i}}" onclick="deleteAllergia(allergie{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>


        @php ($i++)

    @endforeach</div>

    </div>
</div>
            </div>

        </div>

        
                {{-- TAB DIAGNOSI --}}

                <div class="tab-pane fade" id="diagnsi" role="tabpanel" aria-labelledby="diagnsi-tab">

                    <div id="diagnosipopup" style="width: 50%; margin-left: 1%">
    
                    <button id="btnnuovadiagncat"   onclick="preparaDiagnosiCategoria({{$diagnosiCat}})"  data-titolo="Aggiungi nuova diagnosi"
                    data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>
    
                    <input type="text" id="diagnosi1s" name="diagnosi1" hidden>
                    <input type="text" id="diagnosi2s" name="diagnosi2" hidden>
            
                    <div class="row">
                        <div class="col">
                            <div id="nuovadiagncat">
{{--  --}}

@php ($i = 0)

@foreach ($pazienteDiagnosi as $pd)


                            <select class="form-control" id="catdiagnosi{{$i}}" name="diagnosicat[]" onchange="getDiagnosiMod(this)" disabled>
    <option disabled >categoria</option>
    @foreach ($diagnosiCat as $d)
        @if ($pd->categoria == $d->categoria)
        <option  selected>{{$d->categoria}}</option>
        @else
        <option >{{$d->categoria}}</option>
        @endif
        @endforeach
    </select>
@php ($i++)

@endforeach

{{--  --}}
                            </div>
                    </div>
                        <div class="col">
                            <div id="nuovadiagn">
                                    @php ($i = 0)

                                @foreach ($pazienteDiagnosi as $pd)


                            <select class="form-control" id="diagnosi{{$i}}" name="diagnosi[]" onchange="aggiungiDiagnosi(this)">
                                    <option disabled >diagnosi</option>
                                    @foreach ($diagnosiSpec as $d)
                                        @if ($pd->categoria == $d->categoria)
                                        @if($pd->diagnosi == $d->diagnosi)
                                        <option value="{{$d->id}}" selected>{{$d->diagnosi}}</option>
                                        @else
                                        <option value="{{$d->id}}">{{$d->diagnosi}}</option>
                                        @endif
                                        @endif
                                        @endforeach
                                    </select>
                                @php ($i++)

                                @endforeach
                            </div>
                    </div>

                    <div class="col">
                            <div id="deldiagn" style="width: 10%">
                                    @php ($i = 0)

                                    @foreach ($pazienteDiagnosi as $pd)
    
                            <button id="deldiagnosi{{$i}}" onclick="deleteDiagnosi({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>

    
                                    @php ($i++)
    
                                    @endforeach

                            </div>

                    </div>

                 
                        </div>
                </div>
    
                
            </div>

        <!-- TAB INTERVENTI-->

        <div class="tab-pane fade" id="interventi" role="tabpanel" aria-labelledby="interventi-tab">

           
            <button id="nuovointervento" name="nuovointervento" onclick="nuovointerventoo()"  data-titolo="Aggiungi nuovo intervento"
            type="button" class="btn btn-outline-success" style="margin: 1%">Aggiungi intervento</button>
            <br>


            <div style="max-height: 23em; overflow-y: scroll">
           
        <div id='nuovointervento'></div>

            @php ($i = 0)
             @foreach ($paziente->intervento as $intervento)

                <div id="intervento{{$i}}" style="width: 95%">
                    <table class="table table-bordered">
                        <tbody id="tableintervento">
                        <tr>
                            <td class="datetd">
                                     <input id="{{$intervento->id}}dataintervento"
                                       class="form-control customdate" type="date" name="dataintervento[]"
                                       value="@if($intervento->data){{$intervento->data}}@endif">

                                       <select class="form-control" id="{{$intervento->id}}intdiagnosi1disbld" name="intdiagnosi1[]" onchange="aggiungiDiagnosi(this)">
                                        <option disabled selected> diagnosi 1 </option>
                                        @foreach ($diagnosiSpec as $a)
                                        <option>{{$a->diagnosi}}</option>
                                        @endforeach
                                    </select>

                                    
                                    <select class="form-control" id="{{$intervento->id}}intdiagnosi2disbld" name="intdiagnosi2[]" onchange="aggiungiDiagnosi(this)">
                                        <option disabled selected> diagnosi 2 </option>
                                        @foreach ($diagnosiSpec as $a)
                                        <option>{{$a->diagnosi}}</option>
                                        @endforeach
                                    </select>

                            </td>

                            <td>
                                <textarea class="miatextarea" id="{{$intervento->id}}interventodisbld" class="form-control" rows="3"
                                          name="intervento[]">
                                      @if($intervento){{$intervento->intervento}}@endif
                                    </textarea>

                                <button onclick="deleteIntervento(intervento{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>

                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div> 
                @php ($i++)

           @endforeach
          
        </div>
    </div>

                      {{-- TAB REMINDER --}}

                      <div class="tab-pane fade" id="remindr" role="tabpanel" aria-labelledby="remindr-tab">
                        <div id="reminderpopup" style="width: 50%; margin-left: 1%">
                            <br>
                        <button id="btnnuovoreminder"   onclick="preparaReminder({{$reminder}})" 
                        data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>
        
                                         
                        <div class="row">
                            <div class="col"> <div id="nuovoreminder">
                                    @php ($i = 0)

                                    @foreach ($pazienteReminder as $pd)
                                    <select class="form-control" id="reminder{{$i}}" name="reminder[]" onchange="aggiungiReminder(this)">
                                    <option disabled >categoria</option>
                                    @foreach ($reminder as $d)
                                        @if ($pd->nomereminder == $d->nomereminder)
                                        <option value={{$d->id}} selected>{{$d->nomereminder}}</option>
                                        @else
                                        <option  value={{$d->id}}>{{$d->nomereminder}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                @php ($i++)

                                @endforeach  
                                </div>
                            </div>

                            <div class="col"> <div id="datanuovoreminder">
                                    @php ($i = 0)

                                    @foreach ($pazRemData as $pd)
                                    <input id="datareminder{{$i}}" type="date" class="form-control" value={{$pd->data}}  name="datareminder[]" required>

                                @php ($i++)

                                @endforeach  
                                </div>
                            </div>

                            <div class="col"> <div id="delnuovoreminder"  style="width: 10%">
                                @php ($i = 0)
                                @foreach ($pazienteReminder as $pd)

                            <button style="height:100%; margin-top: 10%" id="delreminder{{$i}}"  onclick="deleteReminder({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
                            @php ($i++)

                                @endforeach  

                            </div></div>


                        </div>
                     </div>
                    </div>

        <!-- TAB FOTO-->
        <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">

            <br>

            <div class="form-group">
                <label class="btn btn-success">
                    Aggiungi immagini <input type="file" class="form-control-file" id="foto" name="foto"
                                             multiple accept="image/x-png ,image/jpeg" style="display:none;"
                                             onchange="$('#upload-file-info').html(this.files.length + ' File' )">
                </label>
                <span class='label label-info' id="upload-file-info"></span>

            </div>
        </div>


        <!-- TAB RX-->
        <div class="tab-pane fade" id="rx" role="tabpanel" aria-labelledby="rx-tab">

            <br>

            <div class="form-group">
                <label class="btn btn-success">
                    Aggiungi radiografie<input type="file" class="form-control-file" id="rx" name="radiografia"
                                               multiple accept="image/x-png ,image/jpeg" style="display:none;"
                                               onchange="$('#upload-file-info').html(this.files.length + ' File' )">
                </label>
                <span class='label label-info' id="upload-file-info"></span>

            </div>
        </div>


        <!-- TAB APP-->
        <div class="tab-pane fade" id="app" role="tabpanel" aria-labelledby="app-tab">

            <br>


            <button type="button" class="btn btn-success">Avvia</button>
            <button type="button" class="btn btn-danger">Blocca App</button>


            <br>
            <br>
            <br> {{--
            <div class="col-2">
                <input type="time" class="form-control custominputnotifica" placeholder="orari esercizi" name="oraesercizio">
            </div> --}}
            <div class="row" style="width: 90%">
                <div class="col-10">
                    <input type="text" class="form-control custominputnotifica" placeholder="testo" name="esercizio">
                </div>
                <div class="col">
                    <button style="float:right" type="button" class="btn btn-success">invia notifica</button>

                </div>
            </div>

            <br>

            <div id="medicinalipopup" class="row" style="width: 50%; margin-left: 1%"></div>


                <h3><span class="badge mybadge">Medicinali</span></h3>

                <button id="btnnuovomed"  onclick="creaMedicinale({{$medicinali}})" type="button" class="btn btn-outline-success" style="margin: 1%" >+</button>
                
                <div class="row">
                    <div class="col">
                @php ($i = 0)
                @foreach ($paziente->medicinaliPaziente as $medPaz)
                    <select class="form-control" id="medicinali{{$i}}" name="medicinali[]">
                    <option disabled selected>medicinale</option>
                    @foreach ($medicinali as $m)
                        @if ($medPaz->medicinale_id == $m->id)
                        <option value="{{$m->id}}" selected>{{$m->nome}} - {{$m->dosaggio}} - {{$m->posologia}} - {{$m->durata_terapia}}</option>
                        @else
                        <option value="{{$m->id}}">{{$m->nome}} - {{$m->dosaggio}} - {{$m->posologia}} - {{$m->durata_terapia}}</option>
                        @endif
                        @endforeach
                    </select>
                @php ($i++)
                @endforeach
                <div id="nuovomed"></div>

            </div>
        <br>

        <div class="col"> 
            <div id="delnuovomed" style="width: 10%">
            @php ($i = 0)
            @foreach ($paziente->medicinaliPaziente as $medPaz)
                <button style="height:100%" id="delmedicinali{{$i}}"  onclick="deleteMedicinale({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
            @php ($i++)
            @endforeach  
        </div>
    </div>

</div>

    {{-- <div class="row">
        <div class="col">
            <div id="nuovomed">
            </div>
        </div>
        <div class="col" style="width: 5%">
            <div id="delnuovomeda">
            </div>
        </div>
    </div> --}}


        {{-- <div id="nuovomed"></div> --}}


        <br>
        <div  class="row" style="margin-left: 1%"></div>


        <h3><span class="badge mybadge">Protocolli</span></h3>

        <div class="row">
        <div class="col">
            <select class="form-control" id="protocollo" name="protocollo" >
            <option disabled selected>protocolli</option>
            {{-- @foreach ($protocolli as $prot)
            <option value="{{$prot->id}}">{{$prot->nome}}</option>
            @endforeach --}}

            @foreach ($protocolli as $prot)
            @if ($pazienteProtocollo)

            @if ($pazienteProtocollo->protocollo_id == $prot->id)
                <option value="{{$prot->id}}" selected>{{$prot->nome}}</option>
            @else
                <option value="{{$prot->id}}">{{$prot->nome}}</option>
            @endif
            @else
            <option value="{{$prot->id}}">{{$prot->nome}}</option>

@endif

            @endforeach
        </select> 

    </div>

    <div class="col">
        <button style="margin-top: 1%" id="delprotocollo"  onclick="deleteProto()" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
    </div>
    </div>



        </div>
    </div>
</div>

<script>
 


</script>
