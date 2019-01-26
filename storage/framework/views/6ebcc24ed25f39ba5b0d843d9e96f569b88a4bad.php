 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('medicinali.modalaggiungimedicinale', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('medicinali.modalmodificamedicinale', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('medicinali.modaleliminamedicinale', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>




        <div class="container-fluid" style="margin-top: 1%">
            
<div class="row" style="float:right; margin-bottom: 2%; margin-right: 1%">

        <button id="nuovomedicinale" name="nuovomedicinale" onclick="" type="button" class="btn btn-success"
            data-toggle="modal" data-target="#modalaggiungimedicinale" data-titolo="Nuovo Medicinale">+ aggiungi medicinale
        </button>
    </div>

    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Medicinale</th>
                <th scope="col">Dosaggio</th>
                <th scope="col">Posologia</th>
                <th scope="col">Durata terapia</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            <?php $__currentLoopData = $medicinali; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicinale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($medicinale->nome); ?></td>
                <td><?php echo e($medicinale->dosaggio); ?></td>
                <td><?php echo e($medicinale->posologia); ?></td>
                <td><?php echo e($medicinale->durata_terapia); ?></td>

                <td>
                        <button id="modalmodificamedicinale" onclick="" type="button" class="btn btn-icn" data-toggle="modal"
                        data-target="#modalmodificamedicinale" data-titolo="Modifica medicinale" data-medicinale="<?php echo e($medicinale); ?>"><i class="far fa-edit cstm-icn"></i>
                    </button>

                    <button id="<?php echo e($medicinale->id); ?>" type="submit" onclick="" type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#modaleliminamedicinale" data-titolo="Conferma eliminazione medicinale" data-messaggioinizio="Vuoi eliminare il medicinale"
                    data-messaggiometa="<?php echo e($medicinale->nome); ?>" data-messaggiofine="?" data-idmedicinale="<?php echo e($medicinale->id); ?>">
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