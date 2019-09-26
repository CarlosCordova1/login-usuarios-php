<?php 
//if($data1 && $antecedente){
  if($data1){
?>	
<div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
<?php 
/*/$a="";
foreach ($antecedente as $key => $value) {
        $a=$value;
    }
    $antecedente=$a;/*/
//echo "<h1>nombre de condominio ".$antecedente->condominioDenominado."</h1>";
//var_dump($antecedente);
?>
											  <div class="panel-body">
											
												<div class="row">
												<div class="panel panel-default">
											  <div class="panel-heading"><label>Permisos</label></div>
											  <div class="panel-body">
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="LGNservico" class="col-form-label">Servicio</label>
                      </div>
                      <div class="col-xs-8">
                      
                                              <div class="form-group">
                            <select class="form-control" id="LGNservico">
                                <?php foreach ($respuesta[0]->SERVICIOS as $key => $value) { ?>
                        <option value="<?php echo $value->ID?>"><?php echo $value->SERVICIO?> -> <?php echo $value->DESCRIPCION?> -> ESTATUS -> <?php echo $value->STATUS?> </option>
                         <?php } ?>
                        </select>
                            </select>
                          </div>
                                                 
                      </div>
                    </div>
											<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="LGNroles" class="col-form-label">Roles</label>
  										</div>
  										<div class="col-xs-8">
                       <div class="form-group">
                          <select class="form-control" id="LGNroles">
                           <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="GERENTE">GERENTE</option>
                            <option value="OPERATIVO">OPERATIVO</option>
                            <option value="SUPERVISOR">SUPERVISOR</option>
                            <option value="INVITADO">INVITADO</option>
                            <option value="KEY">KEY</option>

                          </select>
                        </div>                       
  										</div>
										</div>
											<br>
									
											  </div>
											</div>
											</div>
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
 var LGNservico=$("#LGNservico").val();
 var  LGNroles=$("#LGNroles").val();

var mail="<?php echo (isset($data->mail) ?$data->mail:$mail)?>";
  var datos = {
    "mail":mail,// se cambio a usuario para agregarlo, el mail se puso como nulo
"LGNservico":LGNservico,
"LGNroles":LGNroles  
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