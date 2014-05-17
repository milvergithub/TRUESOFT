<html>
<?php
    include 'php/head.php';
    include 'clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $codEmp =$_REQUEST[md5('codEmpH')]; // para cambiar cod empresa
    
    $filas = $conex->getNroIntegrante($codEmp);  // estos son el nro de integrantes
    $columnas = $conex->getNroReuniones($codEmp); //estos son el nro de fechas

    $total = ($filas * $columnas);
?>
<body>
	<!-- para el titulo del la pagina -->
            	Historial de Seguimiento
    <!--para el llenado y creacion de la tabla con cada componente -->
    <div class="table-responsive">
       <table class="table table-hover">
         <tr><td><b>Fechas--></b><br><b>Integrantes</b></td>
            <?php
            $res = $conex->getFechaReuniones($codEmp);
               for($i =0; $i< $columnas; $i++)
               {
                  ?>
                  <td>fecha: <?php echo $res[$i]; ?></td>
                  <?php
               } 
            ?>
               <!--para llenar la filas de la tabla temenos -->
            <?php
            $resul = $conex->getIntegrantes($codEmp);
            //$res = $conex->getFechaReuniones($codEmp);
            $codInteg = $conex->getCodIntegrant($codEmp);

            $cont = 0;
            for ($x=0; $x< $filas ; $x++) 
            { 
                 ?>
                 <tr><td><?php echo $resul[$x]; ?></td>
                 <?php
                  for ($a = 0; $a < $columnas; $a++) {
                      for ($b = 0; $b < $filas/4; $b++){
                          $asis = $conex->getAsistXfecha($codInteg[$x], $res[$a]);
                          if ($asis[0] == 't') {
                          ?>
                            <td><img id="img" class="img-rounded img-thumbnail col-sm-3 col-md-8" src="img/image/ok.png" /></td>
                          <?php
                          }  
                          else {
                          ?><td><img id="img" class="img-rounded img-thumbnail col-sm-3 col-md-8" src="img/image/error.png" /></td>
                          <?php
                          }
                      }
                  }
                  ?>
                </tr>
                 <?php
            }
            ?>               
        </table>
    </div>
</body>
</html>