<?php
	//Funcion conexion a la base
	function conectarbd ()
	{
		$bdCon = mysql_connect(DB_HOST,DB_USER,DB_PASS);
		if(!$bdCon) return false;
		if(!mysql_select_db(DB_NAME, $bdCon)) return false;
		return $bdCon;
		mysql_close();
	}
?>