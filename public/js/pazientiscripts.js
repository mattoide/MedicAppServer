function nuovaallergia(){

    alert("sdtong vaz")

    allergie = document.getElementsByName("allergie[]");

    allergie.forEach(function(allergia, indice, array){
        if (indice === array.length - 1){
            if(!allergieSelezionate.includes(allergia.value)){
                var alrgia ="<select class=form-control id=allergie name=allergie[] onchange=nuovaallergia()><option disabled selected>allergia</option>@foreach ($allergie as $a)<option>{{$a->allergia}}</option>@endforeach</select> <br>"
                $('#nuovaall').append(alrgia);
                allergieSelezionate.push(allergia.value)
            } else {
                alert("Allergia: " + allergia.value + " gia selezionata")
                allergia.value = 'allergia';
            }
        }
    });

}
