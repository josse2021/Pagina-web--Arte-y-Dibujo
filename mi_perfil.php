<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="./btcss/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style1.css">
    <link rel="stylesheet" href="./styles/headerstyle.css">
    <link rel="stylesheet" href="./styleperfil.css">
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

       <div class="header-content">
          <div class="logo">
            <a href="./imaginart.php"><img src="img/logo2.png " alt=""></a>
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
                    <li ><a  class="nav-link fs-4"  href="./imaginart.php">Inicio</a></li>
                    <li ><a class="nav-link fs-4" href="./mis_imagenes.php">Mis Imagenes</a></li>
                    <li ><a class="nav-link fs-4" href="#">Mi Perfil</a></li>
                </ul>
            </div>
   </nav> 

    <div class="container">
        <div class="container">

            <div class="text-center">

                <?php
                    $id_usuario=$_SESSION['id'];
                    include "./conexion/conexion.php";
                    $sentecia="SELECT nombre, apellido, usuario FROM usuario where id_usuario=$id_usuario";
                    $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));

                    while($fila=$resultado->fetch_assoc()){
                        echo "Nombre:<h2><strong>".$fila['nombre']."</strong></h2>";
                        echo "Apellido:<h2><strong>".$fila['apellido']."</strong></h2>";
                        echo "Usuario:<h2><strong>".$fila['usuario']."</strong></h2>";
                        
                        $sentecia="SELECT COUNT(url) as 'imagenes' from imagen WHERE id_usuario=$id_usuario";
                        $resultado= $conexion->query($sentecia) or die (mysqli_error($conexion));
                        
                        while($fila=$resultado->fetch_assoc()){
                        echo "<hr>";
                        echo "<p><h2>Imagenes Subidas</h2></p>";
                        echo "<hr>";
                        echo "<div class='text-center'>";
                            echo "<div class=''>";
                                echo " <h2>$fila[imagenes]</h2> ";
                                echo "<p><small>imagenes</small></p>";        
                                echo "<a href='mis_imagenes.php'><button class='btn btn-success btn-block' style='margin-bottom: 20px;'> Ver Imagenes </button></a>
                                  </div> 
                             </div> 
                            ";        
                        }
                    
                    }
                    $resultado->close();
                ?>
                       
            </div>
        </div>
    </div>


   <script src="./js/masonry.js"></script>
</body>
</html>