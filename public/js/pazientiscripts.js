

allergieSelezionate = [];
medicinaliSelezionati = [];
diagnosiSelezionate = [];
reminderSelezionati = [];


/*storieClinicheSelezionate = [];



diagnosi = document.getElementsByName("storiaclinica[]");
diagnosi.forEach(diagnos => {
    if (diagnos.value != "diagnosi") {
        let lower = diagnos.options[diagnos.selectedIndex].innerText;
        diagnosiSelezionate.push(lower.toLowerCase())
        // medicinaliSelezionatiNomeLabel.push(lower)
    }

});*/


allergieSelezionateNomeLabel = [];
// medicinaliSelezionatiNomeLabel = [];

$(document).ready(function () {

    allergie = document.getElementsByName("allergie[]");
    allergie.forEach(allergia => {
        if (allergia.value != "allergia") {
            let lower = allergia.value;
            allergieSelezionate.push(lower.toLowerCase())
            // allergieSelezionateNomeLabel.push(lower)
        }
    });

    medicinali = document.getElementsByName("medicinali[]");
    medicinali.forEach(medicinale => {
        if (medicinale.value != "medicinale") {
            let lower = medicinale.options[medicinale.selectedIndex].innerText.split(' ');
            medicinaliSelezionati.push(lower[0].toLowerCase())
            // medicinaliSelezionatiNomeLabel.push(lower)
        }

    });

    diagnosi = document.getElementsByName("diagnosi[]");
    diagnosi.forEach(diagnos => {
        if (diagnos.value != "diagnosi") {
            let lower = diagnos.options[diagnos.selectedIndex].innerText;
            diagnosiSelezionate.push(lower.toLowerCase())
            // medicinaliSelezionatiNomeLabel.push(lower)
        }

    });

    reminder = document.getElementsByName("reminder[]");
    reminder.forEach(remindr => {
        if (remindr.value != "reminder") {
            let lower = remindr.options[remindr.selectedIndex].value;
            reminderSelezionati.push(lower.toLowerCase())
            // medicinaliSelezionatiNomeLabel.push(lower)
        }

    });

});

/**************************************************************** */
function preparaAllergia(pAllergie) {

    allergies = "";
    a = pAllergie;

  
    var select = $("<select style=margin-top:0% class=form-control id=allergie"+allergieSelezionate.length+" name=allergie[] onchange=aggiungiAllergia(" + 'this' + ")></select>");
    var option = $('<option disabled></option>');
    option.attr('selected', 'allergia');
    option.text('allergia');
    select.append(option);

    pAllergie.forEach(function (alrg, indice, array) {
        var option = $('<option></option>');
        option.attr('value', alrg.allergia);
        option.text(alrg.allergia);
        select.append(option);
    });
    $('#nuovaall').append(select);

    var del = $("<button style=margin-top:10% id=delallergie"+allergieSelezionate.length+"  onclick=deleteAllergia("+'allergie'+allergieSelezionate.length+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button>");
    $('#nuovaalldel').append(del);


  /*  pAllergie.forEach(function (alrg, indice, array) {
        allergies = allergies + "<option>" + alrg.allergia + "</option>";
    });

    var alrgia = "<select style=margin-bottom:1%; margin-top:1% class=form-control id=allergie"+allergieSelezionate.length+" name=allergie[] onchange=aggiungiAllergia(" + 'this' + ")><option disabled selected>allergia</option>" + allergies + "</select>"
    $('#nuovaall').append(alrgia);*/

    $('#btnnuovaall').attr('disabled', 'disabled');
}
/**************************************************************** */

/**************************************************************** */
function preparaDiagnosiCategoria(pDiagnosi) {

    diagnosis = "";
    a = pDiagnosi;


    pDiagnosi.forEach(function (diagn, indice, array) {
        diagnosis = diagnosis + "<option>" + diagn.categoria + "</option>";
    });

    var diagnsi = "<select class=form-control id=catdiagnosi"+diagnosiSelezionate.length+" name=diagnosicat[] onchange=getDiagnosi(" + 'this' + ")><option disabled selected>diagnosi</option>" + diagnosis + "</select>"
    $('#nuovadiagncat').append(diagnsi);

    var del = $("<button style=margin-top:30% id=deldiagnosi"+diagnosiSelezionate.length+"  onclick=deleteDiagnosi("+diagnosiSelezionate.length+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button>");

    $('#deldiagn').append(del);


    $('#btnnuovadiagncat').attr('disabled', 'disabled');
}
/**************************************************************** */

/**************************************************************** */

function getDiagnosi(val){


    let categoria = val.value;
    let id = val.id;
    //$('#catdiagnosi'+diagnosiSelezionate.length).attr('disabled', 'disabled');
    $('#'+id).attr('disabled', 'disabled');

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    $.post('/getsiagnosibycategoria/' + categoria, function(response) {
        // handle your response here

        preparaDiagnosi(response);
    })

}

/**************************************************************** */

/**************************************************************** */

function getDiagnosiMod(val){

    let a = val.value;
    $('#diagnosicat'+diagnosiSelezionate.length).attr('disabled', 'disabled');

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    $.post('/getsiagnosibycategoria/' + a, function(response) {
        // handle your response here

        preparaDiagnosiMod(response, val.id);
    })

}


function getDiagnosiModSc(val){

    var id = val.id.replace('cat', '');
    let a = val.value;
    $('#'+val.id).attr('disabled', 'disabled');

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    $.post('/getsiagnosibycategoria/' + a, function(response) {
        // handle your response here

        preparaDiagnosiModSc(response, id);
    })

}

/**************************************************************** */

/**************************************************************** */
function preparaDiagnosi(pDiagnosi) {

    diagnosis = "";
    a = pDiagnosi;


    pDiagnosi.forEach(function (diagn, indice, array) {
        diagnosis = diagnosis + "<option value="+diagn.id+">" + diagn.diagnosi + "</option>";
    });

    var diagnsi = "<select class=form-control id=diagnosi"+diagnosiSelezionate.length+" name=diagnosi[] onchange=aggiungiDiagnosi(" + 'this' + ")><option disabled selected>diagnosi</option>" + diagnosis + "</select>"
    $('#nuovadiagn').append(diagnsi);

    $('#btnnuovadiagn').attr('disabled', 'disabled');
}
/**************************************************************** */

/**************************************************************** */
function preparaDiagnosiMod(pDiagnosi, id) {
    diagnosis = "";
    a = pDiagnosi;


    pDiagnosi.forEach(function (diagn, indice, array) {
        diagnosis = diagnosis + "<option value="+diagn.id+">" + diagn.diagnosi + "</option>";
    });
    

     var diagnsi = "<select style=margin-bottom:1%; margin-top:1% class=form-control id=diagnosi"+diagnosiSelezionate.length+" name=diagnosi[] onchange=aggiungiDiagnosi(" + 'this' + ")><option disabled selected>diagnosi</option>" + diagnosis + "</select>"
     $('#nuovadiagn').append(diagnsi);

    $('#btnnuovadiagn').attr('disabled', 'disabled');
}
/**************************************************************** */

/**************************************************************** */
function preparaDiagnosiModSc(pDiagnosi, id) {
    diagnosis = "";
    a = pDiagnosi;


    
console.log(pDiagnosi)
    pDiagnosi.forEach(function (diagns, indice, array) {
        var option = $('<option></option>');
        option.attr('value', diagns.diagnosi);
        option.text(diagns.diagnosi);
        $('#'+id).append(option);
    });

   // $('#nuovaall').append(select);

   /* pDiagnosi.forEach(function (diagn, indice, array) {
        diagnosis = diagnosis + "<option value="+diagn.id+">" + diagn.diagnosi + "</option>";
    });
    

     var diagnsi = "<select style=margin-bottom:1%; margin-top:1% class=form-control id=diagnosi"+diagnosiSelezionate.length+" name=diagnosi[] onchange=aggiungiDiagnosi(" + 'this' + ")><option disabled selected>diagnosi</option>" + diagnosis + "</select>"
     $('#'+id).append(diagnsi);*/

   // $('#btnnuovadiagn').attr('disabled', 'disabled');
}
/**************************************************************** */

/**************************************************************** */
function aggiungiAllergia(elem) {

    inputName = "allergie[]";
    idPopup = "#allergiepopup"

    if (allergieSelezionate.includes(elem.value.toLowerCase())) {

        $('#' + elem.id).remove();
        $('#del'+elem.id).remove();

       // $('#diagnosicat' + id).remove();

        var msg = ["Hai gia selezionato l'allergia al", elem.value];
        alertPopup.warning(idPopup, msg.join(" "));

    }

    if (medicinaliSelezionati.includes(elem.value.toLowerCase())) {

       $('#' + elem.id).remove();

        var msg = ["Il paziente deve prendere questo medicinale: ", elem.value];
        alertPopup.warning(idPopup, msg.join(" "));

    }

    allergieSelezionate = [];
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        allergieSelezionate.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)

    });
    $('#btnnuovaall').removeAttr('disabled');

}
/**************************************************************** */

/**************************************************************** */
function aggiungiDiagnosi(elem) {

    inputName = "diagnosi[]";
    idPopup = "#diagnosipopup"

    if (diagnosiSelezionate.includes(elem.value.toLowerCase())) {



        $('#' + elem.id).remove();
        $('#catdiagnosi' + elem.id[elem.id.length -1]).remove();
        $('#deldiagnosi'+elem.id[elem.id.length -1]).remove();


        var msg = ["Hai gia selezionato la diagnosi ", elem.value];
        alertPopup.warning(idPopup, msg.join(" "));

    }

    diagnosiSelezionate = [];
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        diagnosiSelezionate.push(lower.toLowerCase())
        if(indice == 0)
            $('#diagnosi1s').val(elemento.options[elemento.selectedIndex].innerText);

        if(indice == 1)
            $('#diagnosi2s').val(elemento.options[elemento.selectedIndex].innerText);
        // allergieSelezionateNomeLabel.push(lower)

    });

    $('#btnnuovadiagncat').removeAttr('disabled');

}
/**************************************************************** */

function creaMedicinale(pMedicinali) {
    a = pMedicinali;
    medicinalis = "";
    
    pMedicinali.forEach(medc => {
        if (medc)
            medicinalis = medicinalis + "<option value=" + medc.id + ">" + medc.nome + " - " + medc.dosaggio + " - " + medc.posologia +" - " + medc.durata_terapia +"</option>";

    });
    // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
    var mdecnl = "<select class=form-control id=medicinali"+medicinaliSelezionati.length+" name=medicinali[] onchange=nuovoMedicinale(a," + 'this' + ")><option disabled selected>medicinale</option>" + medicinalis + "</select> "
    var del = $("<button id=delmedicinali"+medicinaliSelezionati.length+"  onclick=deleteMedicinale("+medicinaliSelezionati.length+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button>");

    $('#nuovomed').append(mdecnl);
    $('#delnuovomed').append(del);

    $('#btnnuovomed').attr('disabled', 'disabled');
}

function nuovoMedicinale(pMedicinali, val) {

    var md = val.options[val.selectedIndex].innerText.split(' ');
    var med = md[0].toLowerCase();

    a = pMedicinali;
    medicinalis = "";
    idPopup = "#medicinalipopup";


    if (medicinaliSelezionati.includes(med)) {
        var msg = ["Hai gia selezionato il medicinale", med];
        alertPopup.warning(idPopup, msg.join(" "));
        val.remove();
        $('#del'+val.id).remove();
        $('#btnnuovomed').removeAttr('disabled');

        return;
    }

    

    inputName = "medicinali[]";

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {
        if (indice === array.length - 1) {

            var md = elemento.options[elemento.selectedIndex].innerText.split(' ');
            var med = md[0].toLowerCase();

            if (allergieSelezionate.includes(med)) {
                var msg = ["Il paziente è allergico al ", med];
                elemento.value = 'medicinale';
                        val.remove();
                        $('#del'+val.id).remove();


                alertPopup.warning(idPopup, msg.join(" "));

            } else {


                if (!medicinaliSelezionati.includes(elemento.options[elemento.selectedIndex].innerText)) {

        
                    if (elemento.options[elemento.selectedIndex].innerText != "medicinale") {

                        var md = elemento.options[elemento.selectedIndex].innerText.split(' ');
                        medicinaliSelezionati.push(med)
                        
                        $(".alert").alert('close')
                    }

                } else {
                    var msg = ["Hai gia selezionato il medicinale ",med];
                    elemento.value = 'medicinale';
                    elemento.remove();
                    $('#del'+elemento.id).remove();

                    //$('#'+elemento.id).remove();
                    alertPopup.warning(idPopup, msg.join(" "));
                }

            }
        }
    });

    $('#btnnuovomed').removeAttr('disabled');

}

function preparaMedicinale(pMedicinali) {

    reminderss = "";
    a = pMedicinali;

    pMedicinali.forEach(medc => {
        if (medc)
            medicinalis = medicinalis + "<option value=" + medc.id + ">" + medc.nome + " - " + medc.dosaggio + " - " + medc.posologia +" - " + medc.durata_terapia +"</option>";

    });
    // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
    var mdecnl = "<select class=form-control id=medicinali name=medicinali[]><option disabled selected>medicinale</option>" + medicinalis + "</select> <br>"

    $('#nuovomed').append(mdecnl);




    $('#btnnuovoreminder').attr('disabled', 'disabled');
}

/**************************************************************** */


/**************************************************************** */
function preparaReminder(pReminders) {

    reminderss = "";
    a = pReminders;


    pReminders.forEach(function (remndr, indice, array) {
        reminderss = reminderss + "<option value="+remndr.id +">" + remndr.nomereminder + "</option>";
    });

    var date =  dateToToday();

    var remndr = "<select class=form-control id=reminder"+reminderSelezionati.length+" name=reminder[] onchange=aggiungiReminder(" + 'this' + ")><option disabled selected>reminder</option>" + reminderss + "</select>"
    var data =  "<input id=datareminder"+reminderSelezionati.length+" type=date value="+date+" class=form-control placeholder=data avvio name=datareminder[] required>";
    var del = $("<button style=margin-top:30%; id=delreminder"+reminderSelezionati.length+"  onclick=deleteReminder("+reminderSelezionati.length+") type=button class='btn btn-icn'><i class='far fa-times-circle cstm-icn'></i></button>");
    $('#nuovoreminder').append(remndr);
    $('#datanuovoreminder').append(data);
    $('#delnuovoreminder').append(del);


    $('#btnnuovoreminder').attr('disabled', 'disabled');
}

/**************************************************************** */

/**************************************************************** */
function aggiungiReminder(elem) {

    inputName = "reminder[]";
    idPopup = "#reminderpopup"

    if (reminderSelezionati.includes(elem.value.toLowerCase())) {

        $('#' + elem.id).remove();
        $('#' + 'data'+elem.id).remove();
        console.log(elem.id)
        $('#'+'del'+elem.id).remove();

        //$('#reminder' + id).remove();

        var msg = ["Hai gia selezionatoil reminder", elem.value];
        alertPopup.warning(idPopup, msg.join(" "));

    }

  

    reminderSelezionati = [];
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        reminderSelezionati.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)

    });
    $('#btnnuovoreminder').removeAttr('disabled');

}

function deleteAllergia(val){

    $('#'+val.id).remove();
    $('#del'+val.id).remove();

    inputName = "allergie[]";
    allergieSelezionate = [];
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        allergieSelezionate.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)

    });

    $('#btnnuovaall').removeAttr('disabled');


}

function deleteStoriaClinica(val){
   
$('#'+val.id).remove();


}

function deleteIntervento(val){
   
    $('#'+val.id).remove();
    
    
    }

function deleteDiagnosi(val){



    $('#diagnosi'+val).remove();
    $('#catdiagnosi'+val).remove();
    $('#deldiagnosi'+val).remove();

    inputName = "diagnosi[]";
    diagnosiSelezionate = [];
    $('#diagnosi1s').val('');
    $('#diagnosi2s').val('');
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        diagnosiSelezionate.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)
        if(indice == 0)
        $('#diagnosi1s').val(elemento.options[elemento.selectedIndex].innerText);

    if(indice == 1)
        $('#diagnosi2s').val(elemento.options[elemento.selectedIndex].innerText);

    });

    $('#btnnuovadiagncat').removeAttr('disabled');



}


function deleteReminder(val){



    $('#reminder'+val).remove();
    $('#datareminder'+val).remove();
    $('#delreminder'+val).remove();

    inputName = "reminder[]";
    reminderSelezionati = [];
    // allergieSelezionateNomeLabel = [];
    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        reminderSelezionati.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)

    });

    $('#btnnuovoreminder').removeAttr('disabled');



}

function deleteProto(){
    $('#protocollo').val('protocolli');
   // $('#delprotocollo').remove();
}

function deleteMedicinale(val){

    $('#medicinali'+val).remove();
    $('#delmedicinali'+val).remove();

    inputName = "medicinali[]";
    medicinaliSelezionati = [];

    let lower
    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {

        lower = elemento.value;
        medicinaliSelezionati.push(lower.toLowerCase())

    });

    $('#btnnuovomedicinale').removeAttr('disabled');

}

function deleteFoto(id){

    $('#foto'+id).remove();
    $('#fotoval'+id).remove();
    $('#fotodel'+id).remove();
}

function deleteRx(id){

    $('#rx'+id).remove();
    $('#rxval'+id).remove();
    $('#rxdel'+id).remove();
}


function dateToToday(){
    var d = new Date(),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

if (month.length < 2) month = '0' + month;
if (day.length < 2) day = '0' + day;

return [year, month, day].join('-');
}