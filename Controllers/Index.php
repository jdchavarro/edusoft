<?php
class Index
{
  public $model;

  function __construct()
  {
    require_once CTR.'Session.php';
    Session::start();
    require_once MODELS.'Index_model.php';
    $this->model = new Index_model();
  }

  public function index()
  {
    if ($rol = Session::getSession("rol"))
    {
      if($rol == "teacher")
      {
        header('Location: '.URL.'Teacher/index');
      } 
      elseif ($rol == "student") 
      {
        header('Location: '.URL.'Student/index');
      }
    }
    else
    {
      require_once VIEWS.'Index/index.php';
    }
  }

  public function login()
  {
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $userInformation = $this->model->userInformation("*", "username='".$_POST['username']."'");
      if ($userInformation != ""){
        if ($_POST['password'] == $userInformation['password']) {
          Session::setSession('id', $userInformation['id']);
          Session::setSession('username', $userInformation['username']);
          Session::setSession('rol', $userInformation['rol']);
          Session::setSession('name', $userInformation['name']);
          Session::setSession('lastName', $userInformation['lastName']);

          if ($userInformation['rol'] == "teacher") {
            header('Location: '.URL.'Teacher/index');
          } elseif ($userInformation['rol'] == "student") {
            header('Location: '.URL.'Student/index');
          }
        } else {
          $msg_alert = "<strong>Contraseña</strong> incorrecta.";
          require_once VIEWS.'Index/index.php';
        }
      } else {
        $msg_alert = "<strong>".$_POST['username']."</strong> no existe.";
        require_once VIEWS.'Index/index.php';
      }
    } else {
      header('Location: '.URL);
    }
  }

  public function logout()
  {
    Session::destroy();
    header("Location: ".URL);
  }
}

?>