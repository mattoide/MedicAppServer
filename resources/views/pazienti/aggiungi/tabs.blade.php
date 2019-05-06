<ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
        <a class="nav-link navtext-tab active" id="storiaclinica-tab" data-toggle="tab" href="#storiaclinica" role="tab" aria-controls="storiaclinica"
            aria-selected="true">Storia Clinica</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="alrgie-tab" data-toggle="tab" href="#alrgie" role="tab" aria-controls="alrgie" aria-selected="true">Allergie</a>
</li>

<li class="nav-item">
    <a class="nav-link navtext-tab" id="diagnsi-tab" data-toggle="tab" href="#diagnsi" role="tab" aria-controls="diagnsi" aria-selected="true">Diagnosi</a>
</li>

<li class="nav-item">
    <a class="nav-link navtext-tab" id="interventi-tab" data-toggle="tab" href="#interventi" role="tab" aria-controls="interventi"
        aria-selected="false">Interventi</a>
</li>

<li class="nav-item">
    <a class="nav-link navtext-tab" id="reminder-tab" data-toggle="tab" href="#remindr" role="tab" aria-controls="remindr"
        aria-selected="false">Reminders</a>
</li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="rx-tab" data-toggle="tab" href="#rx" role="tab" aria-controls="rx" aria-selected="false">Rx</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="app-tab" data-toggle="tab" href="#app" role="tab" aria-controls="app" aria-selected="false">App</a>
    </li>
</ul>

<div class="container tabcontent-custom">
    <div class="tab-content" id="myTabContent" >

        <!-- TAB STORIA CLINICA-->
        <div class="tab-pane fade show active" id="storiaclinica" role="tabpanel" aria-labelledby="storiaclinica-tab">


             <button id="nuovastoria" name="nuovastoria" onclick="nuovastoriaa()"  data-titolo="Aggiungi nuova storia clinica"
            data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">Aggiungi storia clinica</button>
            <br>


            <div style="max-height: 23em; overflow-y: scroll">
           
        <div id='nuovastoriaaa'></div>
            {{-- <div style="width: 90%">
                <table class="table table-bordered">
                    <tbody id="tablestoriaclinica">
                        <tr>
                            <td class="datetd">
                                <input class="form-control" type="date" id="datastoriaclinica" name="datastoriaclinica[]" value="{{old('datastoriaclinica')}}">
                                <select class="form-control" id="scdiagnosi1" name="scdiagnosi1[]">
                                    <option disabled selected> diagnosi 1 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select> 
                                <select class="form-control" id="scdiagnosi2" name="scdiagnosi2[]">
                                    <option disabled selected> diagnosi 2 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select> 
                            </td>

                            <td>
                                <textarea class="form-control" rows="3" name="storiaclinica[]" value="{{old('storiaclinica')}}" onchange="insertdate(this.value)"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div>
        </div>

        {{-- TAB ALLERGIE --}}

        <div class="tab-pane fade" id="alrgie" role="tabpanel" aria-labelledby="alrgie-tab">

                <div id="allergiepopup" style="width: 50%; margin-left: 1%">

                    <br>
                <button id="btnnuovaall"   onclick="preparaAllergia({{$allergie}})"  data-titolo="Aggiungi nuova storia clinica"
                data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>

                {{-- <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaAllergiaa({{$allergie}}, this)" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                    <option disabled selected>allergia</option>
                    @foreach ($allergie as $a)
                    <option>{{$a->allergia}}</option>
                    @endforeach
                </select>  --}}
                <div class="row">
                        <div class="col">
                            <div id="nuovaall">
                                
                            </div>
                    
                        </div>
                        <div class="col">
                            <div id="nuovaalldel" style="width: 10%"></div>
                    
                        </div>
                </div>       
                
                </div>

            
        </div>

                {{-- TAB DIAGNOSI --}}

                <div class="tab-pane fade" id="diagnsi" role="tabpanel" aria-labelledby="diagnsi-tab">

                    <div id="diagnosipopup" style="width: 50%; margin-left: 1%">
    
                        <br>
                    <button id="btnnuovadiagncat"   onclick="preparaDiagnosiCategoria({{$diagnosi}})"  data-titolo="Aggiungi nuova diagnosi"
                    data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>
    
                    {{-- <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaAllergiaa({{$allergie}}, this)" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                        <option disabled selected>allergia</option>
                        @foreach ($allergie as $a)
                        <option>{{$a->allergia}}</option>
                        @endforeach
                    </select>  --}}
                    <div class="row">
                        <div class="col">
                            <div id="nuovadiagncat">

                            </div>
                    </div>
                        <div class="col">
                            <div id="nuovadiagn">

                            </div>
                        </div>
                        <div class="col">
                            <div id="deldiagn" style="width: 10%">

                            </div>

                            <input type="text" id="diagnosi1s" name="diagnosi1" hidden>
                    <input type="text" id="diagnosi2s" name="diagnosi2" hidden>
                        </div>
                    </div>
                </div>
    
                
            </div>


        <!-- TAB INTERVENTI-->

        <div class="tab-pane fade" id="interventi" role="tabpanel" aria-labelledby="interventi-tab">

            <button id="btnnuovointervento" name="nuovointerventoz" onclick="nuovointerventoo()"  data-titolo="Aggiungi nuovo intervento"
            type="button" class="btn btn-outline-success" style="margin: 1%">Aggiungi intervento</button>
            <br>


            <div style="max-height: 23em; overflow-y: scroll">
           
        <div id='nuovointervento'></div>

            
    </div>
</div>

              {{-- TAB REMINDER --}}

              <div class="tab-pane fade" id="remindr" role="tabpanel" aria-labelledby="remindr-tab">
                <div id="reminderpopup" style="width: 50%; margin-left: 1%">
                    <br>
                <button id="btnnuovoreminder"   onclick="preparaReminder({{$reminder}})" 
                data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>

                {{-- <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaAllergiaa({{$allergie}}, this)" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                    <option disabled selected>allergia</option>
                    @foreach ($allergie as $a)
                    <option>{{$a->allergia}}</option>
                    @endforeach
                </select>  --}}
                <div class="row">
                    <div class="col"> <div id="nuovoreminder"></div></div>
                    <div class="col"> <div id="datanuovoreminder"></div></div>
                    <div class="col"> <div id="delnuovoreminder"  style="width: 10%"></div></div>
                </div>
             </div>
            </div>
        

        <!-- TAB FOTO-->
        <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
            <br>
            {{-- <div class="form-group">
                <label class="btn btn-success">
                    Aggiungi immagini <input type="file" class="form-control-file" id="foto" name="foto"
                                             multiple accept="image/x-png ,image/jpeg" style="display:none;"
                                             onchange="$('#upload-file-info').html(this.files.length + ' File' )">
                </label>
                <span class='label label-info' id="upload-file-info"></span>

            </div> --}}

            <div class="custom-file-container" data-upload-id="fta">
                <label>Aggiungi immagini <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File" name="foto[]">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
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
                <div class="custom-file-container" data-upload-id="rxa">
                    <label>Aggiungi immagini <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File" name="radiografie[]">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        </div>


        <!-- TAB APP-->
        <div class="tab-pane fade" id="app" role="tabpanel" aria-labelledby="app-tab">

            <br>


            <button type="button" class="btn btn-success" disabled>Avvia</button>
            <button type="button" class="btn btn-danger" disabled>Blocca App</button>


            <br>
            <br>
            <br>

                {{-- <div class="col-2">
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

            <div id="medicinalipopup" class="row" style="width: 50%; margin-left: 1%"> </div>

                <h3><span class="badge mybadge">Medicinali</span></h3>

                <button id="btnnuovomed"  onclick="creaMedicinale({{$medicinali}})" type="button" class="btn btn-outline-success" style="margin: 1%" >+</button>

        <div class="row">
            <div class="col">
                <div id="nuovomed">
                </div>
            </div>
            <br>
            <div class="col">
                <div id="delnuovomed" style="width: 10%">
                </div>
            </div>
        </div>     
        
        
            <br>

            <div  class="row" style="width: 50%; margin-left: 1%"></div>


            <h3><span class="badge mybadge">Protocolli</span></h3>

            <div class="row">
                    <div class="col">
                                    <select class="form-control" id="protocollo" name="protocollo" >
                <option disabled selected>protocolli</option>
                @foreach ($protocolli as $prot)
                <option value="{{$prot->id}}">{{$prot->nome}}</option>
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



    function insertdate(val){
       let testo = $.trim(val)
       if(testo.length > 0){
        var date = new Date();
        var currentDate = date.toISOString().slice(0,10);
        $('#datastoriaclinica').val(currentDate);
       } else {
        $('#datastoriaclinica').val('');
       }
    }

    function nuovastoriaa(){

        var lng = document.getElementsByName("storiaclinica[]").length
        var storia = "<div id=storiaclinica"+lng+" style=width: 90%> <table class=table table-bordered> <tbody id=tablestoriaclinica> <tr> <td class=datetd> <input class=form-control type=date value=<?php echo date('Y-m-d'); ?> id=datastoriaclinica name=datastoriaclinica[] required> <select class=form-control id=scdiagnosi1 name=scdiagnosi1[] > <option disabled selected> diagnosi 1 </option> @foreach ($diagnosiSpec as $a)<option>{{$a->diagnosi}}</option>@endforeach </select>  <select class=form-control id=scdiagnosi2 name=scdiagnosi2[]> <option disabled selected> diagnosi 2 </option>@foreach ($diagnosiSpec as $a) <option>{{$a->diagnosi}}</option>  @endforeach</select>  </td> <td> <textarea  class=miatextara rows=3 name=storiaclinica[] value='{{old('storiaclinica')}}' onchange=insertdate(this.value) required></textarea> <button onclick=deleteStoriaClinica("+'storiaclinica'+lng+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button></td>  </tr> </tbody></table> </div>";
        $('#nuovastoriaaa').append(storia);

    }

    function nuovointerventoo(){

        var lng = document.getElementsByName("intervento[]").length
        var intervento= "<div id=intervento"+lng+" style=width: 90%> <table class=table table-bordered> <tbody id=tableintervento> <tr> <td class=datetd> <input class=form-control type=date value=<?php echo date('Y-m-d'); ?> id=dataintervento name=dataintervento[] required> <select class=form-control id=intdiagnosi1 name=intdiagnosi1[] > <option disabled selected> diagnosi 1 </option> @foreach ($diagnosiSpec as $a)<option>{{$a->diagnosi}}</option>@endforeach </select>  <select class=form-control id=intdiagnosi2 name=intdiagnosi2[]> <option disabled selected> diagnosi 2 </option>@foreach ($diagnosiSpec as $a) <option>{{$a->diagnosi}}</option>  @endforeach</select>  </td> <td> <textarea  class=miatextara rows=3 name=intervento[] value='{{old('intervento')}}' onchange=insertdate(this.value) required></textarea> <button onclick=deleteIntervento("+'intervento'+lng+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button></td>  </tr> </tbody></table> </div>";
        $('#nuovointervento').append(intervento);
    }

    
$(document).ready(function () {

var fta = new FileUploadWithPreview('fta', {showDeleteButtonOnImages: true, text: {chooseFile: 'Foto...', browse: 'Scegli...'}})
var rxa = new FileUploadWithPreview('rxa', {showDeleteButtonOnImages: true, text: {chooseFile: 'Radiografie...', browse: 'Scegli...'}})
})
    
</script>
