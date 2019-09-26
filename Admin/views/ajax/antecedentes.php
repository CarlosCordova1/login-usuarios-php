<?php 
if($data1 && $antecedente){
?>	
<div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
<?php 
$a="";
foreach ($antecedente as $key => $value) {
        $a=$value;
    }
    $antecedente=$a;
//echo "<h1>nombre de condominio ".$antecedente->condominioDenominado."</h1>";
//var_dump($antecedente);
?>
											  <div class="panel-body">
											<div class="row">
											
												<div class="panel panel-default">

											  <div class="panel-heading"><label>Anexo 1</label></div>
											  <div class="panel-body">
											
											<div class="row">
  										<div class="col-xs-4">
  										<label for="fechaotorgoA" class="col-form-label">Fecha</label>
  										</div>
  										<div class="col-xs-8">
		    									<div class="input-group date">

											   <input id="fechaotorgoA" type="text" class="form-control" name="fechaotorgoA" placeholder="Ingresa una fecha" value="<?php echo ($antecedente->fechaOtorgo!=null || $antecedente->fechaOtorgo!=""? $antecedente->fechaOtorgo:"" )?>">
                              
											    <div class="input-group-addon">
											        <span class="glyphicon glyphicon-th"></span>
											    </div>
												</div>
  										</div>
										</div><br>
										<div class="row">
											<div class="col-xs-4">
  										<label for="nOficio" class="col-form-label">N# Oficio</label>
  										</div>
  										<div class="col-xs-8">
                      <?php if($antecedente->numeroOficioOtorgo!=null || $antecedente->numeroOficioOtorgo!="" ){ ?>
    									<input class="form-control disabled" disabled="disabled" type="text" value="<?php echo $antecedente->numeroOficioOtorgo;?>"  >
                       <?php }
                          else{
                            ?>
                            <input class="form-control" name="nOficio" maxlength="45" type="text" value="" id="nOficio" placeholder="Ingresa numero de oficio">
                             <?php } ?>
  										</div>
											</div>
											<br>
										<div class="row">
											<div class="col-xs-4">
  										<label for="nCondominio"  class="col-form-label">Nombre del Condominio</label>
  										</div>
  										<div class="col-xs-8">
                      <?php if($antecedente->condominioDenominado!=null || $antecedente->condominioDenominado!="" ){ ?>
    									<input class="form-control disabled" disabled="disabled" type="text" value="<?php echo $antecedente->condominioDenominado;?>">
                 <?php }
                          else{
                            ?>
                            <input class="form-control" type="text" maxlength="200" value="" name="nCondominio" id="nCondominio" placeholder="Nombre del Condominio">
                            <?php } ?>


  										</div>
											</div>
												<br>
										<div class="row">
											<div class="col-xs-4">
  										<label for="dCondominio" class="col-form-label">Direccion del Condominio</label>
  										</div>
  										<div class="col-xs-8">
                      									                     
                       <input class="form-control" type="text" maxlength="45" name="dCondominio" value="<?php echo ($antecedente->ubicacion!=null || $antecedente->ubicacion!="" ? $antecedente->ubicacion :"" )?>" id="dCondominio" placeholder="Direccion del Condominio">
                       
  										</div>
											</div>

											  </div>

											</div>
											</div>
												<br>
												<div class="row">
												<div class="panel panel-default">
											  <div class="panel-heading"><label>Anexo 2</label></div>
											  <div class="panel-body">

										<div class="row">
											<div class="col-xs-4">
  										<label for="noPresupuesto" class="col-form-label">N# Oficio Presupuesto</label>
  										</div>
  										<div class="col-xs-8">
                                           
                       <input class="form-control" maxlength="45" type="text" value="<?php echo ($antecedente->numeroOficioEmitio!=null || $antecedente->numeroOficioEmitio!=""? $antecedente->numeroOficioEmitio:"" )?>" name="noPresupuesto" id="noPresupuesto" placeholder="Ingresa numero de oficio cuando emitio el presupuesto">
                       
  										</div>
											</div><br>
													<div class="row">
  										<div class="col-xs-4">
  										<label for="fechaEmitio" class="col-form-label">Fecha</label>
  										</div>
  										<div class="col-xs-8">
		    									<div class="input-group date">                       								                        
                           <input id="fechaEmitio" type="text" name="fechaEmitio" class="form-control" value="<?php echo ($antecedente->fechaEmitio!=null || $antecedente->fechaEmitio!=""? $antecedente->fechaEmitio :"" )?>" placeholder="Ingrese una fecha">
                            
											    <div class="input-group-addon">
											        <span class="glyphicon glyphicon-th"></span>
											    </div>
												</div>
  										</div>
										</div>
										<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="nDesarrollo" class="col-form-label">Nombre del Desarrollo</label>
  										</div>
  										<div class="col-xs-8">
                                     
                      <input class="form-control" type="text" value="<?php echo ($antecedente->nombredeldesarrollo!=null || $antecedente->nombredeldesarrollo!=""? $antecedente->nombredeldesarrollo:"" ) ?>" maxlength="200" name="nDesarrollo" id="nDesarrollo" placeholder="Ingresa Nombre del Desarrollo">
                        
  										</div>
										</div>

										<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="noVivienda" class="col-form-label">Numero o Tipo de Vivienda</label>
  										</div>
  										<div class="col-xs-8">
                      <?php if($antecedente->numeroOtipoVivienda!=null || $antecedente->numeroOtipoVivienda!="" ){ ?>
    									<input class="form-control disabled" disabled="disabled" type="text" <?php echo 'value="'.$antecedente->numeroOtipoVivienda.'"';?> >
                      <?php } else { ?>
                      <input class="form-control" type="text" value="" maxlength="45" name="noVivienda" id="noVivienda" placeholder="Numero o Tipo de Vivienda">
                        <?php } ?>
  										</div>
										</div>
											<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="noLPS" class="col-form-label">Numero de LPS</label>
  										</div>
  										<div class="col-xs-8">
                      <?php if($antecedente->numeroLPS!=null || $antecedente->numeroLPS!="" ){ ?>
    									<input class="form-control disabled" disabled="disabled" type="text" value="<?php echo $antecedente->numeroLPS;?>" >
                      <?php } else {?>
                      <input class="form-control" type="number" value="" maxlength="45" name="noLPS" id="noLPS" placeholder="Numero de LPS">
                        <?php } ?>
  										</div>
										</div>
											<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="vImporte" class="col-form-label">Importe</label>
  										</div>
  										<div class="col-xs-8">
                      
                      <input class="form-control" type="text" value="<?php echo ($antecedente->importe!=null || $antecedente->importe!=""? $antecedente->importe :"" )?>" maxlength="45" name="vImporte" id="vImporte" placeholder="$ Importe">
                    
  										</div>
										</div>



											  </div>
											</div>
											</div>
											<div class="row">
												<div class="panel panel-default">
											  <div class="panel-heading"><label>Anexo 3</label></div>
											  <div class="panel-body">
											<div class="row">
  										<div class="col-xs-4">
  										<label for="fechaInforma" class="col-form-label">Fecha</label>
  										</div>
  										<div class="col-xs-8">
		    									<div class="input-group date">
                        
                        <input id="fechaInforma" placeholder="Ingresa una fecha" type="text" class="form-control" name="fechaInforma" value="<?php echo ($antecedente->fechaInforma!=null || $antecedente->fechaInforma!="" ? $antecedente->fechaInforma :"") ?>">
                       
											    <div class="input-group-addon">
											        <span class="glyphicon glyphicon-th"></span>
											    </div>
												</div>
  										</div>
										</div><br>
										<div class="row">
											<div class="col-xs-4">
  										<label for="noInforma" class="col-form-label">N# Oficio</label>
  										</div>
  										<div class="col-xs-8">
                      
                        <input class="form-control" type="text" value="<?php echo ($antecedente->numeroOficioInforma!=null || $antecedente->numeroOficioInforma!=""? $antecedente->numeroOficioInforma :"" )?>" maxlength="45" name="noInforma" id="noInforma" placeholder="Ingresa Numero de Oficio  Informa a los Organismos Operadores">
                       
  										</div>
											</div>


											  </div>
											</div>
											</div>
												<br>
												<br>


											  </div>

<script type="text/javascript">
	$(document).ready(function($) {
	
var dateToday = new Date();
$('#fechaotorgoA,#fechaEmitio,#fechaInforma').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    //startDate: '-3d',
    //minDate: 1,
     autoclose: true,
    todayHighlight: true

    
});


	$("#FormAntecedentes").on( 'click', function () {
     $('#FormAntecedentes').bootstrapValidator('validate');

    });

$('#FormAntecedentes').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nOficio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            nCondominio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
              dCondominio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            noPresupuesto: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             nDesarrollo: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             noVivienda: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             noLPS: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             vImporte: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             noInforma: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },

       }
    });



$('#FormAntecedentes').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});
$( "#FormAntecedentes" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});




	});//termina document.ready

function datosAntecentes(){
  //alert("esta es la funcion ya definida");
<?php //if($antecedente->fechaOtorgo==null || $antecedente->fechaOtorgo=="" ){ ?>
var anexo1Fecha=$("#fechaotorgoA").val().trim();
  <?php //} ?>
  <?php if($antecedente->numeroOficioOtorgo==null || $antecedente->numeroOficioOtorgo=="" ){ //dato de x7?>
var anexo1Oficio=$("#nOficio").val().trim();
  <?php } ?>
  <?php if($antecedente->condominioDenominado==null || $antecedente->condominioDenominado=="" ){// dato de x7 ?>
var anexo1Nombre=$("#condominioDenominado").val().trim();
  <?php } ?>
  <?php //if($antecedente->ubicacion==null || $antecedente->ubicacion=="" ){ ?>
var anexo1Domicilio=$("#dCondominio").val().trim();
  <?php //} ?>
  <?php //if($antecedente->numeroOficioEmitio==null || $antecedente->numeroOficioEmitio=="" ){ ?>
var anexo2Presupuesto=$("#noPresupuesto").val().trim();
  <?php //} ?>
  <?php //if($antecedente->fechaEmitio==null || $antecedente->fechaEmitio=="" ){ ?>
var anexo2Fecha=$("#fechaEmitio").val().trim();
  <?php //} ?>
  <?php //if($antecedente->nombredeldesarrollo==null || $antecedente->nombredeldesarrollo=="" ){ ?>
var anexo2Ndesarrollo=$("#nDesarrollo").val().trim();
  <?php //} ?>
  <?php if($antecedente->numeroOtipoVivienda==null || $antecedente->numeroOtipoVivienda=="" ){//dato de x7 ?>
var anexo2Nvivienda=$("#noVivienda").val().trim();
  <?php } ?>
  <?php if($antecedente->numeroLPS==null || $antecedente->numeroLPS=="" ){//dato de x7 ?>
var anexo2noLPS=$("#noLPS").val().trim();
  <?php } ?>
  <?php //if($antecedente->importe==null || $antecedente->importe=="" ){ ?>
var anexo2Importe=$("#vImporte").val().trim();
  <?php //} ?>
  <?php //if($antecedente->fechaInforma==null || $antecedente->fechaInforma=="" ){ ?>
var anexo3Fecha=$("#fechaInforma").val().trim();
  <?php //} ?>
  <?php //if($antecedente->numeroOficioInforma==null || $antecedente->numeroOficioInforma=="" ){ ?>
var anexo3Oficio=$("#noInforma").val().trim();
  <?php //} ?>

var folio="<?php echo (isset($data->folio) ?$data->folio:$folio)?>";
  var datos = {
    "folio":folio,
<?php //if($antecedente->fechaOtorgo==null || $antecedente->fechaOtorgo=="" ){ ?>
"anexo1Fecha":anexo1Fecha,
  <?php //} ?>
    
<?php if($antecedente->numeroOficioOtorgo==null || $antecedente->numeroOficioOtorgo=="" ){ //dato de x7 ?>
"anexo1Oficio":anexo1Oficio,
  <?php } ?>

   <?php if($antecedente->condominioDenominado==null || $antecedente->condominioDenominado=="" ){//dato de x7 ?>
"anexo1Nombre":anexo1Nombre,
  <?php } ?> 

      <?php //if($antecedente->ubicacion==null || $antecedente->ubicacion=="" ){ ?>
 "anexo1Domicilio":anexo1Domicilio,
  <?php //} ?> 

 <?php //if($antecedente->numeroOficioEmitio==null || $antecedente->numeroOficioEmitio=="" ){ ?>
    "anexo2Presupuesto":anexo2Presupuesto,
  <?php //} ?>

  <?php //if($antecedente->fechaEmitio==null || $antecedente->fechaEmitio=="" ){ ?>
    "anexo2Fecha":anexo2Fecha,
  <?php //} ?>     

     <?php //if($antecedente->nombredeldesarrollo==null || $antecedente->nombredeldesarrollo=="" ){ ?>
    "anexo2Ndesarrollo":anexo2Ndesarrollo,
  <?php //} ?>   

   <?php if($antecedente->numeroOtipoVivienda==null || $antecedente->numeroOtipoVivienda=="" ){ //dato de x7?>
     "anexo2Nvivienda":anexo2Nvivienda,
  <?php } ?> 

  <?php if($antecedente->numeroLPS==null || $antecedente->numeroLPS=="" ){//dato de x7 ?>
    "anexo2noLPS":anexo2noLPS,
  <?php } ?>  

  <?php //if($antecedente->importe==null || $antecedente->importe=="" ){ ?>
    "anexo2Importe":anexo2Importe,
  <?php //} ?>
    
<?php //if($antecedente->fechaInforma==null || $antecedente->fechaInforma=="" ){ ?>
     "anexo3Fecha":anexo3Fecha,
  <?php //} ?>
    
<?php //if($antecedente->numeroOficioInforma==null || $antecedente->numeroOficioInforma=="" ){ ?>
      "anexo3Oficio":anexo3Oficio,
  <?php //} ?>
  
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