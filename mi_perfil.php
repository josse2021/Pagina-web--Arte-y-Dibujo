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
            <a href="#"><img src="img/logo2.png " alt=""></a>
            logotipo
          </div>

         
          <div style="margin:10px 30px 0 0;">
            <a href="logout.php" class="logout"><input type="button" class=" btn-outline-danger" value="Cerrar sesión"></a>
            <b class="usuario sticky-top"><?php echo $_SESSION['nombre']?></b>
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
   
   <!-- <div class="gallery container masonry-layout columns-3" id="gallery"> quitar el masory y las columnas- js reemplasará esto-->
    <script src="./btjs/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="container">
            <div class="text-center">
                
                        Nombre:<h2><strong>Jose Luis</strong></h2>
                        Apellido:<h2><strong>Qusipe Ayquipa</strong></h2>
                        Usuario:<h2><strong>$USUARIO$</strong></h2>
                       
                        <p><h2>Imagenes Subidas</h2></p>
                <div class="text-center">
                    <div class="">
                        <h2>$20$</h2>                    
                        <p><small>imagenes</small></p>
                        <a href="mis_imagenes.php"><button class="btn btn-success btn-block"> Ver Imagenes </button></a>
                    </div> 
                </div>                 
            </div>
        </div>
    </div>


   <script src="./js/masonry.js"></script>
   <script src="btjs/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>