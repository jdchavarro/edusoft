<?php
class Teacher {
  
  public $model;

  function __construct() {
    require_once CTR.'Session.php';
    Session::start();
    if ($rol = Session::getSession("rol")){
      if ($rol != 'teacher'){
        header('Location: '.URL);
      }
    } else {
      header('Location: '.URL);
    }
    require_once MODELS.'Teacher_model.php';
    $this->model = new Teacher_model();
  }

  public function index(){
    require_once HEAD;
    require_once VIEWS.'Teacher/header.php';
    require_once VIEWS.'Teacher/index.php';
    require_once FOOT;
  }

  public function student($btnOption) {
    if ($btnOption != "crear"){
      $btnOption = explode("-", $btnOption);
      $studentID = $btnOption[1];
      $btnOption = $btnOption[0];
      $updateStudentInformation = $this->model->studentInformation("*", "id='".$studentID."'");
    }
    $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
    require_once HEAD;
    require_once VIEWS.'Teacher/header.php';
    require_once VIEWS.'Teacher/student.php';
    require_once FOOT;
  }

  public function crearStudent() {
    $btnOption ="crear";
    if (isset($_POST['submit'])){
      $studentInformation = $this->model->studentInformation("*", "username='".$_POST['username']."'");
      if ($studentInformation == NULL) {
        $information["username"] = $_POST['username'];
        $information["password"] = $_POST['username'];
        $information["rol"] = "student";
        $information["name"] = $_POST['name'];
        $information["lastName"] = $_POST['lastName'];
        if ($this->model->userRegister($information)) {
          $msg_alert = '<div class="alert alert-success msg-alert">';
          $msg_alert .= 'Estudiante creado <strong>EXITOSAMENTE</strong></div>';
        } else {
          $msg_alert = '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>ERROR CE1:</strong> error al crear el estudiante en la base de datos</div>';  
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= 'El ID <strong>'.$_POST['username'].'</strong> esta registrado a <strong>'.$studentInformation['name'].' '.$studentInformation['lastName'].'</strong></div>';
      }
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/student.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function actualizarStudent($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $information["name"] = $_POST['name'];
      $information["lastName"] = $_POST['lastName'];
      if ($this->model->userUpdate($information, "id='".$id."'")) {
        $msg_alert = '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Estudiante actualizado <strong>EXITOSAMENTE</strong></div>';
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR AE1:</strong> error al actualizar el estudiante en la base de datos</div>';
      }
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/student.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function borrarStudent($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      if ($this->model->userDelete("id='".$id."'")) {
        $msg_alert = '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Estudiante eliminado <strong>EXITOSAMENTE</strong></div>';
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR AE1:</strong> error al actualizar el estudiante en la base de datos</div>';
      }
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/student.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function concepto($btnOption){
    if ($btnOption != "crear"){
      $btnOption = explode("-", $btnOption);
      $conceptoID = $btnOption[1];
      $btnOption = $btnOption[0];
      $updateConceptoInformation = $this->model->conceptoInformation("*", "id='".$conceptoID."'");
    }
    $conceptosInformation = $this->model->conceptosInformationOrder("*", "name");
    require_once HEAD;
    require_once VIEWS.'Teacher/header.php';
    require_once VIEWS.'Teacher/concepto.php';
    require_once FOOT;
  }

  public function crearConcepto() {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $conceptoInformation = $this->model->conceptoInformation("*", "name='".$_POST['name']."'");
      if ($conceptoInformation == NULL) {
        $information["name"] = $_POST['name'];
        if (isset($_POST['description'])) {
          $information["description"] = $_POST['description'];
        }
        if (isset($_FILES['img'])) {
          $img = $_FILES['img'];
          $img_folder = IMG."concepto/";
          $img_type = strtolower($img['type']);

          if ($img['error'] == 0) {
            if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
              $msg_alert = '<div class="alert alert-danger msg-alert">';
              $msg_alert .= '<strong>ERROR CC2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
            } else {
              $ext = explode("/", $img_type);
              $target_file = $img_folder.$_POST['name'].".".$ext[1];
              if(move_uploaded_file($img['tmp_name'], $target_file)) {
                $information['img'] = $_POST['name'].".".$ext[1];
              } else {
                $msg_alert = '<div class="alert alert-danger msg-alert">';
                $msg_alert .= '<strong>ERROR CC3:</strong> problemas al intentar cargar la imagen al servidor</div>';
              }
            }
          }
        }

        if ($this->model->conceptoRegister($information)) {
          $msg_alert .= '<div class="alert alert-success msg-alert">';
          $msg_alert .= 'Concepto <strong>'.$information["name"].'</strong> creado <strong>EXITOSAMENTE</strong></div>';
        } else {
          $msg_alert = '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>ERROR CC1:</strong> error al crear el concepto en la base de datos</div>';
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= 'El concepto <strong>'.$_POST['name'].'</strong> ya esta registrado</div>';
      }
      $conceptosInformation = $this->model->conceptosInformationOrder("*", "name");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/concepto.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function actualizarConcepto($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $information["name"] = $_POST['name'];
      if (isset($_POST['description'])) {
        $information["description"] = $_POST['description'];
      }
      $conceptoInformation = $this->model->conceptoInformation("*", "id='".$id."'");
      if (isset($_POST['checkbox'])) {
        $information['img'] = "";

        //Eliminamos la imagen del servidor
        if ($conceptoInformation['img'] != NULL) {
          $img_folder = IMG."concepto/";
          $target_file = $img_folder.$conceptoInformation['img'];
          if (file_exists($target_file)) {
            unlink($target_file);
          }
        }
      } elseif (isset($_FILES['img'])) {
        $img = $_FILES['img'];
        $img_folder = IMG."concepto/";
        $img_type = strtolower($img['type']);

        if ($img['error'] == 0) {
          //Eliminamos la imagen del servidor
          if ($conceptoInformation['img'] != NULL) {
            $img_folder = IMG."concepto/";
            $target_file = $img_folder.$conceptoInformation['img'];
            if (file_exists($target_file)) {
              unlink($target_file);
            }
          }

          if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
            $msg_alert = '<div class="alert alert-danger msg-alert">';
            $msg_alert .= '<strong>ERROR CC2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
          } else {
            $ext = explode("/", $img_type);
            $target_file = $img_folder.$_POST['name'].".".$ext[1];
            if(move_uploaded_file($img['tmp_name'], $target_file)) {
              $information['img'] = $_POST['name'].".".$ext[1];
            } else {
              $msg_alert = '<div class="alert alert-danger msg-alert">';
              $msg_alert .= '<strong>ERROR CC3:</strong> problemas al intentar cargar la imagen al servidor</div>';
            }
          }
        }
      }

      if ($this->model->conceptoUpdate($information, "id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Concepto actualizado <strong>EXITOSAMENTE</strong></div>';
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR UC1:</strong> error al actualizar el concepto en la base de datos</div>';
      }

      $conceptosInformation = $this->model->conceptosInformationOrder("*", "name");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/concepto.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function borrarConcepto($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $conceptoInformation = $this->model->conceptoInformation("*", "id='".$id."'");
      //Eliminamos la imagen del servidor
      if ($conceptoInformation['img'] != NULL) {
        $img_folder = IMG."concepto/";
        $target_file = $img_folder.$conceptoInformation['img'];
        if (file_exists($target_file)) {
          unlink($target_file);
        }
      }

      if ($this->model->conceptoDelete("id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Concepto eliminado <strong>EXITOSAMENTE</strong></div>';
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR DC1:</strong> error al eliminar el concepto de la base de datos</div>';
      }

      $conceptosInformation = $this->model->conceptosInformationOrder("*", "name");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/concepto.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function exercise($btnOption) {
    if ($btnOption != "crear"){
      $btnOption = explode("-", $btnOption);
      $exerciseID = $btnOption[1];
      $btnOption = $btnOption[0];
      $exerciseInformation = $this->model->exerciseInformation("*", "id='".$exerciseID."'");
      $responsesInformation = $this->model->responsesInformation("*", "exercise='".$exerciseID."'");
    }
    $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
    require_once HEAD;
    require_once VIEWS.'Teacher/header.php';
    require_once VIEWS.'Teacher/exercise.php';
    require_once FOOT;
  }

  public function crearExercise() {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $exerciseInformation = $this->model->exerciseInformation("*", "title='".$_POST['title']."'");
      if ($exerciseInformation == NULL) {
        unset($_POST['submit']);
        $information["title"] = $_POST['title'];
        unset($_POST['title']);
        if (isset($_POST['description'])) {
          $information["description"] = $_POST['description'];
        }
        unset($_POST['description']);
        if (isset($_FILES['img'])) {
          $img = $_FILES['img'];
          $img_folder = IMG."exercise/";
          $img_type = strtolower($img['type']);

          if ($img['error'] == 0) {
            if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
              $msg_alert = '<div class="alert alert-danger msg-alert">';
              $msg_alert .= '<strong>ERROR CE2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
            } else {
              $ext = explode("/", $img_type);
              $target_file = $img_folder.$information['title'].".".$ext[1];
              if(move_uploaded_file($img['tmp_name'], $target_file)) {
                $information['img'] = $information['title'].".".$ext[1];
              } else {
                $msg_alert = '<div class="alert alert-danger msg-alert">';
                $msg_alert .= '<strong>ERROR CE3:</strong> problemas al intentar cargar la imagen al servidor</div>';
              }
            }
          }
          unset($_FILES['img']);
        }
        $information["type"] = $_POST['type'];
        unset($_POST['type']);
        if ($this->model->exerciseRegister($information)) {
          $msg_alert .= '<div class="alert alert-success msg-alert">';
          $msg_alert .= 'Ejercicio <strong>'.$information["title"].'</strong> creado <strong>EXITOSAMENTE</strong></div>';

          $exercise = $this->model->exerciseInformation("*", "title='".$information['title']."'");
          $exerciseID = $exercise['id'];
          if($information["type"] == "completar") {
            $largo = (count($_POST) / 2);
            for ($i=0; $i < $largo; $i++) { 
              $responses["exercise"] = $exerciseID;
              $responses["description"] = $_POST['completar-p-'.$i];
              $responses["solution"] = $_POST['completar-s-'.$i];
              $this->model->responsesRegister($responses);
            }
          }
        } else {
          $msg_alert = '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>ERROR CE1:</strong> error al crear el ejercicio en la base de datos</div>';
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= 'El ejercicio <strong>'.$_POST['title'].'</strong> ya esta registrado</div>';
      }
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/exercise.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function actualizarExercise($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);
      $information["title"] = $_POST['title'];
      unset($_POST['title']);
      if (isset($_POST['description'])) {
        $information["description"] = $_POST['description'];
      }
      unset($_POST['description']);

      $exerciseInformation = $this->model->exerciseInformation("*", "id='".$id."'");
      if (isset($_POST['checkbox'])) {
        $information["img"] = "";
        unset($_POST['checkbox']);
        //Eliminamos la imagen del servidor
        if ($exerciseInformation['img'] != NULL) {
          $img_folder = IMG."exercise/";
          $target_file = $img_folder.$exerciseInformation['img'];
          if (file_exists($target_file)) {
            unlink($target_file);
          }
        }
      } elseif(isset($_FILES['img'])) {
        $img = $_FILES['img'];
        $img_folder = IMG."exercise/";
        $img_type = strtolower($img['type']);
        if ($img['error'] == 0) {
          //Eliminamos la imagen del servidor
          if ($exerciseInformation['img'] != NULL) {
            $img_folder = IMG."exercise/";
            $target_file = $img_folder.$exerciseInformation['img'];
            if (file_exists($target_file)) {
              unlink($target_file);
            }
          }
          if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
            $msg_alert = '<div class="alert alert-danger msg-alert">';
            $msg_alert .= '<strong>ERROR CE2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
          } else {
            $ext = explode("/", $img_type);
            $target_file = $img_folder.$information['title'].".".$ext[1];
            if(move_uploaded_file($img['tmp_name'], $target_file)) {
              $information['img'] = $information['title'].".".$ext[1];
            } else {
              $msg_alert = '<div class="alert alert-danger msg-alert">';
              $msg_alert .= '<strong>ERROR UE3:</strong> problemas al intentar cargar la imagen al servidor</div>';
            }
          }
        }
        unset($_FILES['img']);
      }

      $information["type"] = $_POST['type'];
      unset($_POST['type']);
      if ($this->model->exerciseUpdate($information)) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Ejercicio actualizado <strong>EXITOSAMENTE</strong></div>';

        $exercise = $this->model->exerciseInformation("*", "title='".$information['title']."'");
        $exerciseID = $exercise['id'];
        if($information["type"] == "completar") {
          $largo = (count($_POST) / 2);
          for ($i=0; $i < $largo; $i++) { 
            $responses["exercise"] = $exerciseID;
            $responses["description"] = $_POST['completar-p-'.$i];
            $responses["solution"] = $_POST['completar-s-'.$i];
            $this->model->responsesRegister($responses);
          }
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR CE1:</strong> error al crear el ejercicio en la base de datos</div>';
      }

      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/exercise.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }
}
?>