<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
</head>
<body>
<?php
require_once 'config.php';


$pest->put('/verifica_disponibilidad', $data);


?>
<form role="form">
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
                  <input name="fecha_desde" id="fecha_desde" type="date" class="form-control" value="2014-12-09">
        </div>
        <div class="input-control number">
                  <label for="fecha_hasta">Hasta</label>
                  <input name="fecha_hasta" id="fecha_hasta" type="date" class="form-control" value="2014-12-10">
        </div>
    </div>
    <div class="row">
    <input class="default" name="ver disponibilidad" onclick="new Ajax.Request('/reservas/verifica_disponibilidad', {asynchronous:true, evalScripts:true, parameters:Form.serialize(this.form) + '&amp;authenticity_token=' + encodeURIComponent('BNhkBZu61Pd/xabqhpb/EY3tRP3ov2WNZqpSPGjTCIo=')});" type="button" value="ver disponibilidad">
    </div>
  </fieldset>
</form>
</body>
</html>