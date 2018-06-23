<link rel="stylesheet" href="<?php echo URL.VIEWS; ?>Teacher/css/concepto.css">

<section>
<h3>SECCION CONCEPTOS</h3>

<div class="row">
  <div class="col">
    <table class="table overviewTable">
      <thead class="bg-info">
        <tr>
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Imagen</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($conceptosInformation != null ){
          foreach ($conceptosInformation as $conceptoInformation) {
            echo '<tr>';
            echo '<td>'.$conceptoInformation['name'].'</td>';
            echo '<td>'.$conceptoInformation['description'].'</td>';
            echo '<td><a href="'.URL.IMG.'concepto/'.$conceptoInformation['img'].'" target="_blank">'.$conceptoInformation['img'].'</a></td><td>';
            echo '<span class="option"><a href="'.URL.'Teacher/concepto/actualizar-'.$conceptoInformation['id'].'"><i class="fas fa-pencil-alt"></i></a></span>';
            echo '<span class="option"><a href="'.URL.'Teacher/concepto/borrar-'.$conceptoInformation['id'].'"><i class="fas fa-trash-alt"></i></a></span>';
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

    <form action="<?php echo URL.'Teacher/'.$btnOption.'Concepto/'.$conceptoID; ?>" class="generalForm" enctype="multipart/form-data" method="POST">
      <div class="form-group">
      <label for="name">Titulo del concepto</label>
      <input class="form-control" type="text" <?php if($btnOption == "borrar"){ echo 'disabled';} ?> required name="name" placeholder="Ingrese titulo" <?php if (isset($updateConceptoInformation)) { echo 'value="'.$updateConceptoInformation['name'].'"'; } ?>>
      </div>

      <div class="form-group">
      <label for="description">Descripción del concepto</label>
      <textarea class="form-control" <?php if($btnOption == "borrar"){ echo 'disabled';} ?> name="description" placeholder="Ingrese descripcion"><?php if (isset($updateConceptoInformation)) { echo $updateConceptoInformation['description']; } ?></textarea>
      </div>

      <div class="form-group">
      <label for="img">Imagen para el concepto</label>
      <input type="file" class="form-control-file" <?php if($btnOption == "borrar"){ echo 'disabled';} ?> name="img">
      </div>

      <?php
      if (isset($updateConceptoInformation)){
      ?>
      <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" <?php if($btnOption == "borrar"){ echo 'disabled checked';} ?> name="checkbox" value="delete" id="checkDeleteImg">
      <label class="form-check-label" for="checkDeleteImg">Eliminar imagen existente</label>
      </div>
      <?php
      }
      ?>
      
      <input class="btn btn-info" type="submit" name="submit" value="<?php echo $btnOption; ?>">
      <a href="<?php echo URL; ?>Teacher/concepto/crear" class="btn btn-info">limpiar</a>
    </form>
    
  </div>
</div>
</section>

<script src="<?php echo URL.VIEWS; ?>Teacher/js/concepto.js"></script>