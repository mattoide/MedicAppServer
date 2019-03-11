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
                    {{ csrf_field() }}

                    <div class="form-group row">
                       
                            <div class="col">
                                <select class="form-control categoria" id="categoria" name="categoria" required>
                                                    <option disabled selected value>categoria</option>
                                                    <option>Piede</option>
                                                    <option>Mano</option>
                                                    <option>Caviglia</option>
                                                    <option>Polso</option>
                                                    <option>Gomito</option>
                                                    <option>Ginocchio</option>
                                                    <option>Spalla</option>
                                                    <option>Anca</option>
                                                </select>
                            </div>
    
                                <div class="col">
    
                                <input type="text" class="form-control diagnosi" name="diagnosi" placeholder="Nome diagnosi" required>
                            </div>
                        </div>

                     
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
      modal.find('.modal-body .categoria').val(diagnosi.categoria)
      modal.find('.modal-body .iddiagnosi').val(diagnosi.id)
    })

</script>