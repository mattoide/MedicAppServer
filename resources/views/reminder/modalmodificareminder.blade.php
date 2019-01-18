<div class="modal fade" id="modalmodificareminder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/modificareminder" style="display: inline">
                    {{ csrf_field() }}
                    <div class="form-group row">
                            <label for="nomereminder" class="col-sm-2 col-form-label">nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control nomereminder" name="nomereminder">
                            </div>
                        </div>
    
    
                        <div class="form-group row">
                            <label for="testoreminder" class="col-sm-2 col-form-label">testo</label>
                            <div class="col-sm-10">
                                <textarea id="testoreminder" class="form-control testoreminder" rows="1" name="testoreminder"></textarea> </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="dopomesi" class="col-sm-2 col-form-label">dopo mesi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control dopomesi" name="dopomesi">
                            </div>
                        </div>
                    <input type="text" class="form-control idreminder" name="id" id="id" value="" hidden>

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
    $('#modalmodificareminder').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var reminder = button.data('reminder') // Extract info from data-* attributes
console.log(reminder)
      var modal = $(this)
    
      modal.find('.modal-title').text(titolo)
      modal.find('.modal-body .nomereminder').val(reminder.nomereminder)
      modal.find('.modal-body .testoreminder').val(reminder.testoreminder)
      modal.find('.modal-body .dopomesi').val(reminder.dopomesi)
      modal.find('.modal-body .idreminder').val(reminder.id)
    })

</script>