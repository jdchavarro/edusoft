<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/student.css">

<section>
<h3>SECCION ESTUDIANTES</h3>

<div class="row">
  <div class="col">
    <table class="table overviewTable">
      <thead class="bg-info">
        <tr>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($studentsInformation != null) {
          foreach ($studentsInformation as $studentInformation) {
            echo '<tr>';
            echo '<td>'.$studentInformation['lastName'].'</td>';
            echo '<td>'.$studentInformation['name'].'</td><td>';
            echo '<span class="option"><a href="'.URL.'Teacher/student/actualizar-'.$studentInformation['id'].'"><i class="fas fa-pencil-alt"></i></a></span>';
            echo '<span class="option"><a href="'.URL.'Teacher/student/borrar-'.$studentInformation['id'].'"><i class="fas fa-trash-alt"></i></a></span>';
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
    
    <form action="<?php echo URL.'Teacher/'.$btnOption.'Student/'.$studentID; ?>" class="generalForm" method="POST">
      <div class="form-group">
      <label for="username">Número identificación del estudiante</label>
      <?php
      if (isset($updateStudentInformation)) { 
        echo '<input class="form-control" type="number" disabled required name="username" value="'.$updateStudentInformation['username'].'">';
      } else {
        echo '<input class="form-control" type="number" required name="username" placeholder="Ingrese ID">';
        echo '<small id="help-usernameStudent" class="form-text text-muted">No puede ser modificado posteriormente.</small>';
      }
      ?>
      
      </div>

      <div class="form-group">
      <label for="name">Nombres del Estudiante</label>
      <input type="text" class="form-control" required name="name" placeholder="Ingrese Nombres" <?php if (isset($updateStudentInformation)) { echo 'value="'.$updateStudentInformation['name'].'"'; } ?>>
      </div>

      <div class="form-group">
      <label for="lastName">Apellidos del Estudiante</label>
      <input type="text" class="form-control" required name="lastName" placeholder="Ingrese Apellidos" <?php if (isset($updateStudentInformation)) { echo 'value="'.$updateStudentInformation['lastName'].'"'; } ?>>
      </div>

      <input class="btn btn-info" type="submit" name="submit" value="<?php echo $btnOption; ?>">
      <a href="<?php echo URL; ?>Teacher/student/crear" class="btn btn-info">limpiar</a>
    </form>
    
  </div>
</div>
</section>

<script src="<?php echo URL.VIEWS; ?>Teacher/js/student.js"></script>