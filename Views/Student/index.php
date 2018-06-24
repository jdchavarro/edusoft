<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Student/css/index.css">

<section>

<?php
$name = Session::getSession("name");
$lastName = Session::getSession("lastName");
echo '<h1>Bienvenid@: <strong>'.$name.' '.$lastName.'</strong></h1>';

?>
<hr>

<article>

<?php
print_r($actividades);
?>

</article>

</section>
