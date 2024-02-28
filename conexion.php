<?php
try
{
  $usuario="root";
  $contraseña="";
  $mbd = new PDO('mysql:host=localhost;dbname=ProyectoSistemas', $usuario, $contraseña);
  //echo "Conexion Exitosa";
  //$mbd = null;
}
catch (PDOException $e)
{
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
