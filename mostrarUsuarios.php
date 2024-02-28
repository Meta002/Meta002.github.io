<?php
  session_start();

  if($_SESSION['nivel'] != 1 && $_SESSION['nivel'] != 2)
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
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
  </head>

  <body class="text-center">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="crearCategoria.php">Crear</a>
              <a class="dropdown-item" href="mostrarCategorias.php">Mostrar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Articulos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="crearArticulos.php">Crear</a>
              <a class="dropdown-item" href="mostrarArticulos.php">Mostrar</a>
            </div>
          </li>
        </ul>

        <span class="navbar-text">
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre'] ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                  <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </span>

      </div>
    </nav>


    <br><br><br><br>
    <?php
      require("conexion.php");

      $sentencia = $mbd->prepare("SELECT * FROM usuarios");
      $sentencia->execute();

      ?>
      <div class="container">
        <h1>Tabla de Usuarios</h1>
      <table class="table table-borderless table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <?php
              if ($_SESSION['nivel'] == 2)
              {
             ?>
                <th scope="col">Contraseña</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            <?php
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          while($fila = $sentencia->fetch())
          {
           ?>
            <tr>
              <td><?php echo $fila['id']; ?></td>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['correo']; ?></td>
              <?php
                if ($_SESSION['nivel'] == 2)
                {
               ?>
                  <td><?php echo $fila['contrasena']; ?></td>
                  <td><a class="btn btn-warning" href="editar.php?id=<?php echo $fila['id'];?>" role="button">Editar</a></td>
                  <td><a class="btn btn-danger"  href="eliminar.php?id=<?php echo $fila['id'];?>" onclick="return confirm('Estas seguro de eliminar este registro?')" role="button" >Eliminar</a></td>
                <?php
                  }
                ?>
            </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
      </div>

  </body>

</html>
