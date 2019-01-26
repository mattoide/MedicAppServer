 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('allergie.modalaggiungiallergie', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('allergie.modalmodificaallergie', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('allergie.modaleliminaallergie', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>




        <div class="container-fluid" style="margin-top: 1%">
                <div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
                        <button id="nuovaallergia" name="nuovaallergia" onclick="" type="button" class="btn btn-success"
                            data-toggle="modal" data-target="#modalaggiungiallergia" data-titolo="Aggiungi nuova allergia">+ aggiungi allergia
                        </button>
                    </div>
        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 90%">Allergia</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            <?php $__currentLoopData = $allergie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($a->allergia); ?></td>

                <td>
                        <button id="modificaallergia" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificaallergia" data-titolo="Modifica allergia" data-allergia="<?php echo e($a); ?>"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="<?php echo e($a->id); ?>" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminaallergia" data-titolo="Conferma eliminazione allergia" data-messaggioinizio="Vuoi eliminare l' allergia"
                    data-messaggiometa="<?php echo e($a->allergia); ?>" data-messaggiofine="?" data-idallergia="<?php echo e($a->id); ?>">
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