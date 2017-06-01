<?php
/**
 * En el patrón DAO representa
 * al TransferObject
 * 
 */

class Cliente {
	
	public $id = 0;
	public $rut;
	public $nombre;
	public $direccion;
	public $correo;
	public $telefono;
	
	public function __construct($id, $rut, $nombre, $direccion, $correo, $telefono) {
		// argumentos como array
		$argumentos = func_get_args();
		// número de argumentos
		$numArgs 	= func_num_args();
		
		// si usa 4 o más argumentos
		if($numArgs >= 6) {
			$this->id 				= $id;
			$this->rut  			= $rut;
			$this->nombre 			= $nombre;
			$this->direccion 		= $direccion;
			$this->correo 			= $correo;
			$this->telefono 		= $telefono;
			
		}
	}
	
	// PHP Magic Methods
	
	public function __get($propiedad) {
		if( property_exists($this, $propiedad) ){
			return $this->$propiedad;
		}
	}
	
	public function __set($propiedad, $valor) {
		if( property_exists($this, $propiedad) ){
			return $this->$propiedad = $valor;
		}
	}
	
}
