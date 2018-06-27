<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/informe.css">

<section>
<h3>SECCION INFORMES</h3>

<div class="form-group selects">
  <label for="opcion_de_busqueda">Filtrar por</label>
  <select class="form-control" id="opcion_de_busqueda">
    <option value="activity">ACTIVIDAD</option>
    <option value="student">ESTUDIANTE</option>
  </select>
  <hr>
</div>

<div class="" id="actividad">
  <div class="form-group selects">
    <label for="selectActividad">Seleccione una actividad</label>
    <select class="form-control" id="selectActividad">
      <option></option>
      <?php
      foreach ($lista_actividades_resueltas as $actividad) {
        echo '<option value="'.$actividad['id'].'">'.$actividad['title'].'</option>';
      }
      ?>
    </select>
    <hr>
  </div>
  <div class="tablaResultado" id="tablaActividad"></div>
</div>

<div class="oculto" id="estudiante">
  <div class="form-group selects">
    <label for="selectEstudiante">Seleccione un estudiante</label>
    <select class="form-control" id="selectEstudiante">
      <option></option>
      <?php
      foreach ($lista_estudiantes as $estudiante) {
        echo '<option value="'.$estudiante['username'].'">'.$estudiante['lastName'].' '.$estudiante['name'].'</option>';
      }
      ?>
    </select>
    <hr>
  </div>
  <div class="tablaResultado" id="tablaEstudiante"></div>
</div>

</section>
<script src="<?php echo URL.VIEWS; ?>Teacher/js/informe.js"></script>