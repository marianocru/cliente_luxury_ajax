<?php
require_once 'config.php';


// 
$reserva = $pest->post('/reservar', $_POST);

?>
<script src="script.js"></script>
<fieldset>
	<legend>Datos Reserva</legend>
	<?php if(empty($reserva->error)) {?>
	Muchas Gracías por su Reserva.
	Se ha enviado un mail con la información de la reserva y los pasos a seguir.<br> 
	Codigo de Reserva: <?php echo $reserva->id?><br> 
	Estado: <?php echo $reserva->estado?><br>
	<?php } else {?>
	Hay un error y no se puede tomar la reserva.<br>
	error<br>
	<?php 
	foreach($reserva->error as $error) {
         echo  $error . '<br>'; 
         
          }
	?>
	
	<br>
	<br>
	Asegurese de completar la totalidad de los campos solicitados.<br>
	Muchas Gracias. 
	<?php }?>
</fieldset>

