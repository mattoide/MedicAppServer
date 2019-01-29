allergieSelezionate = [];
medicinaliSelezionati = [];


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
            let lower = medicinale.options[medicinale.selectedIndex].innerText;
            medicinaliSelezionati.push(lower.toLowerCase())
            // medicinaliSelezionatiNomeLabel.push(lower)
        }

    });

});

/**************************************************************** */
function preparaAllergia(pAllergie) {

    allergies = "";
    a = pAllergie;


    pAllergie.forEach(function (alrg, indice, array) {
        allergies = allergies + "<option>" + alrg.allergia + "</option>";
    });

    var alrgia = "<select style=margin-bottom:1%; margin-top:1% class=form-control id=allergie"+allergieSelezionate.length+" name=allergie[] onchange=aggiungiAllergia(" + 'this' + ")><option disabled selected>allergia</option>" + allergies + "</select>"
    $('#nuovaall').append(alrgia);

    $('#btnnuovaall').attr('disabled', 'disabled');
}
/**************************************************************** */


/**************************************************************** */
function aggiungiAllergia(elem) {

    inputName = "allergie[]";
    idPopup = "#allergiepopup"
    console.log(elem.id)

    if (allergieSelezionate.includes(elem.value.toLowerCase())) {

        $('#' + elem.id).remove();

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
        console.log(elemento.value)

        lower = elemento.value;
        allergieSelezionate.push(lower.toLowerCase())
        // allergieSelezionateNomeLabel.push(lower)

    });
    $('#btnnuovaall').removeAttr('disabled');

}
/**************************************************************** */


function nuovoMedicinale(pMedicinali, val) {


    a = pMedicinali;
    medicinalis = "";

    if (medicinaliSelezionati.includes(val)) {
        var msg = ["Hai gia selezionato il medicinale", val];
        alertPopup.warning(idPopup, msg.join(" "));
        return;
    }

    inputName = "medicinali[]";
    idPopup = "#medicinalipopup";

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {
        if (indice === array.length - 1) {
            if (allergieSelezionate.includes(elemento.options[elemento.selectedIndex].innerText)) {
                var msg = ["Il paziente è allergico al ", elemento.options[elemento.selectedIndex].innerText];
                elemento.value = 'medicinale';
                alertPopup.warning(idPopup, msg.join(" "));

            } else {

                if (!medicinaliSelezionati.includes(elemento.options[elemento.selectedIndex].innerText)) {

                    pMedicinali.forEach(medc => {
                        if (medc)
                            medicinalis = medicinalis + "<option value=" + medc.id + ">" + medc.nome + "</option>";

                    });
                    // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
                    var mdecnl = "<select class=form-control id=medicinali name=medicinali[] onchange=nuovoMedicinale(a)><option disabled selected>medicinale</option>" + medicinalis + "</select> <br>"

                    $('#nuovomed').append(mdecnl);

                    if (elemento.options[elemento.selectedIndex].innerText != "medicinale") {

                        medicinaliSelezionati.push(elemento.options[elemento.selectedIndex].innerText)
                        $(".alert").alert('close')
                    }

                } else {
                    var msg = ["Hai gia selezionato il medicinale ", elemento.options[elemento.selectedIndex].innerText];
                    elemento.value = 'medicinale';
                    alertPopup.warning(idPopup, msg.join(" "));
                }

            }
        }
    });
}
