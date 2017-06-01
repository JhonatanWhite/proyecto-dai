<?php

require_once "Cliente.php";
require_once "ConnectionFactory.php";

class ClienteDAO {
	
	const TABLA = "registros";
	
	public static function createObject($data){
		return new Cliente($data["id"], $data["rut"], $data["nombre"], $data["direccion"], $data["correo"], $data["telefono"]);
	}
	
	public static function getById($clienteId) {
		$conexion = self::getConnection();
		$sw = "SELECT * FROM ".self::TABLA." WHERE id = :cliente_id";
		$statement = $conexion->prepare($sw);
		$statement->bindParam(":cliente_id", $clienteId);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$entidad = $statement->fetch();
		return self::createObject($entidad);
	}
	
	public static function searchByNombre($nombre) {
		$conexion 	= self::getConnection();
		$nombre 	= strtolower($nombre);
		$nombre 	.= "%"; // $nombre = $nombre."%";
		$nombre 	= "%".$nombre."%";
		$sw 		= "SELECT * FROM ".self::TABLA." WHERE LOWER(nombre) LIKE :nombre";
		$statement 	= $conexion->prepare($sw);
		$statement->bindParam(":nombre", $nombre);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$lista 		= array();
		while( $entidad = $statement->fetch() ){
			array_push( $lista, self::createObject($entidad) );
		}
		return $lista;
	}
	
	public static function getAll() {
		$conexion = self::getConnection();
		$sw = "SELECT * FROM ".self::TABLA."";
		$statement = $conexion->prepare($sw);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		$statement->execute();
		$lista = array();
		while( $entidad = $statement->fetch() ){
			array_push( $lista, self::createObject($entidad) );
		}
		return $lista;
	}
	
	public static function delete($clienteId) {
		$clienteId = intval($clienteId);
		$conexion = self::getConnection();
		$sw = "DELETE FROM ".self::TABLA." WHERE id = :cliente_id";
		$statement = $conexion->prepare($sw);
		$statement->bindParam(":cliente_id", $clienteId);		
		$statement->execute();
	}
	
	public static function save(Cliente $cliente) {
		$conexion = self::getConnection();
		
		if($cliente->id == 0) {
			// alumno nuevo
			$sw = "INSERT INTO ".self::TABLA."(id, rut, nombre, direccion, correo, telefono) VALUES(:id, :rut, :nombre, :direccion, :correo, :telefono)";
			$statement = $conexion->prepare($sw);
			$statement->bindValue(":id", $cliente->id);
			$statement->bindValue(":rut", $cliente->rut);
			$statement->bindValue(":nombre", $cliente->nombre);
			$statement->bindValue(":direccion", $cliente->direccion);
			$statement->bindValue(":correo", $cliente->correo);
			$statement->bindValue(":telefono", $cliente->telefono);
			if($cliente->id > 0){
				$statement->bindValue(":cliente_id", $cliente->id);
			}
			$statement->execute();
		} else {
			// modificar alumno
			$sw = "UPDATE ".self::TABLA." SET id = :id, rut = :rut , nombre = :nombre, direccion = :direccion, correo = :correo, telefono = :telefono WHERE id = :cliente_id";
			$statement = $conexion->prepare($sw);
			$statement->bindValue(":id", $cliente->id);
			$statement->bindValue(":rut", $cliente->rut);
			$statement->bindValue(":nombre", $cliente->nombre);
			$statement->bindValue(":direccion", $cliente->direccion);
			$statement->bindValue(":correo", $cliente->correo);
			$statement->bindValue(":telefono", $cliente->telefono);
			if($cliente->id > 0){
				$statement->bindValue(":cliente_id", $cliente->id);
			}
			$statement->execute();
		}
		
		if($cliente->id == 0) {
			$cliente->id = intval($conexion->lastInsertId());
		}
		return $cliente;
	}
	
	private static function getConnection() {
		return ConnectionFactory::getConnection();
	}
	
}
