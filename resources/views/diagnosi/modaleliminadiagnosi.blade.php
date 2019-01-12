<div class="modal fade" id="modaleliminadiagnosi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                    <p class="messaggioInizio" style="display: inline"></p><strong class="messaggioMeta" style="display: inline"></strong>
                    <p class="messaggioFine" style="display: inline"></p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/eliminadiagnosi" style="display: inline">
                        {{ csrf_field() }}
                        <button id="conferma" name="iddiagnosi" type="submit" class="btn btn-danger">Conferma</button>
                    </form>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Allunna</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modaleliminadiagnosi').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
  var titolo = button.data('titolo') // Extract info from data-* attributes
  var messaggioInizio = button.data('messaggioinizio') // Extract info from data-* attributes
  var messaggioMeta = button.data('messaggiometa') // Extract info from data-* attributes
  var messaggioFine = button.data('messaggiofine') // Extract info from data-* attributes
  var iddiagnosi = button.data('iddiagnosi') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
  modal.find('.modal-title').text(titolo)
  modal.find('.modal-body .messaggioInizio').text(messaggioInizio + ' ')
  modal.find('.modal-body .messaggioMeta').text(messaggioMeta + ' ')
  modal.find('.modal-body .messaggioFine').text(messaggioFine)
  
  $('#conferma').val(iddiagnosi)
    })

</script>