<?php
$vid = $_GET['id'];

require("conexion.php");

$sentencia = $mbd->prepare("DELETE FROM usuarios WHERE id=?");
$sentencia->bindParam(1, $vid);
$sentencia->execute();

header('Location: index.php');

 ?>
