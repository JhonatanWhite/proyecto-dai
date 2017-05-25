<?php

require_once "../../DAO/productoDao.php";

productoDao::delete($_GET["id"]);
header("Location: listarProductos.php");
die();
