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


    <div class="tab-content" style="max-height: 23em; overflow-y: scroll" id="myTabContent">
        <!-- TAB STORIA CLINICA-->
        <div class="tab-pane fade show active" id="storiaclinica" role="tabpanel" aria-labelledby="storiaclinica-tab">

            <button id="nuovastoria" name="nuovastoria" data-toggle="modal" data-target="#modalaggiungistoria"
                    data-titolo="Aggiungi nuova storia clinica"
                    data-idpaziente="<?php echo e($paziente->id); ?>" type="button" class="btn btn-outline-success"
                    style="margin: 1%">+
            </button>

            <div id='nuovastoria'></div>
            <?php $__currentLoopData = $paziente->storiaClinica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storiaclinica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div style="width: 95%">
                    <table class="table table-bordered">
                        <tbody id="tablestoriaclinica">
                        <tr>
                            <td class="datetd">
                                <input id="<?php echo e($storiaclinica->id); ?>datastoriaclinicadisbld"
                                       class="form-control customdate" type="text" name="datastoriaclinicaa"
                                       value="<?php if($storiaclinica->data): ?><?php echo e($storiaclinica->created_at->formatLocalized('%B %Y')); ?><?php endif; ?>">
                                <p id="<?php echo e($storiaclinica->id); ?>scdiagnosi1disbld"></p>
                                <p id="<?php echo e($storiaclinica->id); ?>scdiagnosi2disbld"></p>

                                

                            </td>

                            <td>
                                <textarea id="<?php echo e($storiaclinica->id); ?>storiaclinicadisbld" class="form-control" rows="3"
                                          name="storiaclinicaa">
                                      <?php if($storiaclinica): ?><?php echo e($storiaclinica->storiaclinica); ?><?php endif; ?>
                                    </textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        

        <div class="tab-pane fade" id="alrgie" role="tabpanel" aria-labelledby="alrgie-tab">

            <div style="width: 50%">

                <?php $__currentLoopData = $paziente->allergiePaziente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alPaz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaallergia()">
                        <option disabled selected>allergia</option>
                        <?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($alPaz->allergia); ?> // <?php echo e($a); ?></p>
                            <?php if($alPaz->allergia == $a->allergia): ?>
                                <option selected><?php echo e($alPaz->allergia); ?></option>
                            <?php else: ?>
                                <option><?php echo e($a->allergia); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <select class="form-control" id="allergie" name="allergie[]" onchange="nuovaallergia()">
                    <option disabled selected>allergia</option>
                    <?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($a->allergia); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>


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
            <br> 
            <div class="row" style="width: 90%">
                <div class="col-10">
                    <input type="text" class="form-control custominputnotifica" placeholder="testo" name="esercizio">
                </div>
                <div class="col">
                    <button style="float:right" type="button" class="btn btn-light">invia notifica</button>

                </div>
            </div>

            <br>

            <div class="row" style="width: 50%">

                <select class="form-control" id="medicinali" name="medicinali[]" onchange="nuovomedicinale()">
                    <option disabled selected>medicinale</option>
                    <?php $__currentLoopData = $medicinali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($m->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <br>
                <div id="nuovomed"></div>
            </div>


        </div>
    </div>
</div>

<script>

    allergieSelezionate = [];
    allergie = document.getElementsByName("allergie[]");
    allergie.forEach(allergia => allergieSelezionate.push(allergia.value));

    function nuovaallergia() {
        allergie = document.getElementsByName("allergie[]");
        allergie.forEach(function (allergia, indice, array) {
            if (indice === array.length - 1) {
                if (!allergieSelezionate.includes(allergia.value)) {
                    var alrgia = "<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia()><option disabled selected>allergia</option><?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($a->allergia); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select> <br>"
                    $('#nuovaall').append(alrgia);
                    allergieSelezionate.push(allergia.value)
                } else {
                    alert("Allergia: " + allergia.value + " gia selezionata")
                    allergia.value = 'allergia';
                }
            }
        });

    }

    /* function nuovaallergia(id) {
         var a = '#' + id;
         val = $(a).val()

         var elem = document.getElementsByTagName('select');
         for (var i = 0; i < elem.length; i++) {
             if (elem[i].id == a) {
                 if (elem[i].val() == val)
                     alert('gia inserito')
                 return;
             }
         }

 */
    /*
            $.ajax({
                url: '/nuovaallergiapaziente',
                type: 'post',
                data: {
                    allergia: val,
                    idpaz: id_paz
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data, status) {
                    console.log(status + '\n' + data)
                    if (data != 'success') {
                        // alert(data)
                        // <?php echo e($errors = 'data'); ?>

    alert(<?php echo e($errors); ?>)
                } else {
                    $(a).attr('id', 'disbld')

                    var elem = document.getElementsByTagName('select');
                    for (var i = 0; i < elem.length; i++) {
                        if (elem[i].id == 'disbld')
                            elem[i].setAttribute('disabled', 'disabled');
                    }
                    var alrgia = "<select class=form-control id=allergiedio name=allergie[] onchange=nuovaallergia(this.id)><option disabled selected>allergia</option><?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($a->allergia); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select> <br>"
                    $('#nuovaall').append(alrgia);
                }
            },
            error: function (data, status) {
                console.log(status + '\n' + data)

            },
            complete: function (data, status) {
            }
        });

        // var alrgia ="<select class=form-control id=allergiedio name=allergie onchange=nuovaallergia(this.id)><option disabled selected>allergia</option><?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option><?php echo e($a->allergia); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select> <br>"
        // $('#nuovaall').append(alrgia);
    }*/

</script>
