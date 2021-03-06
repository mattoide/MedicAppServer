<ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
        <a class="nav-link navtext-tab active" id="storiaclinica-tab" data-toggle="tab" href="#storiaclinica" role="tab"
           aria-controls="storiaclinica"
           aria-selected="true">Storia Clinica</a>
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
        <a class="nav-link navtext-tab" id="alrgie-tab" data-toggle="tab" href="#alrgie" role="tab"
           aria-controls="alrgie" aria-selected="true">Allergie</a>
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
    <a class="nav-link navtext-tab" id="reminder-tab" data-toggle="tab" href="#remindr" role="tab" aria-controls="remindr"
        aria-selected="false">Reminders</a>
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

                                       {{-- <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbld" name="scdiagnosi1[]" onchange="aggiungiDiagnosi(this)">
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
                                    </select> --}}

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
                                <textarea style="width: 95%" class="miatextarea" id="{{$storiaclinica->id}}storiaclinicadisbld" class="form-control" rows="3"
                                          name="storiaclinica[]">
                                      @if($storiaclinica){{$storiaclinica->storiaclinica}}@endif
                                    </textarea>

                                {{-- <button style='float:right; margin:0; padding:0;' onclick="deleteStoriaClinica(storiaclinica{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}

                                <button style='float:right; margin:0; padding:0;'  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione storia clinica" data-messaggioinizio="Vuoi eliminare la storia clinica"
                                data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="storiaclinica"
                                 type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
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

                {{-- <button style="margin-top:10%" id="delallergie{{$i}}" onclick="deleteAllergia(allergie{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}
                <button style="height:10%;"  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione allergia" data-messaggioinizio="Vuoi eliminare l'allergia"
                data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="allergie"
                id="delallergie{{$i}}"  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>


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

                                @php ($i = 0)
                                @foreach ($pazienteDiagnosi as $pd)

                                    <select class="form-control cstm-select" id="catdiagnosi{{$i}}" name="diagnosicat[]" onchange="getDiagnosiMod(this)" disabled>
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

                            </div>
                    </div>
                        <div class="col">
                            <div id="nuovadiagn">

                                    @php ($i = 0)
                                    @foreach ($pazienteDiagnosi as $pd)
                                    <select class="form-control cstm-select" id="diagnosia{{$i}}" name="diagnosi[]" onchange="aggiungiDiagnosi(this)">
                                        <option disabled selected>allergia</option>
                                            @foreach ($diagnosiSpec as $d)
                                            @if ($pd->categoria == $d->categoria)
                                            @if ($pd->diagnosi == $d->diagnosi)
                                                <option  value={{$d->id}} selected>{{$d->diagnosi}}</option>
                                            @else
                                                <option>{{$d->diagnosi}}</option>
                                                @endif
                                                @endif
                                                @endforeach
                                    </select>

                                        @php ($i++)

                                    @endforeach

                                    {{-- @php ($i = 0)
                                    @foreach ($pazienteDiagnosi as $pd)

                                        <select class="form-control" id="diagnosi{{$i}}" name="diagnosi[]" onchange="aggiungiDiagnosi(this)">
                                            <option disabled >diagnosi</option>
                                            @foreach ($diagnosiSpec as $d)
                                                @if ($pd->categoria == $d->categoria)
                                                    @if($pd->diagnosi == $d->diagnosi)
                                                        <option value={{$d->id}} selected>{{$d->diagnosi}}</option>
                                                        @else
                                                        <option value={{$d->id}}>{{$d->diagnosi}}</option>
                                                    @endif
                                                @endif
                                            @endforeach


                                        </select>
                                    @php ($i++)
                                    @endforeach --}}
                            </div>


                    </div>

                    <div class="col">
                            <div id="deldiagn" style="width: 10%">
                                    @php ($i = 0)
                                    @foreach ($pazienteDiagnosi as $pd)
                                    {{-- <button id="deldiagnosi{{$i}}" onclick="deleteDiagnosi({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}

                                    <button  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione diagnosi" data-messaggioinizio="Vuoi eliminare la diagnosi"
                                    data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="diagnosi"
                                    id="deldiagnosi{{$i}}"  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>


                                        @php ($i++)
                                    @endforeach
                            </div>
                    </div>

                </div>
            </div>
    </div>

        <!-- TAB INTERVENTI-->

        <div class="tab-pane fade" id="interventi" role="tabpanel" aria-labelledby="interventi-tab">


            <button id="btnnuovointervento" name="nuovointervento" onclick="nuovointerventoo()"  data-titolo="Aggiungi nuovo intervento"
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

                                       {{-- <select class="form-control" id="{{$intervento->id}}intdiagnosi1disbld" name="intdiagnosi1[]" onchange="aggiungiDiagnosi(this)">
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
                                    </select> --}}

                            </td>

                            <td>
                                <textarea class="miatextarea" id="{{$intervento->id}}interventodisbld" class="form-control" rows="3"
                                          name="intervento[]">
                                      @if($intervento){{$intervento->intervento}}@endif
                                    </textarea>

                                {{-- <button onclick="deleteIntervento(intervento{{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}
                                <button  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione intervento" data-messaggioinizio="Vuoi eliminare l'intervento"
                                data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="intervento"
                                  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>

                            </td>

                            <td style="width: 2%"><button style="height:100%; margin-top: 10%" type="button" class="btn btn-icn"><i class="fas fa-print cstm-icn"></i></button>
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
                                    <select class="form-control cstm-select" id="reminder{{$i}}" name="reminder[]" onchange="aggiungiReminder(this)">
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

                            {{-- <button style="height:100%; margin-top: 10%" id="delreminder{{$i}}"  onclick="deleteReminder({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}
                            <button style="height:100%; margin-top: 10%"  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione reminder" data-messaggioinizio="Vuoi eliminare il reminder"
                            data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="reminders"
                            id="delreminder{{$i}}"  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
                            @php ($i++)

                                @endforeach

                            </div></div>


                        </div>
                     </div>
                    </div>

        <!-- TAB FOTO-->
        <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">

            <br>

            {{-- <div class="form-group">
                <label class="btn btn-success">
                    Aggiungi immagini <input type="file" class="form-control-file" id="foto" name="fotoz"
                                             multiple accept="image/x-png ,image/jpeg" style="display:none;"
                                             onchange="$('#upload-file-info').html(this.files.length + ' File' )">
                </label>
                <span class='label label-info' id="upload-file-info"></span>

            </div> --}}
            <div class="form-group">
            <div class="custom-file-container" data-upload-id="ft">
                <label>Aggiungi immagini <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Pulisci"><i class="far fa-times-circle cstm-icn"></i></a></label>
                <label class="custom-file-container__custom-file" >
                        {{-- <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" name="foto[]" multiple> --}}
                        <input type="file" class="custom-file-container__custom-file__custom-file-input"  accept="image/*;capture=camera" name="foto[]" multiple>

                       
                    {{-- <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File" name="foto[]"> --}}
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview custom-image-preview"></div>
            </div>


<div class="row">
@foreach ($paziente->foto as $foto)

        <img id="foto{{$foto->id}}" src="data:image/png;base64, {{$foto->foto}}" class="listimages"/>
        <input id="fotoval{{$foto->id}}" type="text" value="{{$foto->foto}}" name="fotoz[]" hidden>
        <span>
            <button style="" id="fotodel{{$foto->id}}"  onclick="deleteFoto({{$foto->id}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
        </span>
@endforeach
</div>

        </div>
    </div>


        <!-- TAB RX-->
        <div class="tab-pane fade" id="rx" role="tabpanel" aria-labelledby="rx-tab">

            <br>

            {{-- <div class="form-group">
                <label class="btn btn-success">
                    Aggiungi radiografie<input type="file" class="form-control-file" id="rx" name="radiografia"
                                               multiple accept="image/x-png ,image/jpeg" style="display:none;"
                                               onchange="$('#upload-file-info').html(this.files.length + ' File' )">
                </label>
                <span class='label label-info' id="upload-file-info"></span>

            </div> --}}

            <div class="form-group">
                <div class="custom-file-container" data-upload-id="rx">
                    <label>Aggiungi immagini <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Pulisci"><i class="far fa-times-circle cstm-icn"></i></a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input"accept="image/*;capture=camera" multiple aria-label="Choose File" name="radiografie[]">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview custom-image-preview"></div>
                </div>



<div class="row">
        @foreach ($paziente->radiografia as $rx)

                <img id="rx{{$rx->id}}" src="data:image/png;base64, {{$rx->radiografia}}" class="listimages"/>
                <input id="rxval{{$rx->id}}" type="text" value="{{$rx->radiografia}}" name="radiografiez[]" hidden>
                <span>
                    <button style="" id="rxdel{{$rx->id}}"  onclick="deleteRx({{$rx->id}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
                </span>
        @endforeach
        </div>
            </div>
        </div>


        <!-- TAB APP-->
        <div class="tab-pane fade" id="app" role="tabpanel" aria-labelledby="app-tab">

            <br>


            @if($paziente->attivo == true)
            <span id="datattivapp" class="badge badge-success">Ultima attivazione: {{$paziente->datattivapp}}</span>
            <button id="startapp" onclick="enableApp({{$paziente->id}})" type="button" class="btn btn-success" disabled>Avvia</button>
            <button id="stopapp" onclick="disableApp({{$paziente->id}})" type="button" class="btn btn-danger" >Blocca App</button>
           @else
           <span id="datattivapp" class="badge badge-success" disabled>Ultima attivazione: {{$paziente->datattivapp}}</span>
           <button id="startapp" onclick="enableApp({{$paziente->id}})" type="button" class="btn btn-success" >Avvia</button>
           <button id="stopapp" onclick="disableApp({{$paziente->id}})" type="button" class="btn btn-danger" disabled>Blocca App</button>
           @endif


            {{-- @if($paziente->attivo == true)
            <button onclick="enableApp({{$paziente->id}})" type="button" class="btn btn-success" disabled>Avvia</button>
            <button onclick="disableApp({{$paziente->id}})" type="button" class="btn btn-danger" >Blocca App</button>
            @elseif($paziente->attivo == false)
            <button onclick="enableApp({{$paziente->id}})" type="button" class="btn btn-success">Avvia</button>
            <button onclick="disableApp({{$paziente->id}})" type="button" class="btn btn-danger" disabled>Blocca App</button>
            @endif --}}


            <br>
            <br>
            <br> {{--
            <div class="col-2">
                <input type="time" class="form-control custominputnotifica" placeholder="orari esercizi" name="oraesercizio">
            </div> --}}
            <div class="row" style="width: 90%">
                <div class="col-10">
                    <input id="notificamessaggio" type="text" class="form-control custominputnotifica" placeholder="testo" >
                </div>
                <div class="col">
                    <button onclick="notifica({{$paziente->id}})" style="float:right" type="button" class="btn btn-success">invia notifica</button>

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
                    <select class="form-control cstm-select" id="medicinali{{$i}}" name="medicinali[]">
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
                {{-- <button style="height:100%" id="delmedicinali{{$i}}"  onclick="deleteMedicinale({{$i}})" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}
                <button style="height:100%;"  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione medicinale" data-messaggioinizio="Vuoi eliminare il medicinale"
                data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="medicinali"
                id="delmedicinali{{$i}}"  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>

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
            <select class="form-control cstm-select" id="protocollo" name="protocollo" >
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
        {{-- <button style="margin-top: 1%" id="delprotocollo"  onclick="deleteProto()" type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button> --}}
        <button style="margin-top: 1%"  data-toggle="modal" data-target="#deletemodal" data-titolo="Conferma eliminazione protocollo" data-messaggioinizio="Vuoi eliminare il protocollo"
        data-messaggiometa="" data-messaggiofine="?" data-id={{$i}} data-scope="protocolli"
        id="delprotocollo"  type="button" class="btn btn-icn"><i class="far fa-times-circle cstm-icn"></i></button>
    </div>
    </div>



        </div>
    </div>
</div>

<script>

 function enableApp(idpaz){
    var today = dateToToday();

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{
            "idpaz":idpaz,
            "datattivapp": today
    }
  });

    $.post('/enableapp', function(response) {
            // handle your response here
            $('#startapp').attr('disabled', 'disabled')
            $('#datattivap').attr('disabled', 'disabled')
            document.getElementById('datattivapp').innerHTML = "Ultima attivazione: " + today;
            $('#stopapp').removeAttr('disabled')
            alert('App abilitata!');
        })
 }

 function dateToToday(){
        var options = {'weekday': 'long', 'month': 'long', 'day': '2-digit', 'year': '2-digit'};
        var date = new Date().toLocaleString('it-IT', options);
        return date;
    }

 function disableApp(idpaz){
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{
            "idpaz":idpaz
  }
  });

    $.post('/disableapp', function(response) {
        // handle your response here
        $('#stopapp').attr('disabled', 'disabled')
        $('#startapp').removeAttr('disabled')
        $('#datattivap').removeAttr('disabled')



        alert('App disabilitata!');

    })
 }

 function notifica(idpaz){

    let msg = $('#notificamessaggio').val();

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{
            "idpaz":idpaz,
            "messaggio": msg
  }
  });

    $.post('/notifica', function(response) {
        // handle your response here
console.log(response)
    })
 }

 function nuovointerventoo(){

var lng = document.getElementsByName("intervento[]").length
// var intervento= "<div id=intervento"+lng+" style=width: 90%> <table class=table table-bordered> <tbody id=tableintervento> <tr> <td class=datetd> <input class=form-control type=date value=<?php echo date('Y-m-d'); ?> id=dataintervento name=dataintervento[] required> <select class=form-control id=intdiagnosi1 name=intdiagnosi1[] > <option disabled selected> diagnosi 1 </option> @foreach ($diagnosiSpec as $a)<option>{{$a->diagnosi}}</option>@endforeach </select>  <select class=form-control id=intdiagnosi2 name=intdiagnosi2[]> <option disabled selected> diagnosi 2 </option>@foreach ($diagnosiSpec as $a) <option>{{$a->diagnosi}}</option>  @endforeach</select>  </td> <td> <textarea  class=miatextara rows=3 name=intervento[] value='{{old('intervento')}}' onchange=insertdate(this.value) required></textarea> <button onclick=deleteIntervento("+'intervento'+lng+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button></td>  </tr> </tbody></table> </div>";
var intervento= "<div id=intervento"+lng+" style=width: 90%> <table class=table table-bordered> <tbody id=tableintervento> <tr> <td class=datetd> <input class=form-control type=date value=<?php echo date('Y-m-d'); ?> id=dataintervento name=dataintervento[] required>   </td> <td> <textarea  style=width:95% class=miatextara rows=3 name=intervento[] value='{{old('intervento')}}' onchange=insertdate(this.value) required></textarea> <button style='float:right; margin:0; padding:0;' onclick=deleteIntervento("+'intervento'+lng+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn' ></i></button></td>  </tr> </tbody></table> </div>";
$('#nuovointervento').append(intervento);
}

window.addEventListener('fileUploadWithPreview:imageSelected', function(e) {
console.log(e.detail.selectedFilesCount)

    // let pt =  "<input id='potor" + e.detail.selectedFilesCount + "' type='file'  accept='*'  name='foto[]'>"


    // $('#potoz').append(pt);
    // $('#potor'+e.selectedFilesCount).val(e.detail.cachedFileArray[e.detail.selectedFilesCount]);


    // console.log(e.detail)
    // console.log(e.detail.cachedFileArray[1])

})


$(document).ready(function () {

var ft = new FileUploadWithPreview('ft', {showDeleteButtonOnImages: true, text: {chooseFile: 'Foto...', browse: 'Scegli...'}})
var rx = new FileUploadWithPreview('rx', {showDeleteButtonOnImages: true, text: {chooseFile: 'Radiografie...', browse: 'Scegli...'}})
})

</script>
