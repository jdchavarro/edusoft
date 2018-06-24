<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/activity.css">

<section>
<h3>SECCION ACTIVIDADES</h3>

<div class="row">
  <div class="col">
    <table class="table overviewTable">
      <thead class="bg-info">
        <tr>
          <th>Titulo</th>
          <th>Tipo</th>
          <th>Estudiantes</th>
          <th>Estado</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($activitiesInformation != null ){
          foreach ($activitiesInformation as $info) {
            echo '<tr>';
            echo '<td>'.$info['title'].'</td>';
            echo '<td>'.$info['type'].'</td>';
            echo '<td>'.$info['students'].'</td>';
            echo '<td>'.$info['status'].'</td>';
            echo '<td>';
            if ($info['status'] == "sin asignar") {
              echo '<span class="option"><a href="'.URL.'Teacher/activity/asignar-'.$info['id'].'"><i class="fab fa-amilia"></i></a></span>';
            }
            if ($info['status'] != "resuelto") {
              echo '<span class="option"><a href="'.URL.'Teacher/activity/actualizar-'.$info['id'].'"><i class="fas fa-pencil-alt"></i></a></span>';
              echo '<span class="option"><a href="'.URL.'Teacher/activity/borrar-'.$info['id'].'"><i class="fas fa-trash-alt"></i></a></span>';
            }
            echo '</td></tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="col">
    <?php
    if (isset($msg_alert)) {
      echo $msg_alert;
    }
    ?>

    <form action="<?php echo URL.'Teacher/'.$btnOption.'Activity/'.$activityID; ?>" class="generalForm" method="POST">
      <!-- Titulo de la actividad -->
      <div class="form-group">
      <label for="name">Titulo de la actividad</label>
      <input class="form-control" type="text" required name="title" placeholder="Ingrese titulo" 
      <?php 
      if (isset($activityInformation)) { 
        echo 'value="'.$activityInformation['title'].'"'; 
      } 
      if ($btnOption == "borrar" or $btnOption == "asignar") { 
        echo 'disabled';
      } 
      ?>>
      </div>
      
      <!-- Tipo de actividad -->
      <div class="form-group">
        <label for="type">Tipo de Actividad</label>
        <select class="form-control" name="type" id="type">
          <?php
          if (!isset($activityInformation)) {
            echo '<option value="actividad">Actividad</option>';
            echo '<option value="examen">Evaluacion</option>';
          } else {
            if ($activityInformation['type'] == "actividad") {
              echo '<option value="actividad">Actividad</option>';
            } else {
              echo '<option value="examen">Evaluacion</option>';
            }
          }
          ?>
        </select>
      </div>
      

      <!-- Cantidad de estudiantes de la actividad -->
      <div class="form-group" id="groupStudents">
      <label for="students">Cantidad maxima de estudiantes</label>
      <input class="form-control" type="number" min="1" id="students" required name="students"
      <?php 
      if (isset($activityInformation)) {
        if ($activityInformation['type'] == 'examen') {
          echo 'disabled';
        }
        echo 'value="'.$activityInformation['students'].'"'; 
      } else {
        echo 'value="1"'; 
      }
      if ($btnOption == "borrar" or $btnOption == "asignar") { 
        echo 'disabled';
      } 
      ?>>
      </div>

      <!-- Ejercicios -->
      <div class="form-group">
        <label for="exercises">Lista de ejercicios disponibles</label>
        <select multiple class="form-control" required name="exercises[]"
        <?php 
        if ($btnOption == "borrar" or $btnOption == "asignar") { 
          echo 'disabled';
        }
        ?> 
        id="exercises">
          <?php
          foreach ($exercisesInformation as $key => $exercise) {
            echo '<option value="'.$exercise["id"].'"';
            if (isset($activityInformation)) {
              foreach ($activityExercisesInformation as $ae) {
                if ($ae['exercise'] == $exercise["id"]) {
                  echo 'selected';
                }
              }
            }
            echo '>'.$exercise["title"].'</option>';
          }
          ?>
        </select>
      </div>

      <?php
      if ($btnOption == "asignar") {
        ?>
        <!-- Actividades after -->
        <div class="form-group">
          <label for="after">Lista de actividades para predecesora</label>
          <select class="form-control" name="after" id="after">
            <?php
            echo '<option value=""></option>';
            foreach ($activitiesInformation as $act) {
              if ($act["id"] != $activityInformation['id'] && $act['status'] != "sin asignar") {
                echo '<option value="'.$act["id"].'">'.$act["title"].'</option>';
              }
            }
            ?>
          </select>
        </div>
        <?php

        if ($activityInformation['type'] == "examen") {
          ?>
          <!-- Examenes a asignar -->
          <div class="form-group">
            <label for="asignar">Asignar a</label>
            <select class="form-control" name="asignar" id="asignar">
              <?php
              echo '<option value="aleatorio">Todos y aleatorio</option>';
              foreach ($studentsInformation as $est) {
                echo '<option value="'.$est["id"].'">'.$est["lastName"].' '.$est["name"].'</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="grupo">Grupo</label>
            <input class="form-control" type="number" min="1" required id="grupo" name="grupo">
            </div>
          <?php
        }

      }
      ?>
      
      <input class="btn btn-info" type="submit" name="submit" value="<?php echo $btnOption; ?>">
      <a href="<?php echo URL; ?>Teacher/activity/crear" class="btn btn-info">limpiar</a>
    </form>

  </div>
</div>
</section>

<script src="<?php echo URL.VIEWS; ?>Teacher/js/activity.js"></script>