<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImaginArt</title>
    <link rel="stylesheet" href="./btcss/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style1.css">
    <link rel="stylesheet" href="./styles/headerstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

</head>
<body >

    <?php
        session_start();

        if(!isset($_SESSION['nombre']) || $_SESSION['nombre'] == null)
            header("Location:login.php");
    ?>

    <header class="header">

      <div class="header-content ">
          <div class="logo">
            <a href="#"><img src="img/logo2.png " alt=""></a>
          </div>

          <div style="margin:10px 30px 0 0;">
              <a href="logout.php" class="logout"><input type="button" class="rounded-pill bg-danger text-light" style="width: 100px;height: 40px;" value="Cerrar sesión"></a>
                <b class="usuario badge rounded-pill text-dark sticky-top sticky-top"><?php echo $_SESSION['nombre']?></b>
          </div> 
        
          <div class="titulo">
            <h1 class="titulo_principal">Galeria de Arte-Dibujo</h1>
            <p class="titulo_secundario ">ImaginArt</p>
          </div>
      </div>
    </header>

    <nav class="navbar-expand-sm sticky-sm-top text-center" style="top: 0px;">
            <div class="navbar-collapse navsi">
                <ul class="navbar-nav ">
                    <li ><a  class="nav-link fs-4"  href="#">Inicio</a></li>
                    <li ><a class="nav-link fs-4" href="./mis_imagenes.php">Mis Imagenes</a></li>
                    <li ><a class="nav-link fs-4" href="./mi_perfil.php">Mi Perfil</a></li>
                </ul>
            </div>
    </nav> 

   <!-- <div class="gallery container masonry-layout columns-3" id="gallery"> quitar el masory y las columnas- js reemplasará esto-->
    <div class="gallery container" id="gallery">
      <div class="gallery-item"><img class="grid-item" src="https://picsum.photos/230/128.jpg" /></div>
      <div class="gallery-item"><img class="grid-item" src="https://picsum.photos/230/300.jpg" /></div>
      <div class="gallery-item"><img class="grid-item" src="https://picsum.photos/230/410.jpg" /></div>
    </div>

   <?php
          $id_usuario=$_SESSION['id'];
          include "./conexion/conexion.php";
          // $sentecia="SELECT * FROM imagen where id_usuario=$id_usuario";
          $sentecia="SELECT i.url, i.descripcion, u.nombre FROM imagen i INNER JOIN usuario u on i.id_usuario = u.id_usuario";

          $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
          echo "<div class='gallery container' id='gallery'>";
          while($fila=$resultado->fetch_assoc())
          {
              echo "<div class='gallery-item'><img class='grid-item' src='".$fila['url']."' width='200'>";
                echo "<div>";
                  // echo $fila['id_usuario'];
                  // echo '<br>';
                  echo $fila['nombre'];
                  echo '<br>';
                  echo $fila['descripcion'];
                echo "</div>";
              echo "</div>"; 
            }
          echo "</div>";
          
          $resultado->close();
        ?>

   <script src="./js/masonry.js"></script>
</body>
</html>