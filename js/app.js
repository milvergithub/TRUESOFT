var x;
x=$(document);
x.ready(inicio);
function inicio(){
   init();
   updateSMSChat()
   updateSMSForo();
   soloNumerosTelefono();
   sololetras();
   buscador();
   
   jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[ a-z]+$/i.test(value);
   }, "Solo letras");
    jQuery.validator.addMethod("lettersNumbersonly", function(value, element) {
        return this.optional(element) || /^[ a-z 1-9]+$/i.test(value);
    }, "Solo esta permitido letras y numeros");
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
   $('.carousel').carousel({
	interval:5000
   }); 
   $(".combo").select2(); 
}
function updateSMSChat(){
   setInterval(function(){
      updateSMS();
   },2000);
}
function updateSMSForo(){
    setInterval(function(){
        updateFORO();
    },3000);
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
function updateFORO(){
    var dato =12;
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"php/obtenerForos.php",
        data:dato,
        beforeSend:inicioEnvio,
        success:llegadaForos
    });
}
function llegadaForos(datos){
    $("#foro").html(datos);
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
function sololetras(){
   $(".campoNombres").validCampo(' abcdefghijklmnñopqrstuvwxyzáéiou');
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
       observacion.disabled=true;
       licencia.checked=false;
       nota.disabled=true;
       $("#taj"+num).val('');
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
       $("#tao"+num).val('');
       $("#nn"+num).val('');
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
       $("#taj"+num).val('');
   }
}
function mostrarMensaje(mensaje){
   bootbox.alert(mensaje, function() {
      
   });
}
function uploadPropuestas(id){
    var datoDoc=new FormData();
    datoDoc.append("codigoDoc",$('#codigoDoc'+id).val());
    datoDoc.append("nombredoc",$('#nombredoc'+id).val());
    datoDoc.append("codigoTipo",$('#codigoTipo'+id).val());
    datoDoc.append("nombreTip",$('#nombreTip'+id).val());
    datoDoc.append("archivo",$('#archivo'+id)[0].files[0]);
    $.ajax({
        type: "POST",
        url:"upload/upload.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
          $("#mensajeUploadDoc").html(data);
          $("#mensajeUploadDoc").show();
          bootbox.alert(data, function() {
            
          });
        },
        error: function(){
          $("#mensajeUploadDoc").text("error")
        }
    });
}
function uploadDocumentacion(id){
    var datoDoc=new FormData();
    datoDoc.append("codigoDoc",$('#codigoDoc'+id).val());
    datoDoc.append("nombredoc",$('#nombredoc'+id).val());
    datoDoc.append("codigoGest",$('#codigoGest'+id).val());
    datoDoc.append("codigoTipo",$('#codigoTipo'+id).val());
    datoDoc.append("nombreTip",$('#nombreTip'+id).val());
    datoDoc.append("codigoConv",$('#codigoConv'+id).val());
    datoDoc.append("codigoEmp",$('#codigoEmp'+id).val());
    datoDoc.append("archivo",$('#archivo'+id)[0].files[0]);
    $.ajax({
        type: "POST",
        url:"upload/subidaDocumentacion.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
            $("#mensajeUploadDocumentacion").html(data);
            $("#mensajeUploadDocumentacion").show();
            bootbox.alert(data, function() {

            });
        },
        error: function(){
            $("#mensajeUploadDocumentacion").text("error")
        }
    });
}
function saveEvaluationIndividual(id){
   var nota=$('#nota'+id).val();
   if (nota==""){
      bootbox.alert("<div class='alert alert-danger' >ingrese una nota</div>");
   }else{
   var datoDoc=new FormData();//codigoArchivo
   datoDoc.append("codigoArchivo",$('#codigoArchivo'+id).val());
   datoDoc.append("codigoIntegrante",$('#codigoIntegrante'+id).val());
   datoDoc.append("nota",$('#nota'+id).val());
   $.ajax({
        type: "POST",
        url:"php/procesarNota.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
            $("#mensajeEvaluacionIndividual").html(data);
            $("#mensajeEvaluacionIndividual").show();
            bootbox.alert(data, function() {

            });
        },
        error: function(){
            $("#mensajeUploadDocumentacion").text("error")
        }
   });
  }
}
function saveEvaluationGrupal(id){
   var nota=$('#nota'+id).val();
   if (nota==""){
      bootbox.alert("<div class='alert alert-danger' >ingrese una nota</div>");
   }else{
   var datoDoc=new FormData();//codigoArchivo
   datoDoc.append("codigoArch",$('#codigoArch'+id).val());
   datoDoc.append("codEmp",$('#codEmp'+id).val());
   datoDoc.append("nota",$('#nota'+id).val());
   $.ajax({
        type: "POST",
        url:"php/subirEvaluacionGrupalEmpresa.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
            $("#mensajeEvaluacionGrupal").html(data);
            $("#mensajeEvaluacionGrupal").show();
            bootbox.alert(data, function() {

            });
        },
        error: function(){
            $("#mensajeUploadDocumentacion").text("error")
        }
   });
  }
}

function saveSettingNotasDocumentos(id){
   var nota=$('#nota'+id).val();
   if (nota==""){
      bootbox.alert("<div class='alert alert-danger' >ingrese una nota</div>");
   }else{
   var datoDoc=new FormData();//codigoArchivo
   datoDoc.append("codigoDoc",$('#codigoDoc'+id).val());
   datoDoc.append("codigoTip",$('#codigoTip'+id).val());
   datoDoc.append("codigoUsuario",$('#codigoUsuario'+id).val());
   datoDoc.append("nota",$('#nota'+id).val());
   $.ajax({
        type: "POST",
        url:"php/subirConfiguracionDocumento.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
            $("#mensajeSettingsNotaEntregables").html(data);
            $("#mensajeSettingsNotaEntregables").show();
            bootbox.alert('<div class="alert alert-success">Nota asignada= '+$('#nota'+id).val()+'</div>');
        },
        error: function(){
            $("#mensajeUploadDocumentacion").text("error")
        }
   });
  }
}

function saveEvalucionDocumentacion(id){
   var nota=$('#nota'+id).val();
   if (nota==""){
      bootbox.alert("<div class='alert alert-danger' >ingrese una nota</div>");
   }else{
   var datoDoc=new FormData();//codigoArchivo
   datoDoc.append("codigoArch",$('#codigoArch'+id).val());
   datoDoc.append("codEmp",$('#codEmp'+id).val());
   datoDoc.append("nota",$('#nota'+id).val());
   $.ajax({
        type: "POST",
        url:"upload/subirEvaluacionGrupalEmpresa.php",
        enctype:'multipart/form-data',
        data: datoDoc,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data){
            $("#mensajesubidanotadocumentacion").html(data);
            $("#mensajesubidanotadocumentacion").show();
            bootbox.alert('<div class="alert alert-success">Nota asignada= '+$('#nota'+id).val()+'</div>')
        },
        error: function(){
            $("#mensajeUploadDocumentacion").text("error")
        }
   });
  }
}















