<!doctype html>
<html lang="it">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/scripts.js') }}"></script>


  <!-- Bootstrap css CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- custom css  -->
  <link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet">

  <!-- FontAwesome CDN -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
    crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

  <div class="row" style="height: 100%; margin-right: 0%; margin-left: 0%">

    <div class="wrapper" style="background-color: #333333;">
      <!-- Sidebar -->
      <nav id="sidebar">
        {{--
        <div class="sidebar-header">
          <h3>Bootstrap Sidebar</h3>
        </div>
        --}}
        <ul class="list-unstyled components">
          {{--
          <p>Dummy Heading</p> --}}
          <li class="nav-item">
            <a id='pazientii' class="nav-link navtext" href="/pazienti"><i class="fas fa-bed"></i> Pazienti </a>
          </li>

          <li class="nav-item">
            <a id='diagnosii' class="nav-link navtext" href="/diagnosi"><i class="far fa-address-card"></i> Diagnosi</a>
          </li>

          <li class="nav-item">
            <a id='allergiee' class="nav-link navtext" href="/allergie"><i class="fas fa-exclamation-triangle"></i> Allergie</a>
          </li>

          <li class="nav-item">
            <a id='medicinalii' class="nav-link navtext" href="/medicinali"><i class="fas fa-pills"></i> Medicinali </a>
          </li>

          <li class="nav-item">
            <a id='reminderss' class="nav-link navtext" href="/reminders"><i class="far fa-bell"></i> Reminder</a>
          </li>

        </ul>
      </nav>

    </div>

    {{--
    <div class="col-1.7" style="padding-right: 0">
      <ul class="nav flex-column lateralnav">

        <li class="nav-item">
          <a id='pazienti' class="nav-link navtext" href="/pazienti"><i class="fas fa-bed"></i> Pazienti </a>
        </li>

        <li class="nav-item">
          <a id='diagnosi' class="nav-link navtext" href="/diagnosi"><i class="far fa-address-card"></i> Diagnosi</a>
        </li>

        <li class="nav-item">
          <a id='allergie' class="nav-link navtext" href="/allergie"><i class="fas fa-exclamation-triangle"></i> Allergie</a>
        </li>

        <li class="nav-item">
          <a id='medicinali' class="nav-link navtext" href="/medicinali"><i class="fas fa-pills"></i> Medicinali </a>
        </li>

        <li class="nav-item">
          <a id='reminders' class="nav-link navtext" href="/reminders"><i class="far fa-bell"></i> Reminder</a>
        </li>

      </ul>
    </div> --}}



    <div class="col" style="padding: 0%">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 id="titolo"></h1>
      </nav>

      @yield('content')
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>
