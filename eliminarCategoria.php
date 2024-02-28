<?php
$vid = $_GET['id'];

require("conexion.php");

$sentencia = $mbd->prepare("DELETE FROM categorias WHERE id=?");
$sentencia->bindParam(1, $vid);
$sentencia->execute();

header('Location: mostrarCategorias.php');

 ?>
