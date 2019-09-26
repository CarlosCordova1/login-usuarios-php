function URLbuscarContrato(ncontrato){//busca el contrato
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lpsora&sql=ctr&prm='+ncontrato+'&app=lpsOra';
}
function URLbuscarContratoEnconvenios(ncontrato){//busca si existe el contrato entre los convenios
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvb&prm='+ncontrato+'&app=lpsOra';
}
function URLcargarplantilla(select){
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvf&prm='+select+'&app=lpsOra';
}
function AjaxURL(){
  return 'controllers/ajax.php';
}
 function gifLoad(){
  return '<img class="img-responsive center-block" src="assets/img/load.gif" alt="Load" height="112" width="112">';
 }



function guardar(){

if(validacamposCrearConvenios()){
  //buscarContratoEnconvenios(contrato);
  crearNuevoUsuario();
}else{
   alertify.alert("favor de no dejar campos vacios");
    alertify.error("Accion Cancelada");
}
//buscarContratoEnconvenios(contrato);

//buscarContrato(contrato);

}
function buscarContrato(ncontrato){
  
  $.ajax({
    // la URL para la petición
    url :URLbuscarContrato(ncontrato) ,
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
    //data : { id : 123 },
 
    // especifica si será una petición POST o GET
    type : 'GET',
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
     beforeSend : function(xhr, status) {
       //alertify.alert(gifLoad());     
    }, 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
        //$('<h1/>').text(json.title).appendTo('body');
        //$('<div class="content"/>')
          //  .html(json.html).appendTo('body');
         //console.log(json);
          if (json.error) {
            alertify.alert(String(json.msg));
             alertify.error("Accion Cancelada");
          }

          else{
             //alertify.alert("se encontro contrato");
             var tr='';
             var suma=0;
            $.each(json,function(index, value){
              if (value!==null) {
                if (value!="") {
                  suma++;
                   tr+='<tr> <th>' + suma + '</th> <th>' + index + '</th>        <td>' + value + '</td>      </tr>    <tr>';
                }
                
              }
    //console.log('My array has at position ' + index + ', this value: ' + value);
   
});
            var tablita='<table class="table table-bordered">    <tbody> '+tr+'  </tbody>  </table>';
            
              alertify.confirm("<h3>Se encontraron los siguientes datos asociados al contrato</h3>"+tablita+"<br> Estos datos se agregaran al convenio y no podras modificarlos... <br><b>Si desea cambiar estos valores, por favor ponte en contacto con las personas administradoras del programa X7</b> ¿Deseas crear el convenio con estos datos?", function (e) {
        if (e) {
           crearNuevoConvenio(json);
           
        } else {

          alertify.error("Accion Cancelada");
        }
      
      return false;
    });
            

            
          }
         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       // alert('Disculpe, existió un problema');
       alertify.alert("El servicio no se encuentra disponible");
        var cadena='{"cliente":"200823","nombre":"S A DE C V PROMOTORA ALCAZAR","domiciliocliente":"PAL 020320UTA","domiciliofiscal":"BLVD.KUKULCAN LOTE No.30 SECCION B ZONA HOT.RESIDENCIAL POK TA POK AL FINAL DE POK TAPOK C.P. 77500  CANCUN BENITO JUAREZ Q.ROO","nombrecomercial":"CONDOMINIO RESIDENCIAL ISLA BONITA","contrato":"201776","responsable":"LIC.FERNANDO PARAMO CAMARENA","codigoresolucion":"CAPA/SDG/DPE/0254/07","uso":"DM","areac":null,"lpsareac":null,"lpsdotacion":null,"dotacionasignada":1.25,"descuento":null,"viviendas":60}';
         var json=JSON.parse(cadena);
         console.log(json);
            alertify.alert("cadena de ejemplo... ya que el server no esta disponible<br>");
               //alertify.alert("se encontro contrato");
             var tr='';
             var suma=0;
            $.each(json,function(index, value){
              if (value!==null) {
                if (value!="") {
                  suma++;
                   tr+='<tr> <th>' + suma + '</th> <th>' + index + '</th>        <td>' + value + '</td>      </tr>    <tr>';
                }
                
              }
    //console.log('My array has at position ' + index + ', this value: ' + value);
   
});
            var tablita='<table class="table table-bordered">    <tbody> '+tr+'  </tbody>  </table>';
            
              alertify.confirm("<h3>Se encontraron los siguientes datos asociados al contrato</h3>"+tablita+"<br> Estos datos se agregaran al convenio y no podras modificarlos... <br><b>Si desea cambiar estos valores, por favor ponte en contacto con las personas administradoras del programa X7</b> ¿Deseas crear el convenio con estos datos?", function (e) {
        if (e) {
           crearNuevoConvenio(json);
           
        } else {

          alertify.error("Accion Cancelada");
        }
      
      return false;
    });
            
         

    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});
}
function buscarContratoEnconvenios(ncontrato){
  
  $.ajax({
    // la URL para la petición
    url : URLbuscarContratoEnconvenios(ncontrato),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
  //  data : { id : 123 },
 
    // especifica si será una petición POST o GET
    type : 'GET',
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
        //$('<h1/>').text(json.title).appendTo('body');
        //$('<div class="content"/>')
          //  .html(json.html).appendTo('body');
          console.log(json);
          if ($.isEmptyObject(json)) {
           // alertify.alert("no hay convenio con este contrato");
            buscarContrato(ncontrato);
             
          }
          else{
             alertify.alert("ya hay un convenio");
              alertify.confirm("¿Quieres crear otro convenio para este contrato? <b>Funcion aun no habilitada</b>", function (e) {
        if (e) {
                 
         alertify.alert("Como ya hay convenio creado con este contrato<br> voy a crearlo apartir de este siempre y cuando este cancelado el anterior");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
          }
         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       // alert('Disculpe, existió un problema');
       alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});
}

function cargarplantilla(select){
   
  $.ajax({
    // la URL para la petición
    url : URLcargarplantilla(select),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
  //  data : { id : 123 },
 
    // especifica si será una petición POST o GET
    type : 'GET',
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
        //$('<h1/>').text(json.title).appendTo('body');
        //$('<div class="content"/>')
          //  .html(json.html).appendTo('body');
         
          if ($.isEmptyObject(json)) {
            alertify.alert("no hay plantilla definida");
           // buscarContrato(ncontrato);
             $( ".versionPlantilla option" ).remove();
             $( ".versionPlantilla" ).append('<option value="">-------</option>');
          }
          else{
            // alertify.alert("Si hay plantilla");
             $( ".versionPlantilla option" ).remove();
             $( ".versionPlantilla" ).append('<option value="">-------</option>');

                for (i in json) { 
             // console.log("msgForIn" + json[i].nota + ' - '); 
               $( ".versionPlantilla" ).append('<option value="'+ json[i].idFormulario + '(0)'+ json[i].nota + '">'+ json[i].version + '</option>');
          }

          }
         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       // alert('Disculpe, existió un problema');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function validacamposCrearConvenios(){
  
  var bool=false;
  var lgnNombre=$("#lgnNombre").val().trim();
var lgnUsuario=$("#lgnUsuario").val().trim();
var lgnPassw=$("#lgnPassw").val().trim();
var lgnConPassw=$("#lgnConPassw").val().trim();
var lgnEmail=$("#lgnEmail").val().trim();
 

if(lgnNombre!="" && lgnUsuario!="" && lgnPassw!="" && lgnConPassw!=""){
 //bool=[lgnNombre, lgnUsuario, lgnPassw, lgnConPassw, lgnEmail];
  bool = {
    lgnNombre: lgnNombre,
    lgnUsuario: lgnUsuario,
    lgnPassw: lgnPassw,
    lgnConPassw:lgnConPassw,
    lgnEmail:lgnEmail
};
}
 return bool;
}

function crearNuevoUsuario(){
    var valor=validacamposCrearConvenios();

/*/var nombre =valor[0];//"nombre"
var usuario =valor[1];
var contrasena =valor[2];
var confirmacontrasena =valor[3];
var email =valor[4];
/*/
  $.ajax({
    url : AjaxURL(),
   data : { action : "c",
     data:JSON.stringify(valor) },

    type : 'POST',

    dataType : 'JSON',
    success : function(json) {
      console.log(json);
            if(json.status==1){
              $("#btnConvenio").removeAttr('disabled').removeClass('disabled');
            $("#crearConvenio").attr('disabled',"disabled").addClass('disabled');

        alertify.success("Haz click en Siguiente");
        loadTemplatePermisos(json);
            }
            else{
               alertify.alert("<b>Error</b><br>"+json.msg);
               alertify.error("Accion cancelada");
            }   

         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al crear el convenio');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}

function crearNuevoConvenio(json){
  //alert(" aqui crearNuevoConvenio");
  var valor=validacamposCrearConvenios();
//console.log(valor);
var arr=valor[2].split("(0)");
  var vp=arr[0];

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "c",
   contrato:valor[0],
   date:valor[1],
   vp:vp,
   data:JSON.stringify(json) },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
      console.log(json);
            if(json.status==1){
              $("#btnConvenio").removeAttr('disabled').removeClass('disabled');
            $("#crearConvenio").attr('disabled',"disabled").addClass('disabled');

        //alert(json);
       // console.log(json);
        alertify.success("Haz click en Siguiente");
        loadTemplateAntecedentes(json);
            }
            else{
               alertify.alert("Hubo error al actualizar tablas"+"<br><b>Error</b><br>"+json.msg);
            }      
        //segun la accion activo o desactivo los botones
      


         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al crear el convenio');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}

function login(datos){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "login",  u:datos.username, p:datos.password },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
     //console.log(json);
            if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
        //segun la accion activo o desactivo los botones
         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al validar Usuario');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function validarDatosLogin(){
  var estatus=0;
var username=$("#username").val().trim();
var password=$("#password").val().trim();
if (username!="" && password!="") {
  estatus=1;
}
 var datos = {
    "status":estatus,

    "username":username,
    "password":password,
   
   };

  return datos;
}
function cargarplantillaParaUsuariosRegistrados(){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "lgr" },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'html',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(html) {
    $("#pageContentRegistrado").html(html);
    $("#soloLectura").html("");
    
    /*/ console.log(json);
            if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
        //segun la accion activo o desactivo los botones
         /*/
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar usuario registrado');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function logout(){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "logout" },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(JSON) {
      console.log();
    //$("#pageContentRegistrado").html(html);
    //$("#soloLectura").html("");
    location.reload();
    /*/ console.log(json);
            if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
        //segun la accion activo o desactivo los botones
         /*/
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cerrar sesion');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function cargarplantillaParaCargarArchivos(folio){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
   data : { action : "loadFile",folio:folio },
 
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'html',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(html) {
     $(".contentfileAttached").html(html);
  
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla de archivos');
     
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//----------------------------------------------------------
function ShowagregarServicios() {
    $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "verServiciosPlantilla" },
    type : 'POST',
    dataType : 'HTML',
     beforeSend : function(xhr, status) {
      $(".ajaxservicios").html(gifLoad());     
    },
    success : function(html) {
      //console.log(html);
     
     $(".ajaxservicios").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar servicios');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});
}
//----------------------------------------------------------
function Showloadeditar(id,usuario) {
    $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "loadPAgeEditar",id:id,usuario:usuario },
    type : 'POST',
    dataType : 'HTML',
     beforeSend : function(xhr, status) {
      $(".loadEditarPage").html(gifLoad());     
    },
    success : function(html) {
      //console.log(html);
     
     $(".loadEditarPage").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar pagina para editar');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});
}