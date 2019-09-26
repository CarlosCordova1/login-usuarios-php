<?php
if (isset($details)) {
	?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $details["title"];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
<!--<link href="assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">-->
    <!--<link href="assets/Admin-Theme-3-master/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="assets/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="assets/Admin-Theme-3-master/css/styles.css" rel="stylesheet">
<link href="assets/Admin-Theme-3-master/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
   <link href="assets/icheck-1.x/skins/square/blue.css" rel="stylesheet">
<link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.core.css" />
	<link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.default.css" id="toggleCSS" />
	<link rel="stylesheet" href="assets/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css"/>
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header row">
	     <div class="container" style="text-align: left; float: left;">
	        <div class="row " >
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a><?php echo $details["title"]." <span id='soloLectura'>(".$details["usuario"].")</span>";?></a></h1>
	              </div>
	           </div>
	         
	           <div class="col-md-2">
	            <!--  <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	              -->
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content" id="pageContentRegistrado">
	
<div class="row">
 <!-- <div class="col-sm-4">
  	  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Convenios LPS</h4></div>
      <div class="panel-body"><div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Buscar</button>
            </span>
          </div></div>
    </div>
  </div>
</div>
-->
  <div class="col-sm-12">
  	 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h4></h4>

<div class="navbar" role="banner">
 
	                  <nav class="navbar-right" role="navigation">
	                 

      <div class="btn-group">
    
    <div class="btn-group">
     <button type="button"  class="btn btn-info disabled" disabled="disabled">
                <span data-toggle="tooltip" title="Agregar usuario" >Nuevo </span><i class="fa fa-file-o" aria-hidden="true"></i>
              </button>
      <button type="button" class="btn btn-primary dropdown-toggle "  data-toggle="dropdown">
      Configuracion <i class="fa fa-cogs" aria-hidden="true"></i> <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#" data-toggle="modal" data-target="#myModalLogin" >Iniciar Sesion <i class="fa fa-unlock"></i></a></li>
        <?php /*?><li><a href="#" id="logout">Cerrar Sesion <i class="fa fa-lock" aria-hidden="true"></i></a></li><?php */?>
      </ul>
    </div>
  </div>
	                    </nav>
	              </div>

    


      </div>


      <div class="panel-body">
     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">

						<thead>
							<tr >
							<th >N</th>
								<th>Usuario</th>
								<th>E-mail</th>
								<!-- <th>"Cliente"</th>-->
								<!-- <th>"Factura"</th>-->
								<!-- <th>"Fecha de inicio del convenio"</th>-->
								<th style="text-align: center;"> <i data-toggle="tooltip" title="Fecha de creacion" class="fa fa-calendar" aria-hidden="true"></i></th>
                <th style="text-align: center;"> <i data-toggle="tooltip" title="Ultima conexion" class="fa fa-calendar" aria-hidden="true"></i></th>
								<th style="text-align: center;"><i data-toggle="tooltip" title="Agregar Servicio" class="fa fa-user-circle-o" aria-hidden="true"></i></th>
								<!-- <th>"Version de plantilla"</th>-->
								<!--<th>Estatus</th>-->
								<!--<th>Cajero/a</th>-->
								<th>Servicios</th>
								<!--<th >---</th> -->
								
							</tr>
						</thead>
						<tbody id="showContentEncuentas"></tbody>
					</table>
  				

      </div>
    </div>  
  </div>
  </div>
</div>



</div><!-- end page content-->

  
<?php /*?>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright <?php echo date("Y");?> <a href='#'>Aguakan</a>
            </div>
            
         </div>
      </footer>
      <?php */?>

   

  </body>



  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalver">Open Modal</button>-->





 <!-- Modal -->
  <div class="modal fade" id="myModalPreguntas" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Servicios <b><span class="" ></span></b></h4>
        </div>
        <div class="modal-body "> 
          
<div class="">
            <div class="">
           
            <!--<div class="list-group" id="nPreguntas">-->
            <div class="list-group" id="nServicios">
            </div>
          </div>
                   


          </div>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
 <!-- Modal -->
  <div class="modal fade" id="myModalAgregarAcliente" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar <b><span class="" ></span></b></h4>
        </div>
        <div class="modal-body "> 
          <div class="loadEditarPage"></div>
 
      
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>




<!-- Modal -->
  <div class="modal fade" id="myModalverGrafica" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Grafica <b><span class="" ></span></b></h4>
        </div>
        <div class="modal-body contentGrafica">
        <div class="row"> 
        <div class="col-sm-6">
          <div id="container" style=" height: 300px; min-width: 310px; max-width: 600px;"></div>
        </div>
        <div class="col-sm-6">
          <div id="container2" style=" height: 300px; max-width: 600px;"></div>
        </div>
        </div>
        
        

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div> 


  
  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalver">Open Modal</button>-->

 
 <!-- Modal -->
  <div class="modal fade" id="myModalservicios" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;"
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar servicios</h4>
        </div>
        <div class="modal-body">
          <div class="ajaxservicios">
              
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>






 <!-- Modal -->
  <div class="modal fade" id="myModalLogin" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingresar (LGN)</h4>
        </div>
        <div class="modal-body">
        
                   <div class="logo"></div>
<div class="login-block">
    <h1>Acceso</h1>
    <h5>usuario solo Lectura</h5>
    <h5>usuario: Demo@Demo.com</h5>
    <h5>Contraseña: Demo</h5>
    <div class="row">
    <div class="col-sm-12">
       <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
    <input type="text" class="form-control" value="" maxlength="100" placeholder="E-mail" id="username" >
    </div>
    </div>
    </div><br>
    <div class="row">
    <div class="col-sm-12">
      <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2" aria-hidden="true"></i></span>
    <input type="password" class="form-control" value="" maxlength="100" placeholder="Contraseña" id="password">
    </div>
    </div>
    </div><br>
 <div class="row">
     <div class="col-sm-12">
      <button type="submit" id="loginCENSO" class="btn btn-primary" >Acceder</button>
    </div> 
    </div>   
</div>
        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Continuar solo lectura</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- 
Modal hide
-->
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Agregar Usuario</h3>
        </div>
        <div class="modal-body">
         <!-- <p>This is a large modal.</p>-->

	<div class="row">
		                                <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li id="tabs" role="presentation" class="active"><a href="#convenio" aria-controls="convenio" role="tab" data-toggle="tab">Usuario</a></li>
                                        <li id="tabs1" role="presentation" class="disabled"><a>Permisos</a></li>
                                        <?php /*/ ?>
                                        <li id="tabs2" role="presentation" class="disabled"><a class="disabled">Desarrollador</a></li>
                                       
                                        <!--<li role="presentation" class="disabled"><a class="disabled">Propietario</a></li>-->

                                       
                                        <li id="tabs3" role="presentation" class="disabled"><a class="disabled">Obligado Solidario</a></li>
                                         <li id="tabs4" role="presentation" class="disabled"><a class="disabled" >Institucion Bancaria</a></li>
                                          <li id="tabs5" role="presentation" class="disabled"><a class="disabled">Testigo</a></li>
                                          <?php /*/ ?>
                                    
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                    
                                        <div role="tabpanel" class="tab-pane active" id="convenio">
                                        <form  id="FormConvenio">
											<div class="panel panel-default">
											  <div class="panel-heading"></div>
											  <div class="panel-body">
											  	
												<!--<div class="form-group row">-->
											<!--</div>-->
                      <div class="row">
                        
                      <div class="col-xs-4">
                      <label for="lgnNombre" class="col-form-label">Nombre</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" name="lgnNombre" maxlength="100" value="" id="lgnNombre" placeholder="Ingresa Nombre" required >
                      </div>
                      </div>
                        <br>
											<div class="row">
												
											<div class="col-xs-4">
  										<label for="lgnUsuario" class="col-form-label">Usuario</label>
  										</div>
  										<div class="col-xs-8">
    									<input class="form-control" type="text" name="lgnUsuario" maxlength="100" value="" id="lgnUsuario" placeholder="Ingresa Usuario" required >
  										</div>
											</div>
												<br>
                          <div class="row">
                        
                      <div class="col-xs-4">
                      <label for="lgnPassw" class="col-form-label">Contraseña</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="password" name="lgnPassw" maxlength="100" value="" id="lgnPassw" placeholder="Ingresa Contraseña" required >
                      </div>
                      </div>
                        <br>
                          <div class="row">
                        
                      <div class="col-xs-4">
                      <label for="lgnConPassw" class="col-form-label">Confirmar Contraseña</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="password" name="lgnConPassw" maxlength="100" value="" id="lgnConPassw" placeholder="Confirma Contraseña" required >
                      </div>
                      </div>
                        <br>
                            <div class="row">
                        
                      <div class="col-xs-4">
                      <label for="lgnEmail" class="col-form-label">E-mail</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="email" name="lgnEmail" maxlength="100" value="" id="lgnEmail" placeholder="Ingresa E-mail" required >
                      </div>
                      </div>
                  										<br>
																	


											  </div>
											</div>

										<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="submit" id="crearUsuario" class="btn btn-primary" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="btnConvenio" disabled="disabled" class="btn btn-info btnNext disabled"  href="#antecedentes" aria-controls="antecedentes" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>			
											</form>
                                        </div><!-- termina tabpanel convenio-->
                                        
                                        <div role="tabpanel" class="tab-pane" id="antecedentes">
                                       		<form  id="FormAntecedentes">
                                       		<div class="panel panel-default" id="PermisosAjax">

											</div>
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardar" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="BtnSigAntecedente" class="btn btn-info btnNext disabled" disabled="disabled" href="#desarrollador" aria-controls="desarollador" id="BtnSigAntecedente" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>	
											</form>

                                        </div><!-- termina tabpanel -->


                                        <div role="tabpanel" class="tab-pane" id="desarrollador">
											<form  id="FormDesarrollador">
                                        	<div class="panel panel-default" id="desarrolladorAjax">
											
											</div><!-- end class="panel panel-default" id="desarrolladorAjax"-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary"  id="BtnGuardarDesarrollador" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="BtnSigDesarrollador" class="btn btn-info btnNext disabled" disabled="disabled" href="#obligadoSolidario" aria-controls="obligadoSolidario" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>
										</form>
                                        </div>

										
									 <div role="tabpanel" class="tab-pane" id="obligadoSolidario">
                                        <form  id="FormobligadoSolidario">
                                        <div class="panel panel-default" id="obligadoSolidarioAJAX">
											
											</div><!-- end id obligadoSolidarioAJAX-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardarObliSolid" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" class="btn btn-info btnNext disabled" href="#institucionBancaria" aria-controls="institucionBancaria" disabled="disabled" role="tab" id="BtnObliSoliSiguiente" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>
										</form>
                                        </div>


                                         <div role="tabpanel" class="tab-pane" id="institucionBancaria">
												<form  id="FormInstitucionBancaria">
                                        		<div class="panel panel-default" id="institucionBancariaAJAX" >
										
											</div><!-- end id institucionBancariaAJAX-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardarInsBancaria" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" class="btn btn-info btnNext disabled" disabled="disabled" href="#testigo" id="BtnSiguienteInsBancaria" aria-controls="testigo" role="tab" data-toggle="tab">Siguiente</button>	
											</div>	
										

										</div>
											</form>
                                        </div>




                                         <div role="tabpanel" class="tab-pane" id="testigo">
                                        	<form  id="FormTestigo">	
                                        		<div class="panel panel-default" id="testigoAJAX">
											  
											</div>
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary"  id="BtnGuardarTestigo" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<!--<button type="button" class="btn btn-info disabled"  disabled="disabled" >Well Done!</button>	-->
											</div>			


										</div>
											</form>
                                        </div>






                                    </div>
</div>
                                </div>
	</div>
<style type="text/css">
	.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}

.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
body{ background: #EDECEC; padding:50px}
.form-control-feedback {
        right: 18px !important;}


.navbar-right {
   
    margin-right: 0 !important;
}
/*
.has-success:focus {
    border-color: #2b542c !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168!important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168!important;
}
.has-success {
    border-color: #3c763d !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
}
.has-error:focus {
    border-color: #843534 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483!important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483!important;
}
.has-error{
    border-color: #a94442 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)!important;
}
*/

</style>

<style>

/* style for login*/
/*.logo {
    width: 213px;
    height: 36px;
    background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
    margin: 30px auto;
}
*/
.login-block {
    width: 350px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #337ab7;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
     padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    /*/background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#username:focus {
    /*/background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#password {
    /*/background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#password:focus {
    /*/background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #5f97c7;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #337ab7;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #337ab7;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #5f97c7;
}

</style>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar Sin Guardar</button>
        </div>
      </div>
    </div>
  </div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
  
<script src="assets/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
   <!-- <script src="https://code.jquery.com/jquery.js"></script>-->
    <!--<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
   <!-- <script src="assets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="assets/Admin-Theme-3-master/bootstrap/js/bootstrap.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="assets/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/Admin-Theme-3-master/js/custom.js"></script>

    <script src="assets/Admin-Theme-3-master/vendors/datatables/js/jquery.dataTables.js"></script>
    <script src="assets/Admin-Theme-3-master/vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/Admin-Theme-3-master/js/tables.js"></script>
    <script src="assets/dropzone/dropzone.js"></script>
<script src="assets/icheck-1.x/icheck.js"></script>
<script src="assets/alertify.js-0.3.11/lib/alertify.min.js"></script>
<script type="text/javascript" src="assets/bootstrapvalidator-master/dist/js/bootstrapValidator.min.js"></script>
<script src="assets/js/antecedentes.js"></script>
<script src="assets/js/desarrollador.js"></script>
<script src="assets/js/obligadoSolidario.js"></script>
<script src="assets/js/institucionBancaria.js"></script>
<script src="assets/js/testigo.js"></script>
<script src="assets/js/editarConvenio.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/showUsuarios.js"></script>

<script src="assets/js/init.js"></script>

<!--graficas-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<?php if(isset($_SESSION['usuarioLogueado'])){ ?>
  <script type="text/javascript">
  $(document).ready(function($) {
     cargarplantillaParaUsuariosRegistrados();
  });

</script>
<?php
}
?>


<?php if ($details["validainicio"]) {
  ?>
<script type="text/javascript">
  $(document).ready(function($) {
    $("#myModalLogin").modal("show");
  });

</script>
<?php } ?>
</html>
<?php
}else{echo "Accesso no permitido";}
	?>
