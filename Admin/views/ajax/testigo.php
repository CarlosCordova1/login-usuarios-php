<?php 
if($data1 && $testigo){
$a="";
foreach ($testigo as $key => $value) { $a=$value;   }
    $testigo=$a;
//echo "<h1>nombre de lic  ".$desarrollador->nombreLic."</h1>";
//var_dump($testigo);
?>  
   
 
       <div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
                        <div class="panel-body">
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="tNombreTestigo" class="col-form-label">Nombre Testigo 1</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" value="<?php echo ($testigo->nombre!=null || $testigo->nombre!="" ? $testigo->nombre :"")?>" id="tNombreTestigo" name="tNombreTestigo" placeholder="Ingresa Nombre del Testigo 1">
                      </div>
                      </div>
                      <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="tNombreTestigo2" class="col-form-label">Nombre Testigo 2</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" value="<?php echo ($testigo->nombre2!=null || $testigo->nombre2!="" ? $testigo->nombre2 :"")?>" id="tNombreTestigo2" name="tNombreTestigo2" placeholder="Ingresa Nombre del Testigo 2">
                      </div>
                      </div>
                        


                        </div>

<script type="text/javascript">
	$(document).ready(function($) {
	
	$("#FormTestigo").on( 'click', function () {
     $('#FormTestigo').bootstrapValidator('validate');

    });

$('#FormTestigo').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
             tNombreTestigo: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            
            tNombreTestigo2: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
                                      
        }
    });



$('#FormTestigo').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});
$( "#FormTestigo" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});

	});//termina document.ready

function datosTestigo(){
  //alert("esta es la funcion ya definida para testigo");
var tNombreTestigo=$("#tNombreTestigo").val().trim();
var tNombreTestigo2=$("#tNombreTestigo2").val().trim();

var folio="<?php echo (isset($data->folio) ? $data->folio:$folio)?>";

  var datos = {
    "folio":folio,

    "tNombreTestigo":tNombreTestigo,
    "tNombreTestigo2":tNombreTestigo2,
   
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