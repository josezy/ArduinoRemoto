<?php
class Vista{
	function inicioSesion(){
		return '<h1>Iniciar sesion</h1>
					<form method="post" action='.$_SERVER['PHP_SELF'].'>
						Usuario: <input type="text" name="user"><br>
						Clave:&nbsp&nbsp&nbsp&nbsp<input type="password" name="pass"><br><br>
						<input type="submit" name="accion" value="entrar"><br><br>
						<a href="'.$_SERVER['PHP_SELF'].'?accion=registrar">Registrar</a><br><br>
					</form>
				';
	}
	function paginaInicio($fechas,$A,$pc,$grafica = "grafica.png"){
		date_default_timezone_set('America/Bogota');
		$idf = ($fechas['df']!=null)?$fechas['df']:date("Y-m-d",strtotime("now"));
		$ihf = ($fechas['hf']!=null)?$fechas['hf']:date("Y-m-d",strtotime("now"));
		$idh = ($pc!=null)?date("H:i:s",strtotime("now -10 sec")):(($fechas['dh']!=null)?$fechas['dh']:date("H:i:s",strtotime("now -30 min")));
		$ihh = ($pc!=null)?date("H:i:s",strtotime("now")):(($fechas['hh']!=null)?$fechas['hh']:date("H:i:s",strtotime("now")));
		return '<h1 class="titulo">Arduino Remoto v0.1</h1>
					<img src="'.$grafica.'?'.rand(1,9).'" class="imagen"><br><br>
					<form action='.$_SERVER['PHP_SELF'].' method="post"><span class="texto">Sensores:</span>
					<input type="checkbox" '.(isset($A[0])?'checked':'').' name="A[0]" id="a0" class="cbox">
					<label for="a0" class="cblabel">A0</label>
					<input type="checkbox" '.(isset($A[1])?'checked':'').' name="A[1]" id="a1" class="cbox">
					<label for="a1" class="cblabel">A1</label>
					<input type="checkbox" '.(isset($A[2])?'checked':'').' name="A[2]" id="a2" class="cbox">
					<label for="a2" class="cblabel">A2</label>
					<input type="checkbox" '.(isset($A[3])?'checked':'').' name="A[3]" id="a3" class="cbox">
					<label for="a3" class="cblabel">A3</label>
					<input type="checkbox" '.(isset($A[4])?'checked':'').' name="A[4]" id="a4" class="cbox">
					<label for="a4" class="cblabel">A4</label>
					<input type="checkbox" '.(isset($A[5])?'checked':'').' name="A[5]" id="a5" class="cbox">
					<label for="a5" class="cblabel">A5</label>
					<br><br><span class="texto">Desde:</span>
					<input type="date" name="df" value="'.$idf.'">
					<input type="time" name="dh" value="'.$idh.'" step="1">
					<br><span class="texto">Hasta:&nbsp;</span>
					<input type="date" name="hf" value="'.$ihf.'">
					<input type="time" name="hh" value="'.$ihh.'" step="1">
					<br><input type="checkbox" '.(isset($pc)?'checked':'').' name="pc" hidden>
					<br><input type="submit" name="accion" value="Actualizar"><br>
					<a href="'.$_SERVER['PHP_SELF'].'?accion=salir">Salir</a>
					</form>
				';
	}
	function formularioRegistro(){
		return '<h1>Registrar</h1>
					<form method="post" action='.$_SERVER['PHP_SELF'].'>
						Usuario: <input type="text" name="r_user"><br><br>
						Clave Personal: <input type="text" name="r_pass"><br><br>
						Codigo Arduino: <input type="text" name="r_code"><br><br>
						<input type="submit" name="accion" value="validarse"><br><br>
					</form>
				';
	}
}