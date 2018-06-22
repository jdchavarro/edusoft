<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/exercise.css">

<section>
<h3>SECCION EJERCICIOS</h3>

<div class="row">
  <div class="col">
    <table class="table overviewTable">
      <thead class="bg-info">
        <tr>
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Tipo</th>
          <th>Imagen</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($exercisesInformation != null ){
          foreach ($exercisesInformation as $info) {
            echo '<tr>';
            echo '<td>'.$info['title'].'</td>';
            echo '<td>'.$info['description'].'</td>';
            echo '<td>'.$info['type'].'</td>';
            echo '<td><a href="'.URL.IMG.'exercise/'.$info['img'].'" target="_blank">'.$info['img'].'</a></td><td>';
            echo '<span class="option"><a href="'.URL.'Teacher/exercise/actualizar-'.$info['id'].'"><i class="fas fa-pencil-alt"></i></a></span>';
            echo '<span class="option"><a href="'.URL.'Teacher/exercise/borrar-'.$info['id'].'"><i class="fas fa-trash-alt"></i></a></span>';
            echo '</td></tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="col">
    <form action="<?php echo URL.'Teacher/'.$btnOption.'Exercise/'.$exerciseID; ?>" class="generalForm" enctype="multipart/form-data" method="POST">
      <div class="form-group">
      <label for="name">Titulo del ejercicio</label>
      <input class="form-control" type="text" required name="title" placeholder="Ingrese titulo" 
      <?php 
      if (isset($exerciseInformation)) { 
        echo 'value="'.$exerciseInformation['title'].'"'; 
      } 
      if ($btnOption == "borrar") { 
        echo 'disabled';
      } 
      ?>>
      </div>

      <div class="form-group">
      <label for="description">Descripción del ejercicio</label>
      <textarea class="form-control" name="description" placeholder="Ingrese descripcion"
      <?php 
      if ($btnOption == "borrar") { 
        echo 'disabled';
      }
      ?>><?php
      if (isset($exerciseInformation)) { 
        echo $exerciseInformation['description']; 
      } 
      ?></textarea>
      </div>

      <div class="form-group">
      <label for="img">Imagen para el ejercicio</label>
      <input type="file" class="form-control-file" <?php if($btnOption == "borrar"){ echo 'disabled';} ?> name="img">
      </div>

      <?php
      if (isset($exerciseInformation)){
      ?>
      <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" name="checkbox" value="delete" id="checkDeleteImg"
      <?php if($btnOption == "borrar"){ echo 'disabled checked';} ?>>
      <label class="form-check-label" for="checkDeleteImg">Eliminar imagen existente</label>
      </div>
      <?php
      }
      ?>

      <hr>

      <?php
      if (!isset($exerciseInformation)) {
      ?>
        <select class="form-control" name="type" id="tiposEjercicio">
        <option value="completar">Completar campos</option>
        <option value="multiple">Seleccion Multiple</option>
        <option value="unica">Seleccion Unica</option>
        <option value="desplegar">Desplegar</option>
        </select>

        <div id="divcompletar" class="responses">
        <button type="button" id="añadirOpcionCompletar" class="btn btn-primary addOption">Añadir opciones</button>
        
        <div class="opcionCompletar">
        <!-- Opcion minima -->
        <div class="form-group">
        <input class="form-control" type="text" required name="completar-p-0" placeholder="problema">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" required name="completar-s-0" placeholder="solución">
        </div>
        </div>

        </div>
        
        <div id="divmultiple" class="responses oculto">multiple</div>
        
        <div id="divunica" class="responses oculto">unica</div>
        
        <div id="divdesplegar" class="responses oculto">desplegar</div>
      <?php
      } elseif ($exerciseInformation['type'] == "completar") {
        ?>
        <select class="form-control oculto" name="type">
        <option value="completar">Completar campos</option>
        </select>

        <div id="divcompletar" class="responses">
        <button type="button" id="añadirOpcionCompletarActualizar" data-responses="<?php echo count($responsesInformation); ?>" class="btn btn-primary addOption">Añadir opciones</button>
        
        <?php
        $indicador = 1;
        foreach ($responsesInformation as $key => $response) {
          ?>
          <div class="opcionCompletar">
          <div class="form-group">
          <input class="form-control" type="text" 
          <?php 
          if ($btnOption == "borrar") {
            echo 'disabled';
          } elseif($indicador == 1) { 
            echo 'required';
          } 
          ?> 
          name="completar-p-<?php echo $key; ?>" placeholder="problema" value="<?php echo $response['description']; ?>">
          </div>
          <div class="form-group">
          <input class="form-control" type="text" 
          <?php 
          if ($btnOption == "borrar") {
            echo 'disabled';
          } elseif($indicador == 1) { 
            echo 'required';
          } 
          ?> 
          name="completar-s-<?php echo $key; ?>" placeholder="solución" value="<?php echo $response['solution']; ?>">
          </div>
          </div>
          <?php
          $indicador++;
        }
        ?>
        </div>
        <?php
      }
      ?>
      <br>
      <input class="btn btn-info" type="submit" name="submit" value="<?php echo $btnOption; ?>">
      <a href="<?php echo URL; ?>Teacher/exercise/crear" class="btn btn-info">limpiar</a>
    </form>
    
    <?php
    if (isset($msg_alert)) {
      echo $msg_alert;
    }
    ?>
  </div>
</div>
</section>

<script src="<?php echo URL.VIEWS; ?>Teacher/js/exercise.js"></script>