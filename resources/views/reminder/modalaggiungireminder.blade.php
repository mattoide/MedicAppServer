<div class="modal fade" id="modalaggiungireminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/nuovoreminder" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="nomereminder" class="col-sm-2 col-form-label">nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomereminder">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="testoreminder" class="col-sm-2 col-form-label">testo</label>
                        <div class="col-sm-10">
                            <textarea id="testoreminder" class="form-control" rows="1" name="testoreminder"></textarea> </div>
                    </div>

                    <div class="form-group row">
                        <label for="dopomesi" class="col-sm-2 col-form-label">dopo mesi</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="dopomesi">
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
    $('#modalaggiungireminder').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>