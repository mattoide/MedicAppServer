<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="storiaclinica-tab" data-toggle="tab" href="#storiaclinica" role="tab"
           aria-controls="storiaclinica" aria-selected="true">Storia Clinica</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="interventi-tab" data-toggle="tab" href="#interventi" role="tab"
           aria-controls="interventi" aria-selected="false">Interventi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="foto-tab" data-toggle="tab" href="#foto" role="tab" aria-controls="foto"
           aria-selected="false">Foto</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="rx-tab" data-toggle="tab" href="#rx" role="tab" aria-controls="rx"
           aria-selected="false">Rx</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="app-tab" data-toggle="tab" href="#app" role="tab" aria-controls="app"
           aria-selected="false">App</a>
    </li>
</ul>



<div class="tab-content" id="myTabContent">
    <!-- TAB STORIA CLINICA-->
    <div class="tab-pane fade show active" id="storiaclinica" role="tabpanel"
         aria-labelledby="storiaclinica-tab">
        <br>

        <table class="table table-bordered">
            <tbody id="tablestoriaclinica">
            <tr>

                <td class="datetd">
                    <input class="form-control" type="date" id="date-input" name="clinicstorydate">
                </td>

                <td>
                                <textarea class="form-control" id="clinic-story-input" rows="3"
                                          name="clinicstory"></textarea>

                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <!-- TAB INTERVENTI-->

    <div class="tab-pane fade" id="interventi" role="tabpanel" aria-labelledby="interventi-tab">
        <br>
        <table class="table table-bordered">
            <tbody id="tablestoriaclinica">
            <tr>
                <td class="datetd">
                    <div class="form-group">
                        <input class="form-control" type="date" id="date-input" name="interventiondate">
                    </div>
                </td>

                <td>
                    <div class="form-group">
                                    <textarea class="form-control" id="clinic-story-input" rows="3"
                                              name="intervention"></textarea>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- TAB FOTO-->
    <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">

        <br>

        <div class="form-group">
            <label class="btn btn-success">
                Aggiungi immagini <input type="file" class="form-control-file" id="image" name="image"
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
                Aggiungi radiografie<input type="file" class="form-control-file" id="image" name="image"
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
            <div class="col">
            
                <input type="text" class="form-control" placeholder="orari esercizi">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="testo">
            </div>
            <button style="float:right" type="button" class="btn btn-light">invia notifica</button>

        </div>


    </div>
