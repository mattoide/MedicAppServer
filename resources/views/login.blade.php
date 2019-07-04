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


  <!-- Bootstrap css CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- custom css  -->
  <link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet">

  <!-- FontAwesome CDN -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
    crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@3.4.3/dist/file-upload-with-preview.min.css">


  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

  <nav class="navbar fixed-top nav mx-auto" style="background-color: #9b8e6e; align-content: center; z-index: 1032;">

    <ul class="nav navbar-nav mx-auto">
        <li class="nav-item"><a id="novus"  class="nav-link" style="color: white" target="_blank" href="https://novusstudios.it/">Chirurgia Estetica del Piede - by Novus Studios</a></li>
    </ul>

</nav>




            <div class="container" style="margin-top:10em" id="content">
                    <form method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                
                
                    <div class="form-group">
                        <button style="cursor:pointer; margin-inline-start: 50% " type="submit" class="btn btn-success">Login</button>
                    </div>

                    <div class="form-group">
                            <button style="cursor:pointer; margin-inline-start: 50% " type="button" onclick="goToReg()" class="btn btn-warning">Registrati</button>
                        </div>
                </form>
                

@if( $errors->first() != NULL)
                <div class="alert alert-danger" style="text-align: center">

                            <?php echo $errors->first() ;?>

                        </div>
                    </div>
                
                @endif

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
          crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
          crossorigin="anonymous"></script>
      
          <script src="https://unpkg.com/file-upload-with-preview@3.4.3/dist/file-upload-with-preview.min.js"></script>
      
      
      </body>

    <script>

        function goToReg(){
            location.href = "/register";

        }

            $(document).ready(function () {


                    alertPopup = function () {
                    }
                    alertPopup.warning = function (id, message) {
                        // $('#'+id).append('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
                        $(id).append('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>' + message + '</span></div>')
                        setTimeout(function () {
                            $(".alert").alert('close')
                        }, 4000);
                    }

            });
    </script>
      
      </html>
      

