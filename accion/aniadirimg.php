<?php

	var_dump($_FILES);
	include '../conexion/conexion.php';

	function NuevoProducto($id_usuario, $ruta, $descrip)
	{
		include '../conexion/conexion.php';
		$sentencia= "INSERT INTO imagen (id_usuario, url, descripcion) VALUES ('".$id_usuario."', '".$ruta."', '".$descrip."')";
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
	}



	if ($_FILES["file2"]["error"] > 0){
		echo('la imagen no esta o hey muchosahdahsdiahsdiohaio');
		echo $_FILES['file2']['name'];
	} else 
	{
		$id_usuario = 1;
		$nom_archivo=$_FILES['file2']['name']; // Para conocer el nombre del archivo
		$ruta = "../images/". $nom_archivo;  // La ruta del archivo contiene el nuevo nombre y el tipo de extension
		echo $ruta;
		$url = "images/". $nom_archivo;
		$archivo = $_FILES['file2']['tmp_name']; //el arhivo a subir
		$subir=move_uploaded_file($archivo, $ruta); //se sube el archivo
		// echo $sentencia_img="UPDATE productos SET imagen='$ruta' WHERE no='".$_POST['no']."' ";
		// echo $sentencia_img="INSERT INTO productos (imagen) VALUES ('$ruta')";
		// $conexion->query($sentencia_img) or die ("Error al actualizar datos".mysqli_error($conexion));
		
		NuevoProducto($id_usuario,$url, $_POST['descripcion']);
	
		
	}
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href='../mis_imagenes.php';
</script>