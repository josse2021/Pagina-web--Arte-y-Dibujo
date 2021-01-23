<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImaginArt</title>
    <link rel="stylesheet" href="./btcss/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

</head>
<body >

   <header class="header">

       <div class="header-content">
          <div class="logo">
            <a href="#">
              <img src="img/logo2.png " alt="">
            </a>
            logotipo
            
          </div>
          
          <b class="usuario sticky-top">
            usuario
          </b>
          <div class="titulo">
            <h1 class="titulo_principal">
              Galeria de Arte-Dibujo
            </h1>
            <p class="titulo_secundario ">
            ImaginArt
            </p>
          </div>
       </div>
   </header>

   <nav class="navbar-expand-sm sticky-sm-top text-center" style="top: 0px;">
            <div class="navbar-collapse navsi">
                <ul class="navbar-nav ">
                    <li ><a  class="nav-link fs-4"  href="./imaginart.html">Inicio</a></li>
                    <li ><a class="nav-link fs-4" href="#">Mis Imagenes</a></li>
                    <li ><a class="nav-link fs-4" href="#">Mi Perfil</a></li>
                </ul>
            </div>
   </nav> 
   
   <!-- <div class="gallery container masonry-layout columns-3" id="gallery"> quitar el masory y las columnas- js reemplasará esto-->
   <a href="nuevo_prod1.php" style='margin-left: 50px'><button type="button" class="btn btn-info">Nuevo</button> </a> </th>
        <!-- </thead> -->

        <?php
          include "./conexion/conexion.php";
          $sentecia="SELECT * FROM imagen";
          $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
          echo "<div class='gallery container' id='gallery'>";
          while($fila=$resultado->fetch_assoc())
          {
              echo "<div class='gallery-item'><img class='grid-item' src='".$fila['url']."' width='200'>";
                echo "<div>";
                  echo $fila['id_usuario'];
                  echo '<br>';
                  echo 'Jose Luis';
                  echo '<br>';
                  echo $fila['descripcion'];
                echo "</div>";

                echo "<a href='modif_prod1.php?no=".$fila['id_usuario']."'> <button type='button' class='btn btn-success'>Modificar</button> </a>";
                echo " <a href='eliminar_prod.php?no=".$fila['id_usuario']."'> <button type='button' class='btn btn-danger'>Eliminar</button> </a>";
              echo "</div>";
              
            }
          echo "</div>";
          
          $resultado->close();
        ?>


   <script src="./js/masonry.js"></script>
   <script src="btjs/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>