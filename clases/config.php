<?php
    include 'ConexionTIS.php';
    
class config
{
    private $conex;

    public function __construct() {
        $this->conex=new ConexionTIS();
    }
    
    function obtenerDocentes() {
        $rest = $this->conex->getUsuariosDocente();
        while ($reg = pg_fetch_assoc($rest)) 
        {
            echo '
                        <tr>
                            <td>
                                '.$reg['nombres'].'
                            </td>
                            
                        </tr>';
        }
    }
    function dameCodigoGrupoDocente($codUser) {
       $resultadoDCGD=  $this->conex->dameCodigoGrupoDeDocente($codUser);
       while ($regDCGD = pg_fetch_assoc($resultadoDCGD)) {
          $resDCGD=$regDCGD['codgrupo'];
       }
       return $resDCGD;
    }
    function obtenerDatosDoc() {
        $rest = $this->conex->datosDoc();
        while ($reg = pg_fetch_assoc($rest)) {
            echo '<tr>
                <form  class="form col-lg-4" action="php/configUsu.php" method="post">
                  <td>
                      '.$reg['nombre'].'
                  <input type="hidden" name="cod" value="'.$reg['cod_hora'].'">

                  </td>
                  <td>
                      '.$reg['grupo'].'
                  </td>
                  <td>
                     <select class="form-control col-lg-4 col-md-4 col-xs-6" name="dia">
                      <option selected>'.$reg['dia'].'</option>
                      <option>lunes</option>
                      <option>martes</option>
                      <option>miercoles</option>
                      <option>jueves</option>
                      <option>viernes</option>
                      <option>sabado</option>
                  </select>
                      </td>
                  <td>
                     <input class="form-control" type="time" name="hora" value="'.$reg['hora'].'">
                  </td>
                  <td>
                     <input class="btn btn-primary" type="submit" value="Cambiar" />
                  </td>
               </form>

            </tr>
                   ';
        }
    }
    function obtenerEstDoc() {
        $rest = $this->conex->getEstadoDoc();
        while ($reg = pg_fetch_assoc($rest)) 
        {
            
            if ($reg['estado']=='t') {
                $est='habilitado';
                $conf='Deshabilitar';
            }  else {
                $est='deshabilitado';
                $conf='Habilitar';
            }
            echo '
                        <tr>
                        <form action="php/configUsuEst.php" method="post">
                            <td>
                                '.$reg['nombre'].'
                                <input type="hidden" name="nombre" value="'.$reg['nombre'].'">
                            </td>
                            <td>
                                '.$est.'
                                <input type="hidden" name="estado" value="'.$est.'">
                            </td>
                            <td>
                                <input type="submit" value="'.$conf.'" />
                            </td>
                            </form>
                        </tr>';
        }
    }
    //dado la ultima gestion da las grupo empresas
    function getGrupoComp($codUser) {
        $res = $this->conex->grupoEmpresaRepre($codUser);
        while ($reg = pg_fetch_assoc($res)) {
            echo '
                  <tr>
                      <td>
                        <input type="hidden" value="'.$reg['estado'].'" name="estado"/>
                          '.$reg['nombreemp'].'
                      </td>
                      <td>
                          '.$reg['representante'].'
                      </td>
                      <td>
                          <a href="php/saveConfigEstadoGE.php?codContrato='.$reg['codcontrato'].'&estado='.$reg['estado'].'">'.$this->dameFormatoEstado($reg['estado']).'</a>
                      </td>
                  </tr>';
        }
    }
    function dameFormatoEstado($estado) {
       if ($estado=="t") {
          return "Deshabilitar";
       }
       else{
          return "Habilitar";
       }
    }
}
?>
 


