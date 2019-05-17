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
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container">
        </br>
        <div class="container-fluid text-right">
            <a href="muestra_datos.php">
                <img src="images/Airsync-logo_negro.png" width="40px" />
            </a>
            <a href="drones.php">
                <img src="images/Drone.png" width="70px" />
            </a>
        </div>
        </br>
        <?php
            include ("inc/config.php");


            $serie = $_POST['BtnRevision'];
            $mensaje=$_GET["mensaje"]; 
            if (empty($serie)) {
                $serie = $mensaje;
            }
            // echo "Serie de agregado ".$mensaje ."Serie de inicio ".$serie."</br>"; 
            
            $result = mysqli_query($conexion, "Select Nombre from drones where Serie = '$serie'");
            $result->data_seek(0);
            $fila = $result->fetch_assoc();
            
        ?>
                <h1 align="center">Revisiones <?php echo $fila['Nombre']; ?></h1>
        </br>
        <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn" type="submit" onclick="toggle_visibility('foo');">
                Agregar Revisión
            </button>
        </div>
        </br>
        <table class="table table-hover" style="font-size:18px">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("inc/config.php");

                $result = mysqli_query($conexion, "Select * from revisiones where Serie = '$serie'");
                while ($consulta = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $consulta['FechaRevision'] ?></td>
                        <td><?php echo $consulta['Observaciones'] ?></td>
                        <td></td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="container">
        <div id="foo" style="display:none;">
            <form class="login100-form validate-form flex-sb flex-w" action="agrega_revision.php" method="post">
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Observaciones
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Campo requerido">
                    <input class="input100" type="textarea" name="observa" id="observa">
                    <span class="focus-input100"></span>
                </div>
                
                <input  type="hidden" name="serie" id="serie" value="<?php echo $serie; ?>">
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn" type="submit">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    </div>

    <script type="text/javascript">
        <!--
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
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


</body>

</html>

