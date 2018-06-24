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
    $actividades = $this->model->getActividades("*", "status='asignada' OR status='espera'");
    require_once HEAD;
    require_once VIEWS.'Student/header.php';
    require_once VIEWS.'Student/index.php';
    require_once FOOT;
  }

}
?>