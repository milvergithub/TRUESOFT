var x;
x=$(document);
x.ready(inicio);
function inicio(){
   init();
   updateSMSChat()
   soloNumerosTelefono();
   buscador();
}
function init(){
   $('input[type=file]').bootstrapFileInput();
   $('.file-inputs').bootstrapFileInput();
   $("#logo").change(function(){
      readURL(this);
   });
   $("#fotos").change(function(){
     previsualizar(this);
   });
}
function updateSMSChat(){
   setInterval(function(){
      updateSMS();
   },2000);
}
function updateSMS(){
   var dato =12;
   $.ajax({ 
      async:true,
      type: "POST",
      dataType: "html",
      contentType: "application/x-www-form-urlencoded",
      url:"php/obtenerMensajes.php",
      data:dato,
      beforeSend:inicioEnvio,
      success:llegadaChats
   });
}
function llegadaChats(datos){
   $("#chat").html(datos);
   $("#chat").scrollTop($("#chat").height()*100);
}
function previsualizar(input){
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
         $('#fotoIntegrante').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
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
   $("input[id^='nn']").keydown(soloNumeros);
   $(".numerico").keydown(soloNumeros);
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
function clickAsistencia(num){
   var asistencia=document.getElementById("cba"+num);
   var licencia=document.getElementById("cbl"+num);
   var nota=document.getElementById("nn"+num);
   var observacion=document.getElementById("tao"+num);
   var justificacion=document.getElementById("taj"+num);

   if(!asistencia.checked){
       nota.disabled=true;
       observacion.disabled=true;
       justificacion.disabled=false;
   }
   else{
       justificacion.disabled=true;
       observacion.disabled=false;
       licencia.checked=false;
       nota.disabled=false;
   }

}
function clickLicencia(num){
   var asistencia=document.getElementById("cba"+num);
   var licencia=document.getElementById("cbl"+num);
   var nota=document.getElementById("nn"+num);
   var observacion=document.getElementById("tao"+num);
   var justificacion=document.getElementById("taj"+num);
   var participacion=document.getElementById("cbp"+num);
   if(!licencia.checked){
       nota.disabled=false;
       justificacion.disabled=true;
       observacion.disabled=false;
       participacion.checked=false;

   }
   else{
       justificacion.disabled=false;
       asistencia.checked=false;
       nota.disabled=true;
       observacion.disabled=true;
       participacion.checked=false;
   }
}
function clickParticipacion(num){
   var asistencia=document.getElementById("cba"+num);
   var licencia=document.getElementById("cbl"+num);
   var nota=document.getElementById("nn"+num);
   var observacion=document.getElementById("tao"+num);
   var justificacion=document.getElementById("taj"+num);
   var participacion=document.getElementById("cbp"+num);
   if(!participacion.checked){
       nota.disabled=true;
       observacion.disabled=true;
       justificacion.disabled=true;

   }
   else{
       justificacion.disabled=true;
       asistencia.checked=true;
       nota.disabled=false;
       observacion.disabled=false;
       licencia.checked=false;
   }
}

















