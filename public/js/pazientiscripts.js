allergieSelezionate = [];
medicinaliSelezionati = [];

$(document).ready(function () {

    allergie = document.getElementsByName("allergie[]");
    allergie.forEach(allergia => {
        if (allergia.value != "allergia")
            allergieSelezionate.push(allergia.value)
    });

    medicinali = document.getElementsByName("medicinali[]");
    medicinali.forEach(medicinale => {
        if (medicinale.value != "medicinale")
            medicinaliSelezionati.push(medicinale.value)
    });
});


function nuovaAllergia(pAllergie, val) {

 

    a = pAllergie;
    allergies = "";

    inputName = "allergie[]";
    idPopup = "#allergiepopup";

    if (allergieSelezionate.includes(val)) {
        var msg = ["Hai gia selezionato l'allergia al", val];
        alertPopup.warning(idPopup, msg.join(" "));
        return;
    }

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {
        if (indice === array.length - 1) {

            if (medicinaliSelezionati.includes(elemento.options[elemento.selectedIndex].innerText)) {
                var msg = ["Il paziente deve prendere questo medicinale: ", elemento.options[elemento.selectedIndex].innerText];
                elemento.value = 'allergia';
                alertPopup.warning(idPopup, msg.join(" "));

            } else {
                if (!allergieSelezionate.includes(elemento.value)) {

                    pAllergie.forEach(alrg => {
                        allergies = allergies + "<option>" + alrg.allergia + "</option>";
                    });
                    // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
                    var alrgia = "<select class=form-control id=allergie name=allergie[] onchange=nuovaAllergia(a," + 'this.value' + ")><option disabled selected>allergia</option>" + allergies + "</select> <br>"

                    $('#nuovaall').append(alrgia);

                    if (elemento.value != "allergia") {
                        allergieSelezionate.push(elemento.value)
                        $(".alert").alert('close')
                    }

                } else {
                    var msg = ["Hai gia selezionato l'allergia al", elemento.value];
                    elemento.value = 'allergia';
                    alertPopup.warning(idPopup, msg.join(" "));
                }

            }
        }
    });
}


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
