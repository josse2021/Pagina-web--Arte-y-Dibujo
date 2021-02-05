<?php
	session_start();

	if(!isset($_SESSION['nombre']) || $_SESSION['nombre'] == null)
		header("Location:login.php");

	include "./conexion/conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nueva Imagen</title>
<<<<<<< HEAD
=======
<style type="text/css">
@import url("css/mycss.css");
</style>
>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
<link rel="stylesheet" href="./btcss/bootstrap.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

	<div class="todo">
	
	<div id="contenido">
		<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
			<span> <h1>Añadir nueva imagen</h1> </span>
			<br>
		<form action="./accion/aniadirimg.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" enctype="multipart/form-data" >
			<label>Descripcion: </label>
			<textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion" ></textarea><br>
			
<<<<<<< HEAD
			<input type="file" name="file2" id="file2" required="True" value="Imagen">
=======
			<input type="file" name="file2" id="file2">
>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
			<br>
			<button type="submit" class="btn btn-success">Guardar</button>
		</form>
		</div>
		
	</div>

	</div>


</body>
</html>