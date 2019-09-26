$(document).ready(function() {
ShowUsuarioSoloLectura();
//ShowEncuestaSoloLectura();


//ver grafica
$("body").on("click", ".verGrafica", function(){
     var idEncuesta=$(this).data("encuestaid");
     console.log(idEncuesta);
buscarDatosdeGraficas(idEncuesta);
$("#container").html("");
$("#container2").html("");

});//termina click ver grafica





$("#pageContentRegistrado").on("click", ".verPreguntas", function(){//ver preguntas
 var idEncuenta=$(this).data("encuestaid");
 //alertify.success("id "+idEncuenta);
    showServicios(idEncuenta);
});


//cerrar sesion
$("#pageContentRegistrado").on("click","#logout",function(event) {
  logout();
});



  $("#pageContentRegistrado").on("click","#refreshTable",function(event) {
   // ShowEncuentas();
   ShowUsuario_admin();
});

 $("#pageContentRegistrado").on("click",".modalServicios",function(event) {
   ShowagregarServicios();  
});

 $("#pageContentRegistrado").on("click",".agregarAcliente",function(event) {
   Showloadeditar($(this).data("id"),$(this).data("usuario"));  
});


 $('[data-toggle="tooltip"]').tooltip();




//iniciar sesion
$("#").on("click", function(){
  //alert("");
});
//$("#myModalLogin").modal("show");

$("#loginCENSO").on("click", function(){
var datos=validarDatosLogin();
  
  if (datos.status==1) {
    login(datos);
  }
  else{
    alertify.error("Datos vacios");
  }
  //console.log(datos);
});

$( "#myModalLogin" ).keypress(function(e) {
  if(e.which == 13) {
    $("#loginCENSO").click();
        event.preventDefault();
    }

});









//fecha
var dateToday = new Date();
$('#fechainicioconvenio').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    startDate: '-3d',
    minDate: 1,
     autoclose: true,
    todayHighlight: true

    
});



//icheck
 // var callbacks_list = $('.demo-callbacks ul');
 //eventos --> ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed
            $('.regimen-list input').on('ifClicked', function(event){
            //  callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
            cargarplantilla($(this).val());
           // alert(event.type);
           // alert($('.regimen-list input:radio[name=regimen-radio]:checked').val());
            //alert($(this).val());
            }).iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });





//tan bootstrap cambiar posicion de menu
 $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
  $('.nav-tabs > .active').next('li').addClass('active');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});


//alertas

$("#crearUsuario").on( 'click', function () {
      //reset();
      alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
           guardar();//
         //crearNuevoConvenio();
         // alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });



$("#BtnGuardar").on( 'click', function () {//guardar antecedente
      //reset();

      alertify.confirm("¿Estas seguro de realizar esta accion?<br>Los datos se guardaran y por ahora no podras editarlos", function (e) {
        if (e) {
        
         //crearNuevoConvenio();
        // datosAntecentes();
         if(typeof datosAntecentes === 'function') {
    //Es seguro ejecutar la función
    var datos= datosAntecentes();
    console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarAntecedentes(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}


}else{
  alertify.alert("funcion no definida");
  alertify.error("Accion Cancelada");
}


         //alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });

$("#BtnGuardarDesarrollador").on( 'click', function () {//guardar desarrollador
      //reset();

      alertify.confirm("¿Estas seguro de realizar esta accion?<br>Los datos se guardaran y por ahora no podras editarlos", function (e) {
        if (e) {
        
         //crearNuevoConvenio();
        // datosAntecentes();
         if(typeof datosDesarrollador === 'function') {
    //Es seguro ejecutar la función
    var datos= datosDesarrollador();
    //console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarDesarrollador(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}


}else{
  alertify.alert("funcion no definida");
  alertify.error("Accion Cancelada");
}


         //alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });


$("#BtnGuardarObliSolid").on( 'click', function () {//guardar Obligado solidario
      //reset();

      alertify.confirm("¿Estas seguro de realizar esta accion?<br>Los datos se guardaran y por ahora no podras editarlos", function (e) {
        if (e) {

         if(typeof datosObligadoSolidario === 'function') {
    //Es seguro ejecutar la función
    var datos= datosObligadoSolidario();
   // console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarObliadoSolidario(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}


}else{
  alertify.alert("funcion no definida");
  alertify.error("Accion Cancelada");
}


         //alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });



$("#BtnGuardarInsBancaria").on( 'click', function () {//guardar Institucion Bancaria
      //reset();

      alertify.confirm("¿Estas seguro de realizar esta accion?<br>Los datos se guardaran y por ahora no podras editarlos", function (e) {
        if (e) {

         if(typeof datosInstitucionBancaria === 'function') {
    //Es seguro ejecutar la función
    var datos= datosInstitucionBancaria();
   // console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarInstitucionBancaria(datos);
// alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}


}else{
  alertify.alert("funcion no definida");
  alertify.error("Accion Cancelada");
}


        // alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });

$("#BtnGuardarTestigo").on( 'click', function () {//guardar Testigo
     alertify.confirm("¿Estas seguro de realizar esta accion?<br>Los datos se guardaran y por ahora no podras editarlos", function (e) {
        if (e) {

         if(typeof datosTestigo === 'function') {
    //Es seguro ejecutar la función
    var datos= datosTestigo();
   // console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarTestigo(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}


}else{
  alertify.alert("funcion no definida");
   alertify.error("Accion Cancelada");
}


         //alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });


$( "body" ).on("change",".versionPlantilla",function() {
  var arr=$(this).val().split("(0)");
  var nota=arr[1];
  if( typeof nota=="undefined"){$("#notaPlantilla").html("<p></p>");}
    else{
      $("#notaPlantilla").html("<p>"+nota+"</p>");
    }
   
});




$('#FormConvenio').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            lgnNombre: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
        lgnUsuario: {
                group: '.col-xs-4',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
          lgnPassw: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
              lgnConPassw: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },

             lgnEmail: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },    
       
       
        }
    });


//reset mymodalNewConvenio
   $('body').on("click","#mymodalNewConvenio",function() {
       //$( "#versionPlantilla option" ).remove();
        //$( "#versionPlantilla" ).append('<option value="">-------</option>');

$(".contenidoEditar").html("");

$("#lgnNombre").val("");
  $("#lgnUsuario").val("");
  $("#lgnPassw").val("");
  $("#lgnConPassw").val("");
  $("#lgnEmail").val("");

$("#antecedentesAjax").html("");
$("#desarrolladorAjax").html("");
$("#obligadoSolidarioAJAX").html("");
$("#institucionBancariaAJAX").html("");
$("#testigoAJAX").html("");

$("#tabs1,#tabs2,#tabs3,#tabs4,#tabs5,#antecedentes,#desarrollador,#obligadoSolidario,#institucionBancaria,#testigo").removeClass('active');
$("#convenio").addClass('active');

 $("#btnConvenio,#BtnSigAntecedente,#BtnSigDesarrollador,#BtnObliSoliSiguiente,#BtnSiguienteInsBancaria,#testigo").attr('disabled',"disabled").addClass('disabled');

  $("#crearUsuario,#BtnGuardar,#BtnGuardarDesarrollador,#BtnGuardarObliSolid,#BtnGuardarInsBancaria,#BtnGuardarTestigo").removeAttr('disabled').removeClass('disabled');



    });

  // Validate the form manually
    $('#btnConvenio').click(function() {
        $('#FormConvenio').bootstrapValidator('validate');
        
        //alert();
    });

$('#FormConvenio').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});
$( "#FormConvenio" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});

} );// end $(document).ready