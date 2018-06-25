<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Student/css/revisar.css">
<section>

<?php
    if (isset($msg_alert)) {
      echo $msg_alert;
    }
?>
</section>

<section>

<?php
echo '<h2>'.strtoupper($actividad['title']).'</h2>';
echo '<div class="alert alert-info msg-alert">';
echo 'Calificacion: <strong>'.$calificacion.'</strong></div>';
echo '<hr>';

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
            foreach ($answers as $answer) {
              if ($answer['response'] == $respuesta['id']){
                if($answer['rating'] == 1) {
                  echo '<div class="alert alert-success">';
                  echo '<p>';
                  echo '<span>'.$descripcion[0].'</span>';
                  echo '<input class="completar" value="'.$answer['answer'].'">';
                  echo '<span>'.$descripcion[1].'</span>';
                  echo '</p>';
                  echo '</div>';
                } else {
                  echo '<div class="alert alert-danger">';
                  echo '<p>';
                  echo '<span>'.$descripcion[0].'</span>';
                  echo '<input class="completar" value="'.$answer['answer'].'">';
                  echo '<span>'.$descripcion[1].'</span>';
                  echo '</p>';
                  echo 'Respuesta correcta:'.$respuesta['solution'];
                  echo '</div>';
                }
              }
            }
          }
        }
      } elseif ($ejercicio['type'] == "multiple") {
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            foreach ($answers as $answer) {
              if ($answer['response'] == $respuesta['id']){
                if($answer['rating'] == 1) {
                  echo '<div class="alert alert-success">';
                  echo '<div class="form-check">';
                  echo '<input class="form-check-input" type="checkbox"';
                  if ($answer['answer'] == 1) {
                    echo 'checked>';
                  } 
                  echo '<label class="form-check-label">';
                  if ($respuesta['description'] != "") {
                    echo $respuesta['description'];
                  }
                  if ($respuesta['img'] != "") {
                    echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                  }
                  echo '</label>';
                  echo '</div>';
                  echo '</div>';
                } else {
                  if ($respuesta['solution'] == 1) {
                    echo '<div class="alert alert-info">';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="checkbox">';
                    echo '<label class="form-check-label">';
                    if ($respuesta['description'] != "") {
                      echo $respuesta['description'];
                    }
                    if ($respuesta['img'] != "") {
                      echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                    }
                    echo '</label>';
                    echo '</div>';
                    echo 'Esta era una respuesta correcta';
                    echo '</div>';
                  } else {
                    if ($answer['answer'] == 1) {
                      echo '<div class="alert alert-danger">';
                      echo '<div class="form-check">';
                      echo '<input class="form-check-input" checked type="checkbox">';
                      echo '<label class="form-check-label">';
                      if ($respuesta['description'] != "") {
                        echo $respuesta['description'];
                      }
                      if ($respuesta['img'] != "") {
                        echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                      }
                      echo '</label>';
                      echo '</div>';
                      echo 'Esta <strong>NO</strong> era una respuesta correcta';
                      echo '</div>';
                    } else {
                      echo '<div class="form-check">';
                      echo '<input class="form-check-input" checked type="checkbox">';
                      echo '<label class="form-check-label">';
                      if ($respuesta['description'] != "") {
                        echo $respuesta['description'];
                      }
                      if ($respuesta['img'] != "") {
                        echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                      }
                      echo '</label>';
                      echo '</div>';
                    }                    
                  }
                  
                }
              }
            }
          }
        }
      } elseif ($ejercicio['type'] == "unica") {
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            foreach ($answers as $answer) {
              if ($answer['response'] == $respuesta['id']){
                if($answer['rating'] == 1) {
                  echo '<div class="alert alert-success">';
                  echo '<div class="form-check">';
                  echo '<input class="form-check-input" checked type="radio" name="radio">';
                  echo '<label class="form-check-label">';
                  if ($respuesta['description'] != "") {
                    echo $respuesta['description'];
                  }
                  if ($respuesta['img'] != "") {
                    echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                  }
                  echo '</label>';
                  echo '</div>';
                  echo '</div>';
                } else {
                  if ($respuesta['solution'] == 1) {
                    echo '<div class="alert alert-info">';
                    echo '<div class="form-check">';
                    echo '<input class="form-check-input" type="radio" name="radio">';
                    echo '<label class="form-check-label">';
                    if ($respuesta['description'] != "") {
                      echo $respuesta['description'];
                    }
                    if ($respuesta['img'] != "") {
                      echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                    }
                    echo '</label>';
                    echo '</div>';
                    echo 'Esta era una respuesta correcta';
                    echo '</div>';
                  } else {
                    if ($answer['answer'] == 1) {
                      echo '<div class="alert alert-danger">';
                      echo '<div class="form-check">';
                      echo '<input class="form-check-input" checked type="radio" name="radio">';
                      echo '<label class="form-check-label">';
                      if ($respuesta['description'] != "") {
                        echo $respuesta['description'];
                      }
                      if ($respuesta['img'] != "") {
                        echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                      }
                      echo '</label>';
                      echo '</div>';
                      echo 'Esta <strong>NO</strong> era una respuesta correcta';
                      echo '</div>';
                    } else {
                      echo '<div class="form-check">';
                      echo '<input class="form-check-input"type="radio" name="radio">';
                      echo '<label class="form-check-label">';
                      if ($respuesta['description'] != "") {
                        echo $respuesta['description'];
                      }
                      if ($respuesta['img'] != "") {
                        echo '<p class="imgConcepto"><img src="'.URL.IMG.'response/'.$respuesta['img'].'"></p>';
                      }
                      echo '</label>';
                      echo '</div>';
                    }                    
                  }
                  
                }
              }
            }
          }
        }
      } elseif ($ejercicio['type'] == "desplegar") {
        $r = "";
        $correcta = "";
        $buena = false;
        foreach ($todasRespuestas as $respuesta) {
          if ($ejercicio['id'] == $respuesta['exercise']) {
            foreach ($answers as $answer) {
              if ($answer['response'] == $respuesta['id']){
                $r = $respuesta['description'];
                if($answer['rating'] == 1) {
                  $buena = true;
                }
              } else {
                if ($respuesta['solution'] == 1) {
                  $correcta = $respuesta['description'];
                }
              }
            }
          }
        }
        if ($buena) {
          echo '<div class="alert alert-success">';
          echo '<select class="form-control select">';
          echo '<option>'.$r.'</option>';
          echo '</select>';
          echo '</div>';
        } else {
          echo '<div class="alert alert-danger">';
          echo '<select class="form-control select">';
          echo '<option>'.$r.'</option>';
          echo '</select>';
          echo 'Respuesta correcta: '.$correcta;
          echo '</div>';
        }
      }

    }
  }
  echo '</div><hr>';
}
?>
<a class="btn btn-primary" href="<?php echo URL; ?>Student/index">VOLVER AL INICIO</a>
</section>

<script src="<?php echo URL.VIEWS; ?>Student/js/revisar.js"></script>