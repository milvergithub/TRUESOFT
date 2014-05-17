
<?php
   include 'php/head.php';
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
   $codConv = 1;
?>
    <h2>Publicacion De Propuestas De La Empresa</h2>
    <div>
       <div class="container container-fluid">
           <div class="">
            <?php 
                $gest->dameTodoDocumentoSubida($codConv);
            ?>
           </div>
        </div>
       
    </div>