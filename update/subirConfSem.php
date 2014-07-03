<?php
session_start();
include '../clases/ConexionTIS.php';
$conex = new ConexionTIS();
$nroMax = $_POST['nromax'];
$nroMin = $_POST['nromin'];

$notaPres = $_POST['notaPres'];
$notaReun = $_POST['notaReum'];

$notaDocum = $_POST['notaDocum'];
$notaDef = $_POST['notaDef'];
$notaFin = $_POST['notaTotal'];

if($nroMax=="" || $nroMin=="" || $notaPres=="" || $notaReun=="" || $notaDocum=="" || $notaDef=="" || $notaFin=="")
{
   echo '<div class="alert alert-danger">
            complete los campos...!!!
         </div>';
}
 else {
     if($nroMax < $nroMin)
     {
        echo '<div class="alert alert-danger">
                  el maximo de integrante no puede ser menor al minimo...!!!
              </div>';
     }  
     else 
    {
        if (($notaPres + $notaReun) > $notaFin) {
           echo '<div class="alert alert-danger">
                  La nota de la primera presentacion no debe exceder a la nota final TOTAL...!!!
              </div>';
        }
        if (($notaDocum + $notaDef)> $notaFin) {
              echo '<div class="alert alert-danger">
                  la nota de la documentacion y la defensa no debe exceder a la nota final total...!!!
              </div>';
            }
         else {
            $conex->configurarSemestre($_SESSION['coduser'], $nroMax, $nroMin, $notaPres, $notaReun, $notaDocum, $notaDef, $notaFin);
            echo '<div class="alert alert-success">
                     configuracion semestral guardada...
                  </div>';
        }
    }
}

?>


