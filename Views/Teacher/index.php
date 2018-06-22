<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/index.css">
<?php
$name = Session::getSession("name");
$lastName = Session::getSession("lastName");
echo '<h1 id="welcomeMsg">Bienvenida: <strong>'.$name.' '.$lastName.'</strong></h1>';
?>