<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Student/css/index.css">

<section>

<?php
$name = Session::getSession("name");
$lastName = Session::getSession("lastName");
echo '<h1>Bienvenid@: <strong>'.$name.' '.$lastName.'</strong></h1>';

?>
<hr>

<article>

<table class="table">
  <thead>
    <tr>
      <th>Titulo de actividad</th>
      <th>Opcion</th>
    </tr>
  </thead>
  <tbody>

<?php
$actividadesResueltas = "";
foreach ($actividadesEstudiante as $actividadEstudiante) {
  if ($actividadEstudiante['status'] != "calificado") {
    foreach ($actividades as $actividad) {
      if ($actividad['id'] == $actividadEstudiante['activity']) {
        if ($actividad['type'] == "examen") {
          $grupoEvaluacionesMostradas[] = $actividad['grupo'];
        }
        echo '<tr>';
        echo '<td>'.$actividad["title"].'</td>';
        if ($actividad['after'] == "") {
          echo '<td><a href="'.URL.'Student/resolver/'.$actividad["id"].'">RESOLVER</a></td>';
        } elseif (isset($actividadesResueltas[$actividad['after']])) {
          echo '<td><a href="'.URL.'Student/resolver/'.$actividad["id"].'">RESOLVER</a></td>';
        } else {
          echo '<td>BLOQUEADA</td>';
        }
        echo '</tr>';
      }
      if ($actividad['type'] == "examen") {
        $gruposEvaluacionesExistentes[$actividad['grupo']] = $actividad['grupo'];
      }
    }
  } else {
    $actividadesResueltas[$actividadEstudiante['activity']] = $actividadEstudiante['activity'];
  }
}
foreach ($gruposEvaluacionesExistentes as $grupoExistente) {
  if(isset($grupoEvaluacionesMostradas)) {
    foreach ($grupoEvaluacionesMostradas as $grupoMostrado) {
      if ($grupoExistente != $grupoMostrado) {
        echo '<tr>';
        echo '<td>Evaluacion</td>';
        echo '<td>BLOQUEADO</td>';
        echo '</tr>';
      }
    }
  } else {
    echo '<tr>';
    echo '<td>Evaluacion</td>';
    echo '<td>BLOQUEADO</td>';
    echo '</tr>';
  }
}

?>

  </tbody>
</table>

</article>

</section>
