allergieSelezionate = [];
medicinaliSelezionati = [];


allergie = document.getElementsByName("allergie[]");
allergie.forEach(allergia => allergieSelezionate.push(allergia.value));

medicinali = document.getElementsByName("medicinali[]");
medicinali.forEach(medicinale => medicinaliSelezionati.push(medicinali.value));

function nuovaAllergia(pAllergie){

    a = pAllergie;
    allergies = "";

    inputName = "allergie[]";
    idPopup = "#allergiepopup";

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function(elemento, indice, array){
        if (indice === array.length - 1){
            if(!allergieSelezionate.includes(elemento.value)){

                pAllergie.forEach(alrg => {
                    allergies = allergies +"<option>"+ alrg.allergia+ "</option>";
                });
                // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
                var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaAllergia(a)><option disabled selected>allergia</option>" + allergies + "</select> <br>"

                $('#nuovaall').append(alrgia);
                allergieSelezionate.push(elemento.value)
                $(".alert").alert('close')

            } else {
                var msg = ["Hai gia selezionato l'allergia al",elemento.value];
                elemento.value = 'allergia';
                alertPopup.warning(idPopup,msg.join(" "));
            }
        }
    });
}


function nuovoMedicinale(pMedicinali){

    a = pMedicinali;
    medicinalis = "";

    inputName = "medicinali[]";
    idPopup = "#medicinalipopup";

    let elementi = document.getElementsByName(inputName);
    elementi.forEach(function(elemento, indice, array){
        if (indice === array.length - 1){
            if(!medicinaliSelezionati.includes(elemento.value)){

                pMedicinali.forEach(medc => {
                    if(medc)
                    medicinalis = medicinalis+"<option value="+medc.id +">"+ medc.nome + "</option>";

                });
                // var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia(allergie)><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
                var mdecnl ="<select class=form-control id=medicinali name=medicinali[] onchange=nuovoMedicinale(a)><option disabled selected>medicinale</option>" + medicinalis + "</select> <br>"

                $('#nuovomed').append(mdecnl);
                medicinaliSelezionati.push(elemento.value)
                $(".alert").alert('close')

            } else {
                var msg = ["Hai gia selezionato il medicinale ", elemento.value];
                elemento.value = 'medicinale';
                alertPopup.warning(idPopup, msg.join(" "));
            }
        }
    });
}
