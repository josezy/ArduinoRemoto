<?php
class Cliente{
	//Atributos
	private $autenticado;
	private $_modelo;
	private $_vista;
	//Metodos
	public function __construct($mod, $vis){
		session_start();
		$this->autenticado = isset($_SESSION['logueado'])?$_SESSION['logueado']:false;
		$this->_modelo = $mod;
		$this->_vista = $vis;
	}
	function ejecutar($accion){
		$this->$accion();
	}
	function getParam($param){
		return isset($_REQUEST[$param])?$_REQUEST[$param]:null;
	}
	function getFechas(){
		$fechas = array(
			'df'=>$this->getParam("df"),
			'hf'=>$this->getParam("hf"),
			'dh'=>$this->getParam("dh"),
			'hh'=>$this->getParam("hh"));
		return $fechas;
	}
	function inicio(){
		if($this->autenticado != false){
			$this->_modelo->cargarGrafica($this->getParam("A"),$this->getFechas());
			echo $this->_vista->paginaInicio($this->getFechas(),$this->getParam("A"),$this->getParam("pc"));
		}else{
			echo $this->_vista->inicioSesion();
		}
	}
	function entrar(){
		$idu = $this->_modelo->validarUsuario($this->getParam("user"),$this->getParam("pass"));
		if($idu != null){
			$_SESSION['logueado'] = $idu;
			$this->_modelo->cargarGrafica($this->getParam("A"),$this->getFechas());
			echo $this->_vista->paginaInicio($this->getFechas(),$this->getParam("A"),$this->getParam("pc"));
		}else{
			echo $this->_vista->inicioSesion();
			echo "<font color='red'>Usuario o clave incorrecta</font><br>";
		}
	}
	function salir(){
		$_SESSION['logueado'] = false;
		echo $this->_vista->inicioSesion();
	}
	function registrar(){
		echo $this->_vista->formularioRegistro();
	}
	function validarse(){
		if($this->_modelo->validarCodigo($this->getParam("r_code"))){
			if($this->_modelo->usuarioExiste($this->getParam("r_user"))){
				$this->_modelo->registrarUsuario($this->getParam("r_user"),$this->getParam("r_pass"));
				echo $this->_vista->inicioSesion();
			}
			else{
				echo $this->_vista->formularioRegistro();
				echo "<font color='red'>Usuario ya existe, escriba otro</font><br>";
			}
		}
		else{
			echo $this->_vista->formularioRegistro();
			echo "<font color='red'>Codigo erroneo</font><br>";
		}
	}
	function actualizar(){
		if($this->autenticado != false){
			$this->_modelo->cargarGrafica($this->getParam("A"),$this->getFechas());
			echo $this->_vista->paginaInicio($this->getFechas(),$this->getParam("A"),$this->getParam("pc"));
		}
		else{
			echo $this->_vista->inicioSesion();
		}
	}
}
