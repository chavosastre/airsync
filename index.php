<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <title>Titulo de página</title>
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
  </head>
  <body >
  <?php
  //Importamos archivos con los datos
    include ("solicita_datos.php");
    $total = round($Purchased, 2);
    $current = round($production, 2);
    $percent = round(($current / $total) * 100, 1);
    $CO2 = round(($total * 1000) / 2.015625 / 1000,1);
    $arboles = round($CO2 * 25.3368,1);
    $gasolina = round(($production * 1000)/ 2.66970,1);
  ?>
    <div> <!-- Div principal -->
      </br>
      <div class="container-fluid"> 
        <!-- Título -->
        <div class="card-body">
            <p align = "center" style="font-size:30px">   
              Medición
            </p>
        </div>

        <!-- Consumo / Producción -->
        <div class="row">
          <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-flash"></i>
                </div>
                <div class="mr-5">
                  <p align = "center" style="font-size:16px;font-weight: bold">
                    Consumo Total : </br> <?php echo "$total" ?> MWh
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-flash"></i>
                </div>
                <div class="mr-5">
                <p align = "center" style="font-size:16px;font-weight: bold">
                  Generación Total : </br> <?php echo "$current" ?> MWh
                </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Barra de progreso-->
        <div class="card mb-3">
          <div class="card-header">
            <div class="progress" style="Height:100px">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "$percent%";?>">
                <p style="color:white;font-size:40px;">
                  <?php
                    echo "$percent%";
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p align = "center" style="font-size:14px">
              <?php echo "Nuestra meta es que nuestra energía generada sea de un 80%";?>
            </p>
          </div>
        </div>
        <!-- Conversiones -->
        <div class="row">
          <div class="col-xl-4 col-sm-12 mb-4">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-tree"></i>
                </div>
                <div class="mr-5">
                  <p align = "center" style="font-size:16px;font-weight: bold">
                    Árboles sin talar! </br> <?php echo "$arboles" ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-12 mb-4">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-cloud"></i>
                </div>
                <div class="mr-5">
                  <p align = "center" style="font-size:16px;font-weight: bold">
                    Toneladas anuales de CO2! </br> <?php echo "$CO2" ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-sm-12 mb-4">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-car"></i>
                </div>
                <div class="mr-5">
                  <p align = "center" style="font-size:16px;font-weight: bold">
                    Litros de Gasolina! </br> <?php echo "$gasolina" ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Pié de Página -->         
        <footer>
          <div class="card-header">
            <div class="text-center">
                  <small>Copyright © ECOPULSE <?php echo date("Y"); ?></small>
            </div>
          </div>
        </footer>
      </div> <!-- Cierra div container-fluid -->
    </div> <!-- Cierra Div principal -->
  </body>
</html>
<?php
  //Importamos archivos con los datos para cerrar la conexión
//  include ("cerrar_conexion.php");
?>
