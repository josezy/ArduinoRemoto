<?php
	include('cliente.php');
	include('modelo.php');
	include('vista.php');
	$mod = new Modelo();
	$vis = new Vista();
	$cliente = new Cliente($mod, $vis);
?>
<html>
<head>
	<title>Base de Datos Arduino</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body style="text-align:center;">
<?php
	$cliente->ejecutar(isset($_REQUEST['accion'])?$_REQUEST['accion']:"inicio");
	/*
		funcionamiento 30%
		codificacion 20%
		presentacion 10%
		seguridad 5%
			sql injection
			sesion (usuario registrado)
		informe 15%
			blog
	*/
?>
</body>
</html>