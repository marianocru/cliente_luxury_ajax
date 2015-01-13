<?php

require_once 'config.php';
// Retrieve and iterate over the list of all Users
$tipos = $pest->get('/tipos');

?>
<script src="script.js"></script>
<form method="POST" role="form" id="form1">
  <fieldset> 
    <legend>Datos</legend>
    <div class="row">
      <div class="input-control number">
      <label for="adultos">Adultos</label>
      <input name="adultos" id="adultos" type="number">
       </div>

      <div class="input-control number">
      <label for="menores">Menores</label>
      <input name="menores" id="menores" type="number">
      </div>

    </div>
    <div class="row">
         <?php
         foreach($tipos->tipo as $tipo) {
         echo "<div class='input-control number'>
            <label for='tipo_". $tipo->id ."'>". $tipo->nombre   ."</label>
            <input type='number' name='tipo[". $tipo->id ."]' id='tipo_". $tipo->id ."'>
          </div>"; 
         
          }
        ?>
      

    </div>
    <div class="row">
        <div class="input-control number">
                  <label for="fecha_desde">Desde</label>
                  <input name="fecha_desde" id="fecha_desde" type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
        </div>
        <div class="input-control number">
                  <label for="fecha_hasta">Hasta</label>
                  <input name="fecha_hasta" id="fecha_hasta" type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d').' +1 day'));?>">
        </div>
    </div>
    <div class='row'>
      <input type="submit" id='verdisponibilidad' value="ver disponibilidad" name="ver disponibilidad"> 
    
    </div>
  </fieldset>
</form>
<div id="resultado"></div>