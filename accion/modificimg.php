<?php
<<<<<<< HEAD
=======
	var_dump($_FILES);
	echo('<br>');

>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
	ModificarProducto($_POST['idimg'], $_POST['descripcion'] );

	include '../conexion/conexion.php';

	function ModificarProducto($idimg, $descrip)
	{
		include '../conexion/conexion.php';
<<<<<<< HEAD
		$sentencia="UPDATE imagen SET descripcion='".$descrip."' WHERE id_imagen='".$idimg."' ";
=======
		echo $sentencia="UPDATE imagen SET descripcion='".$descrip."' WHERE id_imagen='".$idimg."' ";
>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
		$conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
	}

	if ($_FILES["file1"]["error"] > 0)
	{
<<<<<<< HEAD
		// echo 'no hay imagen';
	} else 
	{
=======
		echo 'no hay imagen';
	} else 
	{

>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
		$nom_archivo=$_FILES['file1']['name']; // Para conocer el nombre del archivo
		$ruta = "../images/". $nom_archivo;  // La ruta del archivo contiene el nuevo nombre y el tipo de extension
		$url = "images/". $nom_archivo;
		$archivo = $_FILES['file1']['tmp_name']; //el arhivo a subir
		$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo
<<<<<<< HEAD
		$sentencia_img="UPDATE imagen SET url='$url' WHERE id_imagen='".$_POST['idimg']."' ";
		$conexion->query($sentencia_img) or die ("Error al actualizar datos".mysqli_error($conexion));
	}
=======
		echo $sentencia_img="UPDATE imagen SET url='$url' WHERE id_imagen='".$_POST['idimg']."' ";
		$conexion->query($sentencia_img) or die ("Error al actualizar datos".mysqli_error($conexion));
	}

>>>>>>> 5c83e43bba99c5648de00be3916055a9e3242c27
?>

<script type="text/javascript">
	alert("Datos Actualizados Exitosamante!!");
	window.location.href='../mis_imagenes.php';
</script>