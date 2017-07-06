<?php
class Basedatos{
	var $link;	//link a la base de datos
	public function __construct(){}
	public function conectar($serv = 'localhost', $user = 'root', $clave = 'root', $base = 'arduinodb'){
		$this->link = mysqli_connect($serv, $user, $clave, $base);
	}
	public function cerrar(){
		mysqli_close($this->link);
	}
	public function validarUsuario($u,$p){
		$p = sha1($p);//encripta clave
		//evitar inyeccion SQL
		if($stmt = $this->link->prepare("SELECT ID FROM usuarios WHERE (user=?) AND (pass=?)")){
			$stmt->bind_param("ss", $u, $p);
			$stmt->execute();	 
			$stmt->bind_result($id);
			$stmt->fetch();
			$stmt->close();
			return (int)$id;
		}
		return null;//si no se puede hacer la consulta con sentencias preparadas retorna null
		//codigo vulnerable a la inyeccion SQL
		//$sql = "SELECT ID FROM usuarios WHERE (user='$u') AND (pass='$p')";
		//$res = @mysqli_fetch_array(mysqli_query($this->link, $sql));
		//return (int)$res['ID'];//si el usuario se valida correctamente se retorna la ID que tiene asignada en la tabla
	}
	public function agregarUsuario($u,$p){
		$p = sha1($p);//encripta clave
		$sql = "INSERT INTO Usuarios (User,Pass) VALUES ('$u','$p')";
		mysqli_query($this->link, $sql);
	}
	public function usuarioExiste($u){
		$sql = "SELECT * FROM usuarios WHERE user='$u'";
		$res = mysqli_fetch_array(mysqli_query($this->link,$sql));
		return ($res['user']==$u)?false:true;//si encuentra el nombre de usuario, es porque existe
	}
	public function leerDatos($df,$hf,$dh = "00:00:00",$hh = "23:59:59"){
		$sql = "SELECT * FROM datos WHERE Fecha BETWEEN '$df $dh' AND '$hf $hh' ORDER BY Fecha ";
		$res = mysqli_query($this->link,$sql);
		return mysqli_fetch_all($res);//retorna una matriz con los resultados
	}
}