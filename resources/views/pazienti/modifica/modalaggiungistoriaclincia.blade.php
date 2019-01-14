<div class="modal fade" id="modalaggiungistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/aggiungistoriaclinica" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div style="width: 90%">
                        <table class="table table-bordered">
                            <tbody id="tablestoriaclinica">
                                <tr>
                                    <td class="datetd">
                                        <input class="form-control" type="date" id="datastoriaclinica" name="datastoriaclinica" value="{{old('datastoriaclinica')}}"
                                            required>
                                    </td>

                                    <td>
                                        <textarea class="form-control" rows="3" name="storiaclinica" value="{{old('storiaclinica')}}" required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
                    <input type="text" class="form-control idpaziente" name="idpaz" id="idpaziente" value="" hidden>
                    <button id="aggiungi" type="submit" class="btn btn-success">Aggiungi</button>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $('#modalaggiungistoria').on('show.bs.modal', function (event) {

   

      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var idpaziente = button.data('idpaziente') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)
      modal.find('.idpaziente').val(idpaziente)

    var date = new Date();
    var currentDate = date.toISOString().slice(0,10);
    $('#datastoriaclinica').val(currentDate);
      
    })

</script>