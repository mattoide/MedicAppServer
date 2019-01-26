 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pazienti.modaleliminapaziente', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        <div class="container-fluid" style="margin-top: 1%">
    
        <div class="row" style="float:right; margin-bottom: 2%;  margin-right: 1%">
                <button onclick="location.href = '/nuovopaziente';" type="button" class="btn btn-success">+ aggiungi paziente </button>
            </div>
    <table id="datatable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Paziente</th>
                <th scope="col">Diagnosi primaria</th>
                <th scope="col">Diagnosi secondara</th>
                <th scope="col">Sede visita</th>
                <th scope="col">ID Documento</th>
                <th scope="col">Creazione paziente</th>
                <th scope="col">#</th>



            </tr>
        </thead>
        <tbody id="myTable">

            <?php $__currentLoopData = $pazienti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paziente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($paziente->nome); ?> <?php echo e($paziente->cognome); ?></td>
                <td> <?php if($paziente->diagnosi1): ?><?php echo e($paziente->diagnosi1->diagnosi); ?><?php endif; ?> </td>
                <td> <?php if($paziente->diagnosi2): ?><?php echo e($paziente->diagnosi2->diagnosi); ?><?php endif; ?> </td>
                <td><?php echo e($paziente->recapitiPaziente->centrovisita); ?></td>
                <td><?php echo e($paziente->recapitiPaziente->iddocumento); ?></td>
                <td><?php echo e($paziente->created_at->formatLocalized('%d %B %Y')); ?></td>

                <td style="display: inline">
                    <form style="display: inline" method="GET" action="/modificapaziente">
                        <?php echo e(csrf_field()); ?>

                        <button name='id' value="<?php echo e($paziente->id); ?>"  type="submit" class="btn btn-icn"><i class="far fa-edit cstm-icn"></i></button>
                    </form>

                    <button id="<?php echo e($paziente->id); ?>" name="idpaziente" value="<?php echo e($paziente->id); ?>"  type="button" class="btn btn-icn"
                        data-toggle="modal" data-target="#exampleModal" data-titolo="Conferma eliminazione paziente" data-messaggioinizio="Vuoi eliminare il paziente"
                        data-messaggiometa="<?php echo e($paziente->nome); ?> <?php echo e($paziente->cognome); ?>" data-messaggiofine="?" data-idpaziente="<?php echo e($paziente->id); ?>">
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