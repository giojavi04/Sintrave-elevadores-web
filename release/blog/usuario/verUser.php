<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/release/blog/config/conexion.php');

class usuariosClass extends connect{

	public function __construct(){
		parent::__construct();
	}

	public function get_users( $usuario, $password){

		if ($usuario == '' || $password == '') return false;

		$result = $this->_db->mysqli_query("SELECT idUsuario, usuario, password, departamento, email, tipo FROM usuarios WHERE usuario = '$usuario'");
		$row = mysqli_fetch_array($result);
		$password_from_db = $row['password'];
		unset($result);

		if($password_from_db == $password){
			return $row;
		} else return false;

	}
}
// function verUser( $usuario, $password, $conexion ) {
	
// 	// verifica que esten los dos campos completos.
// 	if ($usuario=='' || $password=='') return false;
	
// 	// busqueda de los datos de usuarios para loguear.
// 	$query = "SELECT idUsuario, usuario, password, departamento, email, tipo FROM `usuarios` WHERE usuario = '$usuario'";
// 	$resultado = mysql_query ($query, $conexion);
// 	$row = mysql_fetch_array ($resultado);
// 	$password_from_db = $row ['password'];
// 	unset($query);
			
// 	// verifica que el pass enviado sea igual al pass de la db.
// 	if ( $password_from_db == $password ) {
// 		return $row;
// 	} else return false;	
// }

?>