<?php
require_once 'PestXML.php';
#Cambie este valor por la dirección de acceso a su sistema luxury
$URL = 'http://gringsoft.com.ar:12008';

$pest = new PestXML($URL . '/api/reservas');
?>
