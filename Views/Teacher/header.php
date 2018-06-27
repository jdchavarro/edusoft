<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/teacher.css">

<nav class="nav nav-principal justify-content-center" id="barraNavegacionPrincipal">
    <a class="nav-link" href="<?php echo URL; ?>Teacher/index" id="brand">
        <h1 id="tituloPrograma"><span id="bookIcon"><i class="fas fa-book"></i></span> EDUSOFT</h1>
    </a>
    <a class="nav-link btn btn-info" id="menu-estudiantes" href="<?php echo URL; ?>Teacher/student/crear">Estudiantes</a>
    <a class="nav-link btn btn-info" id="menu-actividades" href="<?php echo URL; ?>Teacher/activity/crear">Actividades</a>
    <a class="nav-link btn btn-info" id="menu-ejercicios" href="<?php echo URL; ?>Teacher/exercise/crear">Ejercicios</a>
    <a class="nav-link btn btn-info" id="menu-informes" href="<?php echo URL; ?>Teacher/informe">Informes</a>
    <a class="nav-link btn btn-info" id="menu-conceptos" href="<?php echo URL; ?>Teacher/concepto/crear">Conceptos</a>
    <a class="nav-link btn btn-danger" href="<?php echo URL; ?>Index/logout" id="menuCerrarSesion">Cerrar Sesion</a>
</nav>
