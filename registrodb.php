<?php
require("conexion.php");

$nombre = $_POST['name'];
$correo = $_POST['email'];
$contra = $_POST['password'];
$nivel = 1;

$sentencia = $mbd->prepare("INSERT INTO usuarios(nombre,correo,contrasena,nivel_id) VALUES (?,?,?,?)");
$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $correo);
$sentencia->bindParam(3, $contra);
$sentencia->bindParam(4, $nivel);
$sentencia->execute();

header('Location: index.php');

 ?>
