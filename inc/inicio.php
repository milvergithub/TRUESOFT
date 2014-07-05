<?php
include 'clases/ConexionTIS.php';
$conexioninicio=new ConexionTIS();
$resultadoIni=$conexioninicio->inicioInfoEmpresas();
$tamanio=  pg_affected_rows($resultadoIni);
function printIntegrantes($codemp) {
   $conexionInteg=new ConexionTIS();
   $res="";
   $resultadoInteg=$conexionInteg->getIntegrantesRepresentante($codemp);
   while ($regInteg = pg_fetch_assoc($resultadoInteg)) {
      $res=$res."<tr class='fila'><td><img class='fotoInt showbox slideright' src='img/fotos/".$regInteg['foto']."' width='50' height='50'/></td><td><b class='nombreInt'> ".$regInteg['nombre']."</b></td></tr>";
   }
   return $res;
}
?>

<div class="col-lg-12 panel">
   <div class="col-lg-8 carousel">
      <section id="miSlide" class="carousel slide" style="background-color: #5e5e5e">
         <ol class="carousel-indicators">
         <li data-target="#miSlide" data-slide-to="0" class="active"></li>
         <?php
         for ($index = 0; $index < $tamanio; $index++) {
            echo '<li data-target="#miSlide" data-slide-to="'.($index+1).'"></li>';
         }
         ?>
         </ol>
         <div class="carousel-inner">
            <div class="item active">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 carouselogo">
                  <img src="img/logos/defecto.png" class="adaptar imagenlogo">
               </div>
               <div class="panel col-lg-6 col-md-6 col-sm-6 col-xs-6 carouselogo informacionEmpresa">
                  <h3><b class="nombreEmp">Nombre de la Empresa</b></h3>
                  <h4><b class="nombreEmp">representante</b></h4>
                  <table class="table">
                     <tr class="fila"><td><img class="fotoInt showbox slideright" src="img/fotos/foto.png" width='50' height='50'/></td><td><b class='nombreInt'>integrante 1</b></td></tr>
                     <tr class="fila"><td><img class="fotoInt showbox slideright" src="img/fotos/foto.png" width='50' height='50'/></td><td><b class='nombreInt'>integrante 2</b></td></tr>
                     <tr class="fila"><td><img class="fotoInt showbox slideright" src="img/fotos/foto.png" width='50' height='50'/></td><td><b class='nombreInt'>integrante 3</b></td></tr>
                     <tr class="fila"><td><img class="fotoInt showbox slideright" src="img/fotos/foto.png" width='50' height='50'/></td><td><b class='nombreInt'>integrante 4</b></td></tr>
                     <tr class="fila"><td><img class="fotoInt showbox slideright" src="img/fotos/foto.png" width='50' height='50'/></td><td><b class='nombreInt'>integrante 5</b></td></tr>
                  </table>
               </div>
            </div>
            <?php
            while ($reg = pg_fetch_assoc($resultadoIni)) {
               echo '<div class="item">
                        <div class="panel col-lg-6 col-md-6 col-sm-6 col-xs-6 carouselogo">
                           <img src="'.$reg['logo'].'" class="adaptar imagenlogo">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 carouselogo informacionEmpresa">
                           <h3><b class="nombreEmp">'.$reg['nombreempresa'].'</b></h3>
                           <h4 class="nombreEmp">'.$reg['representante'].'</h4>
                           <table class="table">
                             '.  printIntegrantes($reg['codemp']).'
                           </table>
                        </div>
                     </div>';
            }
            ?>
         </div>

         <a href="#miSlide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
         <a href="#miSlide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </section>
   </div>
   <div class="col-lg-4 panel panel-success">
      <div id="foro" class="panel panel-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-y: scroll; height: 500px">
      
      </div>
   </div>
</div>

