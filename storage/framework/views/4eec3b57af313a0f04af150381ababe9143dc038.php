<!doctype html>
<html lang="it">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo e(URL::asset('js/scripts.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(URL::asset('js/pazientiscripts.js')); ?>"></script>


  <!-- Bootstrap css CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- custom css  -->
  <link href="<?php echo e(URL::asset('css/mystyle.css')); ?>" rel="stylesheet">

  <!-- FontAwesome CDN -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
    crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body>

  <div class="row" style="height: 100%; margin-right: 0%; margin-left: 0%">

    <div class="wrapper" style="background-color: #333333;">
      <!-- Sidebar -->
      <nav id="sidebar">
        
        <ul class="list-unstyled components">
          
          <li class="nav-item">
            <a id='pazientii' class="nav-link navtext" href="/pazienti"><i class="fas fa-bed fa-lg circle"></i> Pazienti</a>
          </li>

          <li class="nav-item">
            <a id='diagnosii' class="nav-link navtext" href="/diagnosi"><i class="far fa-address-card fa-lg circle"></i> Diagnosi</a>
          </li>

          <li class="nav-item">
            <a id='allergiee' class="nav-link navtext" href="/allergie"><i class="fas fa-exclamation-triangle fa-lg circle"></i> Allergie</a>
          </li>

          <li class="nav-item">
            <a id='medicinalii' class="nav-link navtext" href="/medicinali"><i class="fas fa-pills fa-lg circle"></i> Medicinali </a>
          </li>

          <li class="nav-item">
            <a id='reminderss' class="nav-link navtext" href="/reminders"><i class="far fa-bell fa-lg circle"></i> Reminder</a>
          </li>

        </ul>
      </nav>

    </div>

    



    <div class="col" style="padding: 0%">
        <nav class="navbar nav mx-auto" style="background-color: #9b8e6e; align-content: center">
            

            <ul class="nav navbar-nav mx-auto">
                <li class="nav-item"><a id="novus" class="nav-link" target="_blank" href="https://novusstudios.it/">Chirurgia Estetica del Piede - by Novus Studios</a></li>
            </ul>

        </nav>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 id="titolo"></h3>
      </nav>

      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>
