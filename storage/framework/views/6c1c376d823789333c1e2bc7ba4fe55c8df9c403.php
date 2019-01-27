 
<?php $__env->startSection('content'); ?>


<div class="container-fluid" style="margin-top: 2%">
    <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <form method="POST" action="/nuovopaziente">
        <?php echo e(csrf_field()); ?>


        <div id="generalpopup">

        </div>
        <h6 data-toggle="collapse" href="#collapseAnagraficaAdd" aria-expanded="false" aria-controls="collapseAnagrafica">ANAGRAFICA +</h6>


            <hr >
          
        <div class="collapse show" id="collapseAnagraficaAdd">

        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" name="nome"  value="<?php echo e(old('nome')); ?>" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Cognome" name="cognome" value="<?php echo e(old('cognome')); ?>" maxlength="32" required>
            </div>

            <div class="col-1">
                
                <select class="form-control" id="sesso" name="sesso" required>
                            <option disabled selected value> -- M/F -- </option>
                            <option>F</option>
                            <option>M</option>
                        </select>
            </div>


            <div class="col">
                <input type="date" class="form-control" placeholder="Data di nascita" name="datadinascita" value="<?php echo e(old('datadinascita')); ?>"
                    onchange="calcolaEta(this.value)" required>
            </div>

            <div class="col-1">
                <!-- <input id='eta' type="number" class="form-control" placeholder="Età" name="eta" value="<?php echo e(old('eta')); ?>" min="0" disabled>-->
                <p id='eta'>anni</p>

            </div>
        </div>


        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Indirizzo" name="indirizzo" value="<?php echo e(old('indirizzo')); ?>" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Città" name="citta" value="<?php echo e(old('citta')); ?>" maxlength="32" required>
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Paese" name="paese" value="<?php echo e(old('paese')); ?>" maxlength="32" required>
            </div>

            <div class="col">
                <input type="number" class="form-control" placeholder="Zip" name="cap" value="<?php echo e(old('cap')); ?>" min="0" maxlength="10" required>
            </div>
        </div>


        <div class="row formrow">

            <div class="col">
                <input type="tel" class="form-control" placeholder="Tel 1" name="tel1" value="<?php echo e(old('tel1')); ?>" maxlength="11" required>
            </div>

            <div class="col">
                <input type="tel" class="form-control" placeholder="Tel 2" name="tel2" value="<?php echo e(old('tel2')); ?>"  maxlength="11">
            </div>
        </div>

        <div class="row formrow">
            <div class="col">
                <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>

            <div id="passpopup">

            </div>
            <div class="col">
                <input id='pass' type="password" class="form-control" placeholder="Password" name="password" minlength="4"
                    maxlength="16" required>
            </div>
            <div class="col">
                <input id='repass' type="password" class="form-control" placeholder="Ripeti password" name="repassword"
                    minlength="4" maxlength="16" required>
            </div>
        </div>

        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Centro visita" name="centrovisita" value="<?php echo e(old('centrovisita')); ?>" maxlength="64" required>
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
                <input type="text" class="form-control" placeholder="ID documento" name="iddocumento" value="<?php echo e(old('iddocumento')); ?>" maxlength="32" required>
            </div>
        </div>


        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Medico curante" name="medicocurante" value="<?php echo e(old('medicocurante')); ?>" maxlength="32">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Recapito medico curante" name="recapitomedicocurante" value="<?php echo e(old('recapitomedicocurante')); ?>" maxlength="32">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Contatto medico curante" name="contattomedicocurante" value="<?php echo e(old('contattomedicocurante')); ?>" maxlength="32">
            </div>
        </div>
    </div>

        <h6 data-toggle="collapse" href="#collapseDiagnosiAdd" aria-expanded="false" aria-controls="collapseDiagnosi" >DIAGNOSI +</h6>
        <hr >
          
        <div class="collapse show" id="collapseDiagnosiAdd">


        <div class="container" style="margin-left: 3%!important;">

            <div class="row formrow">
                <select class="form-control" id="diagnosi1" name="diagnosi1" >
                            <option disabled selected> diagnosi 1 </option>
                            <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option><?php echo e($a->diagnosi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                        <div class="row formrow">
                        <select class="form-control" id="diagnosi2" name="diagnosi2" >
                                <option disabled selected value> diagnosi 2 </option>
                                <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($a->diagnosi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                            <div class="row formrow">
                            <select class="form-control" id="diagnosi3" name="diagnosi3" >
                                    <option disabled selected> diagnosi 3 </option>
                                    <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($a->diagnosi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                         
            </div>

        </div>
          
    <?php echo $__env->make('pazienti.aggiungi.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        <button type="submit"  class="btn btn-success">Aggiungi</button>

        

    </form>
</div>
<?php $__env->stopSection(); ?>

<script>

</script>

<?php echo $__env->make('layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>