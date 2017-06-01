
<?php 
require_once "../../DAO/ClienteDAO.php";
$nombre = $_GET["nombre"];
$clientes = ClienteDAO::searchByNombre($nombre);
// json_encode devuelve el objeto como un string en formato JSON
$json = json_encode($clientes);
echo $json;