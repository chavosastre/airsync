<!DOCTYPE html>
<html lang="en">

<head>
    <title>AirSync Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylesUser.css">
</head>

<body style="background-color:black">

    <?php
    $enviado = false;
    $nombre = null;
    $apellidos = null;
    $user = null;
    $passcode = null;
    $fecha = null;

    if (isset($_POST['guardar'])) {
        $enviado = true;
        include ("inc/config.php");

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $user = $_POST['username'];
        $passcode = sha1($_POST['pass']);
        $fecha = date("Y-m-d");

        $result = mysqli_query($conexion, "Select email from usuarios where email = '$user'");
        $consulta = mysqli_fetch_array($result);
        // echo $consulta[0];
        if (isset($consulta[0])) {

            echo '<script type="text/javascript">
                alert("El eMail ya se encuentra registrado, favor de verificarlo!!");
                </script>';
        } else {
            $conexion->query("INSERT INTO `usuarios`(`Nombre`, `Apellidos`, `email`, `password`, `activo`, `fecha`) values ('$nombre','$apellidos','$user', '$passcode', true, '$fecha')");

            echo'<script type="text/javascript">
                alert("Registro guardado satisfactoriamente!!");
                window.location.href="agregaUser.php";
                </script>';
                include ("inc/cerrar.php");
        }
    }
    ?>

<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="background-color:black">
				<form class="login100-form validate-form flex-sb flex-w" action="agregaUser.php" method="post">
					<span class="login100-form-title p-b-53">
						<img src="images/newuser.gif" alt=""  width="80%">
					</span>
                    <div>
                    <div class="wrap-input100">
                        <input required class="input100" type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="wrap-input100">
                        <input required class="input100" type="text" placeholder="Apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                    </div>
                    <div class="wrap-input100">
                        <input required class="input100" type="email" placeholder="Usuario (email)" name="username" value="<?php echo $user; ?>">
                    </div>
                    <div class="wrap-input100">
                        <input required class="input100" type="text" placeholder="Contraseña" name="pass">
                    </div>
                    <div class="wrap-input100">
                        <input type="submit" value="Agregar Usuario" class="login100-form-btn" name="guardar">
                    </div>
                </div>
				</form>
			</div>
		</div>
	</div>


    <!-- <div class="container">
        <div class="wrap-login100">
            <span class="login100-form-title p-b-53">
                <img src="images/newuser.gif" width="20%">
            </span>
            <form class="login100-form" action="altaUsuario.php" method="post">
                <div>
                    <div class="form-group">
                        <input class="inputUser" type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group p-t-15">
                        <input class="inputUser" type="text" placeholder="Apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                    </div>
                    <div class="form-group p-t-15">
                        <input class="inputUser" type="email" placeholder="Usuario" name="username" value="<?php echo $user; ?>">
                    </div>
                    <div class="form-group p-t-15">
                        <input class="inputUser" type="text" placeholder="Contraseña" name="pass" value="<?php echo $passcode; ?>">
                    </div>
                    <div class="form-group p-t-40">
                        <input type="submit" value="Agregar Usuario" class="user-btn" name="guardar">
                    </div>
                </div>
            </form>
        </div>
    </div> -->


    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>


<?php
 if($enviado)
 {
    $nombre = null;
    $apellidos = null;
    $user = null;
    $passcode = null;
 }
?>

</body>

</html>