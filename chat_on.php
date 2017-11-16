<?php
 session_start();
 if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-success modal-buttom" id="button_cerrar_sessi">Cerrar session</button>
          </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
              <div class="content-user-only">

              </div>
            </div>
            <div class="col-7">
              <div class="user-title">
                  
              </div>
              <div class="content-message">

              </div>
              <div class="form-group">
                  <textarea class="form-control" rows="1" id="text-message"></textarea>
                  <button type="button" class="btn btn-primary modal-buttom" id="send_message">Enviar</button>
              </div>
            </div>
            <div class="col-2">
                <div class="content-users">

                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/chat.js"></script>
</body>
</html>
<?php
} else {
  header('Location: index.html');
}
  ?>
