<div class="modal fade" id="modalmodificaallergia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/modificaallergia" style="display: inline">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control allergia" name="allergia" id="allergia" value="" placeholder="Nome allergia">
                    <input type="text" class="form-control idallergia" name="id" id="id" value="" hidden>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>


                <button id="aggiungi" type="submit" class="btn btn-warning">Modifica</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modalmodificaallergia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var allergia = button.data('allergia') // Extract info from data-* attributes

      var modal = $(this)
    
      modal.find('.modal-title').text(titolo)
      modal.find('.modal-body .allergia').val(allergia.allergia)
      modal.find('.modal-body .idallergia').val(allergia.id)
    })

</script>