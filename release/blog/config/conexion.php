<?php
	require_once ($_SERVER['DOCUMENT_ROOT'].'/release/blog/config/config.php');
	
	//Class coneccion a base de datos
	class connect 
	{ 
	    protected $_db; 
	   
	    public function __construct($_db) 
	    { 
	        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

	        if ( $this->_db->connect_errno ) 
	        { 
	            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
	            exit();
	        } 
	        $this->_db->close();
	    }

	} 
?>