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

  /* ESTUDIANTE */
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

  /* CONCEPTO */
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

  /* EJERCICIO */
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
        
        /* Guardamos el titulo */
        $information["title"] = $_POST['title'];
        unset($_POST['title']);

        /* Guardamos el descripcion */
        if (isset($_POST['description'])) {
          $information["description"] = $_POST['description'];
        }
        unset($_POST['description']);
        
        /* Guardamos la imagen */
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

        /* Guardamos el tipo */
        $information["type"] = $_POST['type'];
        unset($_POST['type']);

        /* Registramos todo en la base de datos */
        if ($this->model->exerciseRegister($information)) {
          $msg_alert .= '<div class="alert alert-success msg-alert">';
          $msg_alert .= 'Ejercicio <strong>'.$information["title"].'</strong> creado <strong>EXITOSAMENTE</strong></div>';

          $exercise = $this->model->exerciseInformation("*", "title='".$information['title']."'");
          $exerciseID = $exercise['id'];

          /* Verificamos el tipo de ejercicio */
          if($information["type"] == "completar") {
            $i = 0;
            foreach ($_POST as $key => $value) {
              $info = explode("-", $key);
              if ($info[0] == "completar" && $info[2] == $i) {
                $responses["exercise"] = $exerciseID;
                $responses["description"] = $_POST['completar-p-'.$i];
                $responses["solution"] = $_POST['completar-s-'.$i];
                if($responses["description"] != "" && $responses["solution"] != "") {
                  $this->model->responsesRegister($responses);
                }
                $i++;
              }
            }
          } elseif ($information['type'] == "multiple") {
            $i = 0;
            foreach ($_POST as $key => $value) {
              $info = explode("-", $key);
              if ($info[0] == "multiple" && $info[2] == $i) {
                $responses["exercise"] = $exerciseID;
                $responses["description"] = $_POST['multiple-d-'.$i];
                if (isset($_POST['multiple-s-'.$i])) {
                  $responses["solution"] = 1;
                } else {
                  $responses["solution"] = 0;
                }
                if (isset($_FILES['multiple-i-'.$i])) {
                  $img = $_FILES['multiple-i-'.$i];
                  $img_folder = IMG."response/";
                  $img_type = strtolower($img['type']);
        
                  if ($img['error'] == 0) {
                    if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
                      $msg_alert = '<div class="alert alert-danger msg-alert">';
                      $msg_alert .= '<strong>ERROR CR2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
                    } else {
                      $ext = explode("/", $img_type);
                      $target_file = $img_folder.$exerciseID."-".$i.".".$ext[1];
                      if(move_uploaded_file($img['tmp_name'], $target_file)) {
                        $responses['img'] = $exerciseID."-".$i.".".$ext[1];
                      } else {
                        $msg_alert = '<div class="alert alert-danger msg-alert">';
                        $msg_alert .= '<strong>ERROR CR3:</strong> problemas al intentar cargar la imagen al servidor</div>';
                      }
                    }
                  } else {
                    $responses["img"] = NULL;
                  }
                  unset($_FILES['multiple-i-'.$i]);
                } else {
                  $responses["img"] = NULL;
                }
                if($responses["description"] != "" or $responses["img"] != "") {
                  $this->model->responsesRegister($responses);
                }
                $i++;
              }
            }
          } elseif ($information['type'] == "unica") {
            $i = 0;
            foreach ($_POST as $key => $value) {
              $info = explode("-", $key);
              if ($info[0] == "unica" && $info[2] == $i) {
                $responses["exercise"] = $exerciseID;
                $responses["description"] = $_POST['unica-d-'.$i];
                if($_POST['unica-r'] == $i) {
                  $responses['solution'] = 1;
                } else {
                  $responses['solution'] = 0;
                }

                if (isset($_FILES['unica-i-'.$i])) {
                  $img = $_FILES['unica-i-'.$i];
                  $img_folder = IMG."response/";
                  $img_type = strtolower($img['type']);
        
                  if ($img['error'] == 0) {
                    if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
                      $msg_alert = '<div class="alert alert-danger msg-alert">';
                      $msg_alert .= '<strong>ERROR CR2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
                    } else {
                      $ext = explode("/", $img_type);
                      $target_file = $img_folder.$exerciseID."-".$i.".".$ext[1];
                      if(move_uploaded_file($img['tmp_name'], $target_file)) {
                        $responses['img'] = $exerciseID."-".$i.".".$ext[1];
                      } else {
                        $msg_alert = '<div class="alert alert-danger msg-alert">';
                        $msg_alert .= '<strong>ERROR CR3:</strong> problemas al intentar cargar la imagen al servidor</div>';
                      }
                    }
                  } else {
                    $responses["img"] = NULL;
                  }
                  unset($_FILES['unica-i-'.$i]);
                } else {
                  $responses["img"] = NULL;
                }
                if($responses["description"] != "" or $responses["img"] != "") {
                  $this->model->responsesRegister($responses);
                }
                $i++;
              }
            }
          } elseif ($information['type'] == "desplegar") {
            $i = 0;
            foreach ($_POST as $key => $value) {
              $info = explode("-", $key);
              if ($info[0] == "desplegar" && $info[2] == $i) {
                $responses["exercise"] = $exerciseID;
                $responses["description"] = $_POST['desplegar-d-'.$i];
                if($_POST['desplegar-r'] == $i) {
                  $responses['solution'] = 1;
                } else {
                  $responses['solution'] = 0;
                }
                if($responses["description"] != "") {
                  $this->model->responsesRegister($responses);
                }
                $i++;
              }
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
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);
      $information["title"] = $_POST['title'];
      unset($_POST['title']);
      if (isset($_POST['description'])) {
        $information["description"] = $_POST['description'];
      }
      unset($_POST['description']);

      $exerciseInfo = $this->model->exerciseInformation("*", "id='".$id."'");
      if (isset($_POST['checkbox'])) {
        $information["img"] = "";
        unset($_POST['checkbox']);
        //Eliminamos la imagen del servidor
        if ($exerciseInfo['img'] != NULL) {
          $img_folder = IMG."exercise/";
          $target_file = $img_folder.$exerciseInfo['img'];
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
          if ($exerciseInfo['img'] != NULL) {
            $img_folder = IMG."exercise/";
            $target_file = $img_folder.$exerciseInfo['img'];
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
      if ($this->model->exerciseUpdate($information, "id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Ejercicio actualizado <strong>EXITOSAMENTE</strong></div>';

        if($information["type"] == "completar") {
          //Eliminar las respuestas antiguas
          $this->model->responsesDelete("exercise='".$id."'");
          $i = 0;
          foreach ($_POST as $key => $value) {
            $info = explode("-", $key);
            if ($info[0] == "completar" && $info[2] == $i) {
              $responses["exercise"] = $id;
              $responses["description"] = $_POST['completar-p-'.$i];
              $responses["solution"] = $_POST['completar-s-'.$i];
              if($responses["description"] != "" && $responses["solution"] != "") {
                $this->model->responsesRegister($responses);
              }
              $i++;
            }
          }
        } elseif ($information["type"] == "multiple") {
          $i = 0;
          $responsesInfo = $this->model->responsesInformation("*", "exercise='".$id."'");
          foreach ($_POST as $key => $value) {
            $info = explode("-", $key);
            if ($info[0] == "multiple" && $info[2] == $i) {
              $responses["exercise"] = $id;
              $responses["description"] = $_POST['multiple-d-'.$i];
              if (isset($_POST['multiple-s-'.$i])) {
                $responses["solution"] = 1;
              } else {
                $responses["solution"] = 0;
              }
              $responseInfo = $responsesInfo[$i];
              if (isset($_POST['multiple-c-'.$i])) {
                //Eliminamos la imagen del servidor
                if ($responseInfo['img'] != NULL) {
                  $img_folder = IMG."response/";
                  $target_file = $img_folder.$responseInfo['img'];
                  if (file_exists($target_file)) {
                    unlink($target_file);
                  }
                }
                $responses["img"] = "";
              } elseif (isset($_FILES['multiple-i-'.$i])) {
                $img = $_FILES['multiple-i-'.$i];
                $img_folder = IMG."response/";
                $img_type = strtolower($img['type']);
      
                if ($img['error'] == 0) {
                  //Eliminamos la imagen del servidor
                  if ($responseInfo['img'] != NULL) {
                    $img_folder = IMG."response/";
                    $target_file = $img_folder.$responseInfo['img'];
                    if (file_exists($target_file)) {
                      unlink($target_file);
                    }
                  }
                  if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
                    $msg_alert = '<div class="alert alert-danger msg-alert">';
                    $msg_alert .= '<strong>ERROR CR2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
                  } else {
                    $ext = explode("/", $img_type);
                    $target_file = $img_folder.$id."-".$i.".".$ext[1];
                    if(move_uploaded_file($img['tmp_name'], $target_file)) {
                      $responses['img'] = $id."-".$i.".".$ext[1];
                    } else {
                      $msg_alert = '<div class="alert alert-danger msg-alert">';
                      $msg_alert .= '<strong>ERROR CR3:</strong> problemas al intentar cargar la imagen al servidor</div>';
                    }
                  }
                } else {
                  $responses["img"] = $responseInfo['img'];
                }
              } else {
                $responses["img"] = $responseInfo['img'];
              }
              //Eliminar la respuesta antigua
              $this->model->responsesDelete("id='".$responseInfo['id']."'");
              if($responses["description"] != "" or $responses["img"] != "") {
                $this->model->responsesRegister($responses);
              }
              $i++;
            }
          }
        } elseif ($information["type"] == "unica") {
          $i = 0;
          $responsesInfo = $this->model->responsesInformation("*", "exercise='".$id."'");
          foreach ($_POST as $key => $value) {
            $info = explode("-", $key);
            if ($info[0] == "unica" && $info[2] == $i) {
              $responses["exercise"] = $id;
              $responses["description"] = $_POST['unica-d-'.$i];
              if ($_POST['unica-r'] == $i) {
                $responses["solution"] = 1;
              } else {
                $responses["solution"] = 0;
              }
              $responseInfo = $responsesInfo[$i];
              if (isset($_POST['unica-c-'.$i])) {
                //Eliminamos la imagen del servidor
                if ($responseInfo['img'] != NULL) {
                  $img_folder = IMG."response/";
                  $target_file = $img_folder.$responseInfo['img'];
                  if (file_exists($target_file)) {
                    unlink($target_file);
                  }
                }
                $responses["img"] = "";
              } elseif (isset($_FILES['unica-i-'.$i])) {
                $img = $_FILES['unica-i-'.$i];
                $img_folder = IMG."response/";
                $img_type = strtolower($img['type']);
      
                if ($img['error'] == 0) {
                  //Eliminamos la imagen del servidor
                  if ($responseInfo['img'] != NULL) {
                    $img_folder = IMG."response/";
                    $target_file = $img_folder.$responseInfo['img'];
                    if (file_exists($target_file)) {
                      unlink($target_file);
                    }
                  }
                  if($img_type != "image/jpg" && $img_type != "image/png" && $img_type != "image/jpeg" && $img_type != "image/gif") {
                    $msg_alert = '<div class="alert alert-danger msg-alert">';
                    $msg_alert .= '<strong>ERROR CR2:</strong> solo se permiten archivos JPG, JPEG, PNG & GIF.</div>';
                  } else {
                    $ext = explode("/", $img_type);
                    $target_file = $img_folder.$id."-".$i.".".$ext[1];
                    if(move_uploaded_file($img['tmp_name'], $target_file)) {
                      $responses['img'] = $id."-".$i.".".$ext[1];
                    } else {
                      $msg_alert = '<div class="alert alert-danger msg-alert">';
                      $msg_alert .= '<strong>ERROR CR3:</strong> problemas al intentar cargar la imagen al servidor</div>';
                    }
                  }
                } else {
                  $responses["img"] = $responseInfo['img'];
                }
              } else {
                $responses["img"] = $responseInfo['img'];
              }
              //Eliminar la respuesta antigua
              $this->model->responsesDelete("id='".$responseInfo['id']."'");
              if($responses["description"] != "" or $responses["img"] != "") {
                $this->model->responsesRegister($responses);
              }
              $i++;
            }
          }
        } elseif ($information["type"] == "desplegar") {
          $i = 0;
          $responsesInfo = $this->model->responsesInformation("*", "exercise='".$id."'");
          //Eliminar las respuestas antiguas
          $this->model->responsesDelete("exercise='".$id."'");
          foreach ($_POST as $key => $value) {
            $info = explode("-", $key);
            if ($info[0] == "desplegar" && $info[2] == $i) {
              $responses["exercise"] = $id;
              $responses["description"] = $_POST['desplegar-d-'.$i];
              if ($_POST['desplegar-r'] == $i) {
                $responses["solution"] = 1;
              } else {
                $responses["solution"] = 0;
              }
              if($responses["description"] != "") {
                $this->model->responsesRegister($responses);
              }
              $i++;
            }
          }
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR CE1:</strong> error al actualizar el ejercicio en la base de datos</div>';
      }
      $btnOption = "crear";
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/exercise.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function borrarExercise($id) {
    if (isset($_POST['submit'])) {
      $exerciseInfo = $this->model->exerciseInformation("*", "id='".$id."'");
      //Eliminamos la imagen del servidor
      if ($exerciseInfo['img'] != NULL) {
        $img_folder = IMG."exercise/";
        $target_file = $img_folder.$exerciseInfo['img'];
        if (file_exists($target_file)) {
          unlink($target_file);
        }
      }
      $this->model->responsesDelete("exercise='".$id."'");
      if ($this->model->exerciseDelete("id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Ejercicio eliminado <strong>EXITOSAMENTE</strong></div>';
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR DE1:</strong> error al eliminar el ejercicio en la base de datos</div>';
      }
      $btnOption = "crear";
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/exercise.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  /* ACTIVIDAD */
  public function activity($btnOption) {
    if ($btnOption != "crear"){
      $btnOption = explode("-", $btnOption);
      $activityID = $btnOption[1];
      $btnOption = $btnOption[0];
      $activityInformation = $this->model->activityInformation("*", "id='".$activityID."'");
      $activityExercisesInformation = $this->model->activityExercisesInformation("*", "activity='".$activityID."'");
    }
    $activitiesInformation = $this->model->activitiesInformationOrder("*", "title");
    $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
    $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
    require_once HEAD;
    require_once VIEWS.'Teacher/header.php';
    require_once VIEWS.'Teacher/activity.php';
    require_once FOOT;
  }

  public function crearActivity() {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      $activityInformation = $this->model->activityInformation("*", "title='".$_POST['title']."'");
      if ($exerciseInformation == NULL) {
        unset($_POST['submit']);
        
        /* Guardamos el titulo */
        $information["title"] = $_POST['title'];
        unset($_POST['title']);

        /* Guardamos el tipo */
        $information["type"] = $_POST['type'];
        unset($_POST['type']);

        /* Guardamos la cantidad de estudiantes */
        $information["students"] = $_POST['students'];

        $information['status'] = "sin asignar";

        /* Registramos todo en la base de datos */
        if ($this->model->activityRegister($information)) {
          $msg_alert .= '<div class="alert alert-success msg-alert">';
          $msg_alert .= 'Actividad <strong>'.$information["title"].'</strong> creada <strong>EXITOSAMENTE</strong></div>';
          $activity = $this->model->activityInformation("*", "title='".$information["title"]."'");
          $exercises = $_POST['exercises'];
          foreach ($exercises as $value) {
            $a['activity'] = $activity['id'];
            $a['exercise'] = $value;
            $this->model->activityExercisesRegister($a);
          }
        } else {
          $msg_alert = '<div class="alert alert-danger msg-alert">';
          $msg_alert .= '<strong>ERROR CA1:</strong> error al crear la actividad en la base de datos</div>';
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= 'La actividad <strong>'.$_POST['title'].'</strong> ya esta registrada</div>';
      }
      $activitiesInformation = $this->model->activitiesInformationOrder("*", "title");
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/activity.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function actualizarActivity($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      /* Guardamos el titulo */
      $information["title"] = $_POST['title'];
      
      /* Guardamos la cantidad de estudiantes */
      $information["students"] = $_POST['students'];

      /* Registramos todo en la base de datos */
      if ($this->model->activityUpdate($information, "id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Actividad actualizada <strong>EXITOSAMENTE</strong></div>';
        
        //eliminar los ejercicios asignados anteriormente
        $this->model->activityExercisesDelete("activity='".$id."'");
        $exercises = $_POST['exercises'];
        foreach ($exercises as $value) {
          $a['activity'] = $id;
          $a['exercise'] = $value;
          $this->model->activityExercisesRegister($a);
        }
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR UA1:</strong> error al actualizar la actividad en la base de datos</div>';
      }
      $activitiesInformation = $this->model->activitiesInformationOrder("*", "title");
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/activity.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function borrarActivity($id) {
    $btnOption = "crear";
    if (isset($_POST['submit'])) {
      
      if ($this->model->activityDelete("id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Actividad eliminada <strong>EXITOSAMENTE</strong></div>';
        
        //eliminar los ejercicios asignados anteriormente
        $this->model->activityExercisesDelete("activity='".$id."'");
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR DA1:</strong> error al actualizar la actividad en la base de datos</div>';
      }
      $activitiesInformation = $this->model->activitiesInformationOrder("*", "title");
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      $studentsInformation = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/activity.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }

  public function asignarActivity($id) {
    $btnOption = "crear";
    $students = $this->model->studentsInformationOrder("*", "rol='student'", "lastName");
    $actExe = $this->model->activityExercisesInformation("*", "activity='".$id."'");
    if (isset($_POST['submit'])) {
      if($_POST['after'] != "") {
        $information["after"] = $_POST['after'];
      }
      if (isset($_POST['asignar'])) {
        $information['grupo'] = $_POST['grupo'];
        if ($_POST['asignar'] != "aleatorio") {
          $atributo['activity'] = $id;
          $atributo['student'] = $_POST['asignar'];
          $this->model->asignarEstudiante($atributo);
          $information['status'] = "asignada";
        } else {
          $information['status'] = "espera";
        }
      } else {
        $information['status'] = "asignada";
        foreach ($students as $student) {
          $atributo['activity'] = $id;
          $atributo['student'] = $student['username'];
          $this->model->asignarEstudiante($atributo);
        }
      }
      if ($this->model->activityUpdate($information, "id='".$id."'")) {
        $msg_alert .= '<div class="alert alert-success msg-alert">';
        $msg_alert .= 'Actividad asignada <strong>EXITOSAMENTE</strong></div>';
        
      } else {
        $msg_alert = '<div class="alert alert-danger msg-alert">';
        $msg_alert .= '<strong>ERROR AA1:</strong> error al asignar la actividad en la base de datos</div>';
      }
      $activitiesInformation = $this->model->activitiesInformationOrder("*", "title");
      $exercisesInformation = $this->model->exercisesInformationOrder("*", "title");
      require_once HEAD;
      require_once VIEWS.'Teacher/header.php';
      require_once VIEWS.'Teacher/activity.php';
      require_once FOOT;
    } else {
      header('Location: '.URL);
    }
  }
}
?>