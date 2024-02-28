<?php
$vid = $_GET['id'];

require("conexion.php");

$sentencia = $mbd->prepare("DELETE FROM articulos WHERE id=?");
$sentencia->bindParam(1, $vid);
$sentencia->execute();

header('Location: mostrarArticulos.php');

 ?>
