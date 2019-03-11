<?php

$eserciziATempo = array(
    array("esercizio" => "Esercizio1", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio2", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio3", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio4", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio5", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio6", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio7", "immagine" => "defaultfeetexercise1.jpg"),
    array("esercizio" => "Esercizio8", "immagine" => "defaultfeetexercise1.jpg"),

);


$eserciziARipetizioni = array(
    array("esercizio" => "Esercizio1", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio2", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio3", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio4", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio5", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio6", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio7", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio8", "immagine" => "defaultfeetexercise2.jpg"),

);

$eserciziInterattivi = array(
    array("esercizio" => "Esercizio1", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio2", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio3", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio4", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio5", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio6", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio7", "immagine" => "defaultfeetexercise2.jpg"),
    array("esercizio" => "Esercizio8", "immagine" => "defaultfeetexercise2.jpg"),

);


?>

<div class="row">

    {{-- ESERCIZI A TEMPO --}}

<div class="col">

        {{-- <h5>Esercizi a tempo</h5> --}}
        <h3><span class="badge mybadge">Esercizi a tempo</span></h3>

        @foreach ($eserciziATempo as $esTempo)
            @php  $es = "/img/esercizi/".$esTempo['immagine'];  @endphp
                <div>
                <div class="form-check">
             


                <input class="form-check-input" type="checkbox" value="{{$esTempo['esercizio']}}" name="esercizitempoedit[]">
                <label class="form-check-label" >{{$esTempo['esercizio']}} </label>
                </div>
                {{-- <img src="{{url('/img/esercizi/defaultfeetexercise1.jpg')}}" class="img-fluid" height="100%" width="100%"> --}}
                <img src="{{url($es)}}" class="img-fluid" height="100%" width="100%">
                </div>
                <br>
        @endForeach
</div>

    {{-- ESERCIZI A RIPETIZIONI --}}

<div class="col">

    <h3><span class="badge mybadge">Esercizi a ripetizioni</span></h3>

        @foreach ($eserciziARipetizioni as $esRip)
        @php  $es = "/img/esercizi/".$esRip['immagine'];  @endphp
            <div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$esRip['esercizio']}}" name="eserciziripetizioniedit[]">
            <label class="form-check-label" >{{$esRip['esercizio']}} </label>
            </div>
            {{-- <img src="{{url('/img/esercizi/defaultfeetexercise1.jpg')}}" class="img-fluid" height="100%" width="100%"> --}}
            <img src="{{url($es)}}" class="img-fluid" height="100%" width="100%">
            </div>
            <br>
    @endForeach
</div>

    {{-- ESERCIZI INTERATTIVI --}}

<div class="col">

        <h3><span class="badge mybadge">Esercizi interattivi</span></h3>

        @foreach ($eserciziInterattivi as $esInt)
        @php  $es = "/img/esercizi/".$esInt['immagine'];  @endphp
            <div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$esInt['esercizio']}}" name="eserciziinterattiviedit[]">
            <label class="form-check-label" >{{$esInt['esercizio']}} </label>
            </div>
            {{-- <img src="{{url('/img/esercizi/defaultfeetexercise1.jpg')}}" class="img-fluid" height="100%" width="100%"> --}}
            <img src="{{url($es)}}" class="img-fluid" height="100%" width="100%">
            </div>
            <br>
    @endForeach
</div>


</div>

<script>


</script>