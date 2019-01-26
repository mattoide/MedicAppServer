 
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('pazienti.modifica.modalaggiungistoriaclincia', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="container-fluid" style="margin-top: 2%">
    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="/modificapaziente">
        <?php echo e(csrf_field()); ?>

        <h6 data-toggle="collapse" href="#collapseAnagraficaEdit" aria-expanded="false" aria-controls="collapseAnagraficaEdit">ANAGRAFICA +</h6>
        
        <hr>

        <div class="collapse show" id="collapseAnagraficaEdit">


            <div class="row formrow">
                <div class="col">
                    <input id="we" type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo e($paziente->nome); ?>" maxlength="32"
                        required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Cognome" name="cognome" value="<?php echo e($paziente->cognome); ?>" maxlength="32"
                        required>
                </div>

                <div class="col-1">
                    
                    <select class="form-control" id="sesso" name="sesso" value="<?php echo e($paziente->sesso); ?>" required>
                            <option disabled selected value> -- M/F -- </option>
                            <option>F</option>
                            <option>M</option>
                        </select>
                </div>


                <div class="col">
                    <input type="date" class="form-control" placeholder="Data di nascita" name="datadinascita" value="<?php echo e($paziente->datadinascita); ?>"
                        onchange="calcolaEta(this.value)" required>
                </div>

                <div class="col-1">
                    <!-- <input id='eta' type="number" class="form-control" placeholder="Età" name="eta" value="<?php echo e(old('eta')); ?>" min="0" disabled>-->
                    <p id='eta'>anni</p>

                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" value="<?php echo e($paziente->recapitiPaziente->indirizzo); ?>"
                        required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Città" name="citta" value="<?php echo e($paziente->recapitiPaziente->citta); ?>" required>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Paese" name="paese" value="<?php echo e($paziente->recapitiPaziente->paese); ?>" required>
                </div>

                <div class="col">
                    <input type="number" class="form-control" placeholder="Zip" name="cap" value="<?php echo e($paziente->recapitiPaziente->cap); ?>" min="0"
                        required>
                </div>
            </div>


            <div class="row formrow">

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 1" name="tel1" value="<?php echo e($paziente->recapitiPaziente->tel1); ?>" maxlength="11"
                        required>
                </div>

                <div class="col">
                    <input type="tel" class="form-control" placeholder="Tel 2" name="tel2" value="<?php echo e($paziente->recapitiPaziente->tel2); ?>" maxlength="11">
                </div>
            </div>

            <div class="row formrow">
                <div class="col">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo e($paziente->recapitiPaziente->email); ?>"
                        required>
                </div>
                <div class="col">
                    <input id='pass' type="password" class="form-control" placeholder="Password" name="password" onchange="verificaPass()" minlength="4"
                        maxlength="16" required value="<?php echo e($paziente->password); ?>">
                    <input id='passv' type="password" class="form-control" placeholder="Password" name="password" onchange="verificaPass()" minlength="4"
                        maxlength="16" required value="<?php echo e($paziente->password); ?>" hidden>
                </div>
                <div class="col">
                    <input id='repass' type="password" class="form-control" placeholder="Ripeti password" name="repassword" onchange="verificaPass()"
                        minlength="4" maxlength="16" required value="<?php echo e($paziente->password); ?>">
                    <input id='repassv' type="password" class="form-control" placeholder="Ripeti password" name="repassword" onchange="verificaPass()"
                        minlength="4" maxlength="16" required value="<?php echo e($paziente->password); ?>" hidden>
                </div>
            </div>

            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Centro visita" name="centrovisita" value="<?php echo e($paziente->recapitiPaziente->centrovisita); ?>"
                        required>
                </div>

                <div class="col">
                    <!--<input type="text" class="form-control" placeholder="Tipo documento" name="tipodocumento" value="<?php echo e(old('tipodocumento')); ?>">-->
                    <select class="form-control" id="tipodocumento" name="tipodocumento" required>
                        <option disabled selected value> -- seleziona tipo di documento -- </option>
                        <option>Carta d' Identità</option>
                        <option>Patente</option>
                        <option>Codice Fiscale</option>
                    </select>
                </div>


                <div class="col">
                    <input type="text" class="form-control" placeholder="ID documento" name="iddocumento" value="<?php echo e($paziente->recapitiPaziente->iddocumento); ?>"
                        required>
                </div>
            </div>


            <div class="row formrow">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Medico curante" name="medicocurante" value="<?php if($paziente->medico): ?><?php echo e($paziente->medico->nome); ?><?php endif; ?>">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Recapito medico curante" name="recapitomedicocurante" value="<?php if($paziente->medico): ?><?php echo e($paziente->medico->recapito); ?><?php endif; ?>">
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="Contatto medico curante" name="contattomedicocurante" value="<?php if($paziente->medico): ?><?php echo e($paziente->medico->contatto); ?><?php endif; ?>">
                </div>
            </div>
        </div>

        <h6 data-toggle="collapse" href="#collapseDiagnosiEdit" aria-expanded="false" aria-controls="collapseDiagnosiEdit">DIAGNOSI +</h6>
        <hr>

        <div class="collapse show" id="collapseDiagnosiEdit">


            <div class="container" style="margin-left: 3%!important;">

                <div class="row formrow">

                    <select class="form-control" id="diagnosi1" name="diagnosi1">
                            <option disabled selected> diagnosi 1 </option>
                            <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($a->diagnosi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    <select class="form-control" id="diagnosi2" name="diagnosi2">
                                <option disabled selected value> diagnosi 2 </option>
                                <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($a->diagnosi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                    <select class="form-control" id="diagnosi3" name="diagnosi3">
                                    <option disabled selected> diagnosi 3 </option>
                                    <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($a->diagnosi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select> 
                </div>
            </div>

        </div>
    <?php echo $__env->make('pazienti.modifica.tabsmodificapaziente', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <button type="button" onclick="abilitaTutto()" class="btn btn-success">Modifica</button>
        <button name="idpaz" id="idpaz" value="<?php echo e($paziente->id); ?>" type="submit" class="btn btn-warning" disabled>Salva modifiche</button>
        <button type="button" onclick="refresh()" class="btn btn-danger">Annulla modifiche</button>

    </form>
</div>

<script>
    $(document).ready(function () {

    disabilitaTutto();
    calcolaEta('<?php echo e($paziente->datadinascita); ?>');
    
    <?php if($paziente->diagnosi1): ?>
        var dia1 ='<?php echo e($paziente->diagnosi1->diagnosi); ?>'
        $('#diagnosi1').val(dia1)
    <?php endif; ?>

    <?php if($paziente->diagnosi2): ?>
        var dia2 ='<?php echo e($paziente->diagnosi2->diagnosi); ?>'
        $('#diagnosi2').val(dia2)
    <?php endif; ?>

    <?php if($paziente->diagnosi3): ?>
        var dia3 ='<?php echo e($paziente->diagnosi3->diagnosi); ?>'
        $('#diagnosi3').val(dia3)
    <?php endif; ?>


<?php $__currentLoopData = $paziente->storiaClinica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($sc->diagnosi1): ?>
        var scdia1 ='<?php echo e($sc->diagnosi1); ?>'
        var scc1 =  '<?php echo e($sc->id); ?>'+'scdiagnosi1disbld';
        console.log(scc1)
        $('#'+scc1).text(scdia1)   
    <?php endif; ?>

    <?php if($sc->diagnosi2): ?>
        var scdia2 ='<?php echo e($sc->diagnosi2); ?>'
        var scc2 =  '<?php echo e($sc->id); ?>'+'scdiagnosi2disbld';
        console.log(scdia2)
        $('#'+scc2).text(scdia2)   
    <?php endif; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   

})

function refresh(){
    location.reload();

}

    function abilitaTutto(){

    var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {

            if(!inputs[i].id.includes('disbld'))
    inputs[i].removeAttribute('disabled');
}

var inputs = document.getElementsByTagName("select");
        for (var i = 0; i < inputs.length; i++) {
            if(!inputs[i].id.includes('disbld'))
            inputs[i].removeAttribute('disabled');
}

var inputs = document.getElementsByTagName("textarea");
        for (var i = 0; i < inputs.length; i++) {

            if(!inputs[i].id.includes('disbld'))
            inputs[i].removeAttribute('disabled');
}

$('#idpaz').removeAttr('disabled');

$('#pass').attr('disabled','disabled');
$('#repass').attr('disabled','disabled');
$('#nuovastoria').removeAttr('disabled');


}
    function disabilitaTutto(){

        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'datastoriaclinicam')
            inputs[i].setAttribute("disabled", "disabled");
}

var inputs = document.getElementsByTagName("select");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'scdiagnosi1m' && inputs[i].id != 'scdiagnosi2m')
            inputs[i].setAttribute("disabled", "disabled");
            else 
                inputs[i].removeAttribute("disabled");

}

var inputs = document.getElementsByTagName("textarea");
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].id != 'storiaclinicam')
             inputs[i].setAttribute("disabled", "disabled");
}

let a = "<?php echo e($paziente->recapitiPaziente->tipodocumento); ?>";
let b = a.replace('&#039;', '\'')

$('#tipodocumento').val(b)
$('#sesso').val("<?php echo e($paziente->sesso); ?>")
$('#nuovastoria').attr('disabled', 'disabled');
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>