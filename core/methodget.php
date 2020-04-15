<?php

$nombre = $_GET["nombre"];
$email = $_GET["email"];
$tel = $_GET["tel"];
$edad = $_GET["edad"];
$calza = $_GET["calza"];
$altura = $_GET["altura"];
$nacim = $_GET["nacim"];
$cpelo = $_GET["cpelo"];
$fechaturno = $_GET["fechaturno"];
$horaturno = $_GET["horaturno"];
$imgSubida = $_FILES["imgSubida"];	//El "notice" de php que apunta a esta linea se debe a que...
									//... no se pueden enviar archivos mediante el metodo GET.

?>