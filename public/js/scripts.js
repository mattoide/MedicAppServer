$('.nav .nav-link').click(function(){
    $('.navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');
})

function calcolaEta(data){

    let datanascita = new Date(data);
    let oggi = new Date();
    let eta = oggi.getFullYear() - datanascita.getFullYear();

    eta < 0 ? $('#eta').val(0) : $('#eta').val(eta);
}

function verificaPass(){

    if($('#pass').val() != $('#repass').val()){
        
    }

    
}

    $(document).ready(function () {

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