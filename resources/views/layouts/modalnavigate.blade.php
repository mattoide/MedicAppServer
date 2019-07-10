<div class="modal fade" id="navigatemodal" tabindex="-1" role="dialog" aria-labelledby="navigatemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="navigatemodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <p class="messaggioInizio" style="display: inline"></p><strong class="messaggioMeta" style="display: inline"></strong>
                <p class="messaggioFine" style="display: inline"></p>
                <p class="scope" style="display: none"></p>
            </div>
            <div class="modal-footer">
                    <div class="col">
                        <button style="width: 100%" role="button" id="conferma" name="idpaziente" type="button" class="btn btn-danger">Conferma</button>
                     </div>

                <div class="col">
                    <button style="width: 100%" type="button" class="btn btn-success" data-dismiss="modal">Annulla</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $('#navigatemodal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
//   var titolo = button.data('titolo') // Extract info from data-* attributes
//   var messaggioInizio = button.data('messaggioinizio') // Extract info from data-* attributes
//   var messaggioMeta = button.data('messaggiometa') // Extract info from data-* attributes
//   var messaggioFine = button.data('messaggiofine') // Extract info from data-* attributes
//   var id = button.data('id')
//   var scope = button.data('scope')
   // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  
//   modal.find('.modal-title').text(titolo)
let path = modal.find('.modal-body .scope').text();
//   modal.find('.modal-body .messaggioMeta').text(messaggioMeta + ' ')
//   modal.find('.modal-body .messaggioFine').text(messaggioFine)

$("#conferma").click(function(){ 
    window.location = document.location.origin + '/'+path 

        });


})

</script>