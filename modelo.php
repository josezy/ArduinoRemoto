<?php
include('basedatos.php');
include('grafica.php');
class Modelo{
	private $bd;
	private $grafica;
	public function __construct(){
		$this->bd = new Basedatos();
		$this->bd->conectar();
		$this->grafica = new Grafica();
	}
	function validarUsuario($user, $pass){
		return $this->bd->validarUsuario($user,$pass);
	}
	public function validarCodigo($cod){
		if($cod == "1234")return true;
		else return false;
	}
	function registrarUsuario($user, $pass){
		$this->bd->agregarUsuario($user, $pass);
	}
	function usuarioExiste($user){
		return $this->bd->usuarioExiste($user);
	}
	function cargarGrafica($A,$fechas){
		if($fechas['df'] != null and $fechas['hf'] != null){//Solo si hay fechas establecidas, evita campos vacios
			$vec = $this->bd->leerDatos($fechas['df'],$fechas['hf'],$fechas['dh'],$fechas['hh']);//lee informacion entre las fechas
			$data = array();
			$valores = array();
			foreach($vec as $f){//Organiza la fecha de los datos y crea una matriz por fechas
				$fecha = str_replace(' ',"\n",$f[3]);
				$valores[$fecha][(int)$f[1]] = (int)$f[2];
			}
			foreach($valores as $fecha => $datos){//A cada fecha organiza un vector con los datos de los sensores
				$aux = array($fecha,"","","","","","");
				foreach($datos as $sen => $valor){
					if(isset($A[$sen]))$aux[$sen+1] = $valor;
				}
				$data[] = $aux;//Concatena el vector de ordenadas para la abscisa (fecha) en cuestion
			}
			$this->grafica->setData($data,$A);
			$this->grafica->dibujar();
		}
	}
}

