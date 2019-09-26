<?php 
if($data1 && $institucionBancaria){
  ?>  
    <div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
<?php 
$a="";foreach ($institucionBancaria as $key => $value) { $a=$value; } $institucionBancaria=$a;
$b="";foreach ($cuotas as $key => $value) { $b[]=$value; } $cuotas=$b;
$c="";foreach ($permisos as $key => $value) { $c=$value; } $permisos=$c;


    
//echo "<h1>nombre de lic  ".$desarrollador->nombreLic."</h1>";
//var_dump($cuotas);
?>	
   
     
                        <div class="panel-body">
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="ibNpagos" class="col-form-label">N# Pagos</label>
                      </div>
                      <div class="col-xs-8 changeSelect" >
                      <select class="form-control" id="ibNpagos" name="ibNpagos">
                          <?php for($i=1;$i<=48;$i++){
                          if($institucionBancaria->numeroPago==$i){
                             echo '<option value="'.$i.'" selected>'.$i.'</option>';
                          }else{
                             echo '<option value="'.$i.'">'.$i.'</option>';
                          }
                         
                          }?>
                        </select>
                         <?php /*?>
                      <input class="form-control" type="number"  min="1" max="48" maxlength="2" step="1"  value="<?php echo ($institucionBancaria->numeroPago!=null || $institucionBancaria->numeroPago!="" ? $institucionBancaria->numeroPago :"")?>" id="ibNpagos" name="ibNpagos" placeholder="Ingresa Numero de Pagos">
                      <?php */?>
                      </div>
                      </div>
                        <br>
                          <div class="contendorPagos">
                         <?php /*?><div class="row">
                      <div class="col-xs-4">
                      <label for="ibNpagos1" class="col-form-label">N# 1</label>
                      </div>
                      <div class="col-xs-3">
                      <input class="form-control" type="number"  min="1" max="48" step="1"  value="<?php echo ($institucionBancaria->numeroPago!=null || $institucionBancaria->numeroPago!="" ? $institucionBancaria->numeroPago :"")?>" id="ibNpagos1" name="ibNpagos1" placeholder="Fecha de Pago">
                      </div>
                      <div class="col-xs-3">
                      <input class="form-control" type="number"  min="1" max="48" step="1"  value="<?php echo ($institucionBancaria->numeroPago!=null || $institucionBancaria->numeroPago!="" ? $institucionBancaria->numeroPago :"")?>" id="ibNpagos1" name="ibNpagos1" placeholder="Vencimiento">
                      </div>
                      <div class="col-xs-2">
                      <input class="form-control" type="number"  min="1" max="48" step="1"  value="<?php echo ($institucionBancaria->numeroPago!=null || $institucionBancaria->numeroPago!="" ? $institucionBancaria->numeroPago :"")?>" id="ibNpagos1" name="ibNpagos1" placeholder="Importe">
                      </div>
                         </div>
                        <br>  
                        <?php */?>
                        <div class="addInputs">
                        <?php $n2=0; for ($n=0;$n<=$institucionBancaria->numeroPago;$n++){
                            if(isset($cuotas[$n]->nCuota)){

                            
                          ?>
                        <div class="row">
                          <div class="col-xs-4">
                      <label for="ibNpagos1<?php echo $n2?>" class="col-form-label">N# <?php echo ++$n2?> </label>
                         <a style="padding-top: 10px;" href="#" class="pull-right updateCuota" data-idCuota="<?php echo $n2?>" data-rel="collapse" data-npago="<?php echo $n2?>" data-fila="<?php echo $cuotas[$n]->id?>" data-toggle="tooltip" title="Actualizar">
                         <i class="glyphicon glyphicon-refresh"></i>
                         </a>               
              
                      </div>
                        <div class="col-xs-3">
                        <div class="input-group date">
                      <input class="form-control fechaPagos" type="text"  
                       value="<?php echo $cuotas[$n]->fechaPago?>" id="ibNpagos1<?php echo $n2?>" name="ibNpagos1<?php echo $n2?>" placeholder="Fecha de Pago">
                     
                      <div class="input-group-addon" for=" ">
                              <span class="glyphicon glyphicon-th" for=" "></span>
                          </div>
                      </div>
                       </div>
                      <div class="col-xs-3">
                      <div class="input-group date">
                      <input class="form-control fechaPagosVence" type="text"   
                       value="<?php echo $cuotas[$n]->fechaVence?>" id="ibNpagos2<?php echo $n2?>" name="ibNpagos2<?php echo $n2?>" placeholder="Vencimiento">
                        
                        <div class="input-group-addon" for=" ">
                              <span class="glyphicon glyphicon-th" for=" "></span>
                          </div>
                      </div>
                      </div>
                      <div class="col-xs-2">
                      <input class="form-control" type="number"  min="1" max="100000" step="1" 
                       value="<?php echo $cuotas[$n]->importe?>" id="ibNpagos3<?php echo $n2?>" name="ibNpagos3<?php echo $n2?>" placeholder="Importe">
                      </div>
                         </div>
                        <br> 
                      
                        <?php } //en if
                        else{
                          ?>
                          <div class="row">
                          <div class="col-xs-4">

                      <label for="ibNpagos1<?php echo ++$n2?>" class="col-form-label">N# <?php echo $n2; ?> </label>
                         <a style="padding-top: 10px;" href="#" class="pull-right CreateCuota" data-idCuota="<?php echo $n2?>" data-rel="collapse" data-npago="<?php echo $n2?>" data-toggle="tooltip" title="Agregar">
                         <i class="fa fa-floppy-o"></i>
                         </a>               
              
                      </div>
                        <div class="col-xs-3">
                        <div class="input-group date">
                      <input class="form-control fechaPagos" type="text"  
                       value="" id="ibNpagos1<?php echo $n2?>" name="ibNpagos1<?php echo $n2?>" placeholder="Fecha de Pago">
                     
                      <div class="input-group-addon" for=" ">
                              <span class="glyphicon glyphicon-th" for=" "></span>
                          </div>
                      </div>
                       </div>
                      <div class="col-xs-3">
                      <div class="input-group date">
                      <input class="form-control fechaPagosVence" type="text"   
                       value="" id="ibNpagos2<?php echo $n2?>" name="ibNpagos2<?php echo $n2?>" placeholder="Vencimiento">
                        
                        <div class="input-group-addon" for=" ">
                              <span class="glyphicon glyphicon-th" for=" "></span>
                          </div>
                      </div>
                      </div>
                      <div class="col-xs-2">
                      <input class="form-control" type="number"  min="1" max="100000" step="1" 
                       value="" id="ibNpagos3<?php echo $n2?>" name="ibNpagos3<?php echo $n2?>" placeholder="Importe">
                      </div>
                         </div>
                        <br> 
                          <?php

                        }//en else
                        }//end for
                        ?>
                          </div>
                        </div><!-- <div class="contendorPagos">-->



<?php /*
<div class="input-group date">
                          <input id="dpFecha" name="dpFecha" type="text" placeholder="Ingresa Fecha" class="form-control" value="<?php echo ($desarrollador->fechaEscritura!=null || $desarrollador->fechaEscritura!="" ? $desarrollador->fechaEscritura :"")?>">
                          <div class="input-group-addon" for="dpFecha">
                              <span class="glyphicon glyphicon-th" for="dpFecha"></span>
                          </div>
                        </div>
*/ ?>
    

                        <div class="row">
                      <div class="col-xs-4">
                      <label for="ibNombreInstBancaria" class="col-form-label">Nombre de Institucion</label>
                      </div>
                      <div class="col-xs-8">
                       <select class="form-control" id="ibNombreInstBancaria" name="ibNombreInstBancaria">
                        <option value="">----------</option>
                        <option value="Santander" <?php echo ($institucionBancaria->nombreInstitucion=="Santander"?"selected":"")?> >Santander</option>
                        <option value="Bancomer" <?php echo ($institucionBancaria->nombreInstitucion=="Bancomer"?"selected":"")?>>Bancomer</option>
                        <option value="Banorte" <?php echo ($institucionBancaria->nombreInstitucion=="Banorte"?"selected":"")?>>Banorte</option>
                         <option value="Banamex" <?php echo ($institucionBancaria->nombreInstitucion=="Banamex"?"selected":"")?>>Banamex</option>
                      </select>
                      </div>
                      </div>
                        <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="ibBeneficiario" class="col-form-label">Beneficiario</label>
                      </div>
                      <div class="col-xs-8">
                       <select class="form-control" id="ibBeneficiario" name="ibBeneficiario">
                        <option value="">----------</option>
                         <option value="Desarrollos Hidráulicos de Cancún, S.A. de C.V." <?php echo ($institucionBancaria->beneficiario=="Desarrollos Hidráulicos de Cancún, S.A. de C.V."?"selected":"")?> >Desarrollos Hidráulicos de Cancún, S.A. de C.V.</option>
                       
                       
                      </select>
                      </div>
                      </div>
                      <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="ibNumeroCuenta" class="col-form-label">N# Cuenta</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" value="<?php echo ($institucionBancaria->cuenta!=null || $institucionBancaria->cuenta!="" ? $institucionBancaria->cuenta :"")?>" id="ibNumeroCuenta" name="ibNumeroCuenta" placeholder="Ingresa Numero de Cuenta">
                      </div>
                      </div>
                        <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="ibNumeroSucursal" class="col-form-label">N# Sucursal</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" value="<?php echo ($institucionBancaria->sucursal!=null || $institucionBancaria->sucursal!="" ? $institucionBancaria->sucursal :"")?>" id="ibNumeroSucursal" name="ibNumeroSucursal" placeholder="Ingresa Numero de Sucursal">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="ibNumeroClable" class="col-form-label">N# Clabe</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" value="<?php echo ($institucionBancaria->clabe!=null || $institucionBancaria->clabe!="" ? $institucionBancaria->clabe :"")?>" id="ibNumeroClable" name="ibNumeroClable" placeholder="Ingresa Numero de Clabe">
                      </div>
                      </div>
                        

                        </div>

<!--modal-->

<!--end modal-->


 

<script type="text/javascript">
	$(document).ready(function($) {
	  
//var jsonDatos=JSON.parse('<?php// echo json_encode($cuotas);?>');
         // $.each(jsonDatos,function(index, value){  
            //console.log('My array has at position ' + index + ', this value: ' + value);
          //console.log(value);
          //});

	$("#FormInstitucionBancaria").on( 'click', function () {
     $('#FormInstitucionBancaria').bootstrapValidator('validate');

    });

$('#FormInstitucionBancaria').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
             ibNpagos: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            ibNombreInstBancaria: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            ibBeneficiario: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
              ibNumeroCuenta: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            ibNumeroSucursal: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             ibNumeroClable: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
                           
        }
    });
$('#FormInstitucionBancaria').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

});
$( "#FormInstitucionBancaria" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});

//agregar inputs
 
var api;
    $(".changeSelect").on( "change","#ibNpagos",function (e) {

   // var urlApi=$.get('<?php //echo $urlapi ?>');
   var msg = $.ajax({type: "POST", url: "<?php echo $urlapi ?>", async: false}).responseText;
   var jsonDatos=JSON.parse(msg);
//console.log(a);
//console.log(jsonDatos);
      //var x = número de campos existentes en el contenedor
   // var x = $(".contendorPagos .addInputs").length +1 ;
    //var FieldCount = x-1; //para el seguimiento de los campos
       var MaxInputs       = $(this).val(); //Número Maximo de Campos

    var contenedor       = $(".contendorPagos .addInputs"); //ID del contenedor
    //$("#contendorPagos").remove(".remove");
   // var div='<div class="remove"><input type="text" name="mitexto[]" id="campo_'+ FieldCount +'" placeholder="Texto '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>';
       var div='<div class="remove"><input type="text" name="mitexto[]" id="campo_ placeholder="Texto "/><a href="#" class="eliminar">&times;</a></div>';
var ndiv=' <div class="row">'+
                      '<div class="col-xs-4">'+
                      '<label for="ibNpagos1{ncuota}" class="col-form-label">N# {contar}</label>'+
                      '<a style="padding-top: 10px;" href="#" class="pull-right {class}" data-idCuota="{ncuota}" data-npago="{n}" data-fila="{fila}" data-rel="collapse" '+
                      'data-toggle="tooltip" title="{tooltip}">'+
                      '<i class="glyphicon glyphicon-refresh"></i></a>'+
                      '</div>'+
                      '<div class="col-xs-3">'+
                      '<div class="input-group date">'+
                      '<input class="form-control fechaPagos " type="text"  value="{fechaPago}"'+
                       'id="ibNpagos1{ncuota}" name="ibNpagos1{ncuota}" placeholder="Fecha de Pago">'+
                        '<div class="input-group-addon" for="">'+
                              '<span class="glyphicon glyphicon-th" for=" "></span>'+
                          '</div>'+
                      '</div>'+


                      '</div>'+
                      '<div class="col-xs-3">'+
                      '<div class="input-group date">'+
                      '<input class="form-control fechaPagosVence " type="text"   value="{fechaVence}"'+
                       'id="ibNpagos2{ncuota}" name="ibNpagos2{ncuota}" placeholder="Fecha de Vencimiento">'+
                        '<div class="input-group-addon" for=" ">'+
                              '<span class="glyphicon glyphicon-th" for=" "></span>'+
                          '</div>'+
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2">'+
                      '<input class="form-control " type="number"  min="1" max="100000" step="1"  value="{valor}"'+
                       'id="ibNpagos3{ncuota}" name="ibNpagos3{ncuota}" placeholder="Ingresa Importe">'+
                      '</div>'+
                       '</div>'+
                      '  <br>';

     var div_2="";
      $(contenedor).html(" ");
      var i=0;

      //console.log(jsonDatos);
       for(var con=1; con<= MaxInputs;con++) //max input box allowed
        {
           var str = ndiv;
            var res2 = str.replace('{contar}', con);

            res2 = res2.replace(/{n}/g, con);
           var res3 = res2.replace(/{ncuota}/g,con);

           if (typeof (jsonDatos[i]) !== "undefined"  ) {

           res3 = res3.replace("{valor}", jsonDatos[i].importe);
           res3 = res3.replace("{fechaPago}", jsonDatos[i].fechaPago);
           res3 = res3.replace("{fechaVence}", jsonDatos[i].fechaVence);

            res3 = res3.replace("{class}","updateCuota");
            res3 = res3.replace("{tooltip}","Actualizar");
             res3 = res3.replace('{fila}', jsonDatos[i].id);
             //res3 = res3.replace(/{ncuota}/g,jsonDatos[i].nCuota);  
                    
                }
            else{
              
                res3 = res3.replace("glyphicon glyphicon-refresh","fa fa-floppy-o");
                res3 = res3.replace("{valor}","0");
                 res3 = res3.replace("{fechaPago}", "");
           res3 = res3.replace("{fechaVence}", "");
           res3 = res3.replace("{class}","CreateCuota");
           res3 = res3.replace("{tooltip}","Agregar");
            //res3 = res3.replace(/{ncuota}/g,con);
            }
          i++;
           

            div_2+=res3;
       
        }
        if(MaxInputs>=1){
           $(contenedor).html(div_2);
        }

        return false;
    });



    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        //if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            //x--;
        //}
        return false;
    });
<?php if ($permisos->soloLectura==1 && ($permisos->puedeEditar==1 || $crearOeditar=="crear")) { ?>


     $(".contendorPagos").on("click",".CreateCuota", function(e){ //click
       var id=$(this).data("idcuota");
       var evento=$(this);
       var fechaDepago= $("#ibNpagos1"+id).val();            
      var fechaVencimiento= $("#ibNpagos2"+id).val();
      var importe= $("#ibNpagos3"+id).val();
      var folio="<?php echo  (isset($data->folio) ?$data->folio:$folio)?>";
       var valores = {
    "folio": folio,
    "numeroPago":id,
    "fechaDepago":fechaDepago,
    "fechaVencimiento":fechaVencimiento,
    "importe":importe,
   
   };
          alertify.confirm("¿Agregar Cuota?", function (e) {
        if (e) {
          evento.removeClass("CreateCuota").addClass('updateCuota');
          evento.removeClass("CreateCuota").addClass('updateCuota');
          evento.attr('title', 'Actualizar');
          evento.attr("data-original-title","Actualizar");
         // res = res.replace("{tooltip}","Actualizar");
          evento.find("i").removeClass("fa fa-floppy-o").addClass('glyphicon glyphicon-refresh');
         //res = res.replace("{class}","updateCuota");
        //res = res.replace("glyphicon glyphicon-refresh","fa fa-floppy-o");
        //res = res.replace("{class}","CreateCuota");
        insertarFilaCuotas(valores);
        
        } else {
          alertify.error("Accion Cancelada");
        }
      });
        return false;
    });


      $(".contendorPagos").on("click",".updateCuota", function(e){ //click
          var id=$(this).data("idcuota");
          var contpago= $(this).data("npago");
          var idFila= $(this).data("fila");
         
      var fechaDepago= $("#ibNpagos1"+id).val();            
      var fechaVencimiento= $("#ibNpagos2"+id).val();
      var importe= $("#ibNpagos3"+id).val();
      var folio="<?php echo  (isset($data->folio) ?$data->folio:$folio)?>";
       var valores = {
    "folio": folio,
    "idFila":idFila,
    "numeroPago":id,
    "fechaDepago":fechaDepago,
    "fechaVencimiento":fechaVencimiento,
    "importe":importe,
    "contpago":contpago,
   
   };
    alertify.confirm("¿Actualizar Cuota?", function (e) {
        if (e) {
         
        actualizarFilaCuotas(valores);
        } else {
          alertify.error("Accion Cancelada");
        }
      });
  
        return false;
    });
<?php } ?>

     $(".contendorPagos").on("focus",".fechaPagos ,.fechaPagosVence", function(e){ //click en eliminar campo
        $('.fechaPagos, .fechaPagosVence').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    startDate: '-3d',
    minDate: 1,
     autoclose: true,
    todayHighlight: true
  
});

$('[data-toggle="tooltip"]').tooltip(); 

    });
  

$('[data-toggle="tooltip"]').tooltip(); 

  //var dateToday = new Date();
$('.fechaPagos, .fechaPagosVence').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    startDate: '-3d',
    minDate: 1,
     autoclose: true,
    todayHighlight: true
  
});






	});//termina document.ready

function datosInstitucionBancaria(){
  //alert("esta es la funcion ya definida para datosInstitucionBancaria");
var ibNpagos=$("#ibNpagos").val().trim();
var ibNombreInstBancaria=$("#ibNombreInstBancaria").val().trim();
var ibBeneficiario=$("#ibBeneficiario").val().trim();
var ibNumeroCuenta=$("#ibNumeroCuenta").val().trim();
var ibNumeroSucursal=$("#ibNumeroSucursal").val().trim();
var ibNumeroClable=$("#ibNumeroClable").val().trim();


var folio="<?php echo  (isset($data->folio) ?$data->folio:$folio)?>";

  var datos = {
    "folio":folio,

    "ibNpagos":ibNpagos,
    "ibNombreInstBancaria":ibNombreInstBancaria,
    "ibBeneficiario":ibBeneficiario,
    "ibNumeroCuenta":ibNumeroCuenta,
    "ibNumeroSucursal":ibNumeroSucursal,
    "ibNumeroClable":ibNumeroClable,
   };


//si es true los datos no estan vacios
var vandera=true;
for(value in datos ){
if(datos[value]==""){
  vandera=false;
}
}

return { "estatus":vandera, "datos":datos};

}


function insertarFilaCuotas(data){
  //console.log(data);
 $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "addCuotas",
         data:JSON.stringify(data) },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
      //console.log(json);
     // alert(html);
      //$("#antecedentesAjax").html(html);
            if(json.status==1){
        
        alertify.success("Cuota Agregada");
       
            }
            else{
               alertify.alert("Hubo error al agregar Cuota");
            }      
        //segun la accion activo o desactivo los botones
      

       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al agregar cuota');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});
}
function actualizarFilaCuotas(data){
//console.log(data);
 $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "actualizarCuotas",
         data:JSON.stringify(data) },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
      //console.log(json);
     // alert(html);
      //$("#antecedentesAjax").html(html);
            if(json.status==1){
        
        alertify.success("Cuota actualizada");
       
            }
            else{
               alertify.alert("Hubo error al actualizar Cuota");
            }      
        //segun la accion activo o desactivo los botones
      

       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al actualizar cuota');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}




</script>


<?php 
}
else{
	echo "Acceso no permitido...";
}
?>	