 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reminder.modalaggiungireminder', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('reminder.modalmodificareminder', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('reminder.modaleliminareminder', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="container-fluid" style="margin-top: 1%">

    
<div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">
        <button id="nuovareminder" name="nuovareminder" onclick="" type="button" class="btn btn-success"
            data-toggle="modal" data-target="#modalaggiungireminder" data-titolo="Aggiungi nuovo reminder">+ aggiungi reminder
        </button>
    </div>
        <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th scope="col" style="width: 10%">Reminder</th>
                <th scope="col" style="width: 60%" >Testo</th>
                <th scope="col" >Attivato dopo mesi</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        
        <tbody id="myTable">

            <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($a->nomereminder); ?></td>
                <td><?php echo e($a->testoreminder); ?></td>
                <td><?php echo e($a->dopomesi); ?></td>

                <td>
                        <button id="modificareminder" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificareminder" data-titolo="Modifica reminder" data-reminder="<?php echo e($a); ?>"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="<?php echo e($a->id); ?>" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminareminder" data-titolo="Conferma eliminazione reminder" data-messaggioinizio="Vuoi eliminare il reminder"
                    data-messaggiometa="<?php echo e($a->nomereminder); ?>" data-messaggiofine="?" data-idreminder="<?php echo e($a->id); ?>">
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