<?php
if (isset($details)) {
	?>
  <div class="panel panel-default">
          <div class="panel-body">
            
            <h4 class="modal-title">servicios disponible</h4>
          <div class="row">
            
           <div class="col-xs-6">
                       <select class="form-control" id=" " name="" >
                       	<?php foreach ($respuesta[0]->SERVICIOS as $key => $value) { ?>
                        <option value="<?php echo $value->SERVICIO?>"><?php echo $value->SERVICIO?> -> <?php echo $value->DESCRIPCION?> -> ESTATUS -> <?php echo $value->STATUS?> </option>
                         <?php } ?>
                        </select>
                      </div>
          </div ><br>
          <div class="row">
    <div class="col-sm-4">
       <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
    <input type="text" class="form-control" value="" maxlength="10" placeholder="servicio" id="servicioname" >
    </div>
    </div>
     
    <div class="col-sm-4">
       <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></span>
    <input type="text" class="form-control" value="" maxlength="100" placeholder="Descripcion" id="serviciodescripcion" >
    </div>
    </div>
      
       <div class="col-sm-4">
       <div class="input-group">
      <button type="button" id="agregarServ" class="btn btn-info">Agregar</button>
    
    </div>
    </div>



    </div><br>    
    </div>
     </div>
     <script   type="text/javascript" >
     	$(document).ready(function(v) {
     		$("#agregarServ").click(function(event) {
     			var servicioname =$("#servicioname").val().trim();
     			var serviciodescripcion =$("#serviciodescripcion").val().trim();

     		if (servicioname!="" && serviciodescripcion!="" ) {
     			agregarServiciodato(servicioname, serviciodescripcion);
     		}else{alert("Campos vacios")}

     		});


     	});

function agregarServiciodato(servicioname, serviciodescripcion){
  $.ajax({
    url : AjaxURL(),
   data : { action : "agregarServiciodato",  servicioname:servicioname, serviciodescripcion:serviciodescripcion },
    type : 'POST',
    dataType : 'JSON',
    success : function(json) {
     console.log(json);
            if(json[0].status==1){
            alertify.success("Servicio agregado");
             }
             else{
             	 alertify.error("no se agrego el servicio");
             }
              

             
    },
 
    error : function(xhr, status) {
    	 console.log(status);
       alert('Disculpe, existió un problema al agregar servicio');
      // alertify.alert("Hubo error al buscar");
    },
 
    complete : function(xhr, status) {
    }
});

}


     </script>

	<?php
}else{echo "Accesso no permitido";}
	?>