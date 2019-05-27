<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <?php
    include("inc/config.php");

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $user = $_POST['username'];
    $passcode = sha1($_POST['pass']);
    $fecha = date("Y-m-d");

    // echo $nombre." ".$apellidos." Contraseña :".$passw." codificado; ".$passcode;

    //  $passcode =  sha1($pass);

    $result = mysqli_query($conexion, "Select email from usuarios where email = '$user'");
    $consulta = mysqli_fetch_array($result);
    // echo $consulta[0];
    if (isset($consulta[0])) {

        echo'<script type="text/javascript">
                alert("El eMail ya se encuentra registrado, favor de verificarlo!!");
                </script>';
    } 
    else {
        $conexion->query("INSERT INTO `usuarios`(`Nombre`, `Apellidos`, `email`, `password`, `activo`, `fecha`) values ('$nombre','$apellidos','$user', '$passcode', true, '$fecha')"); 
    }
?>

</body>

</html>