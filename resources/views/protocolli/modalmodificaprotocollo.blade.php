
<div class="modal fade" id="modalmodificaprotocollo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" action="/modificaprotocollo" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">


                    <div class="form-group row">
                        <label for="nomeprot" class="col-sm-2 col-form-label">nome</label>
                        <div class="col-sm-10">
                            <input id="nomeprot" type="text" class="form-control nomeprot" name="protocollo" placeholder="" maxlength="32" required>
                            <input id="idprot" type="text" class="form-control idprot" name="idprot" placeholder="" maxlength="32" hidden>
                        </div>
                    </div>


           <!-- TODO: grid view medicinali, oppure colonne con tipo esercizi, tempo ecc-->

           <br>

           @include('protocolli.eserciziedit')

           <!-- -->

           <!-- -->

           

                </div>
                <div class="modal-footer">
                    <div class="col">
                        <button style="width: 100%" type="button" class="btn btn-danger" data-dismiss="modal">Cancella</button>
                    </div>
                    <div class="col">
                        <button style="width: 100%" id="modifica" type="submit" class="btn btn-success">Modifica</button>
                    </div>

            </form>
            </div>

        </div>
    </div>
</div>

<script>


    $('#modalmodificaprotocollo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      var protocollo = button.data('protocollo')
      
      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)
      modal.find('.nomeprot').val(protocollo.nome)
      modal.find('.idprot').val(protocollo.id)
    


      var eseTempo = document.getElementsByName('esercizitempoedit[]');
      var eseRipetizioni = document.getElementsByName('eserciziripetizioniedit[]');
      var eseInterattivi = document.getElementsByName('eserciziinterattiviedit[]');
     

      protocollo.esercizi.forEach(es =>{
        if(es.tipoesercizio == 'tempo'){
            eseTempo.forEach(el =>{

                if(el.value == es.nome){
                    el.checked = true;
                }
            })
        } else if(es.tipoesercizio == 'ripetizioni'){
            eseRipetizioni.forEach(el =>{

            if(el.value == es.nome){
                el.checked = true;
            }
            })
        } else if(es.tipoesercizio == 'interattivi'){
            eseInterattivi.forEach(el =>{

            if(el.value == es.nome){
                el.checked = true;
            }
            })
}
    })


      
    })

</script>