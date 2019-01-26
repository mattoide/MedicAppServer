 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('diagnosi.modalaggiungidiagnosi', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('diagnosi.modalmodificadiagnosi', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('diagnosi.modaleliminadiagnosi', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>




        <div class="container-fluid" style="margin-top: 1%">
                <div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
                        <button id="nuovadiagnosi" name="nuovadiagnosi" onclick="" type="button" class="btn btn-success"
                            data-toggle="modal" data-target="#modalaggiungidiagnosi" data-titolo="Aggiungi nuova diagnosi">+ aggiungi diagnosi
                        </button>
                    </div>

        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 90%">Diagnosi</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($d->diagnosi); ?></td>

                <td>
                        <button id="modificadiagnosi" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificadiagnosi" data-titolo="Modifica diagnosi" data-diagnosi="<?php echo e($d); ?>"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="<?php echo e($d->id); ?>" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminadiagnosi" data-titolo="Conferma eliminazione diagnosi" data-messaggioinizio="Vuoi eliminare la diagnosi"
                    data-messaggiometa="<?php echo e($d->diagnosi); ?>" data-messaggiofine="?" data-iddiagnosi="<?php echo e($d->id); ?>">
                    <i class="far fa-times-circle cstm-icn"></i>
                        </button>
                </td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.standard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>