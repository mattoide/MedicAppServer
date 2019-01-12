function calcolaEta(data) {

    let datanascita = new Date(data);
    let oggi = new Date();
    let eta = oggi.getFullYear() - datanascita.getFullYear();

    eta < 0 ? $('#eta').text(0 + ' anni') : $('#eta').text(eta + ' anni');
}

function verificaPass() {

    if ($('#pass').val() != $('#repass').val()) {

    }


}

$(document).ready(function () {

    let path = window.location.pathname.replace('/', '#');
    $(path.toString()).addClass('custom-active');

    $('#tablepazienti').DataTable({

        /*"language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Italian.json"
        },*/ 
        "oLanguage": {
            "sEmptyTable": "Nessun dato presente nella tabella",
            "sInfo": "Vista da _START_ a _END_ di _TOTAL_ elementi",
            "sInfoEmpty": "Vista da 0 a 0 di 0 elementi",
            "sInfoFiltered": "(filtrati da _MAX_ elementi totali)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Visualizza _MENU_ elementi",
            "sLoadingRecords": "Caricamento...",
            "sProcessing": "Elaborazione...",
            "sSearch": "Cerca:",
            "sZeroRecords": "La ricerca non ha portato alcun risultato.",
            "oPaginate": {
                "sFirst": "Inizio",
                "sPrevious": "Precedente",
                "sNext": "Successivo",
                "sLast": "Fine"
            },
            "oAria": {
                "sSortAscending": ": attiva per ordinare la colonna in ordine crescente",
                "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
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
