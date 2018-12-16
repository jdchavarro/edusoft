<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EDUSOFT</title>
  <script src="<?php echo URL.VIEWS.DFT; ?>js/fontawesome/fontawesome-all.js"></script>
  <link rel="stylesheet" href="<?php echo URL.VIEWS.DFT; ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Index/css/index.css">
  <script src="<?php echo URL.VIEWS.DFT; ?>js/jquery33.min.js"></script>
  <style>
    html {
      background: url(<?php echo URL.IMG; ?>bg.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
</head>
<body>
<!-- Formulario inicio de sesion -->
<div id="form-logIn">
  <h5>INICIAR SESION</h5>
  
  <form action="<?php echo URL; ?>Index/login" method="POST">
    <div class="form-group">
    <label for="username">Nombre de usuario</label>
    <input type="text" class="form-control" name="username" required placeholder="Usuario">
    </div>

    <div class="form-group">
    <label for="password">Contraseña</label>
    <input class="form-control" type="password" name="password" required placeholder="Contraseña">
    </div>

    <input class="btn btn-info" type="submit" name="submit" value="Entrar">
  </form>
</div>

<?php
if (isset($msg_alert)) {
?>
<div class="alert alert-danger" id="msg-alert">
  <?php echo $msg_alert; ?>
</div>
<?php
}
?>

<div id="copyright">EDUSOFT &copy; copyright</div>
  
<script src="<?php echo URL.VIEWS.DFT; ?>js/popper.min.js"></script>
<script src="<?php echo URL.VIEWS.DFT; ?>js/bootstrap.min.js"></script>
</body>
</html>