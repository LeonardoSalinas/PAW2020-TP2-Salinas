<?php

//Validar nombre
function ValidNombre($nombre){
	return isset($nombre);
}


//Validar email
function ValidEmail($email){
	$valid = false;
	if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$valid = true;
	}
	return $valid;
}


//Validar tel
function ValidTel($tel){
	return isset($tel);
}


//Validar edad
function ValidEdad($edad){
	$valid = false;
	if (intval($edad) >= 0 && intval($edad) <= 110){
		$valid = true;
	}
	return $valid;
}


//Validar calza (talla clazado)
function ValidCalza($calza){
	$valid = false;
	if (empty($calza)){
		$valid = true;
	} elseif (intval($calza) >= 20 && intval($calza) <= 45){
		$valid = true;
	}
	return $valid;
}


//Validar altura
function ValidAltura($altura){
	$valid = false;
	if (empty($altura)){
		$valid = true;
	} elseif (intval($altura) >= 0 && intval($altura) <= 350){
		$valid = true; 
	}
  	return $valid;
}


//Validar nacim (fecha nacimiento)
function ValidNacim($nacim){
	if (isset($nacim) && $nacim < date("Y-m-d")){
		return true;
	} else {
		return false;
	}
}


//Validar cpelo (color pelo)
function ValidCPelo($cpelo){
	$cpeloLista = array ("negro", "rubio", "pelirrojo", "blanco", "marron");
	if (in_array($cpelo, $cpeloLista)){
		return true;
	} else {
		return false;
	}
}


//Validar fechaturno
function ValidFechaturno($fechaturno){
	if (isset($fechaturno) && $fechaturno >= date("Y-m-d")){
		return true;
	} else {
		return false;
	}
}


//Validar horaturno
function ValidHoraturno($horaturno){
	$valid = false;
	if (isset($horaturno)){
		$arrayDate = explode(":", $horaturno);
	  	$minutes = $arrayDate[1]; 
	  	if (intval($minutes) == 00 || intval($minutes) == 15 || intval($minutes) == 30 || intval($minutes) == 45) {
	  		$valid = true;
  		} 
 	}
 	return $valid;
}

//Validar imgSubida
function ValidImg($imgSubida){
	$valid = false;
	if ($imgSubida["error"] == 4){ 	//No es obligatorio subir una img. En caso de error #4...
		$valid = true;				//... es que no se ha subido una img; se debe continuar.
	} else {
		$imgExt = $imgSubida['type'];
		$validExt = ["image/jpeg", "image/png"];
  		if (in_array($imgExt, $validExt)) {
  			$valid = true;
  		}
  	}
  	return $valid;
}

//Valido todos los parametros al mismo tiempo en una sola funcion
function ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgSubida) {
	if (ValidNombre($nombre) && ValidEmail($email) && ValidTel($tel) && ValidEdad($edad) && ValidCalza($calza) && ValidAltura($altura) && ValidNacim($nacim) && ValidCPelo($cpelo) && ValidFechaturno($fechaturno) && ValidHoraturno($horaturno) && ValidImg($imgSubida)) {

		return true;
	} else {
		return false;
	}
}

//Almacena una img valida y devuelve el path relativo de la misma
//En el archivo README.md hay una explicacion con mayor detalle de lo que contiene cada variable
function saveImg($imgSubida){
	 $imgFolderPath = getcwd(). '\\' . "images" . '\\'; //Path de la carpeta donde se guardan las imgs
	 $imgName = basename($imgSubida['name']); 			//nombreImg.extension
	 $imgExt = substr($imgName,strrpos($imgName,'.')+0);//Extension de la img con el punto
	 $theTime = time();
	 $hashedName = hash("sha256" , $imgSubida['tmp_name'] . $theTime . rand(1,1000000)) . $imgExt;
	 $imgFileName = $imgFolderPath . $hashedName;//Path completo a la img (con nombre hasheado)
	 $imgRelName = "";

	 if (move_uploaded_file($imgSubida['tmp_name'], $imgFileName)) {
	 	$imgRelName = "images" . '\\' . $hashedName;//path relativo a la img
	 }

	 return ($imgRelName);

}


?>