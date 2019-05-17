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
            $serie = $_POST['Boton'];
            $result = mysqli_query($conexion, "Select Nombre from drones where Serie = '$serie'");
            $result->data_seek(0);
            $fila = $result->fetch_assoc();
            
        ?>
                <h1 align="center">Historial <?php echo $fila['Nombre']; ?></h1>
        </br>
        <table class="table table-hover" style="font-size:18px">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Dron</th>
                    <th>Fecha Préstamo</th>
                    <th>Fecha Entrega</th>
                    <th>Observaciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("inc/config.php");

                $result = mysqli_query($conexion, "Select * from prestamos where Serie = '$serie'");
                while ($consulta = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $consulta['Nombre'] ?></td>
                        <td><?php echo $consulta['Dron'] ?></td>
                        <td><?php echo $consulta['FechaPrestamo'] ?></td>
                        <td><?php echo $consulta['FechaEntrega'] ?></td>
                        <td><?php echo $consulta['Comentarios'] ?></td>
                        <td></td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>



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