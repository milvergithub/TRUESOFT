<?php
session_start();
include '../clases/GrupoEmpresas.php';
$empresa=new GrupoEmpresa();
echo ''.$_SESSION['coduser']."<br>";
//echo $empresa->siYaRegistroEmpresa($_SESSION['coduser']);
if (($empresa->siYaRegistroEmpresa($_SESSION['coduser']))=='t'){//si todavia no registro una empresa en contrato empresa
   //header("Location: ../index?".md5("registroEmpresaIntegrantes"));
   echo '<script type="text/javascript">
            window.location="../index.php?'.md5("registroEmpresa").'";
          </script>';
}
else{
   if (($empresa->siYaSeRegistroIntegrantes($empresa->codigosRepEnContrato($_SESSION['coduser'])))=='f'){//todavia no tiene integrantes
      echo $empresa->siYaSeRegistroIntegrantes($empresa->codigosRepEnContrato($_SESSION['coduser']));
      echo $empresa->codigosRepEnContrato($_SESSION['coduser']);
      echo '<script type="text/javascript">
               window.location="../index.php?'.md5('RegistroEmpresaAIntegrantes').'";
            </script>';
   }
   else{
      if(true){//si todavia no eligio un horario//registroEmpresaHorario
         echo '<script type="text/javascript">
                  window.location="../index.php?'.md5("registroEmpresaHorario").'";
               </script>';
      }
      else{//entonces significa que se registro una empresa ademas integrantes solo falta elegir un horario de entrega
         echo '<script type="text/javascript">
                  window.location="../index.php?'.md5("registroCompleto").'";
               </script>';
      }
   }
}
?>
