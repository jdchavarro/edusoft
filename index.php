<?php
error_reporting(E_ALL ^ E_NOTICE);
require 'config.php';

$url = isset($_GET['url']) ? $_GET['url'] : "Index/index";
$url = explode("/", $url);
$controller = "";
$method = "";
if (isset($url[0])) {
  $controller = $url[0];
}
if (isset($url[1])) {
  if ($url[1] != '') {
    $method = $url[1];
  }
}
if (isset($url[2])) {
  if ($url[2] != '') {
    $params = $url[2];
  }
}

$controllersPath = CTR.$controller.".php";
if (file_exists($controllersPath)) {
  require $controllersPath;
  $controller = new $controller();
  if (method_exists($controller, $method)) {
    if (isset($params)) {
      $controller->{$method}($params);
    }else {
      $controller->{$method}();
    }
  }else {
    echo 'Error: metodo: '.$method.', no existe';
  }
}else {
  echo 'Error: controlador: '.$controller.', no existe';
}
 ?>
