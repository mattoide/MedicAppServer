<div class="modal fade" id="modalaggiungimedicinale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/nuovomedicinale" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">

                    <input type="text" class="form-control" name="medicinale" placeholder="Nome medicinale" maxlength="32" required>

                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control" name="dosaggio" placeholder="Dosaggio" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <select class="form-control" id="unitadosaggio" name="unitadosaggio" required>
                                        <option disabled selected value> -- unità -- </option>
                                        <option>ml</option>
                                        <option>mg</option>
                                        <option>UI</option>
                                    </select>
                        </div>
                    </div>

                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control" name="posologia" placeholder="Posologia" min="0" maxlength="10">
                        </div>
                        <div class="col">                           
                             <p>volte al giorno</p>
                            <input value="volte al giorno" name='volte' id='posologia' hidden>
                        </div>
                    </div>


                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control" name="durata" placeholder="Durata terapia" min="0" maxlength="10">
                        </div>
                        <div class="col">
                            <p>giorni</p>
                            <input value="gg" name='giorni' hidden>
                        </div>
                    </div>

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
    $('#modalaggiungimedicinale').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>