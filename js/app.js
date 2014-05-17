var x;
x=$(document);
x.ready(inicio);
function inicio(){
   init();
   soloNumerosTelefono();
   buscador();
}
function init(){
   $("#logoin").change(function(){
      readURL(this);
   });
}
function readURL(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
         $('#logoimg').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
   }
}
function buscador(){
   jQuery("#buscador").keyup(function (){
      if( jQuery(this).val() != ""){
         var valor=document.getElementById("buscador").value;
         mostrarTabla(valor);
      }
      else{
        var valor=document.getElementById("buscador").value;
        mostrarTabla(valor);
      }
   });
}
function mostrarTabla(valor){
   var sql=valor;
   $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"php/tablaGE.php",
           data:"sql="+sql,
           beforeSend:inicioEnvio,
           success:llenadoTabla,
           timeout:4000,
           error:problemas
   });
   return false;
}

function llenadoTabla(datos){
   $("#tablaGE").html(datos);
}
function enviarGrupo(valor){
   var codGrup=valor;
   $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"php/dias.php",
           data:"codGrup="+codGrup,
           beforeSend:inicioEnvio,
           success:llegadaDias,
           timeout:4000,
           error:problemas
   });
   return false;
}
function enviarDia(valor){
   var codDia=valor;
   $.ajax({
           async:true,
           type: "POST",
           dataType: "html",
           contentType: "application/x-www-form-urlencoded",
           url:"php/horarios.php",
           data:"codDia="+codDia,
           beforeSend:inicioEnvio,
           success:llegadaHoras,
           timeout:4000,
           error:problemas
   });
   return false;
}
function llegadaHoras(datos){
   $("#elegirhorario").html(datos);
}
function inicioEnvio(){
   
}
function llegadaDias(datos){
   $("#elegirdia").html(datos);
}
function problemas(){
   
}
function soloNumerosTelefono(){
   $(document).ready(function(){
   $("input[id^='telefono']").keydown(soloNumeros);
   $("input[id^='carnet']").keydown(soloNumeros);
   });
}
function soloNumeros(event){
   if(event.shiftKey){
      event.preventDefault();
   }
   if(event.keyCode == 46 || event.keyCode == 8){
   }
   else{
      if(event.keyCode < 95){
         if(event.keyCode < 48 || event.keyCode > 57){
            event.preventDefault();
         }
      } 
      else{
         if(event.keyCode < 96 || event.keyCode > 105){
            event.preventDefault();
         }
      }
   }
}
function validarNumero(id){
   var elemento=document.getElementById("nn"+id);
   var valor=elemento.value;
   alert(valor);
}
function anadirIntegrantes(){
   var elementos=document.getElementsByName("nombres[]");
   cantidad=elementos.length;

   if(cantidad<5){
       var elemento=document.getElementById("cantidadIntegrantes");
       elemento.innerHTML+= "<div class='form-group panel panel-info well'>\n\
                              <div class='form-group'>\n\
                                 <label for='integ"+(cantidad+1)+"' class='col-lg-3 control-label'>integrante"+(cantidad+1)+"</label>\n\
                                 <div class='col-lg-7'>\n\
                                 </div>\n\
                              </div>\n\
                              Nombres * :<input type='text' class='form-control input-sm' name='nombres[]' placeholder='nombre integrante' required='true'>\n\
                              C.I. *: <input type='text' id='carnet"+(cantidad+1)+"' class='form-control input-sm' name='carnets[]' placeholder='numero ci' required='true'>\n\
                              <span class='glyphicon glyphicon-earphone'> Telefono:</span>\n\
                              <input type='text' id='telefono"+(cantidad+1)+"' class='form-control input-sm' name='telefonos[]' placeholder='telefono'>\n\
                              <span class='glyphicon glyphicon-envelope'> Email:</span>\n\
                              <input type='text' class='form-control input-sm' name='emails[]' placeholder='ejemplo@dominio.com'>\n\
                              <span class='glyphicon glyphicon-open'></span>\n\
                              <input type='file' class='btn btn-primary btn-sm' name='fotos[]' title='subir foto &triangleq;' src=''>\n\
                             </div>";
   }
   else{
      var elementosms=document.getElementById("mensaje");
      elementosms.innerHTML="<div class='alert alert-danger'>no puede integrar mas de 5 integrantes a grupo empresa</div>";
   }
   soloNumerosTelefono();
}
function anadirDocumetosPresentacion(){
    var elemetoDP=document.getElementById("tablaDocumentosPresentacion");
    elemetoDP.innerHTML+="<tr>\n\
                           <td>\n\
                              <input class='form-control input-sm' type='text' name='nombreA[]'/>\n\
                           </td>\n\
                           <td>\n\
                              <select class='form-control' name='tipoA[]'>\n\
                                 <option value='1'>presentacion parte A</option>\n\
                                 <option value='2'>presentacion parte B</option>\n\
                              </select>\n\
                           </td>\n\
                           <td>\n\
                              <input class='form-control input-sm' type='text' name='calificacionA[]'/>\n\
                           </td>\n\
                           <td>\n\
                              <input class='btn btn-primary btn-sm' type='file' name='archivoA[]'/></td>\n\
                           </tr>";
}


















