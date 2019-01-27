function calcolaEta(data) {

    let datanascita = new Date(data);
    let oggi = new Date();
    let eta = oggi.getFullYear() - datanascita.getFullYear();

    eta < 0 ? $('#eta').text(0 + ' anni') : $('#eta').text(eta + ' anni');
}

function verificaPass() {

    // if ($('#pass').val() != $('#repass').val()) {
    // }
    if (!$('#pass').val().includes(" ")) {
        $("form").submit();
    } else {
        alertPopup.warning("#passpopup", "Le password non possono contenere spazi")
    }


}

$(document).ready(function () {

    alertPopup = function () {
    }
    alertPopup.warning = function (id, message) {
        // $('#'+id).append('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
        $(id).append('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>')
        setTimeout(function () {
            $(".alert").alert('close')
        }, 4000);
    }

    // let path = window.location.pathname.replace('/', '#');
    // $(path.toString()).addClass('custom-active');

    let path = window.location.pathname;

    if (path.includes('pazi')) {
        $('#pazientii').addClass('custom-active');
    } else if (path.includes('medi')) {
        $('#medicinalii').addClass('custom-active');
    } else if (path.includes('aller')) {
        $('#allergiee').addClass('custom-active');
    } else if (path.includes('remind')) {
        $('#reminderss').addClass('custom-active');
    } else if (path.includes('diag')) {
        $('#diagnosii').addClass('custom-active');
    }

    switch (path) {

        case "/pazienti":
            $('#titolo').text('Lista pazienti');
            break;

        case "/diagnosi":
            $('#titolo').text('Lista diagnosi');
            break;

        case "/allergie":
            $('#titolo').text('Lista allergie');
            break;

        case "/medicinali":
            $('#titolo').text('Lista medicinali');
            break;

        case "/reminders":
            $('#titolo').text('Lista reminders');
            break;


        case "/nuovopaziente":
            $('#titolo').text('Nuovo paziente');
            break;

        case "/modificapaziente":
            $('#titolo').text('Modifica paziente');
            break;
    }

    $('#datatable').DataTable({

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

