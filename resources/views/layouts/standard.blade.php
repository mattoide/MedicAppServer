<!doctype html>
<html lang="it">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/pazientiscripts.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/makePdf.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

  

  <!-- Bootstrap css CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- custom css  -->
  <link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet">
  {{-- <link href="{{ URL::asset('css/customUploadList.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ URL::asset('css/bootstrap-italia/css/bootstrap-italia.min.css') }}" rel="stylesheet"> --}}

  <!-- FontAwesome CDN -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
    crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@3.4.3/dist/file-upload-with-preview.min.css">


  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    @include('layouts.modalnavigate')

{{-- 
  <div class="d-flex p-2 sticky-top" style="background-color: #9b8e6e; justify-content: center; z-index: 1031;">

    <a id="novus"  class="nav-link" style="color: white" target="_blank" href="https://novusstudios.it/">Chirurgia Estetica del Piede - by Novus Studios</a>


  </div> --}}

      <nav class="navbar fixed-top nav mx-auto" style="background-color: #9b8e6e; align-content: center; z-index: 1032;">

        <ul class="nav navbar-nav mx-auto">
            <li class="nav-item"><a id="novus"  class="nav-link" style="color: white" target="_blank" href="https://novusstudios.it/">Chirurgia Estetica del Piede - by Novus Studios</a></li>
        </ul>

    </nav>

  <nav class="navbar navbar-expand-md navbar-dark fixed-left">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    
        <ul class="navbar-nav">

            <li class="nav-itemno navtm">
                <a href="#"> 
               <p></p></a>
             </li >      <li class="nav-itemno navtm">
                <a href="#"> 
               <p></p></a>
             </li >
          <li class="nav-item navtm">
            {{-- <a href="/pazienti"> <i class="fas fa-bed fa-lg circle"></i>
           <p id='pazientii' class="nav-link navtext" href="/pazienti">Pazienti</p></a> --}}

           <a href="#" onclick="togglemodal('Vuoi andare nella sezione pazienti ?', 'pazienti')"> <i class="fas fa-bed fa-lg circle"></i>
            <p id='pazientii' class="nav-link navtext" href="/pazienti">Pazienti</p></a>
         </li>

         <li class="nav-item navtm">
             <a href="#" onclick="togglemodal('Vuoi andare nella sezione diagnosi ?', 'diagnosi')"> <i class="far fa-address-card fa-lg circle"></i>
           <p id='diagnosii' class="nav-link navtext" href="/diagnosi">Diagnosi</p></a>
         </li>

         <li class="nav-item navtm">
             <a href="#" onclick="togglemodal('Vuoi andare nella sezione allergie ?', 'allergie')"> <i class="fas fa-exclamation-triangle fa-lg circle"></i>
           <p id='allergiee' class="nav-link navtext" href="/allergie">Allergie</p></a>
         </li>

         <li class="nav-item navtm">
             <a href="#" onclick="togglemodal('Vuoi andare nella sezione medicinali ?', 'medicinali')"> <i class="fas fa-pills fa-lg circle"></i>
           <p id='medicinalii' class="nav-link navtext" href="/medicinali">Medicinali</p></a>
         </li>

         <li class="nav-item navtm">
             <a href="#" onclick="togglemodal('Vuoi andare nella sezione reminders ?', 'reminders')">  <i class="far fa-bell fa-lg circle"></i>
           <p id='reminderss' class="nav-link navtext" href="/reminders">Reminder</p></a>
         </li>

         <li class="nav-item navtm">
             <a href="#" onclick="togglemodal('Vuoi andare nella sezione protocolli ?', 'protocolli')"> <i class="fas fa-list-ul fa-lg circle"></i>
           <p id='protocollii' class="nav-link navtext" href="/protocolli">Protocolli</p></a>
         </li>

        </ul>
    </div>
</nav>

  {{-- <div class="navbar navbar-inverse navbar-fixed-left">
    <a class="navbar-brand" href="#">Brand</a>
    <ul class="nav navbar-nav">
      
          <li class="nav-item navtm">
             <a href="/pazienti"> <i class="fas fa-bed fa-lg circle"></i>
            <p id='pazientii' class="nav-link navtext" href="/pazienti">Pazienti</p></a>
          </li>

          <li class="nav-item navtm">
              <a href="/diagnosi"> <i class="far fa-address-card fa-lg circle"></i>
            <p id='diagnosii' class="nav-link navtext" href="/diagnosi">Diagnosi</p></a>
          </li>

          <li class="nav-item navtm">
              <a href="/allergie"> <i class="fas fa-exclamation-triangle fa-lg circle"></i>
            <p id='allergiee' class="nav-link navtext" href="/allergie">Allergie</p></a>
          </li>

          <li class="nav-item navtm">
              <a href="/medicinali"> <i class="fas fa-pills fa-lg circle"></i>
            <p id='medicinalii' class="nav-link navtext" href="/medicinali">Medicinali</p></a>
          </li>

          <li class="nav-item navtm">
              <a href="/reminders">  <i class="far fa-bell fa-lg circle"></i>
            <p id='reminderss' class="nav-link navtext" href="/reminders">Reminder</p></a>
          </li>

          <li class="nav-item navtm">
              <a href="/protocolli"> <i class="fas fa-list-ul fa-lg circle"></i>
            <p id='protocollii' class="nav-link navtext" href="/protocolli">Protocolli</p></a>
          </li>

        </ul>

    </div> --}}
  {{-- </div> --}}

{{-- 
        <div class="container-fluid" style="background-color: white;">
        <h3 id="titolo"></h3>
        </div> --}}
<div class="container miocont">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <h3 id="titolo"></h3>
      </nav>
<div class="container-fluid" style=" overflow-y: scroll">
      @yield('content')
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

    <script src="https://unpkg.com/file-upload-with-preview@3.4.3/dist/file-upload-with-preview.min.js"></script>

    <script>
    function togglemodal(messaggio, scope){
      let titolo = "Avviso cambio pagina";

      $('#navigatemodal').find('.modal-title').text(titolo)
      $('#navigatemodal').find('.modal-body .messaggioInizio').text(messaggio )
      $('#navigatemodal').find('.modal-body .messaggioMeta').text()
      $('#navigatemodal').find('.modal-body .messaggioFine').text()
      $('#navigatemodal').find('.modal-body .scope').text(scope)
      $('#navigatemodal').modal('toggle');
    }
    </script>

</body>

</html>
