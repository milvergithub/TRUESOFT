/*window.onload = function() {
    var divs=document.getElementsByTagName('div');
    for(i=0;i<divs.length;i++){
        var id=divs[i].getAttribute('id');
        if(id==='imagen'){
            addClickEvent(divs[i]);
        }
    }
};*/
var desconocido=new Image();
desconocido.src="Imagenes/unknown/Unknown_lg.jpg";
var seleccionado=-1;
/*function addContainerImagen(contenedor){
    var contenedor=document.getElementById(contenedor);
    var divisor=document.createElement('div');
    divisor.setAttribute('id','imagen');
    addClickEvent(divisor);
    contenedor.appendChild(divisor);
}
function addClickEvent(elemento){
    elemento.addEventListener('click',eventoBoton,false);
}*/
function eventoBoton(divisor){
    var elemento=divisor;
    if(elemento.getAttribute('id')==='imagen'){
        seleccionar(elemento);
    }
    else{
        var padre=elemento.parentNode;
        if(padre.getAttribute('id')==='imagen'){
            seleccionar(padre);
        }
    }
}
function seleccionar(elemento){
    if (seleccionado === -1) {
            seleccionado = elemento;
            seleccionado.style['border'] = '1px solid #0033ff';
            seleccionado.setAttribute('class', 'seleccionado');
            var div=document.getElementById('form');
                div.style['visibility']="visible";
        }
        else {
            var clase = elemento.className;
            seleccionado.style['border'] = '1px solid #000';
            seleccionado.setAttribute('class', '');
            if (clase === 'seleccionado') {
                elemento.style['border'] = '1px solid #000';
                elemento.setAttribute('class', '');
                seleccionado = -1;
                var div=document.getElementById('form');
                div.style['visibility']="hidden";
            }
            else {
                elemento.style['border'] = '1px solid #0033ff';
                elemento.setAttribute('class', 'seleccionado');
                seleccionado = elemento;
                var div=document.getElementById('form');
                div.style['visibility']="visible";
            }
        }
}
function actualizarFormulario(){
    var file=document.getElementById('archivo');
    file.value=null;
    var div=document.getElementById('form');
    div.style['visibility']="hidden";
    $(".messages").empty();
    seleccionado.style['border'] = '1px solid #000';
    seleccionado.setAttribute('class', '');
    seleccionado=-1;
    var emp=document.getElementById('empresa');
    emp.value="";
    var span=document.getElementById('preview');
    vaciar(span);
}
function removerElemento(){
    if(seleccionado!==-1){
        var nodos=seleccionado.childNodes;
        var aux=nodos[2];
        var val=aux.innerHTML;
        var sel=$(seleccionado);
        $(sel).load('Herramientas/quitarLogo.php',{empresa:val},function(){
            var br = document.createElement('br');
            seleccionado.appendChild(desconocido);
            seleccionado.appendChild(br);
            seleccionado.appendChild(aux); 
        });
    }
    return false;
}
/*function cargarImagen(){
    if(seleccionado!==-1){
        var div=document.getElementById('form');
        div.style['visibility']="visible";
    }
}*/
function previsualizar(){
    if(window.FileReader){
      var fil=document.getElementById('archivo');
      var files = fil.files[0];
      if (files.type.match('image.*')) {
          var reader = new FileReader();
          reader.onload = (function(theFile) {
          return function(e) {
          var span = document.getElementById('preview');
          vaciar(span);
          span.innerHTML = ['<img class="preview" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
        };
      })(files);
      reader.readAsDataURL(files);
      }
  }
}
function postSend(){
    var label=seleccionado.childNodes[2];
    var emp=document.getElementById('empresa');
    emp.value=label.innerHTML;
    return true;
}
function Send(){
    if(window.FormData){
        enviar();
        return false;
    }
    else{
        postSend();
    }
}
function enviar(){
     //información del formulario
        var message = ""; 
        var label=seleccionado.childNodes[2];
        var emp=document.getElementById('empresa');
        emp.value=label.innerHTML;
        var formData = new FormData($(".formulario")[0]);
        //hacemos la petición ajax  
        $.ajax({
            url: 'Herramientas/procesarImagen.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data:formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)
            },
            dataType: 'Json',
            //una vez finalizado correctamente
            success: function(data){
                var datos=data;
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                showMessage(message);
                var elemento=$(seleccionado);
                var aux=seleccionado.childNodes;
                if(aux.length!==0){
                    vaciar(seleccionado);
                }
                var imagen=new Image();
                var label = document.createElement('label');
                var br=document.createElement("br");
                label.innerHTML = datos[1];
                imagen.src = 'Imagenes/' + data[0];
                seleccionado.appendChild(imagen);
                seleccionado.appendChild(br);
                seleccionado.appendChild(label);
                actualizarFormulario();
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<center><span class='error'>Ha ocurrido un error.</span></center>");
                showMessage(message);
            }
        });
 }
 //como la utilizamos demasiadas veces, creamos una función para
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
function vaciar(elemento){
    var elementos=elemento.childNodes;
    for(i=elementos.length-1;i>=0;i--){
        elemento.removeChild(elementos[i]);
    }
}