<?php
    include 'clases/ConexionTIS.php';
    
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
    function getGrupoComp($gest) {
        $res = $this->conex->grupoEmpresaRepre($gest);
        while ($reg = pg_fetch_assoc($res)) {
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
                                '.$reg['empresa'].'
                                <input type="hidden" name="nombre" value="'.$reg['codemp'].'">
                            </td>
                            <td>
                                '.$reg['representante'].'
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
}
?>



