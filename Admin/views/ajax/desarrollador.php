<?php 
if($data1 && $desarrollador){
  ?>	
 	  <div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
<?php 
$a="";
foreach ($desarrollador as $key => $value) {
        $a=$value;
    }
    $desarrollador=$a;
//echo "<h1>nombre de lic  ".$desarrollador->nombreLic."</h1>";
//var_dump($desarrollador);
?>


                        <div class="panel-body">

                        
                        <div class="panel panel-default" >
                        <div class="panel-heading"><label>Datos del Desarrollador</label></div>
                        
                        <div class="panel-body">
                      
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="dLocalidad" class="col-form-label">Localidad</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->localidad!=null || $desarrollador->localidad!="" ? $desarrollador->localidad :"")?>" id="dLocalidad" name="dLocalidad" placeholder="Ingresa Localidad">
                      </div>
                      </div>
                        <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dDomicilio" class="col-form-label">Domicilio</label>
                      </div>
                      <div class="col-xs-8">
                      <?php if($desarrollador->domicilio!=null || $desarrollador->domicilio!="" ){ ?>
                      <input class="form-control disabled" disabled="disabled" type="text" value="<?php echo $desarrollador->domicilio?>" ><!--dato de x7-->
                        <?php }
                          else{
                            ?>
                           <input class="form-control" type="text" maxlength="45" value="" id="dDomicilio" name="dDomicilio" placeholder="Ingresa Domicilio">
                             <?php } ?>
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dNidenticacion" class="col-form-label">Nombre de Identificacion</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->identificacion!=null || $desarrollador->identificacion!="" ? $desarrollador->identificacion :"")?>" id="dNidenticacion" name="dNidenticacion" placeholder="Ingresa Nombre de Identificacion">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dNoidenticacion" class="col-form-label">Numero de Identificacion</label>
                      </div>
                      <div class="col-xs-8"><!-- predio ubicaicon-->
                      <input class="form-control" type="text" value="<?php echo ($desarrollador->numeroIdentificacion!=null || $desarrollador->numeroIdentificacion!="" ? $desarrollador->numeroIdentificacion :"")?>" id="dNoidenticacion" name="dNoidenticacion" maxlength="45"  placeholder="Ingresa Numero de Identificacion">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4"><!--quien expide-->
                      <label for="dQexpide" class="col-form-label">Quien Expide Identificacion</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45"  value="<?php echo ($desarrollador->QexpideIdentificacion!=null || $desarrollador->QexpideIdentificacion!="" ? $desarrollador->QexpideIdentificacion :"")?>" id="dQexpide" name="dQexpide" placeholder="Ingresa Quien Expide Identificacion">
                      </div>
                      </div>
                    
                      </div>
                      </div>
                      
                      
                        <div class="panel panel-default">
                        <div class="panel-heading"><label>Datos del Predio</label></div>
                        <div class="panel-body">
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="dpDireccion" class="col-form-label">Direccion</label>
                      </div>
                      <div class="col-xs-8"><!-- predio ubicacion -->
                      <input class="form-control" type="text" maxlength="45"  value="<?php echo ($desarrollador->predioUbicacion!=null || $desarrollador->predioUbicacion!="" ? $desarrollador->predioUbicacion :"")?>" id="dpDireccion" name="dpDireccion" placeholder="Ingresa Direccion">
                      </div>
                      </div>
                      <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="dpNescritura" class="col-form-label">Numero de Escritura</label>
                      </div>
                      <div class="col-xs-8"><!--  -->
                      <input class="form-control" type="text" value="<?php echo ($desarrollador->numeroEscritrura!=null || $desarrollador->numeroEscritrura!="" ? $desarrollador->numeroEscritrura :"")?>" maxlength="45" id="dpNescritura" name="dpNescritura" placeholder="Ingresa Numero de Escritura">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dpFecha" class="col-form-label">Fecha</label>
                      </div>
                      <div class="col-xs-8">
                          <div class="input-group date">
                          <input id="dpFecha" name="dpFecha" type="text" placeholder="Ingresa Fecha" class="form-control" value="<?php echo ($desarrollador->fechaEscritura!=null || $desarrollador->fechaEscritura!="" ? $desarrollador->fechaEscritura :"")?>">
                          <div class="input-group-addon" for="dpFecha">
                              <span class="glyphicon glyphicon-th" for="dpFecha"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dpOtorga" class="col-form-label">Nombre Quien Otorga Fe</label>
                      </div>
                      <div class="col-xs-4">

                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->nombreLic!=null || $desarrollador->nombreLic!="" ? $desarrollador->nombreLic :"")?>" id="dpOtorga" name="dpOtorga" placeholder="Nombre Quien Otorga Fe">
                      </div>
                      <div class="generoOtorga">
                      <div class="col-xs-2">
                      <input tabindex="4" type="radio" id="radioOtorga1" name="radioOtorga" value="1"
                      <?php echo ($desarrollador->generoLicenciado==null || $desarrollador->generoLicenciado=="1" ?'checked="checked"' :"")?> >
                              <label for="radioOtorga1"><span>Masculino</span></label>
                      </div>
                      <div class="col-xs-2">
                    <input tabindex="4" type="radio" id="radioOtorga2" name="radioOtorga" value="0"
                    <?php echo ($desarrollador->generoLicenciado=="0" ?'checked="checked"' :"")?> >
                              <label for="radioOtorga2"><span>Femenina</span></label>
                      </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-xs-4">
                      <label for="dpTitular" class="col-form-label">Titular (Notario)</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->notarioPublico!=null || $desarrollador->notarioPublico!="" ? $desarrollador->notarioPublico :"")?>" id="dpTitular" name="dpTitular" placeholder="Ingresa Notario Publico Suplente">
                      </div>
                      </div>
                      <br>
                    <div class="row">
                      <div class="col-xs-4">
                      <label for="dpNnotaria" class="col-form-label">Numero Notaria Publica</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->numeroNotario!=null || $desarrollador->numeroNotario!="" ? $desarrollador->numeroNotario :"")?>" id="dpNnotaria" name="dpNnotaria" placeholder="Ingresa Numero Notatia Publica">
                      </div>
                      </div>
                      <br>
                    <div class="row">
                      <div class="col-xs-4">
                      <label for="dpEntidadf" class="col-form-label">Entidad Federativa</label>
                      </div>
                      <div class="col-xs-8">
                       <select class="form-control" id="dpEntidadf" name="dpEntidadf" >
                        <option value="">----------</option>
                        <option value="Quintana Roo"  <?php echo ($desarrollador->entidadFederativa=="Quintana Roo" ? 'selected="selected"':"")?> >Quintana Roo</option>
                        <option value="Merida"  <?php echo ($desarrollador->entidadFederativa=="Merida" ? 'selected="selected"' :"")?>>Merida</option>
                        <option value="Tabasco" <?php echo ($desarrollador->entidadFederativa=="Tabasco" ? 'selected="selected"' :"")?> >Tabasco</option>
                         <option value="Veracruz" <?php echo ($desarrollador->entidadFederativa=="Veracruz" ? 'selected="selected"':"")?> >Veracruz</option>
                      </select>
                      </div>
                      </div>
                      <br>
                    <div class="row">
                      <div class="col-xs-4">
                      <label for="dpRFC" class="col-form-label">RFC</label>
                      </div>
                      <div class="col-xs-8">
                      <?php if($desarrollador->rfc!=null || $desarrollador->rfc!="" ){ ?>
                      <input class="form-control disabled" disabled="disabled" type="text" value="<?php echo $desarrollador->rfc;?>" id="dpRFC" name="dpRFC" placeholder="Ingresa RFC">
                      <?php }
                          else{
                            ?>
                            <input class="form-control" type="text" maxlength="45" value="" id="dpRFC" name="dpRFC" placeholder="Ingresa RFC">
                             <?php } ?>
                      </div>
                      </div>
                    



                      </div>
                      </div>
                                        



                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="dpNfolio" class="col-form-label">N# Folio</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45" value="<?php echo ($desarrollador->oficioPresupuesto!=null || $desarrollador->oficioPresupuesto!="" ? $desarrollador->oficioPresupuesto :"")?>" id="dpNfolio" name="dpNfolio"  placeholder="Ingresa Numero de Folio Emitido por la CAPA">
                      </div>
                      </div>


                        </div>

<script type="text/javascript">
	$(document).ready(function($) {
	
var dateToday = new Date();
$('#dpFecha').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    //startDate: '-3d',
    //minDate: 1,
     autoclose: true,
    todayHighlight: true

    
});


	$("#FormDesarrollador").on( 'click', function () {
     $('#FormDesarrollador').bootstrapValidator('validate');

    });

$('#FormDesarrollador').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dLocalidad: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            dDomicilio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
              dNidenticacion: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            dNoidenticacion: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             dQexpide: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             dpDireccion: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             dpNescritura: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             dpOtorga: {
                group: '.col-xs-4',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             dpTitular: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
               dpNnotaria: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            dpEntidadf : {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
               dpRFC: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
               dpNfolio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
                
        }
    });



$('#FormDesarrollador').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});
$( "#FormDesarrollador" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});

$('.generoOtorga input').on('ifClicked', function(event){
            //  callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
            
           // alert(event.type);
           // alert($('.regimen-list input:radio[name=regimen-radio]:checked').val());
            //alert($(this).val());
            }).iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });


	});//termina document.ready

function datosDesarrollador(){
 // alert("esta es la funcion ya definida del desarrollador");
var dLocalidad=$("#dLocalidad").val().trim();


 <?php if($desarrollador->domicilio==null || $desarrollador->domicilio=="" ){//dato de x7 ?>
var dDomicilio=$("#dDomicilio").val().trim();//dato de x7
  <?php } ?>


var dNombreidentificador=$("#dNidenticacion").val().trim();
var dNumeroidentificador=$("#dNoidenticacion").val().trim();
var dExpide=$("#dQexpide").val().trim();



var pDireccion=$("#dpDireccion").val().trim();
var pEscritura=$("#dpNescritura").val().trim();
var dpFecha=$("#dpFecha").val();
var dpOtorga=$("#dpOtorga").val().trim();
var dpTitular=$("#dpTitular").val().trim();
//var pradioOtorga=$("#radioOtorga").val();
var pradioOtorga=$(".generoOtorga input[name='radioOtorga']:checked").val();
//$("input[name='radioButton']:checked").val();

var dpNnotaria=$("#dpNnotaria").val().trim();
var pEntidad=$("#dpEntidadf").val().trim();

 <?php if($desarrollador->rfc==null || $desarrollador->rfc=="" ){//dato de x7 ?>
var dpRFC=$("#dpRFC").val().trim();//dato de x7
  <?php } ?>


var dpNfolio=$("#dpNfolio").val().trim();

var folio="<?php echo (isset($data->folio) ?$data->folio:$folio)?>";

  var datos = {
    "folio":folio,

    "dLocalidad":dLocalidad,
 <?php if($desarrollador->domicilio==null || $desarrollador->domicilio=="" ){//dato de x7 ?>
 "dDomicilio":dDomicilio,//dato de x7
  <?php } ?>
   

    "dNombreidentificador":dNombreidentificador,
    "dNumeroidentificador":dNumeroidentificador,
    "dExpide":dExpide,

    "pDireccion":pDireccion,
    "pEscritura":pEscritura,
    "dpFecha":dpFecha,
    "pradioOtorga": pradioOtorga,
    "dpTitular":dpTitular,
    "dpOtorga":dpOtorga,
    "pNumeroNotaria":dpNnotaria,
    "pEntidad":pEntidad,
    <?php if($desarrollador->rfc==null || $desarrollador->rfc=="" ){//dato de x7 ?>
"dpRFC":dpRFC, //dato de x7
  <?php } ?>
    

    "dpNfolio":dpNfolio,
     
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




</script>


<?php 
}
else{
	echo "Acceso no permitido...";
}
?>	