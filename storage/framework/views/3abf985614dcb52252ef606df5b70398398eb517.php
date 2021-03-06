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
        data-idpaziente="<?php echo e($paziente->id); ?>" type="button" class="btn btn-outline-success"
        style="margin: 1%"> Aggiungi storia clinica
</button>
<br>


<div style="max-height: 23em; overflow-y: scroll">
     

            <div id='nuovastoria'></div>
             <?php $__currentLoopData = $paziente->storiaClinica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storiaclinica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div style="width: 95%">
                    <table class="table table-bordered">
                        <tbody id="tablestoriaclinica">
                        <tr>
                            <td class="datetd">
                                
                                       <input id="<?php echo e($storiaclinica->id); ?>datastoriaclinicadisbld"
                                       class="form-control customdate" type="date" name="datastoriaclinica[]"
                                       value="<?php if($storiaclinica->data): ?><?php echo e($storiaclinica->data); ?><?php endif; ?>">

                                

                                 <select class="form-control" id="<?php echo e($storiaclinica->id); ?>scdiagnosi1disbld" name="scdiagnosi1[]">
                                    <option disabled selected> diagnosi 1 </option>
                                    <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($a->diagnosi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <select class="form-control" id="<?php echo e($storiaclinica->id); ?>scdiagnosi2disbld" name="scdiagnosi2[]">
                                    <option disabled selected> diagnosi 2 </option>
                                    <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($a->diagnosi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </td>

                            <td>
                                <textarea class="miatextarea" id="<?php echo e($storiaclinica->id); ?>storiaclinicadisbld" class="form-control" rows="3"
                                          name="storiaclinica[]">
                                      <?php if($storiaclinica): ?><?php echo e($storiaclinica->storiaclinica); ?><?php endif; ?>
                                    </textarea>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div> 

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


           

        </div>

        

        <div class="tab-pane fade" id="alrgie" role="tabpanel" aria-labelledby="alrgie-tab">

            <div id="allergiepopup" style="width: 50%; margin-left: 1%">

                <br>
                <button id="btnnuovaall"   onclick="preparaAllergia(<?php echo e($allergie); ?>)"  data-titolo="Aggiungi nuova storia clinica"
            data-idpaziente="" type="button" class="btn btn-outline-success" style="margin: 1%" >+</button>

            <?php ($i = 0); ?>
                            <?php $__currentLoopData = $paziente->allergiePaziente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alPaz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <select style="margin-bottom: 1%; margin-top: 1%" class="form-control" id="allergie<?php echo e($i); ?>" name="allergie[]" onchange="aggiungiAllergia(this)">
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

                    <?php ($i++); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                



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

            <div id="medicinalipopup" class="row" style="width: 50%; margin-left: 1%">

                <?php $__currentLoopData = $paziente->medicinaliPaziente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medPaz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <select class="form-control" id="allergie" name="medicinali[]" onchange="nuovoMedicinale(<?php echo e($medicinali); ?>)">
                    <option disabled selected>medicinale</option>
                    <?php $__currentLoopData = $medicinali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($medPaz->medicinale_id == $m->id): ?>
                            <option value="<?php echo e($m->id); ?>" selected><?php echo e($m->nome); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($m->id); ?>"><?php echo e($m->nome); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <br>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <select class="form-control" id="medicinali" name="medicinali[]" onchange="nuovoMedicinale(<?php echo e($medicinali); ?>)">
                    <option disabled selected>medicinale</option>
                    <?php $__currentLoopData = $medicinali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($m->id); ?>"><?php echo e($m->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select> 
<br>
            <div id="nuovomed"></div>
        </div>


        </div>
    </div>
</div>

<script>
 


</script>
