
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>

<?php
    include ("inc/config.php");
    $id = $_POST['miId'];
    $fecha = date("Y-m-d");
    $comentario = $_POST['comentario'];
	
  echo $id." ".$comentario." ".$fecha;
	$conexion->query("UPDATE `prestamos` SET `FechaEntrega`='$fecha',`Comentarios`='$comentario' WHERE Id = '$id'"); 
	
	$result = mysqli_query($conexion,"Select Serie from prestamos where Id  = '$id'");
	$consulta = mysqli_fetch_array($result);
	
	$serie = $consulta['Serie'];
  echo "</br>".$serie;
	
	$conexion->query("UPDATE `drones` SET `prestado`= false WHERE Serie = '$serie'"); 
	
  header('Location: muestra_datos.php');
    
    include ("inc/cerrar.php");
?>
</body>
</html>