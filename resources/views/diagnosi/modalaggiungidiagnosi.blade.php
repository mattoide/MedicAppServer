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

                    <div class="form-group row">
                       
                        <div class="col">
                            <select class="form-control" id="categoria" name="categoria" required>
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

                            <input type="text" class="form-control" name="diagnosi" placeholder="Nome diagnosi" required>
                        </div>
                    </div>

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
    $('#modalaggiungidiagnosi').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>