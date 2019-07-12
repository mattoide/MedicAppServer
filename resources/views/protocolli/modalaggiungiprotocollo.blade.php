<div class="modal fade" id="modalaggiungiprotocollo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>

            {{-- <ul class="nav nav-tabs" id="myTabProt" role="tablist">

                <li class="nav-item">
                    <a class="nav-link navtext-tab active" id="piede-tab" data-toggle="tab" href="#piede" role="tab" aria-controls="piede"
                        aria-selected="true">Piede</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link navtext-tab" id="mano-tab" data-toggle="tab" href="#mano" role="tab" aria-controls="mano" aria-selected="true">Mano</a>
                </li>
            
                
            <li class="nav-item">
                <a class="nav-link navtext-tab" id="caviglia-tab" data-toggle="tab" href="#caviglia" role="tab" aria-controls="caviglia"
                    aria-selected="false">Caviglia</a>
            </li>
            
                <li class="nav-item">
                    <a class="nav-link navtext-tab" id="polso-tab" data-toggle="tab" href="#polso" role="tab" aria-controls="polso" aria-selected="true">Polso</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link navtext-tab" id="gomito-tab" data-toggle="tab" href="#gomito" role="tab" aria-controls="gomito" aria-selected="false">Gomito</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link navtext-tab" id="ginocchio-tab" data-toggle="tab" href="#ginocchio" role="tab" aria-controls="ginocchio" aria-selected="false">Ginocchio</a>
            </li>
            
            
            <li class="nav-item">
                    <a class="nav-link navtext-tab" id="spalla-tab" data-toggle="tab" href="#spalla" role="tab" aria-controls="spalla"
                        aria-selected="false">Spalla</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link navtext-tab" id="snca-tab" data-toggle="tab" href="#anca" role="tab" aria-controls="anca"
                            aria-selected="false">Spalla</a>
                    </li>
            
            </ul> --}}
            <form method="POST" action="/nuovoprotocollo" style="display: inline">
                {{ csrf_field() }}
                <div class="modal-body">


                    <div class="form-group row">
                        <label for="nomemed" class="col-sm-2 col-form-label">nome</label>
                        <div class="col-sm-10">
                            <input id="nomemed" type="text" class="form-control" name="protocollo" placeholder="" maxlength="32" required>
                        </div>
                    </div>


           <br>

           @include('protocolli.eserciziadd')

           

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
    $('#modalaggiungiprotocollo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var titolo = button.data('titolo') // Extract info from data-* attributes
      


      var modal = $(this)
      
      modal.find('.modal-title').text(titolo)

      
    })

</script>