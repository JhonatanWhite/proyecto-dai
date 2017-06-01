<!DOCTYPE html>
<html>
<head>
	<title>Listado de Clientes</title>
	<meta charset="utf-8" />
	<script src="https://use.fontawesome.com/0f9a8ac068.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	
</head>
<body>
<?php

require_once "../../DAO/ClienteDAO.php";

if(isset($_GET["nombre"])){
	$nombre 	= htmlspecialchars($_GET["nombre"]);
}else {
	$nombre 	= "";
}
$clientes = ClienteDAO::searchByNombre($nombre);


?>
<div class="container">
<h1>Clientes <i class="fa fa-users" aria-hidden="true"></i></h1>
<form method="get">
<a class="btn btn-success" href="form.php" role="button">Nuevo</a>
<a class="btn btn-success" href="../../menu.php" role="button">Volver Atrás</a>
<a class="btn btn-success" href="../../index.php" role="button">Volver a Página</a>
<input type="text" placeholder="Ej: Juan" name="nombre" id="nombre" value="<?=$nombre?>" /> <button type="submit" id="btnbuscar" class="btn btn-warning">Buscar Por Nombre</button>
<br >
<br >
<table class="table table-hover">
	<thead style="background-color:#ccc">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="tbody">
<?php
foreach($clientes as $cliente):
?>
		<tr>
			<td><?=$cliente->id?></td>
			<td><?=$cliente->nombre?></td>
			<td><?=$cliente->direccion?></td>
			<td><?=$cliente->correo?></td>
			<td><?=$cliente->telefono?></td>
			<td>
				<a class="btn btn-info" href="form.php?id=<?=$cliente->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
				<a class="btn btn-danger" href="deleteProd.php?id=<?=$cliente->id?>"><i class="fa fa-trash-o fa-lg"></i> Eliminar!</a>
			</td>
		</tr>
<?php
endforeach;
?>
	</tbody>
</table>
</div>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script type="text/javascript">
	
	$(function(){
		$("#btnbuscar").click(function(){
			var nombre = $("#nombre").val();
			$.get(
				// parámetro que indica la ruta en el servidor del archivo a consultar
				"ajax.php"
				// JSON con los datos a enviar al servidor
				, {
					nombre: nombre
				}
				// función anónima que se ejecuta cuando el servidor responde con datos 
				, function(data, status){
					//console.log(data);
					//console.log(status);
					$("#tbody").html("");
					var d = data;
					if(!Array.isArray(d)){
						d = [d];
					}
					for(var i in data){
						console.log(i);
						$("#tbody").append("<tr><td>"+d[i].id+"</td><td>"+d[i].nombre+"</td><td>"+d[i].direccion+"</td><td>"+d[i].correo+"</td><td>"+d[i].telefono+"</td></tr>");
					}
				}
				// representa el tipo de dato devuelto por el servidor
				, "json"
			);
			return false;
		});
		
	});
	</script>

</body>
</html>
