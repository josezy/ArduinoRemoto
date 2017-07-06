<?php
//Codigo que se ejecuta una vez se reciben los datos
//Informacion se almacena en la base de datos 'arduinodb', en la tabla 'datos'
$db = mysqli_connect("localhost", "root", "root", "arduinodb");
for($s=0;$s<=5;$s++){//Para todos los sensores
	$val = isset($_REQUEST['s'.$s])?(int)$_REQUEST['s'.$s]:null;
	if($val != null){//Guarda solo la informacion de los sensores enviados, ahorra espacio en memoria
		$sql = "INSERT INTO datos (s_id,s_valor) VALUES ($s,$val)";
		mysqli_query($db,$sql);
	}
}
mysqli_close($db);
