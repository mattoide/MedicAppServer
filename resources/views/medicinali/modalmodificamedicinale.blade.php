<div class="modal fade" id="modalmodificamedicinale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/modificamedicinale" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">

                    <input type="text" class="form-control medicinale" name="medicinale" placeholder="Nome medicinale" maxlength="32" required>

                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control dosaggio" name="dosaggio" placeholder="Dosaggio" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <select class="form-control unitadosaggio" id="unitadosaggio" name="unitadosaggio" required>
                                            <option disabled selected value> -- unità -- </option>
                                            <option>ml</option>
                                            <option>mg</option>
                                            <option>UI</option>
                                        </select>
                        </div>
                    </div>

                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control posologia" name="posologia" placeholder="Posologia" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <p>volte al giorno</p>
                            <input value="volte al giorno" name='volte' id='posologia' hidden>
                        </div>
                    </div>


                    <div class="row formrow">
                        <div class="col">
                            <input type="number" class="form-control durata" name="durata" placeholder="Durata terapia" min="0" maxlength="10" required>
                        </div>
                        <div class="col">
                            <p>giorni</p>
                            <input value="gg" name='giorni' hidden>
                        </div>
                    </div>

                </div>
                <input type="text" class="form-control idmedicinale" name="id" id="id" value="" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
                    <button id="aggiungi" type="submit" class="btn btn-warning">Modifica</button>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $('#modalmodificamedicinale').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var titolo = button.data('titolo') // Extract info from data-* attributes
          var medicinale = button.data('medicinale') // Extract info from data-* attributes

          console.log(medicinale)

var modal = $(this)

modal.find('.modal-title').text(titolo)
modal.find('.medicinale').val(medicinale.nome)
modal.find('.dosaggio').val(medicinale.dosaggio.split(" ", 1))

var unitadosaggio=medicinale.dosaggio.split(" ", 2);
modal.find('.unitadosaggio').val(unitadosaggio[1])

modal.find('.posologia').val(medicinale.posologia.split(" ", 1))
modal.find('.durata').val(medicinale.durata_terapia.split(" ", 1))
modal.find('.idmedicinale').val(medicinale.id)
          
        })
</script>