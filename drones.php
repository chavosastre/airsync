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
    <?php
    session_start();
    ?>
    <div class="container">
        </br>
        <div class="container-fluid text-right">
            <h4 class="negrita"> <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"] . " "; ?></span></h4>
            <a href="muestra_datos.php">
                <img src="images/Airsync-logo_negro.png" width="40px" /> 
            </a>
            <a href="loginout.php" class="p-l-20">
                <img src="images/cerrar-sesion.png" width="30px" alt="Cerrar Sesion" />
            </a>
        </div>
        <h1 align="center">Drones</h1>
        </br>
        <div class="in-line-block">
            <?php
            include("inc/config.php");
            $result = mysqli_query($conexion, "Select * from drones");
            $total = $result->num_rows;
            // for($x=1; $x<=$total;$x++)
            // {
            //     $result->data_seek($x - 1);
            //     $fila = $result->fetch_assoc();
            //     echo $fila['imagen']." </br>";
            // }


            for ($x = 1; $x <= $total; $x++) {
                $result->data_seek($x - 1);
                $fila = $result->fetch_assoc();
                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 p-b-25 text-center">
                    <div class="card" style="width: 22rem;">
                        <img class="card-img-top" src="<?php echo ($fila['imagen']); ?>" alt="" width="100%">
                        <div class="card-body" widht="100%">
                            <h4 class="card-title"><?php echo ($fila['Nombre']); ?></h4>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <!-- <a href="#" class="btn btn-primary">Historial</a> -->
                            <form action="historial_dron.php" method="post" style="float: left">
                                <button class="btn btn-primary" type="submit" value="<?php echo ($fila['Serie']); ?>" name="Boton">Historial</button>
                            </form>
                            <form action="dron_revisiones.php" method="post" style="float: left">
                                <button class="btn btn-primary" type="submit" value="<?php echo ($fila['Serie']); ?>" name="BtnRevision">Inspecciones</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
        </div>
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