<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link navtext-tab active" id="storiaclinica-tab" data-toggle="tab" href="#storiaclinica" role="tab" aria-controls="storiaclinica"
            aria-selected="true">Storia Clinica</a>
    </li>

    <li class="nav-item">
        <a class="nav-link navtext-tab" id="interventi-tab" data-toggle="tab" href="#interventi" role="tab" aria-controls="interventi"
            aria-selected="false">Interventi</a>
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


    <div class="tab-content" style="max-height: 23em; overflow-y: scroll" id="myTabContent">
        <!-- TAB STORIA CLINICA-->
        <div class="tab-pane fade show active" id="storiaclinica" role="tabpanel" aria-labelledby="storiaclinica-tab">

                <button id="nuovastoria" name="nuovastoria" data-toggle="modal" data-target="#modalaggiungistoria" data-titolo="Aggiungi nuova storia clinica"
                data-idpaziente="{{$paziente->id}}" type="button" class="btn btn-outline-success" style="margin: 1%">+</button>

            <div id='nuovastoria'></div>
            @foreach ($paziente->storiaClinica as $storiaclinica)

            <div style="width: 95%">
                <table class="table table-bordered">
                    <tbody id="tablestoriaclinica">
                        <tr>
                            <td class="datetd">
                                <input id="{{$storiaclinica->id}}datastoriaclinicadisbld" class="form-control customdate" type="text" name="datastoriaclinicaa" value="@if($storiaclinica->data){{$storiaclinica->created_at->formatLocalized('%B %Y')}}@endif">
                               <p id="{{$storiaclinica->id}}scdiagnosi1disbld"></p>
                               <p id="{{$storiaclinica->id}}scdiagnosi2disbld"></p>

                                {{-- <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi1disbld" name="scdiagnosi1" >
                                    <option disabled selected> diagnosi 1 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select>      

                                <select class="form-control" id="{{$storiaclinica->id}}scdiagnosi2disbld" name="scdiagnosi2" >
                                    <option disabled selected> diagnosi 2 </option>
                                    @foreach ($diagnosi as $a)
                                    <option>{{$a->diagnosi}}</option>
                                    @endforeach
                                </select>  --}}
                    
                            </td>

                            <td>
                                <textarea id=""{{$storiaclinica->id}}storiaclinicadisbld" class="form-control" rows="3" name="storiaclinicaa">
                                      @if($storiaclinica){{$storiaclinica->storiaclinica}}@endif
                                    </textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @endforeach
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
                                <textarea class="form-control" id="clinic-story-input" rows="3" name="intervento" value=""></textarea>
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
            <br>

            <div class="row">
                <div class="col-2">
                    <input type="time" class="form-control custominputnotifica" placeholder="orari esercizi" name="oraesercizio">
                </div>
                <div class="col">
                    <input type="text" class="form-control custominputnotifica" placeholder="testo" name="esercizio">
                </div>
                <button style="float:right" type="button" class="btn btn-light">invia notifica</button>
            </div>


        </div>
    </div>
</div>

<script>
    function nuovastoria(){
        var storia = '<div style="width: 90%"><table class="table table-bordered"><tbody id="tablestoriaclinica"><tr><td class="datetd"><input class="form-control" type="date" name="datastoriaclinica[]" value="" required></td><td><textarea class="form-control" rows="3" name="storiaclinica[]"  value="" required></textarea></td></tr></tbody></table></div>';
    $('#nuovastoria').append(storia);

}

</script>