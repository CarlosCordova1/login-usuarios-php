<?php 
if($Ediconvenio){
  $val=$data->permisos;
$a="";
foreach ($val as $key => $value) {  
     $a= $value;
    }
   $val=$a;

   $Convenio= $Ediconvenio[0];
  //var_dump($val);
  //var_dump($Convenio);
?>
    <!--  test editar-->
         <div class="row">
         <?php 
        echo ($val->soloLectura=="1" && $val->puedeEditar=="0" ?'<div class="col-md-12 alert-warning"><h3>Solo lectura. No tienes permisos para editar la información</h3></div>':"");
         ?>
                                    <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card2">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li id="tabs" role="presentation" class="active">
                                        <a href="#convenio" aria-controls="convenio" role="tab" data-toggle="tab">Editar Convenio LPS</a>
                                        </li>
                                        <li id="tabs1" role="presentation" class="antecedentesEdit"  >
                                        <a aria-controls="antecedentes" role="tab" data-toggle="tab" href="#antecedentes">Antecedentes</a>
                                        </li>
                                        <li id="tabs2" role="presentation" class="">
                                        <a aria-controls="desarrollador" role="tab" data-toggle="tab" href="#desarrollador"  class="DesarrolladorEdit">Desarrollador</a>
                                        </li>
                                       
                                        <!--<li role="presentation" class="disabled"><a class="disabled">Propietario</a></li>-->

                                       
                                        <li id="tabs3" role="presentation" class="obligadoSolidarioEdi">
                                        <a aria-controls="obligadoSolidario" role="tab" data-toggle="tab" href="#obligadoSolidario" class="">Obligado Solidario</a>
                                        </li>
                                         <li id="tabs4" role="presentation" class="institucionBancariaEdit">
                                         <a aria-controls="institucionBancaria" role="tab" data-toggle="tab" href="#institucionBancaria" class="">Institucion Bancaria</a>
                                         </li>
                                          <li id="tabs5" role="presentation" class="testigoEdit">
                                          <a aria-controls="testigo" role="tab" data-toggle="tab" href="#testigo" class="">Testigo</a>
                                          </li>
                                    
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                    
                                        <div role="tabpanel" class="tab-pane active" id="convenio">
                                        <form id="FormConvenio2">
                                        
                      <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                          
                        <!--<div class="form-group row">-->
                      <!--</div>-->
                      <div class="row">
                        
                      <div class="col-xs-4">
                      <label for="inputNContrato" class="col-form-label">N# Contrato</label>
                      </div>

                      <div class="col-xs-8">

                      <input class="form-control disabled" type="text" disabled="disabled" value="<?php echo $Convenio->idContrato?>" ></div>

                      </div>

                        <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="fechainicioconvenio2" class="col-form-label">Fecha de inicio</label>
                      </div>
                      <div class="col-xs-8">
                          <div class="input-group date">
                            <?php if($val->puedeEditar=="1"){?>
                          <input id="fechainicioconvenio2" name="fechaConv" type="text" class="form-control" value="<?php echo $Convenio->fechaConvenio?>">
                          <?php } else {?>
                          <input  class="form-control disabled" disabled="disabled" value="<?php echo $Convenio->fechaConvenio?>">
                          
                          <?php }?>

                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="input-regimenF" class="col-form-label">Regimen Fiscal</label>
                      </div>
                      <div class="col-xs-8">
                      

                          <div class="regimen-list2">
                          <div class="col-sm-4">
                          <?php if($val->puedeEditar=="1"){?>
                          <input tabindex="3" type="radio" <?php echo ($Convenio->regimenFiscal==1?"checked":"") ?> id="input-regimenF2" name="regimen-radio2" value="1">
                          <?php } else { ?>
                          <input tabindex="3" class="disabled" <?php echo ($Convenio->regimenFiscal==1?"checked":"") ?> type="radio" id="input-regimenF2" disabled="disabled" name="regimen-radio2" value="1">
                           <?php }  ?>

                                <label for="input-regimenF2"><span>Persona Fisica</span></label>
                              </div>
                          <div class="col-sm-4"> 
                            <?php if($val->puedeEditar=="1"){?>
                          <input tabindex="4" type="radio" id="input-regimenM2" value="0" <?php echo ($Convenio->regimenFiscal==0?"checked":"") ?> name="regimen-radio2" >
                              <?php } else { ?>
                              <input tabindex="4" class="disabled" disabled="disabled" <?php echo ($Convenio->regimenFiscal==0?"checked":"") ?> type="radio" id="input-regimenM2" value="0" name="regimen-radio2" >
                                <?php } ?>
                              <label for="input-regimenM"><span>Persona Moral</span></label>
                          </div>             
           
                          </div>  
                      </div>
                    </div><br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="versionPlantilla" class="col-form-label">Version de la Plantilla</label>
                      </div>
                      <div class="col-xs-4 has-feedback">
                           <select class="form-control versionPlantilla" id="versionPlantilla2" name="versionPlantilla">
                        <option value="0">----------</option>
                        <?php 
                        echo '<option value="'.$Convenio->idForm.'(0)'.$Convenio->nota.'" selected>'.$Convenio->version.'</option>';
                        ?>
                      </select>
                      </div>
                      <div class="col-xs-4">
                      <div id="notaPlantilla"><?php echo $Convenio->nota?> </div>
                          
                      </div>
                    </div>

                    <br>
                                  


                        </div>
                      </div>

                    <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                    
                    </div>
                    
                    <div class="col-sm-2">
                    <?php if($val->puedeEditar=="1"){?>
                     <button type="submit" id="actualizarConvenio" class="btn btn-primary">Actualizar</button>
                     <?php } else {?>
                     <button type="submit" disabled="disabled" class="btn btn-primary disabled">Actualizar</button>
                      <?php } ?>
                   
                     <!-- <button type="button" id="btnConvenio"  class="btn btn-info btnNext" href="#antecedentes" aria-controls="antecedentes" role="tab" data-toggle="tab">Siguiente</button>  -->
                      </div>      


                    </div>      
                      </form>
                                        </div><!-- termina tabpanel convenio-->
                                        
                                        <div role="tabpanel" class="tab-pane" id="antecedentes">
                                          <form id="FormAntecedentes">
                                          <div class="panel panel-default antecedentesAjaxEditar" id="antecedentesAjax">

                                      </div>
                      
                      <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                    
                    </div>
                    
                    <div class="col-sm-2">
                    <?php if($val->puedeEditar=="1"){?>
                    <button type="button" class="btn btn-primary" id="BtnGuardarEditarAntec">Actualizar</button>
                    <?php } else {?>
                    <button type="button" class="btn btn-primary disabled" disabled="disabled" >Actualizar</button>
                    <?php } ?>
                     <!-- <button type="button" id="BtnSigAntecedente" class="btn btn-info btnNext"  href="#desarrollador" aria-controls="desarollador" role="tab" data-toggle="tab">Siguiente</button> -->
                      </div>      


                    </div>  
                      </form>

                                        </div><!-- termina tabpanel -->


                                        <div role="tabpanel" class="tab-pane" id="desarrollador">
                      <form id="FormDesarrollador">
                                          <div class="panel panel-default desarrolladorAjaxEdit" id="desarrolladorAjax">
                      
                      </div><!-- end class="panel panel-default" id="desarrolladorAjax"-->
                      
                      <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                    
                    </div>
                    
                    <div class="col-sm-2">
                      <!--<button type="button" id="BtnSigDesarrollador" class="btn btn-info btnNext" href="#obligadoSolidario" aria-controls="obligadoSolidario" role="tab" data-toggle="tab">Siguiente</button>--> 
                      <?php if($val->puedeEditar=="1"){?> 
                      <button type="button" class="btn btn-primary" id="BtnActualizarDesarrollador">Actualizar</button>
                      <?php } else { ?>
                      <button type="button" class="btn btn-primary disabled" disabled="disabled">Actualizar</button>
                      <?php } ?>
                      </div>      


                    </div>
                    </form>
                   </div>

                    
                   <div role="tabpanel" class="tab-pane" id="obligadoSolidario">
                                        <form id="FormobligadoSolidario">
                                        <div class="panel panel-default obligadoSolidarioAJAXEdit" id="obligadoSolidarioAJAX">
                      
                      </div><!-- end id obligadoSolidarioAJAX-->
                      
                      <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                   
                    </div>
                    
                    <div class="col-sm-2">
                    <?php if($val->puedeEditar=="1"){?>
                     <button type="button" class="btn btn-primary" id="BtnGuardarObliSolidEdit">Actualizar</button>
                     <?php } else { ?>
                     <button type="button" class="btn btn-primary disabled" disabled="disabled">Actualizar</button>
                     <?php } ?>
                    <!--  <button type="button" class="btn btn-info btnNext" href="#institucionBancaria" aria-controls="institucionBancaria" role="tab" id="BtnObliSoliSiguiente" data-toggle="tab">Siguiente</button> 
                     -->
                      </div>      


                    </div>
                    </form>
                                        </div>


                                         <div role="tabpanel" class="tab-pane" id="institucionBancaria">
                        <form id="FormInstitucionBancaria">
                                            <div class="panel panel-default institucionBancariaAJAXEdit" id="institucionBancariaAJAX">
                    
                      </div><!-- end id institucionBancariaAJAX-->
                      
                      <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                    
                    </div>
                    
                    <div class="col-sm-2">
                     <?php if($val->puedeEditar=="1"){?>
                    <button type="button" class="btn btn-primary" id="BtnGuardarInsBancariaEdit">Actualizar</button>
                     <?php } else {?>
                      <button type="button" class="btn btn-primary disabled" disabled="disabled">Actualizar</button>
                      <?php  } ?>
                      <!--<button type="button" class="btn btn-info btnNext " href="#testigo" id="BtnSiguienteInsBancaria" aria-controls="testigo" role="tab" data-toggle="tab">Siguiente</button>  -->
                      </div>  
                    

                    </div>
                      </form>
                      </div>




                                         <div role="tabpanel" class="tab-pane" id="testigo">
                                          <form id="FormTestigo"> 
                                            <div class="panel panel-default testigoAJAXEdit" id="testigoAJAX">
                        
                      </div>
                      
                      <div class="row">
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  </div>
                    <div class="col-sm-2">  
                   
                    </div>
                    
                    <div class="col-sm-2">
                    <?php if($val->puedeEditar=="1"){?>
                     <button type="button" class="btn btn-primary" id="BtnGuardarTestigoEdit">Actualizar</button>
                     <?php } else {?>
                     <button type="button" class="btn btn-primary disabled" disabled="disabled">Actualizar</button>
                     <?php } ?>
                     <!-- <button type="button" class="btn btn-info" >Well Done!</button> -->
                      </div>      


                    </div>
                      </form>
                      </div>






                 </div>
</div>
                </div>
  </div>
         <!-- fin test editar-->
<script  type="text/javascript" >
$(document).ready(function(ev) {
var fechaActual="<?php echo $Convenio->fechaConvenio?>";
var versionPlantillaActual="<?php echo $Convenio->idForm?>";
var folio="<?php echo $Convenio->folio?>";

  var dateToday = new Date();
$('#fechainicioconvenio2').datepicker({
    format: 'yyyy-mm-dd',
  todayBtn: "linked",
    language: "es",
    startDate: '-3d',
    minDate: 1,
     autoclose: true,
    todayHighlight: true

    
});

   $('.regimen-list2 input').on('ifClicked', function(event){
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


$("#actualizarConvenio").on( 'click', function () {//guardar Institucion Bancaria
      //reset();

      alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
   var fechainicioconvenio=$("#fechainicioconvenio2").val().trim();
  var versionPlantilla=$(".versionPlantilla").val();
 var arr=versionPlantilla.split("(0)");
  var vp=arr[0];

if( fechainicioconvenio!="" && versionPlantilla!="" && versionPlantilla!="0"){
// alertify.success("Accion datos no vacios");
if(fechaActual==fechainicioconvenio && versionPlantillaActual==vp){
  alertify.error("Datos no modificados <br> Accion Cancelada");
}else{
  //alertify.success("Datos modificados");
  //console.log(fechainicioconvenio,versionPlantilla);
fechaActual=fechainicioconvenio;
versionPlantillaActual=vp;
  actualizarConvenio(folio,fechainicioconvenio,vp);
}


}else{
   alertify.error("Datos Vacios <br> Accion Cancelada");
}
          
       // alertify.success("Datos Guardados");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
    });

$("#BtnGuardarEditarAntec").click(function(event) {
// alertify.alert("BtnGuardarEditarAntec");
alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
 var datos= datosAntecentes();
   //console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarAntecedentes(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}
}
else{
   alertify.error("Accion Cancelada");
}

});
});



$("#BtnActualizarDesarrollador").click(function(event) {
// alertify.alert("BtnGuardarEditarAntec");
alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
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
}
else{
   alertify.error("Accion Cancelada");
}

});
});





$("#BtnGuardarObliSolidEdit").click(function(event) {
// alertify.alert("BtnGuardarEditarAntec");
alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
 var datos= datosObligadoSolidario();
   //console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarObliadoSolidario(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}
}
else{
   alertify.error("Accion Cancelada");
}

});
});

$("#BtnGuardarInsBancariaEdit").click(function(event) {
// alertify.alert("BtnGuardarEditarAntec");
alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
 var datos= datosInstitucionBancaria();
   //console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarInstitucionBancaria(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}
}
else{
   alertify.error("Accion Cancelada");
}

});
});



$("#BtnGuardarTestigoEdit").click(function(event) {
// alertify.alert("BtnGuardarEditarAntec");
alertify.confirm("¿Estas seguro de realizar esta accion?", function (e) {
        if (e) {
 var datos= datosTestigo();
   //console.log(datos);
//si el valor es true lo guardo
if(datos.estatus){
 guardarTestigo(datos);
 //alert("datos listos para guardar");
}else{
  alertify.alert("datos vacios");
  alertify.error("Accion Cancelada");
}
}
else{
   alertify.error("Accion Cancelada");
}

});
});



$(".antecedentesEdit").click(function(event) {
 antendedentesPlantilla(folio);
});

$(".DesarrolladorEdit").click(function(event) {
 cargarPlatillaEditarDesarrollador(folio);
});
$(".obligadoSolidarioEdi").click(function(event) {
 cargarPlatillaEditarObligadoSolidario(folio);
});
$(".institucionBancariaEdit").click(function(event) {
 cargarPlatillaEditarInstitucionBancaria(folio);
});
$(".testigoEdit").click(function(event) {
 cargarPlatillaEditarTestigo(folio);
});




$('#FormConvenio2').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});

});//end document . ready




</script>



<?php
}
else{
	echo "Acceso no permitido...";
}
?>	