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
foreach ($actividades_del_estudiante as $actividad_del_estudiante) {
  if ($actividad_del_estudiante['status'] == 'calificado') {
    $actividades_resueltas[$actividad_del_estudiante['activity']] = true;
    foreach ($actividades as $actividad) {
      if ($actividad_del_estudiante['activity'] == $actividad['id']) {
        if ($actividad['type'] == "examen") {
          $grupo_examenes_asignados[] = $actividad['grupo'];
        }
      }
    }
  } else {
    foreach ($actividades as $actividad) {
      if ($actividad_del_estudiante['activity'] == $actividad['id']) {
        $actividades_sin_resolver[$actividad['id']] = $actividad['title'];
        if ($actividad['type'] == "examen") {
          $grupo_examenes_asignados[] = $actividad['grupo'];
        }
      }
    }
  }
}

foreach ($actividades as $actividad) {
  if ($actividad['type'] == "examen") {
    $grupo_total_examenes[$actividad['grupo']] = $actividad['after'];
  }
}


if ($grupo_examenes_asignados == NULL) {
  $grupos_evaluaciones = $grupo_total_examenes;
} else {
  foreach ($grupo_examenes_asignados as $grupo_especifico) {
    if (isset($grupo_total_examenes[$grupo_especifico])) {
      unset($grupo_total_examenes[$grupo_especifico]);
    }
  }
  $grupos_evaluaciones = $grupo_total_examenes;
}

if ($actividades_sin_resolver == NULL && $grupos_evaluaciones == NULL) {
  echo '<h5>No tienes actividades pendientes</h5>';
} else {
  echo '<table class="table"><thead>';
  echo '<tr><th>Titulo de actividad</th><th>Opcion</th></tr>';
  echo '</thead><tbody>';
  if ($actividades_sin_resolver != NULL) {
    foreach ($actividades_sin_resolver as $id => $title) {
      foreach ($actividades as $actividad) {
        if ($actividad['id'] == $id) {
          if ($actividad['after'] == NULL) {
            echo '<tr><td>'.$title.'</td>';
            echo '<td><a href="'.URL.'Student/resolver/'.$id.'">RESOLVER</a></td><tr>';
          } elseif (isset($actividades_resueltas[$actividad['after']])) {
            echo '<tr><td>'.$title.'</td>';
            echo '<td><a href="'.URL.'Student/resolver/'.$id.'">RESOLVER</a></td><tr>';
          } else {
            echo '<tr><td>'.$title.'</td>';
            echo '<td>BLOQUEADA</td><tr>';
          }
        }
      }
    }
  }

  if ($grupos_evaluaciones != NULL) {
    foreach ($grupos_evaluaciones as $grupo => $after) {
      if ($after == NULL) {
        echo '<tr><td>Evaluacion Individual g'.$grupo.'</td>';
        echo '<td><a href="'.URL.'Student/asignar/'.$grupo.'">RESOLVER</a></td></tr>';
      } elseif (isset($actividades_resueltas[$after])) {
        echo '<tr><td>Evaluacion Individual g'.$grupo.'</td>';
        echo '<td><a href="'.URL.'Student/asignar/'.$grupo.'">RESOLVER</a></td></tr>';
      } else {
        echo '<tr><td>Evaluacion Individual g'.$grupo.'</td>';
        echo '<td>BLOQUEADA</td></tr>';
      }
    }
  }  
  echo '</tbody></table>';
}
?>
</article>

</section>
