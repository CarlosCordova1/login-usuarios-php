<?php 
if($details){
// $asignadoRUTALOCAL= $this->showrutaLocal();
  ?> 

          
<!-- panel-default -->
       <div class="panel panel-default">

  <div class="panel-heading">
    <h3>Usuario : <?php echo $usuario?></h3>
     <h5>Para agregar permiso debe de haber servicio checado</h5>
   
    </div>
   <div class="panel-body">
     <div class="row">
    
  <div class="col-xs-6"><h2>Servicios</h2></div>
  <div class="col-xs-6"><h2>Permisos</h2></div>
</div>
  <?php foreach ($respuesta[0]->SERVICIOSbyUSER as $key => $value) { ?>
                                              
  <div class="row 
 <?php if($value->permiso==1){
                                echo 'alert-info';
                              }
                              ?>
  ">

  <div class="col-xs-6">
                         
                              <input type="checkbox" data-value='<?php echo $value->ID?>' class="flat editServicios"                         
                              <?php if($value->permiso==1){
                                echo ' checked="checked"';
                              }
                              ?>
                             
                              > 
                               <label><?php echo $value->SERVICIO?>
                            </label>
                        
  </div>

  <div class="col-xs-6">
     <input type="checkbox" data-idservicio='<?php echo $value->ID?>' data-value='ADMINISTRADOR' class="flat editPermiso" <?php if($value->ADMINISTRADOR==1){
                                echo ' checked="checked"';
                              }
                              ?>> <label> Admin </label>

     <input type="checkbox" data-idservicio='<?php echo $value->ID?>' data-value='GERENTE' class="flat editPermiso" <?php if($value->GERENTE==1){
                                echo ' checked="checked"';
                              }
                              ?> > <label> Gerente </label>

     <input type="checkbox" data-idservicio='<?php echo $value->ID?>' data-value='OPERATIVO' class="flat editPermiso" <?php if($value->OPERATIVO==1){
                                echo ' checked="checked"';
                              }
                              ?> > <label> Operativo </label>

     <input type="checkbox" data-idservicio='<?php echo $value->ID?>' data-value='SUPERVISOR' class="flat editPermiso" <?php if($value->SUPERVISOR==1){
                                echo ' checked="checked"';
                              }
                              ?> > <label> Supervisor </label>

     <input type="checkbox" data-idservicio='<?php echo $value->ID?>' data-value='INVITADO' class="flat editPermiso" <?php if($value->INVITADO==1){
                                echo ' checked="checked"';
                              }
                              ?> > <label> Invitado </label>
                          </div>
 
  
</div><br>

<?php } ?>

 
<!--  -->
 <div id="Asginaciones">
  
    </div>
 </div>


  </div> <!-- end panel body -->
 </div> 

<style type="text/css">
.easy-autocomplete{ width: 100% !important;}
	.flat{
        display: inline-block;
    vertical-align: middle;
    margin: 0;
    padding: 0;
    width: 20px;
    height: 20px;
     
    border: none;
    cursor: pointer;
  }
</style>
<script  type="text/javascript" >
  $(document).ready(function(a) {
var idusuario='<?php echo $id?>';

    $(".editServicios").click(function(event) {
      var ideServicio=$(this).data("value");
        if ($(this).is(":checked")) {
          // alert($(this).data("value"));
           AgregarEditarServicio(idusuario,ideServicio,true);
        }
        else
        {
 AgregarEditarServicio(idusuario,ideServicio,false);
        }

    });

     $(".editPermiso").click(function(event) {
/*/
        var ideServicio=$(".editServicios").data("value");
        if ($(this).data("idservicio")==ideServicio) {

        }
        /*/
 var a = $(this).parents(".editServicios");
       console.log(a);
           //alert($(this).parents(".editServicios").is(":checked"));
      if ($(this).is(":checked")) {
     // alert("usuario: "+idusuario+    "  idservicio: "+$(this).data("idservicio") +    "  rol: "+$(this).data("value") + " is checked");
      AgregarEditarRoles(idusuario,$(this).data("idservicio"),$(this).data("value"),true);
      }
      else
      {
      //  alert("usuario: "+idusuario+    "  idservicio: "+$(this).data("idservicio") +    "  rol: "+$(this).data("value") + " is not checked");
       AgregarEditarRoles(idusuario,$(this).data("idservicio"),$(this).data("value"),false);
      }
    });
  });


function AgregarEditarServicio(usuario,ideServicio,ischeked){
  console.log("usuario: "+usuario+ "  Servicio: "+ideServicio+" ischeked "+ischeked);
  $.ajax({  
    url : AjaxURL(),
   data : { action : "agregaservicioPermisos", usuario:usuario,ischeked:ischeked,ideServicio:ideServicio},
    type : 'POST',
    dataType : 'JSON',
    success : function(json) {
     console.log(json);
           /*/ if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
           /*/     
    },
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al modificar el servicio');
        console.log(status);
        },
    complete : function(xhr, status) {
    }
});

}
//-----------------------------------------------
function AgregarEditarRoles(usuario,ideServicio,rol,ischeked){
  console.log("usuario: "+usuario+ "  Servicio: "+ideServicio+" Rol: "+rol+" ischeked "+ischeked);
  $.ajax({  
    url : AjaxURL(),
   data : { action : "agregaservicioPermisos_roles",
    usuario:usuario,
    ischeked:ischeked,
    rol:rol,
    ideServicio:ideServicio},
    type : 'POST',
    dataType : 'JSON',
    success : function(json) {
     console.log(json);
           /*/ if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
           /*/     
    },
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al modificar el servicio');
        console.log(status);
        },
    complete : function(xhr, status) {
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