<!DOCTYPE html>
<html lang="en">
<head>
	<title>AirSync Datos</title>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    </br>
    <h1 align="center">Historial de Préstamos</h1>      
    </br>  
    <table class="table table-hover" style="font-size:18px">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Dron</th>
            <th>Fecha Préstamo</th>
            <th>Fecha Entrega</th>
        </tr>
        </thead>
        <tbody>
        <?php
            include ("inc/config.php");
            $result = mysqli_query($conexion,"Select * from prestamos");
            while($consulta = mysqli_fetch_array($result))
            {
        ?>
        <tr>
            <td><?php echo $consulta['Nombre']?></td>
            <td><?php echo $consulta['Dron']?></td>
            <td><?php echo $consulta['FechaPrestamo']?></td>
            <td>
            <?php
            $ficha = $consulta['Id'];
                if($consulta['FechaEntrega'] == null)
                {
                    
                    echo"  <form action=\"recibe.php\" method=\"post\">";
                    echo "<button class=\"login100-form-btn\" type=\"submit\" value=\"$ficha\" name=\"Boton\">Recibir</button>";
                ?>
                </form>
                <?php
                }
                else
                {           
                    echo $consulta['FechaEntrega']; 
                }
            ?>
            </td>
            <td>
            <?php
                echo"  <form action=\"edita.php\" method=\"post\">";
                echo "<button class=\"login100-form-btn\" type=\"submit\" value=\"$ficha\" name=\"Edita\">Editar</button>";
            ?>
            </form>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
<div class="container">
    <div class="container-login100-form-btn m-t-17">
		<button class="login100-form-btn" type="submit" onclick="toggle_visibility('foo');">
            Agregar Registro
		</button>
	</div>
    <div id="foo" style="display:none;">
        <form  class="login100-form validate-form flex-sb flex-w" action="agrega_registro.php" method="post">
        <div class="p-t-31 p-b-9">
						<span class="txt1">
							Nombre
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Campo requerido">
						<input class="input100" type="text" name="nombre" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Dron
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Campo requerido">
						<input class="input100" type="text" name="dron" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit">
							Guardar
						</button>
					</div>
        </form>
    </div>
</div>



<script type="text/javascript">
<!--
function toggle_visibility(id) {
var e = document.getElementById(id);
if(e.style.display == 'block')
e.style.display = 'none';
else
e.style.display = 'block';
}
//-->
</script>
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
    include ("inc/cerrar.php");
?>
</body>
</html>
