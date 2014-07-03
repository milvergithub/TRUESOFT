<h2 class="subtitulo">GRUPOS OCUPADOS</h2>

<form  class="form-group" method="POST" action="darGruposOcupados.php" enctype="multipart/form-data">
    <div class="form-group table-responsive panel panel-default"> 
        <table class="table table-hover table-bordered table-condensed table-striped panel-default" id="">
            <tr>
               <td><span class="glyphicon"><b>Numero Grupo</b></span></td>
               <td><b>Docente</b><span class="glyphicon glyphicon"></span></td>
               <td><b>Tipo De Usuario</b><span class="glyphicon glyphicon-user"></span></td>
            </tr>
            
            <?php include 'php/darGruposOcupados.php'; ?>
            
        </table>
        
    </div>     
</form>


<h2 class="subtitulo">GRUPOS DISPONIBLES</h2>


    <div class="form-group table-responsive panel panel-default"> 
        <table class="table table-hover table-bordered table-condensed table-striped panel-default" id="tablagruposLibres">
            <?php include 'php/darGruposDiponibles.php'; ?>
           
        </table>
       <div id="mensajeGrupoCreado"></div>
    </div>     


<h2 class="subtitulo">CREACION DE NUEVOS GRUPOS </h2>
 <div class="container container-fluid panel panel-default col-lg-12">
    <div class="">
       <form  method="POST" action="php/subirGrupo.php" id="formularioCrearGrupo"  enctype="multipart/form-data" class="form form-inline">
          <div class="control-group">
            <span class=""><b>Numero De Grupo:</b></span>
            <input type="text" name="nrogrupo" id="nrogrupo" placeholder="numero grupo" class="form-control input-sm numerico">
            <input type="submit" name="subr" class="btn btn-primary" value="crear grupo">
            <br/><br/><br/><br/><br/>
          </div>
        </form>
    </div>
 </div>


