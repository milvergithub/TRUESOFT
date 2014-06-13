
<?php
   include 'php/head.php';
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
   
   $codConv = 1;
   $codEmp = 1;
?>
    <h2>Publicacion De Documentacion De La Empresa</h2>
    <div>
       <div class="container container-fluid">
           <div class="">
            <?php 
                $gest->dameTodoDocumentoSubidaDumentacion($codConv,$codEmp);
            ?>
           </div>
        </div>
       
    </div>