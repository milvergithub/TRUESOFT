<?php
session_start();
    include 'clases/ConexionTIS.php';
    $conex = new ConexionTIS();
    
    $resultadoResp= $conex->darCodigosRepres($_SESSION['coduser']);
    while ($reg = pg_fetch_assoc($resultadoResp)) {
            $resp=$reg['codemp'];
        }
    
    $codEmp =$resp; // para cambiar cod empresa
    
    $filas = $conex->getNroIntegrante($codEmp);  // estos son el nro de integrantes
    $columnas = $conex->getNroReuniones($codEmp); //estos son el nro de fechas
?>
<div class="panel titulo"><h1><b>Historial De Asistencias De La Grupo Empresa</b></h1></div>
<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-backward"> Volver</span></a>
<form method="post" action="webforms.php" class="panel" enctype="multipart/form-data">
        <div class="form-group table-responsive">
            <table class="table table-hover">
        	<tr>
                 <td>
                     <span class="glyphicon"><b>Fechas</b></span><br/>
                        ------------------------
                        <br><span class="glyphicon"><b>Integrantes</b></span>   
                </td>

                <!-- para crear la columnas de la tabla-->
                               <?php
                               if($columnas > 0)
                                {
                               $res = $conex->getFechaReuniones($codEmp);
                                    for($i =0; $i< $columnas; $i++)
                                    {
                                        ?>
                                        <td>
                                            <span class="glyphicon"><b><?php echo $res[$i]; ?></b></span>
                                            
                                        </td>
                                        <?php
                                    }
                                }else{
                                        echo '<h3>No existen reuniones para la empresa</h3><br>';
                                        
                                }    
                               ?>

               <!--para llenar la filas de la tabla temenos -->
               <?php
               if($filas>0)
               {
               $resul = $conex->getIntegrantes($codEmp);
               //$res = $conex->getFechaReuniones($codEmp);
               $codInteg = $conex->getCodIntegrant($codEmp);
               $cont = 0;
               for ($x=0; $x< $filas ; $x++) 
                    { 
                         ?>
                         <tr>
                            <td>
                                <span class="glyphicon"><b><?php echo $resul[$x]; ?></b></span>
                            </td> 

                            <!-- para llenar el resto de colunnas para la calificacion -->
                            <?php
                            
                                    //$asis = $conex->getAsistencias($codInteg[$x]);
                                    //$asis = $conex->getAsistXfecha($codInteg[$x], $res[$x]);
                            
                                    // para llenar la tabla con asistencias
                                    for ($a = 0; $a < $columnas; $a++) 
                                    {
                                        //echo 'A entra como: '.$a;
                                        for ($b = 0; $b < $filas/4; $b++) 
                                        {
                                            ///echo 'A entra como: '.$res[$a];
                                            //echo 'B entra como: '.$codInteg[$x];
                                            $asis = $conex->getAsistXfecha($codInteg[$x], $res[$a]);
                                            
                                            if ($asis[0] == 't') 
                                            {
                                                ?>
                                                <td>
                                                    <img src="img/image/ok.png" width="50" height="50"/>
                                                </td>
                                                <?php
                                            }  
                                            else 
                                            {
                                                ?>
                                                <td>
                                                    <img src="img/image/error.png" width="50" height="50"/>
                                                </td>
                                                <?php
                                            }
                                        }
                                    }
                                    
                               ?>

                        </tr>
                         <?php
                     }
               }else{
                    echo '<h3>No existen integrantes para esta empresa</h3><br>';
               }
               ?>               
        </table>
        </div>
</form>    
        
