<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylelogin.css">
    <link rel="stylesheet" href="./btcss/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Iniciar Sesion</title>
</head>
<body>

    <?php
        session_start();

        function mysql_entities_fix_string($conexion, $string){
            return htmlentities(mysql_fix_string($conexion, $string));
        }

        function mysql_fix_string($conexion, $string){
            if (get_magic_quotes_gpc()) 
                $string = stripslashes($string);
            return $conexion->real_escape_string($string);
        }

        $loginexito = false;

        if (isset($_POST['username'])&&
            isset($_POST['password']))
        {
            require_once './conexion/conec.php';
            $conexion = new mysqli($hn, $un, $pw, $db);

            if($conexion->connect_error) die("Error fatal");
        
            $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
            $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
            $query   = "SELECT * FROM usuario WHERE usuario='$un_temp'";
            // echo $query;
            $result  = $conexion->query($query);

            if(!$result) die ("Usuario no encontrado");
            elseif ($result->num_rows){

                $row = $result->fetch_array(MYSQLI_NUM);
                $result->close();

                if (password_verify($pw_temp, $row[4])){
                    
                    $_SESSION['nombre']=$row[1];
                    $_SESSION['id']=$row[0];
                    
                    header("Location:imaginart.php");
                    // echo ('se iniciara la entrada con el usuario'.$_SESSION['nombre']);
                }
                    // header("Location:startUser.php");
                
                else{
                     echo "<script>alert('contraseña incorrect@')</script>";
                }
            }
            else{
                echo "<script>alert('Usuario / contraseña incorrect@')</script>";
            }

            $conexion->close();
            
        }
        if(
        !$loginexito)
        {
    ?>

    <div class="padre">
        <div class="hijo">
            <div class="container_form">
                <div class="fondo">
                            
                    <img src="./img/loginimg.png" class="logo" alt="Logo">
                                
                    <form action="login.php" method="post">
                        <label for="inputUser" class="visually-hidden">Usuario</label>
                        <input type="text" class="form-control mb-1" name="username" placeholder="Usuario" required="True">
                        <label for="inputPassword" class="visually-hidden">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required="True">
                        <div style="font-family: 'Lobster', cursive;" class="botonContent">
                            <div style="text-align:center;">
                                <input type="submit" class="boton btn-primary fs-6" value="Iniciar Sesion">
                                <a href="registrar.php"><input type="button" class="boton btn-secondary fs-6" value="Registrarse" action></a>                                                               
                            </div>
                        </div>
                        <span class="clearn"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php    
    }
    ?>
</body>
</html>