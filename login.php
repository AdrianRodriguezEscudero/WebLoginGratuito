<?php
include 'database.php';
?>
<!doctype html>
<html lang="en">

<head>

  <!------------------ Etiquetas Meta ---------------------->
  <meta name="description" content="Web Free Login">
  <meta name="keywords" content="Web Free Login">
  <meta name="author" content="Adrián Rodríguez Escudero">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Free Login</title>
  <!------------------ Etiquetas Meta ---------------------->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?=getStyleCSS()?>">
</head>

<body class="body-background-gray">

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="loginBox">

            <!--<sa?php echo getHTMLContent(getComunHeaderCardURL() . "?image=" . serializeForURL(getIconPage()) . "&AplicationName=" . serializeForURL(getCompletedAplicationName()));?>-->

            <form id="form" method="post">

                <br>
                <div class="form-group">
                    <input type="text" id='username' class="form-control" name="username" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" id='password' class="form-control" name="password" placeholder="Contrase&ntilde;a" required>
                </div>
                <button id='boton' type="submit" class='btn btn-corporative-color-pantone-7404-u btn-block'>Login</button>
                <div id='response'></div>
            </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script>
    $(document).ready(function(){
        $('#form').submit(function(){

            // show that something is loading
            $('#response').html("<br><b>Check credentials...</b>");
            document.getElementById('boton').disabled = true;
            /*
             * 'post_receiver.php' - where you will pass the form data
             * $(this).serialize() - to easily read form data
             * function(data){... - data contains the response from post_receiver.php
             */
            $.ajax({
                type: 'POST',
                url: 'check-login.php',
                data: $(this).serialize()
            })
            .done(function(data){
                $('#response').html("");

              if(data.includes("correct"))
              {
                document.getElementById('boton').disabled = true;
                document.location="web-site.php";              
              }
              else if(data.includes("credenciales-incorrectos"))
              {
                document.getElementById('boton').disabled = false;
                $('#response').html("<br><b>Incorrect credentials.</b>");
                document.getElementById('username').style.boxShadow="0 0 5px 1px red"
                document.getElementById('password').style.boxShadow="0 0 5px 1px red"
              }

            })
            .fail(function() {
                alert( "Posting failed." );
            });

            // to prevent refreshing the whole page page
            return false;
        });
    });
    </script>
          </div><!-- /.loginBox -->          
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div>


    <!--/.row-->
  </div><!-- /.container -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>
