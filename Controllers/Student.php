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
    $actividadesEstudiante = $this->model->getActivitiesStudent("*", "student='".Session::getSession("username")."'");
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
                    //$this->model->responseRegister($dato);
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
                //$this->model->responseRegister($dato);
              } elseif ($tipo[0] == "multiple") {
                $dato['student'] = $estudianteID;
                $dato['activity'] = $activityID;
                $dato['exercise'] = $tipo[1];
                foreach ($todasRespuestas as $respuesta) {
                  if ($respuesta['exercise'] == $tipo[1]) {
                    $exite = false;
                    foreach ($value as $k => $v) {
                      if ($respuesta['id'] == $k) {
                        $exite = true;
                        $dato['response'] = $k;
                        $dato['answer'] = 1;
                        if ($respuesta['solution'] == 1) {
                          $dato['rating'] = 1;  
                        } else {
                          $dato['rating'] = 0;
                        }
                      }
                    }
                    if ($exite) {
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
              }
            }
          } else {
            $msg_alert .= '<div class="alert alert-danger msg-alert">';
            $msg_alert .= '<strong>'.$estudianteID.'</strong> ya resolvio la actividad</div>';
          }
        } else {
          $msg_alert .= '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>'.$estudianteID.'</strong> no tiene asignada la actividad</div>';
        }
      }




      $actividad = $this->model->getActivities("*", "id='".$activityID."'")[0];
      $ejerciciosActividad = $this->model->getExercisesActivity("*", "activity='".$activityID."'");
      $todosEjercicios = $this->model->getExercises("*");
      $todasRespuestas = $this->model->getResponses("*");
      $conceptos = $this->model->getConceptos("*");
      $actividadesEstudiantes = $this->model->getStudentActivities("*");
      require_once HEAD;
      require_once VIEWS.'Student/header.php';
      require_once VIEWS.'Student/revisar.php';
      require_once FOOT;
    } else {
      header("Location: ".URL);
    }
  }

}
?>