<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregistrar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./btcss/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    
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
            echo "entrando";
            require_once './conexion/conec.php';
            $conexion = new mysqli($hn, $un, $pw, $db);
    
            if($conexion->connect_error) die("Error fatal");

                $nombre = mysql_entities_fix_string($conexion, $_POST['nombre']);
                $apellido = mysql_entities_fix_string($conexion, $_POST['apellido']);
                $username = mysql_entities_fix_string($conexion, $_POST['username']);
                $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);

                $password = password_hash($pw_temp, PASSWORD_DEFAULT);

                $query = "INSERT INTO usuario (nombre, Apellido, usuario, password)VALUES('$nombre','$apellido','$username', '$password')";

                echo $query;

                $result = $conexion->query($query);
                if (!$result) die ("Falló registro");

                $conexion->close();
                echo "<script>alert('se guardó el usuario')</script>";
                header("Location:login.php");

          }     
        if(
        !$loginexito)
        {
    ?>

            <div class="padre">
                    <div class="hijo">
                        <div class="container_form">
                            <img src="./img/registrate.png" class="logo" alt="Logo">
                            <form action="registrar.php" method="post">
                                <label for="inputName" class="visually-hidden">Name</label>
                                <input class="form-control mb-1 mt-3" type="text" name="nombre" placeholder="Nombre" required="True">
                                <label for="inputApellido" class="visually-hidden">Apellido</label>
                                <input class="form-control mb-1" type="text" name="apellido" placeholder="Apellido" required="True">
                                <label for="inputUser" class="visually-hidden">Usuario</label>
                                <input class="form-control mb-1" type="text" name="username" placeholder="Usuario" required="True">
                                <label for="inputPassword" class="visually-hidden">Contraseña</label>
                                <input class="form-control mb-1" type="password" name="password" placeholder="Contraseña" required="True">
                                <div style="text-align:center;">
                                        <input style="font-family: 'Lobster', cursive;" class="boton btn-primary fs-5" type="submit" value="Registrarse">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    <?php    
    }
    ?>
</body>
</html>