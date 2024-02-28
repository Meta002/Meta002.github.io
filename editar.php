<?php

session_start();

if($_SESSION['nivel'] != 2)
{
  header('Location: logout.php');
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <?php
    require("conexion.php");



    $vid = $_GET['id'];

    $sentencia = $mbd->prepare("SELECT * FROM usuarios WHERE id=?");
    $sentencia->bindParam(1, $vid);
    $sentencia->execute();

    $registro = $sentencia->fetch();

    if($registro == false)
    {
      echo "<div class='alert alert-danger' role='alert'> Usuario no encontrado </div>";
    }
    else
    {
    ?>

    <form class="form-signin" action="editardb.php" method="post">
      <img src="media/img/castro.jpg" alt="logo" width="50px">
      <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
      <label for="inputID">ID</label>
      <input type="text" id="inputID" name="id" class="form-control" placeholder="Name" value="<?php echo $registro['id']?>" required readonly>
      <label for="inputName">Name</label>
      <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" value="<?php echo $registro['nombre']?>" required autofocus>
      <label for="inputEmail">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?php echo $registro['correo']?>" required>
      <label for="inputPassword">Password</label>
      <input type="text" id="inputPassword" name="password" class="form-control" placeholder="Password" value="<?php echo $registro['contrasena']?>" required>
      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar</button><br>
      <a href="index.php" class="btn btn-dark btn-sm" role="button">Regresar</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
    </form>


    <?php
    }
     ?>

  </body>
</html>
