<?php
	EliminarProducto($_GET['idimg']);

	function EliminarProducto($idimg)
	{
		include './conexion/conexion.php';
		$sentencia="DELETE FROM imagen WHERE id_imagen='".$idimg."' ";
		$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));

	}
?>

<script type="text/javascript">
	alert("Producto Eliminado!!");
	window.location.href='./mis_imagenes.php';
</script>