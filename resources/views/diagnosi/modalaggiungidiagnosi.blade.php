<div class="modal fade" id="modalaggiungidiagnosi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/nuovadiagnosi" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" class="form-control" name="diagnosi" placeholder="Nome diagnosi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
                    <button id="aggiungi" type="submit" class="btn btn-success">Aggiungi</button>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $('#modalaggiungidiagnosi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>