<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Student/css/resolver.css">

<section>

<?php
echo '<h2>'.strtoupper($actividad['title']).'</h2>';

if ($actividad['type'] == "actividad") {
  ?>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#conceptosModal">CONCEPTOS</button>

  <!-- Modal -->
  <div class="modal fade" id="conceptosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="conceptosModalLabel">CONCEPTOS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <?php
          if ($conceptos != "") {
            foreach ($conceptos as $concepto) {
              echo '<div class="concepto">';
              echo '<h4>'.$concepto['name'].'</h4>';
              echo '<p>'.$concepto['description'].'</p>';
              echo '<p class="imgConcepto"><img src="'.URL.IMG.'concepto/'.$concepto['img'].'" alt="'.$concepto['name'].'"></p>';
              echo '</div><hr>';
            }
          }
           else {
            echo 'No hay conceptos para mostrar';
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php
}
echo '<form action="'.URL.'Student/revisar/'.$actividad["id"].'" method="POST" id="formulario">';
echo '<div id="otrosEstudiantes">';

if ($actividad['students'] > 1) {
  echo '<h5>La actividad puede realizarce en grupo de '.$actividad['students'].' estudiantes.</h5>';
  for ($i=2; $i <= $actividad['students']; $i++) {
    echo '<div class="form-group">';
    echo '<label for="student-'.$i.'">Estudiante '.$i.'</label>';
    echo '<select class="form-control" name="student-'.$i.'" id="student-'.$i.'">';
    echo '<option value="solo"></option>';
    foreach ($estudiantes as $est) {
      if ($est["username"] != Session::getSession("username")) {
        echo '<option value="'.$est["username"].'">'.$est["lastName"].' '.$est["name"].'</option>';
      }
    }
    echo '</select></div>';
  }
}
echo '</div>';
?>
<hr>

<?php
foreach ($ejerciciosActividad as $ejercicioActividad) {
  echo '<div class="ejercicios">';
  foreach ($todosEjercicios as $ejercicio) {
    if ($ejercicioActividad['exercise'] == $ejercicio['id']) {
      if ($ejercicio['description'] != "") {
        echo '<p>'.$ejercicio['description'].'</p>';
      }
      if ($ejercicio['img'] != "") {
        echo '<p class="imgConcepto"><img src="'.URL.IMG.'exercise/'.$ejercicio['img'].'" alt="'.$ejercicio['description'].'"></p>';
      }
      if ($ejercicio['type'] == "completar") {
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            $descripcion = explode("_", $respuesta['description']);
            echo '<p>';
            echo '<span>'.$descripcion[0].'</span>';
            echo '<input class="completar" name="completar-'.$ejercicio['id'].'-'.$respuesta['id'].'">';
            echo '<span>'.$descripcion[1].'</span>';
            echo '</p>';
          }
        }
      } elseif ($ejercicio['type'] == "multiple") {
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" id="ejercicio-'.$ejercicio['id'].'-'.$respuesta['id'].'" name="multiple-'.$ejercicio['id'].'['.$respuesta['id'].']">';
            echo '<label class="form-check-label" for="ejercicio-'.$ejercicio['id'].'-'.$respuesta['id'].'">';
            if ($respuesta['description'] != "") {
              echo $respuesta['description'];
            }
            if ($respuesta['img'] != "") {
              echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'" alt="'.$respuesta['description'].'"></p>';
            }
            echo '</label>';
            echo '</div>';
          }
        }
      } elseif ($ejercicio['type'] == "unica") {
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="radio" id="ejercicio-'.$ejercicio['id'].'-'.$respuesta['id'].'" name="unica-'.$ejercicio['id'].'" value="'.$respuesta['id'].'">';
            echo '<label class="form-check-label" for="ejercicio-'.$ejercicio['id'].'-'.$respuesta['id'].'">';
            if ($respuesta['description'] != "") {
              echo $respuesta['description'];
            }
            if ($respuesta['img'] != "") {
              echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'" alt="'.$respuesta['description'].'"></p>';
            }
            echo '</label>';
            echo '</div>';
          }
        }
      } elseif ($ejercicio['type'] == "desplegar") {
        echo '<select class="form-control select" name="desplegar-'.$ejercicio['id'].'">';
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            echo '<option value="'.$respuesta['id'].'-'.$respuesta['solution'].'">'.$respuesta['description'].'</option>';
          }
        }
        echo '</select>';
      }

    }
  }
  echo '</div><hr>';
}
?>
<!-- Small modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">ENVIAR</button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <input class="btn btn-primary" name="submit" type="submit" id="form-submit" value="CONFIRMAR">
    </div>
  </div>
</div>

</form>
</section>
<script src="<?php echo URL.VIEWS; ?>Student/js/resolver.js"></script>
