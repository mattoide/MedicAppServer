<div class="modal fade" id="modalaggiungistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/aggiungistoriaclinica" style="display: inline">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div style="width: 90%">
                        <table class="table table-bordered">
                            <tbody id="tablestoriaclinica">
                                <tr>
                                    <td class="datetd">
                                        <input class="form-control" type="date" id="datastoriaclinicam" name="datastoriaclinicam" required>
                                        <select class="form-control" id="scdiagnosi1m" name="scdiagnosi1m">
                                            <option disabled selected> diagnosi 1 </option>
                                            <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($a->diagnosi); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select> 
                                        <select class="form-control" id="scdiagnosi2m" name="scdiagnosi2m">
                                            <option disabled selected> diagnosi 2 </option>
                                            <?php $__currentLoopData = $diagnosi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option><?php echo e($a->diagnosi); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select> 
                                    </td>

                                    <td>
                                        <textarea class="form-control miatextarea" rows="3" id="storiaclinicam" name="storiaclinicam" required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
                    <input type="text" class="form-control idpaziente" name="idpaz" id="idpaziente"  hidden>
                    <button id="aggiungi" type="submit" class="btn btn-success">Aggiungi</button>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $('#modalaggiungistoria').on('show.bs.modal', function (event) {

   

      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var idpaziente = button.data('idpaziente') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)
      modal.find('.idpaziente').val(idpaziente)

    var date = new Date();
    var currentDate = date.toISOString().slice(0,10);

    // $('#datastoriaclinicam').removeAttr('disabled');
    // $('#storiaclinicam').removeAttr('disabled');
    // $('#scdiagnosi1m').removeAttr('disabled');
    // $('#scdiagnosi2m').removeAttr('disabled');

    $('#datastoriaclinicam').val(currentDate);
      
    })

</script>