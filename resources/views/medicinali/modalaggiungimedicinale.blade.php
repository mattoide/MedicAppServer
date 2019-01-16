<div class="modal fade" id="modalaggiungimedicinale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
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


                    <div class="form-group row">
                        <label for="nomemed" class="col-sm-2 col-form-label">nome</label>
                        <div class="col-sm-10">
                            <input id="nomemed" type="text" class="form-control" name="medicinale" placeholder="" maxlength="32" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="dosamed" class="col-sm-2 col-form-label">dosaggio</label>
                        <div class="col-7">
                            <input id="dosamed" type="number" class="form-control" name="dosaggio" placeholder="" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <select class="form-control" id="unitadosaggio" name="unitadosaggio" required>
                                                <option disabled selected value>unità</option>
                                                <option>ml</option>
                                                <option>mg</option>
                                                <option>UI</option>
                                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="posomed" class="col-sm-2 col-form-label">posologia</label>
                        <div class="col-8">
                            <input id="posomed" type="number" class="form-control" name="posologia" placeholder="" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <p>die</p>
                            <input value="volte al giorno" name='volte' id='posologia' hidden>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="duratamed" class="col-sm-2 col-form-label">durata</label>
                        <div class="col-8">
                            <input id="duratamed" type="number" class="form-control" name="durata" placeholder="" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <p>giorni</p>
                            <input value="gg" name='giorni' hidden>
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
    $('#modalaggiungimedicinale').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes

      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>