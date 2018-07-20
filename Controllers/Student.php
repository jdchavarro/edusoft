<?php
class Student {
  
  public $model;

  function __construct() {
    require_once CTR.'Session.php';
    Session::start();
    if ($rol = Session::getSession("rol")){
      if ($rol != 'student'){
        header('Location: '.URL);
      }
    } else {
      header('Location: '.URL);
    }
    require_once MODELS.'Student_model.php';
    $this->model = new Student_model();
  }

  public function index(){
    $actividades = $this->model->getActivities("*", "status!='sin asignar'");
    $examenes = $this->model->getActivities("*", "type='examen'");
    $actividades_del_estudiante = $this->model->getActivitiesStudent("*", "student='".Session::getSession("username")."'");
    require_once HEAD;
    require_once VIEWS.'Student/header.php';
    require_once VIEWS.'Student/index.php';
    require_once FOOT;
  }

  public function resolver($activityID){
    $actividad = $this->model->getActivities("*", "id='".$activityID."'")[0];
    $ejerciciosActividad = $this->model->getExercisesActivity("*", "activity='".$activityID."'");
    $todosEjercicios = $this->model->getExercises("*");
    $todasRespuestas = $this->model->getResponses("*");
    $conceptos = $this->model->getConceptos("*");
    $estudiantes = $this->model->getStudents("*");
    if ($actividad['type'] == "examen") {
      $atrr['activity'] = $activityID;
      $atrr['name'] = gethostname();
      $this->model->setComputers($atrr);
    }
    require_once HEAD;
    require_once VIEWS.'Student/header.php';
    require_once VIEWS.'Student/resolver.php';
    require_once FOOT;
  }

  public function revisar($activityID){
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);
      $todasRespuestas = $this->model->getResponses("*");

      $estudiantes[] = Session::getSession("username");
      foreach ($_POST as $key => $value) {
        $llave = explode("-", $key);
        if ($llave[0] == "student") {
          if ($value != "solo") {
            $estudiantes[] = $value;
          }
          unset($_POST[$key]);
        }
      }
      foreach ($estudiantes as $estudianteID) {
        $actividadesEstudiante = $this->model->getActivitiesStudent("*", "student='".$estudianteID."' AND activity='".$activityID."'");
        if (count($actividadesEstudiante) == 1) {
          if ($actividadesEstudiante[0]['status'] != 'calificado') {
            foreach ($_POST as $key => $value) {
              $tipo = explode("-", $key);
              if ($tipo[0] == "completar") {
                foreach ($todasRespuestas as $respuesta) {
                  if ($respuesta['id'] == $tipo[2]) {
                    $dato['student'] = $estudianteID;
                    $dato['activity'] = $activityID;
                    $dato['exercise'] = $tipo[1];
                    $dato['response'] = $tipo[2];
                    $dato['answer'] = $value;
                    if ($respuesta['solution'] == $value) {
                      $dato['rating'] = 1;
                    } else {
                      $dato['rating'] = 0;
                    }
                    $this->model->responseRegister($dato);
                  }
                }
              } elseif ($tipo[0] == "desplegar") {
                $dato['student'] = $estudianteID;
                $dato['activity'] = $activityID;
                $dato['exercise'] = $tipo[1];
                $value = explode("-", $value);
                $dato['response'] = $value[0];
                $dato['answer'] = $value[1];
                if (1 == $value[1]) {
                  $dato['rating'] = 1;
                } else {
                  $dato['rating'] = 0;
                }
                $this->model->responseRegister($dato);
              } elseif ($tipo[0] == "multiple") {
                $dato['student'] = $estudianteID;
                $dato['activity'] = $activityID;
                $dato['exercise'] = $tipo[1];
                foreach ($todasRespuestas as $respuesta) {
                  if ($respuesta['exercise'] == $tipo[1]) {
                    $existe = false;
                    foreach ($value as $k => $v) {
                      if ($respuesta['id'] == $k) {
                        $existe = true;
                        $dato['response'] = $k;
                        $dato['answer'] = 1;
                        if ($respuesta['solution'] == 1) {
                          $dato['rating'] = 1;  
                        } else {
                          $dato['rating'] = 0;
                        }
                      }
                    }
                    if ($existe) {
                      $this->model->responseRegister($dato);
                    } else {
                      $dato['response'] = $respuesta['id'];
                      $dato['answer'] = 0;
                      if ($respuesta['solution'] == 0) {
                        $dato['rating'] = 1;  
                      } else {
                        $dato['rating'] = 0;
                      }
                      $this->model->responseRegister($dato);
                    }
                  }
                }
              } elseif ($tipo[0] == "unica") {
                $dato['student'] = $estudianteID;
                $dato['activity'] = $activityID;
                $dato['exercise'] = $tipo[1];
                foreach ($todasRespuestas as $respuesta) {
                  if ($respuesta['exercise'] == $tipo[1]) {
                    
                    if ($respuesta['id'] == $value) {
                      $existe = true;
                      $dato['response'] = $value;
                      $dato['answer'] = 1;
                      if ($respuesta['solution'] == 1) {
                        $dato['rating'] = 1;  
                      } else {
                        $dato['rating'] = 0;
                      }
                      $this->model->responseRegister($dato);
                    } else {
                      $dato['response'] = $respuesta['id'];
                      $dato['answer'] = 0;
                      if ($respuesta['solution'] == 1) {
                        $dato['rating'] = 0;
                        $this->model->responseRegister($dato);
                      }
                    }
                  }
                }
              }
            }
            //Verificamos que se halla respondido todo
            $todosEjercicios = $this->model->getExercises("*");
            $ejerciciosActividad = $this->model->getExercisesActivity("*", "activity='".$activityID."'");
            foreach ($ejerciciosActividad as $ejercicioActividad) {
              $test = $this->model->getStudentResponses("*", "exercise='".$ejercicioActividad['exercise']."' AND student='".$estudianteID."' AND activity='".$activityID."'");
              if ($test == NULL) {
                foreach ($todosEjercicios as $ejercicio) {
                  if ($ejercicioActividad['exercise'] == $ejercicio['id']) {
                    if ($ejercicio['type'] == "unica") {
                      $dato['student'] = $estudianteID;
                      $dato['activity'] = $activityID;
                      $dato['exercise'] = $ejercicio['id'];
                      foreach ($todasRespuestas as $respuesta) {
                        if ($respuesta['exercise'] == $ejercicio['id']) {
                          $dato['response'] = $respuesta['id'];
                          if ($respuesta['solution'] == 0) {
                            $dato['answer'] = 1;
                          }
                        }
                      }
                      $dato['rating'] = 0;
                      $this->model->responseRegister($dato);
                    } elseif ($ejercicio['type'] == "multiple") {
                      $dato['student'] = $estudianteID;
                      $dato['activity'] = $activityID;
                      $dato['exercise'] = $ejercicio['id'];
                      foreach ($todasRespuestas as $respuesta) {
                        if ($respuesta['exercise'] == $ejercicio['id']) {
                          $dato['response'] = $respuesta['id'];
                          if ($respuesta['solution'] == 0) {
                            $dato['answer'] = 1;
                          } else {
                            $dato['answer'] = 0;
                          }
                          $dato['rating'] = 0;
                          $this->model->responseRegister($dato);
                        }
                      }
                    }
                  }
                }
              }
            }
            //Calificamos
            $answers = $this->model->getStudentResponses("*", "student='".$estudianteID."' AND activity='".$activityID."'");
            $cantidadEjercicios = count($answers);
            $nBuenas = 0;
            foreach ($answers as $answer) {
              if ($answer['rating'] == 1) {
                $nBuenas++;
              }
            }
            $actualizacion['status'] = "calificado";
            $actualizacion['rating'] = round((5 * ($nBuenas / $cantidadEjercicios)), 1);
            $this->model->studentActivitiesUpdate($actualizacion, "student='".$estudianteID."' AND activity='".$activityID."'");

          } else {
            $msg_alert .= '<div class="alert alert-danger msg-alert">';
            $msg_alert .= '<strong>'.$estudianteID.'</strong> ya resolvio la actividad</div>';
          }
        } else {
          $msg_alert .= '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>'.$estudianteID.'</strong> no tiene asignada la actividad</div>';
        }
      }

      $update['status'] = "resuelto";
      $this->model->activityUpdate($update, "id='".$activityID."'");

      $actividad = $this->model->getActivities("*", "id='".$activityID."'")[0];
      $answers = $this->model->getStudentResponses("*", "student='".Session::getSession("username")."' AND activity='".$activityID."'");
      $calificacion = $this->model->getActivitiesStudent("*", "student='".Session::getSession("username")."' AND activity='".$activityID."'")[0]['rating'];
      require_once HEAD;
      require_once VIEWS.'Student/header.php';
      require_once VIEWS.'Student/revisar.php';
      require_once FOOT;
    } else {
      header("Location: ".URL);
    }
  }

  public function asignar() {
    $grupo = $_POST['grupo'];
    $ip = $_POST['ip'];
    $actividades = $this->model->getActivities("*", "grupo='".$grupo."'");

    foreach ($actividades as $key => $actividad) {
      $respuesta_computadores = $this->model->getComputers("*", "activity='".$actividad['id']."'");
      if ($respuesta_computadores != NULL) {
        foreach ($respuesta_computadores as $computer) {
          if ($ip == $computer['name']) {
            unset($actividades[$key]);
          }
        }
      }
    }

    require_once HEAD;
    require_once VIEWS.'Student/header.php';
    
    if ($actividades != NULL) {
      $activityID = reset($actividades)['id'];
      $atrr['activity'] = $activityID;
      $atrr['name'] = $ip;
      $this->model->setComputers($atrr);
      $atributo['activity'] = $activityID;
      $atributo['student'] = Session::getSession("username");
      $this->model->asignarEstudiante($atributo);
      $actividad = $this->model->getActivities("*", "id='".$activityID."'")[0];
      $ejerciciosActividad = $this->model->getExercisesActivity("*", "activity='".$activityID."'");
      $todosEjercicios = $this->model->getExercises("*");
      $todasRespuestas = $this->model->getResponses("*");
      $conceptos = $this->model->getConceptos("*");
      $estudiantes = $this->model->getStudents("*");
      require_once VIEWS.'Student/resolver.php';
    } else {
      require_once VIEWS.'Student/error.php';
    }
    require_once FOOT;
  }

}
?>