<h2>GRUPOS OCUPADOS</h2>

<form  class="form-group" method="POST" action="darGruposOcupados.php" enctype="multipart/form-data">
    <div class="form-group table-responsive"> 
        <table class="table table-hover" id="">
            <tr>
               <td><span class="glyphicon">Numero Grupo</span></td>
               <td>Docente <span class="glyphicon glyphicon"></span></td>
               <td> Tipo De Usuario <span class="glyphicon glyphicon-user"></span></td>
            </tr>
            
            <?php include 'php/darGruposOcupados.php'; ?>
            
        </table>
        
    </div>     
</form>


<h2>GRUPOS DISPONIBLES</h2>


    <div class="form-group table-responsive"> 
        <table class="table table-hover" id="tablagruposLibres">
            <?php include 'php/darGruposDiponibles.php'; ?>
           
        </table>
    </div>     


<h2>CREACION DE NUEVOS GRUPOS </h2>

<div>
 <div class="container container-fluid">
    <div class="row">
       <form  method="POST" action="php/subirGrupo.php" id="formularioCrearGrupo"  enctype="multipart/form-data" class="form col-lg-5">
           <span class="glyphicon">Numero De Grupo :</span>  <br>
           <input type="text" name="nrogrupo" id="nrogrupo" placeholder="numero grupo" class="form-control input-sm numerico"><br>
           <input type="submit" name="subr" class="btn btn-primary navbar-right"> 
        </form>
    </div>
 </div>
</div>


