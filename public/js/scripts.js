function calcolaEta(data) {

    let datanascita = new Date(data);
    let oggi = new Date();
    let eta = oggi.getFullYear() - datanascita.getFullYear();

    eta < 0 ? $('#eta').val(0) : $('#eta').val(eta);
}

function verificaPass() {

    if ($('#pass').val() != $('#repass').val()) {

    }


}

$(document).ready(function () {
    
    let path = window.location.pathname.replace('/', '#');
    $(path.toString()).addClass('active');

    $('#tablepazienti').DataTable({
        "oLanguage": {
            "sLengthMenu": "Mostra _MENU_ risultati per pagina",
            "sZeroRecords": "Nessun risultato",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
            "sInfo": "",
            "sInfoEmpty": "Showing 0 to 0 of 0 records",
            "sInfoEmpty": "",
            "sInfoFiltered": "(filtered from _MAX_ total records)",
            "sInfoFiltered": "",
            "sSearch": "Cerca",

            "oPaginate": {
                "sFirst": "Prima pagina",
                "sPrevious": "Precedente",
                "sNext": "Successivo",
                "sLast": "Ultima pagina"
            }
        }
    });

})

$('#exampleModal').on('show.bs.modal', function (event) {
    console.log("qui")
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
