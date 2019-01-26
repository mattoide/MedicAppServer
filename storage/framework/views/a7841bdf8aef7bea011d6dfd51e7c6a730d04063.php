<div class="modal fade" id="modalmodificadiagnosi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/modificadiagnosi" style="display: inline">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control diagnosi" name="diagnosi" id="diagnosi" value="" placeholder="Nome diagnosi">
                    <input type="text" class="form-control iddiagnosi" name="id" id="id" value="" hidden>

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
    $('#modalmodificadiagnosi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var diagnosi = button.data('diagnosi') // Extract info from data-* attributes

      var modal = $(this)
    
      modal.find('.modal-title').text(titolo)
      modal.find('.modal-body .diagnosi').val(diagnosi.diagnosi)
      modal.find('.modal-body .iddiagnosi').val(diagnosi.id)
    })

</script>