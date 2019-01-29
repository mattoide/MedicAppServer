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

function preparaAllergia(pAllergie) {

    allergies = "";
    a = pAllergie;
    pAllergie.forEach(alrg => {
        allergies = allergies + "<option>" + alrg.allergia + "</option>";
    });
    var alrgia = "<select class=form-control id=allergie name=allergie[] onchange=aggiungiAllergia("+'this'+")><option disabled selected>allergia</option>" + allergies + "</select> <br>"
    $('#nuovaall').append(alrgia);
   
    $('#btnnuovaall').attr('disabled', 'disabled');
}


function aggiungiAllergia(elem) {

    inputName = "allergie[]";
    idPopup = "#allergiepopup"

        if (allergieSelezionate.includes(elem.value)) {  

        $('#' + elem.id).remove();

        var msg = ["Hai gia selezionato l'allergia al", elem.value];
        alertPopup.warning(idPopup, msg.join(" "));
    }

    allergieSelezionate = [];

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function (elemento, indice, array) {
        console.log(elemento.value)
        allergieSelezionate.push(elemento.value);

    });
    $('#btnnuovaall').removeAttr('disabled');
}


function nuovaAllergiaaa(pAllergie, val) {


    inputName = "allergie[]";
    idPopup = "#allergiepopup"
    let elementi = document.getElementsByName(inputName);



    elementi.forEach(function (elemento, indice, array) {


        if (elemento.value == allergieSelezionate[indice]) {

            console.log(elemento.value + " in posizione: " + indice + " c'e!")
            var msg = ["Hai gia selezionato l'allergia al", elemento.value];
            // elemento.value = array[indice].value;
            allergieSelezionate.splice(allergieSelezionate.indexOf(elemento.value), 1);
            console.log("dopo rimozione: " + allergieSelezionate)

            $('#' + elemento.id).remove();

            alertPopup.warning(idPopup, msg.join(" "));
        } else {
            console.log(elemento.value + " in posizione: " + indice + " non c'e!")
            allergieSelezionate[indice] = elemento.value;
        }
    });

    // console.log("breaaakkkkk \n\n")

    allergieSelezionate.forEach(function (elemento, indice, array) {

    });


    // a = pAllergie;
    // allergies = "";

    // inputName = "allergie[]";
    // idPopup = "#allergiepopup";

    // //let elementi = document.getElementsByName(inputName);

    // elementi.forEach(function (elemento, indice, array) {

    //     if (indice === array.length -1) {

    //         if (medicinaliSelezionati.includes(elemento.options[elemento.selectedIndex].innerText)) {
    //             var msg = ["Il paziente deve prendere questo medicinale: ", elemento.options[elemento.selectedIndex].innerText];
    //             elemento.value = 'allergia';
    //             alertPopup.warning(idPopup, msg.join(" "));

    //         } else {

    //             if (!allergieSelezionate.includes(elemento.value)) {
    //                 pAllergie.forEach(alrg => {
    //                    // if(!allergieSelezionate.includes(alrg.allergia))
    //                     allergies = allergies + "<option>" + alrg.allergia + "</option>";
    //                 });
    //                 var alrgia = "<select class=form-control id=allergie name=allergie[] onchange=nuovaAllergiaa(a,"+'this.value'+")><option disabled selected>allergia</option>" + allergies + "</select> <br>"
    //                 $('#nuovaall').append(alrgia);

    //                 if (elemento.value != "allergia") {
    //                     allergieSelezionate.push(elemento.value)
    //                     $(".alert").alert('close')
    //                 }

    //                 console.log("aggiunta: " + allergieSelezionate)


    //             } else {
    //                 var msg = ["Hai gia selezionato l'allergia al", elemento.value];
    //                // elemento.value = array[indice].value;
    //                 allergieSelezionate.splice( allergieSelezionate.indexOf(elemento.value), 1 );
    //                 console.log("dopo rimozione: " + allergieSelezionate)

    //                 $('#'+elemento.id).remove();

    //                 alertPopup.warning(idPopup, msg.join(" "));
    //             }

    //         }
    //     }
    // });


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
