<?php
        include 'clases/config.php';
        $conf = new config();
    ?> 
    <h1>Configuracion</h1>
<div class="form-horizontal">
   <div class="container container-fluid col-lg-6">
      <form class="form col-lg-12 well">
           <h4>Config nro de revisiones</h4>
           <label class="col-lg-6">ingrese numeros de revisiones por dia</label>
            <input class="form-control col-lg-3 col-md-4" name="apellidos" />
            <input class="btn btn-primary" type="submit" value="generar" /> 
        </form>     
   </div>
   <div class="container container-fluid col-lg-6">
        <form class="form col-lg-12 well">
            <h4>Editar fecha de presentacion propuesta</h4>
            <label>La fecha por defecto dado por el admin</label>
            Fecha Actual
            <input class="form-control" type="text" name="fecha"/>
            Ingrese Fecha Nueva
            <input class="form-control" type="text" name="fechaNueva"/>
            <input class="btn btn-primary" type="submit" value="Cambiar" />
        </form>
   </div>
   <div class="container container-fluid col-lg-6">
      <form class="form col-lg-12 well">
            <h4>Editar fecha de presentacion documentacion</h4>
            <label>La fecha por defecto dado por el admin</label>
            <br/>
            Fecha Actual
            <input class="form-control" type="text" name="fecha"/>
            Ingrese Fecha Nueva
            <input type="text" name="fechaNueva"/>
            <input type="submit" value="Cambiar" />
        </form>
   </div>
   <div class="container container-fluid col-lg-6">
        <form class="form col-lg-12 well">
            <h4>Habilitar/Deshabiltar Grupo-Empresas</h4>
            <table class="table table-bordered">
                <tr> 
                <th>Grupo-Empresa</th><th>Representante</th><th>Estado</th>
                </tr
                    <?php
                    $conf->getGrupoComp(3);
                    ?>
            </table>
        </form>
    </div>
    </div>