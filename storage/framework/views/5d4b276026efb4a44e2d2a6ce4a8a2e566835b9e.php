<div class="modal fade" id="modalaggiungiallergia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/nuovaallergia" style="display: inline">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <input type="text" class="form-control" name="allergia" placeholder="Nome allergia">
                </div>
                <div class="modal-footer">
                    <div class="col">
                    <button style="width: 100%" type="button" class="btn btn-danger" data-dismiss="modal">Cancella</button>
                </div>
                <div class="col">
                    <button style="width: 100%" id="aggiungi" type="submit" class="btn btn-success">Aggiungi</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $('#modalaggiungiallergia').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>