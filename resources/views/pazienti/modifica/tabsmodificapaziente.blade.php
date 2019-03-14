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
        <a class="nav-link navtext-tab" id="interventi-tab" data-toggle="tab" href="#interventi" role="tab"
           aria-controls="interventi"
           aria-selected="false">Interventi</a>
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
             @foreach ($paziente->storiaClinica as $storiaclinica)

                <div style="width: 95%">
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

                                {{-- <p id="{{$storiaclinica->id}}scdiagnosi1disbld"></p>
                                <p id="{{$storiaclinica->id}}scdiagnosi2disbld"></p> --}}

                                 <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbld" name="scdiagnosi1[]">
                                    <option disabled selected> diagnosi 1 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi2disbld" name="scdiagnosi2[]">
                                    <option disabled selected> diagnosi 2 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select>

                            </td>

                            <td>
                                <textarea class="miatextarea" id="{{$storiaclinica->id}}storiaclinicadisbld" class="form-control" rows="3"
                                          name="storiaclinica[]">
                                      @if($storiaclinica){{$storiaclinica->storiaclinica}}@endif
                                    </textarea>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div> 

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
                                                    @foreach ($diagnosi as $a)
                                                    <option>{{$a->diagnosi}}</option
                                                        >@endforeach 
                                                </select> 
                                                    
                                                    
                                                    
                                                    <select class=form-control id=scdiagnosi2 name=scdiagnosi2[]>
                                                         <option disabled selected> diagnosi 2 </option>
                                                         @foreach ($diagnosi as $a) <option>{{$a->diagnosi}}</option>
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
                {{-- <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaAllergia({{$allergie}}, this)" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                    <option disabled selected>allergia</option>
                    @foreach ($allergie as $a)
                    <option>{{$a->allergia}}</option>
                    @endforeach
                </select>  --}}



                <div id="nuovaall"></div>
            </div>

        </div>

        <!-- TAB INTERVENTI-->

        <div class="tab-pane fade" id="interventi" role="tabpanel" aria-labelledby="interventi-tab">

            <br>

            <div style="width: 90%">
                <table class="table table-bordered">
                    <tbody id="tableinterventi">
                    <tr>
                        <td class="datetd">
                            <input class="form-control" type="date" id="date-input" name="dataintervento" value="">
                        </td>

                        <td>
                            <textarea class="form-control" id="clinic-story-input" rows="3" name="intervento"
                                      value=""></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
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

            <div id="medicinalipopup" class="row" style="width: 50%; margin-left: 1%">

                @foreach ($paziente->medicinaliPaziente as $medPaz)

                <select class="form-control" id="allergie" name="medicinali[]" onchange="nuovoMedicinale({{$medicinali}})">
                    <option disabled selected>medicinale</option>
                    @foreach ($medicinali as $m)
                        @if ($medPaz->medicinale_id == $m->id)
                            <option value="{{$m->id}}" selected>{{$m->nome}}</option>
                        @else
                            <option value="{{$m->id}}">{{$m->nome}}</option>
                        @endif
                        @endforeach
                    </select>
                <br>

            @endforeach

                <select class="form-control" id="medicinali" name="medicinali[]" onchange="nuovoMedicinale({{$medicinali}})">
                    <option disabled selected>medicinale</option>
                    @foreach ($medicinali as $m)
                    <option value="{{$m->id}}">{{$m->nome}}</option>
                    @endforeach
                </select> 
<br>
            <div id="nuovomed"></div>
        </div>

        <br>

        <select class="form-control" id="protocollo" name="protocollo" >
            <option disabled selected>protocolli</option>
            {{-- @foreach ($protocolli as $prot)
            <option value="{{$prot->id}}">{{$prot->nome}}</option>
            @endforeach --}}

            @foreach ($protocolli as $prot)
            @if ($pazienteProtocollo->protocollo_id == $prot->id)
                <option value="{{$prot->id}}" selected>{{$prot->nome}}</option>
            @else
                <option value="{{$prot->id}}">{{$prot->nome}}</option>
            @endif
            @endforeach
        </select> 



        </div>
    </div>
</div>

<script>
 


</script>
