<?php
require_once 'config.php';

// 
$disponibilidad = $pest->post('/verifica_disponibilidad', $_POST);

?>
<script src="script.js"></script>
<form method="POST" role="form" id="form_reservar">
<fieldset>
<legend>Pedido</legend>
Adultos: <?php echo $_POST['adultos'] ?><br>
Menores: <?php echo $_POST['menores'] ?><br>
Fecha Desde:<?php echo date('d/m/Y',strtotime($_POST['fecha_desde']))  ?><br>
Fecha Hasta:<?php echo date('d/m/Y',strtotime($_POST['fecha_hasta'])) ?><br>
<?php 
$fecha_desde = strtotime($_POST['fecha_desde']);
$fecha_hasta = strtotime($_POST['fecha_hasta']);
$noches = intval(($fecha_hasta - $fecha_desde) / 86400);
$hay = false;
?>
Noches: <?php echo $noches ?><br>
<input name="reserva[fecha_desde]" type="hidden" id="reserva_fecha_desde"  value="<?php echo $_POST['fecha_desde'] ?>"  />
<input name="reserva[fecha_hasta]" type="hidden" id="reserva_fecha_hasta"  value="<?php echo $_POST['fecha_hasta'] ?>"  />
<input name="reserva[adultos]" type="hidden" id="reserva_adultos"  value="<?php echo $_POST['adultos'] ?>"  />
<input name="reserva[menores]" type="hidden" id="reserva_menores"  value="<?php echo $_POST['menores'] ?>"  />
<input name="reserva[estado]" type="hidden" id="reserva_estado"  value="Reservado"  />

<input name="noches" type="hidden" id="noches"  value="<?php echo $noches ?>"  />
</fieldset>
<br>
<fieldset>
  <?php 
  	   foreach($disponibilidad->record as $tipo) {
  	   	     $mensg = 'Hay disponibilidad.';
  	   	     if (intval($tipo->cantidadEncontrada) < intval($tipo->cantidadSolicitada)) {
                $mensg = 'No Hay disponibilidad.';
                $habitaciones = $tipo->encontradas;
            }; 
  	   	     echo $tipo->tipoNombre . ' (Solicitadas: ' . $tipo->cantidadSolicitada . '- Disponibles: '. $tipo->cantidadEncontrada . ') '.  $mensg . '<br>';
  	   	   
        if (intval($tipo->cantidadEncontrada) >= intval($tipo->cantidadSolicitada)) {
         $hay = true;       
             
         ?>
   
 <table class="table">
          <tbody><tr><th></th>
          <th>Habitación</th>
          <th>Precio $</th>
          <th>Rec. Ad. %</th>
          <th>Adicionales</th>
          <?php
          foreach($tipo->encontradas->encontrada as $habitacion) {
  	   	    
          ?>
              </tr><tr>
                  <td>
                   <div class="checkbox">
                    <label>
                      <input name="habitaciones[<?php echo $habitacion->id ?>]" type="checkbox" id="habitaciones[<?php echo $habitacion->id ?>]" value="<?php echo $habitacion->id ?>" >
                    </label>
                   </div>
                  </td>
                  <td>

                      <?php echo $habitacion->numero ?>
                      <?php echo $habitacion->piso ?>
                      <?php echo $habitacion->tipo ?>
                      <?php echo $habitacion->categoria ?>

                  </td>
                  <td>
                  <?php echo $habitacion->precio ?>
                      <input name="habitaciones_precio[<?php echo $habitacion->id ?>]" type="hidden" id="habitaciones_precio[<?php echo $habitacion->id ?>]" value="<?php echo $habitacion->precio ?>"  >
                  </td>
                  <td>
                  <?php echo $habitacion->recargoAdicional ?>
                    <input name="costo_adicional[<?php echo $habitacion->id ?>]" type="hidden" id="costo_adicional[<?php echo $habitacion->id ?>]" value="<?php echo $habitacion->recargoAdicional ?>" >

                  </td>
                  <td>
                      <input name="habitaciones_adicional[<?php echo $habitacion->id ?>]" type="number" id="habitaciones_adicional[<?php echo $habitacion->id ?>]" value="0" >

                  </td>
              </tr>
           <?php   echo  '<br>';
  	   	     
         
          } ?>
        </tbody></table> 

<?php  
            };     
         };
  ?>
  </fieldset>
<?php if ($hay == TRUE) {
 require 'form_huesped.php'	;
}?>


</form>
<div id="resultado"></div>
<br>
<input type="button" id="nueva_reserva" value="Nueva Reserva"/>