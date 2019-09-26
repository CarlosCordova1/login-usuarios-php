<?php 

class Login 
{ private $post;
	//utlizo la misma url
 
 
	private $urlAPIAGK_login='https://www.aguakan.com/git/api/webt.php?'; 
     
     public function init($post,$accion)
    {
    	$this->post=$post;
       
    	switch ($accion) {
    		case 'existeUsuario':
    			echo $this->validaSiexiste();
    			break;
    		case 'lgr':

    			$perm=json_decode($this->permisos());
    			
    		if($perm->permisos[0]->servicios->lgn->admin==1 || $perm->permisos[0]->servicios->lgn->supervisor==1){
    			echo $this->cargarPlantillaregistradoAdmin();//operador
    		}else if($perm->permisos[0]->servicios->lgn->invitado==1){
    			echo $this->cargarPlantillaregistrado();//operador
    			
    		}else{
    			echo $this->cargarPlantillaregistrado();//operador
    		}

    			
    			break;
    			case 'permisos':
    			return $this->permisos();
    			break;
    			case 'logout':
    			echo $this->logout();
    			break;
    		default:
    			echo json_encode( array('status' =>"No hay accion"));
    			break;
    	}
    }
   
     private function validaSiexiste()
    {
    	session_start();



    	//$cifrar=Funciones::cifrar($this->post["p"]);
    	//$Descifrado=Funciones::descifrar($cifrar);
    	$cifrar=md5($this->post["p"]);
    	//$Descifrado=Funciones::descifrar($cifrar);
    	$usuario=$this->post["u"];
    	$passw=$this->post["p"];

$cadena["tb"]="LuE";
$cadena["u"]=$usuario;
$cadena["p"]=$cifrar;
$status=0;
$acce= json_decode($this->apiAGK_login('login',array('mail'=>$usuario,'pass'=>$passw)));
if (isset($acce[0]->status)&& $acce[0]->status==1) {
	$status=1;
	$msg ="el usuario existe";
	//$_SESSION['usuarioLogueado']=true;
	//$_SESSION['DatosusuarioLogueado']=$acce;
	if($acce[0]->servicios->lgn->admin==1 || $acce[0]->servicios->lgn->supervisor==1 || $acce[0]->servicios->lgn->invitado==1 ){
		$_SESSION['usuarioLogueado']=true;
	$_SESSION['DatosusuarioLogueado']=$acce;
	}
	else{
		$status=0;
	$msg ="El usuario existe pero no tiene permisos";
	}
}else{
	$msg= "El usuario no Existe";
	$status=0;
}

	return  json_encode( array('status'=>$status,'msg'=>$msg,'data' =>$acce));

        
    }

private function apiAGK_login($action,  $data){
 $get='urlget=';
 		$build=array();
 switch ($action) {
 	case 'login':
 	$get.='lgn/1.0/lgn/';
 	$build = array('action' => $action,'login' => $data['mail'],'pass'=>$data['pass']  );
 		break;
 		default:
 		# code...
 		break;
 }
 $urlLogin=$this->urlAPIAGK_login.$get;
   $postdata = http_build_query($build);
$opts = array('http' => array( 'method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata  ));
$context  = stream_context_create($opts);
return file_get_contents($urlLogin,false,$context);
   
}

private function permisos(){
session_start();
$status=0;
$msg="";
$respuesta=0;
$nameSesion="datosUsuarioLGN";//tambien debe de estar declarada en ajax.php
if (isset($_SESSION[$nameSesion])) {
	$msg="permisos del usuario";
	$status=1;
	$respuesta=$_SESSION['DatosusuarioLogueado'];
}else{
	$msg="usuario no registrado o sesion caducada";
}
return  json_encode( array('status'=>$status,'msg'=>$msg,'permisos' =>$respuesta));
}

    private function cargarPlantillaregistrado(){//operador
$details=true;
include_once("../views/ajax/views.php");
    }

 private function cargarPlantillaregistradoAdmin(){//admin
$details=true;
//echo "este es la plantilla para el admin";
include_once("../views/ajax/views_admin.php");
    }

    private function logout(){
session_start();
session_destroy();
return  json_encode( array('logout'=>1));
    }

    
}//termina clase Login


class Ajax extends Login
{
private $post;
private $action;


private $mensajeError="La aplicacion esta desabilitada por el administrador de sistema, favor de ponerse en contacto con el departamento de TI para mas informacion";
private $mensajePermisos="No tiene suficientes permisos para realizar esta accion, pongase en contacto con el administrador del sistema";
 
 
private $urlAPIAGK='https://www.aguakan.com/git/api/webt.php?'; 



	function __construct($argument)
	{


  $this->post=$argument;//toda la entrada de datos por $_POST
$this->action=$this->post["action"];
if ($this->post["action"]=="c") {
$this->fechaConvenio=str_replace("/","-",$this->post["date"]);//formato db
$this->dataJson=$this->post["data"];
 $valjson=json_decode($this->post["data"]);

}
else{

}

	}

private function validaStatusApp(){
		$status=false;
		//$url=$this->urlEstatusApp;
       // $Acceso=$this->CallAPI("",$url,"");
        $Acceso= json_decode($this->apiAGK('verstatus',array()));

        if(isset($Acceso[0]->estatusAplicacion) && $Acceso[0]->estatusAplicacion==1){
           $status=true;
        }
             return $status; 
	}
	

	private function CallAPI($method, $url, $data)
{  return json_decode(file_get_contents($url));}
	private function apiAGK($action,  $data){
 $get='urlget=';
 //$get.='cns/1.0/encuestas/';
 $get.='lgn/1.0/lgn/';
 		$build=array();
 switch ($action) {

  		case 'verstatus':
 		
 	$build = array('action' => $action);
 		break;
 		case 'showTable':
 		//$get.='lgn/1.0/encuestas/';
 		$build = array('action' => $action,'min'=>$data['min'],'max'=>$data['max']);
 		break;
 		case 'showTableServicios':
 		//$get.='lgn/1.0/encuestas/';
 		$build = array('action' => $action);
 		break;
 		case 'showTableServiciosbyCliente':
 		//$get.='lgn/1.0/encuestas/';
 		$build = array('action' => $action,"user"=>$data["user"]);
 		break;
 		
 		case 'ServiciosAgregarLGN':
 		//$get.='lgn/1.0/encuestas/';
 		$build = array('action' => $action,
 			'servicioname'=>$data['servicioname'],
 			'serviciodescripcion'=>$data['serviciodescripcion']);
 		break;
 		 		case 'ShowServicios':
 		$build = array('action' => $action,'idusuario'=>$data['idusuario']);
 		break;
 		case 'agregaservicioPermisostouser':
 		$build = array(
 			'action' => $action,
 			'idusuario'=>$data['idusuario'],
		'ischeked'=>$data["ischeked"],
		'ideServicio'=>$data["ideServicio"]
 	);
 		break;

 		case 'agregaservicioPermisostouser_rol':
 		$build = array(
 			'action' => $action,
 			'idusuario'=>$data['idusuario'],
		'ischeked'=>$data["ischeked"],
		'rol'=>$data["rol"],
		'ideServicio'=>$data["ideServicio"]
 	);
 		break;
 		
 		/*/
 		case 'BuscarCliente':
 		$build = array('action' => $action,'idencuesta'=>$data['idencuesta'],'ncliente'=>$data['ncliente'],'oratkn'=>$data['oratkn']);
 		break;
 		/*/
 			case 'Agregar':
 			switch ($data['info']) {
 				case 'usuario':
 					$build = array('action' => $action,
 						'info'=>$data['info'],
 						'oratkn'=>$data['oratkn'],
 						'datos'=>$data['datos'],
			 						'lgnNombre'=>$data['lgnNombre'],
									'lgnUsuario'=>$data['lgnUsuario'],
									'lgnPassw'=>$data['lgnPassw'],
									'lgnEmail'=>$data['lgnEmail']
 					);
 					break;
 					case 'permisos':
 					$build = array('action' => $action,'info'=>$data['info'],'oratkn'=>$data['oratkn'],'datos'=>$data['datos'],
 						'LGNservico'=>$data["LGNservico"],
						'LGNroles'=>$data["LGNroles"],
						'mail'=>$data["mail"]

 				);
 					break;
 					
 				
 			}
 		break;
 			case 'showdatosGrafica':
 		$build = array('action' => $action,'idencuesta'=>$data['idencuesta'],'oratkn'=>$data['oratkn']);
 		break;
 		
 		
 		
 		
 	
 	default:
 		# code...
 		break;
 }
 $urlLogin=$this->urlAPIAGK.$get;
   $postdata = http_build_query($build);
$opts = array('http' => array( 'method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata  ));
$context  = stream_context_create($opts);
return file_get_contents($urlLogin,false,$context);
   
}

	public function init (){
		$this->accion();
	}

	private function accion (){
				switch ($this->action) {
			
						case 'login'://valido acceso a la aplicacion
					if($this->validaStatusApp()){
					Login::init($this->post,"existeUsuario");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}
				break;
					case 'lgr'://valido acceso a la aplicacion
					if($this->validaStatusApp()){
					Login::init($this->post,"lgr");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}
				break;
				case 'logout'://valido acceso a la aplicacion
					if($this->validaStatusApp()){
					Login::init($this->post,"logout");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}
				break;
				


			case 'c':
			//$dato=Login::init("","permisos");
			//$permisos= json_decode($dato );
					//if($this->validaStatusApp()){
						$permisos= json_decode( Login::init($this->post,"permisos"));
						$var=$permisos->permisos;
						//if($permisos->status==1 && $var[0]->soloLectura==1){
							if($permisos->permisos[0]->servicios->lgn->admin==1){
							//$this->insertarConvenio($permisos->permisos);
								$this->insertarUsuario($permisos);
								//echo json_encode(array("status"=>1,"msg"=>'Aqui creare el usuario'));
							
						}else{
							echo json_encode(array("status"=>0,"msg"=>$permisos->msg,"permisos"=>$permisos->permisos[0]->servicios->lgn));
						}
				
				//}else{
					//echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				//}
				
				
				//echo json_encode(array("status"=>0,"msg"=>$this->mensajeError,"permisos"=>$permisos->permisos));
				break;
				
					case 'PermisosPlantilla':
				$permisos= json_decode( Login::init($this->post,"permisos"));
					$this->loadtemplatePermisos($permisos);
					break;
					case 'PermisosGuardar':
				$permisos= json_decode( Login::init($this->post,"permisos"));
					$this->PermisosGuardar($permisos);
					break;

					case 'showUsuarios'://cargo tabla que muestra las encuentas creadas
					if($this->validaStatusApp()){
						//$this->showEncuestas();
						$this->showUsuarios();
					}
					break;
					case 'agregaservicioPermisos':
					if($this->validaStatusApp()){
						//$this->showConvenios();
						$this->agregaservicioPermisos();
					}
					break;
					case 'agregaservicioPermisos_roles': 
					if($this->validaStatusApp()){
						//$this->showConvenios();
						$this->agregaservicioPermisos_roles();
					}
					break;
					case 'verServicios'://busca pregunta
					if($this->validaStatusApp()){
						//$this->showConvenios();
						$this->verServicios();
					}
					break;
					case 'verServiciosPlantilla'://busca pregunta
						$this->verServiciosPlantilla();
					 break;
					 case 'loadPAgeEditar'://busca pregunta
						$this->vereditarPlantilla();
					 break;
					case 'agregarServiciodato'://busca pregunta
						$this->agregarServiciodato();
					 
					break;
					case 'buscarDatosDeGrafica'://busca estadistica
					if($this->validaStatusApp()){
						//$this->showConvenios();
						$this->buscarDatosDeGrafica();
					}
					break;
					case 'buscaryAgregarclienteEn'://busca y agrega cliente
					if($this->validaStatusApp()){
						//$this->showConvenios();
					
							$permisos= json_decode( Login::init($this->post,"permisos"));
						if($permisos->status==1){
							if($permisos->permisos[0]->servicios->cns->operativo==1 || $permisos->permisos[0]->servicios->cns->admin==1){
									//echo json_encode(array("status"=>1,"msg"=>"siii tiene permisos para realizar esta acción"));
									$this->buscarYagregarClientes();
							}
							else{
								echo json_encode(array("status"=>0,"msg"=>"No tiene permisos para realizar esta acción",'permisos'=>$permisos));
							}
							
							
						}else{
							echo json_encode(array("status"=>0,"msg"=>$permisos->msg));
						}
					}
					break;
				
				default:
				echo "No hay accion";
				break;
		}

		
	}



private function showUsuarios(){
//$cadena=$this->post["data"];
$cadena["tb"]="tsc";
//$parametro=urlencode(json_encode($cadena));
//$respuesta=file_get_contents($this->urlUpdateTables.$parametro);
//$Acceso= $this->apiAGK('showTable',array("min"=>1,"max"=>99));


$Acceso= $this->apiAGK('showTable',array("min"=>1,"max"=>99));
$Acceso2= $this->apiAGK('showTable',array("min"=>100,"max"=>199));
$Acceso3= $this->apiAGK('showTable',array("min"=>200,"max"=>299));
$Acceso4= $this->apiAGK('showTable',array("min"=>300,"max"=>399));
$Acceso5= $this->apiAGK('showTable',array("min"=>400,"max"=>499));
$Acceso6= $this->apiAGK('showTable',array("min"=>500,"max"=>599));
/*
$Acceso7= $this->apiAGK('showTable',array("min"=>600,"max"=>699));
$Acceso8= $this->apiAGK('showTable',array("min"=>700,"max"=>799));
$Acceso9= $this->apiAGK('showTable',array("min"=>800,"max"=>899));
$Acceso10= $this->apiAGK('showTable',array("min"=>900,"max"=>999));
$Acceso11= $this->apiAGK('showTable',array("min"=>1000,"max"=>1099));
$Acceso12= $this->apiAGK('showTable',array("min"=>1100,"max"=>1199));

 */

	$status=0;
	$folio=0;//$cadena["folio"];
	$msg="";
if ($Acceso) {
	$msg ="Usuario listo";
	$status=1;
	
}else{
	$msg= "Error al buscar usuarios";
	$status=0;
}

//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>$msg,"status"=>$status,
	"data"=>$Acceso,
	"data2"=>$Acceso2,
	"data3"=>$Acceso3,
	"data4"=>$Acceso4,
	"data5"=>$Acceso5,
	"data6"=>$Acceso6,
	"data7"=>$Acceso7,
	"data8"=>$Acceso8,
	"data9"=>$Acceso9,
	"data10"=>$Acceso10,
	"data11"=>$Acceso11,
	"data12"=>$Acceso12,
));
}


private function insertarUsuario($permisos){
$todopost=json_decode($this->post["data"]);
//"{"lgnNombre":"Nombre","lgnUsuario":"Usuario","lgnPassw":"Contraseña","lgnConPassw":"Confirmar Contraseña","lgnEmail":"mail@mail.com"}"
$datos["lgnNombre"]= trim($todopost->lgnNombre);
$datos["lgnUsuario"]= trim($todopost->lgnUsuario);
$datos["lgnPassw"]= trim($todopost->lgnPassw);
$datos["lgnConPassw"]= trim($todopost->lgnConPassw);
$datos["lgnEmail"]= trim($todopost->lgnEmail);
$msg= "";
$mail=$datos["lgnEmail"];
	$status=1;
if (strlen($datos["lgnNombre"])<5) {
	$msg= "Nombre muy corto, minimo 5 caractares";
	$status=0;
}else if (strlen($datos["lgnUsuario"])<3) {
	$msg= "Usuario muy corto, minimo 3 caractares";
	$status=0;
}else if (strlen($datos["lgnPassw"])<6) {
	$msg= "Contraseña muy corto, minimo 6 caractares";
	$status=0;
} else if ($datos["lgnPassw"]!=$datos["lgnConPassw"]) {
	$msg= "Contraseña no coincide";
	$status=0;
} /*/else if (!ereg("^([a-zA-Z0-9._]+)@([a-zA-Z0-9.-]+).([a-zA-Z]{2,4})$",$datos["lgnEmail"])){
	$msg= "E-mail no valido";
	$status=0;
}else if (!preg_match("/@aguakan.com/i", $datos["lgnEmail"])) {
$msg= "E-mail debe ser dominio aguakan";
	$status=0;
}/*/



if($status!=0){
	$respuesta2= json_decode($this->apiAGK('Agregar',array('info'=>'usuario',
		'oratkn'=>$permisos->permisos[0]->oratkn,
		'datos'=>$datos,
			'lgnNombre'=>$datos['lgnNombre'],
									'lgnUsuario'=>$datos['lgnUsuario'],
									'lgnPassw'=>$datos['lgnPassw'],
									'lgnEmail'=>$datos['lgnEmail']
	)));
	if (isset($respuesta2[0]->status) && $respuesta2[0]->status==0) {
	
	//$msg= "Error al insertar usuario";
	$msg =$respuesta2[0]->msg;
	$status=0;
	
}else if (isset($respuesta2[0]->status) && $respuesta2[0]->status==1){
$msg =$respuesta2[0]->msg;
	$status=1;
}
else{
	$msg ="error";
	$status=0;
}
}


echo json_encode(array("mail"=>$datos['lgnUsuario'],"msg"=>$msg,"status"=>$status,"data"=>$respuesta2,"todopost"=>$todopost,"datosvalidado"=>$datos,"permisos"=>$permisos,"JSONENCODEDATOS"=>$datos));
}

//cargar plantilla antecedentes
private function loadtemplatePermisos($data2){

	$data=json_decode($this->post["data"]);

	$valores=array();

	$mail="";

	if($data->mail){
		$mail=$data->mail;
	}else{
		$mail=str_replace('"','',$this->post["data"]);

	}
$respuesta= json_decode($this->apiAGK('showTableServicios',array()));
	$data1=true;

include_once("../views/ajax/permisos.php");
}


private function PermisosGuardar ($permisos){
$cadena=$this->post["data"];

$datos["LGNservico"]=$cadena["LGNservico"];
$datos["LGNroles"]=$cadena["LGNroles"];
$datos["mail"]=$cadena["mail"];

	$status=0;
	$mail=$cadena["mail"];
	$msg="";

$do= json_decode($this->apiAGK('Agregar',array('info'=>'permisos','oratkn'=>$permisos->permisos[0]->oratkn,
	'datos'=>$datos,
	'LGNservico'=>$datos["LGNservico"],
	'LGNroles'=>$datos["LGNroles"],
	'mail'=>$datos["mail"]
)));


if (isset($do[0]->status) && $do[0]->status==1) {
	//$msg ="El antecedente se ha actualizado.";
	$msg=$do[0]->msg;
	$status=1;
	//$this->ultimaModifacionConvenio($folio);
	
}else{
	//$msg= "Error al actualizar antecedente.";
	$msg=$do[0]->msg;
	$status=0;
}



//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"folio"=>$folio,"msg"=>$msg,"status"=>$status));
//echo json_encode(array("folio"=>$folio,"msg"=>$msg,"status"=>$status,"cadenaAntecedentes"=>$cadena,"DO"=>$do));
echo json_encode(array("folio"=>$mail,"msg"=>$msg,"status"=>$status,'do'=>$do));
}

private function verServicios(){
$idEncuesta=$this->post["encuesta"];
//$cadena["tb"]="tsP";
//$cadena["encuesta"]=$idEncuesta;
//$parametro=urlencode(json_encode($cadena));
//$respuesta=file_get_contents($this->urlUpdateTables.$parametro);
$respuesta2= $this->apiAGK('ShowServicios',array('idusuario'=>$idEncuesta));

	$status=0;
	$folio=0;//$cadena["folio"];
	$msg="";
if (isset($respuesta2[0]->status) && $respuesta2[0]->status==0) {
	
	$msg= "Error al buscar Servicios";
	$status=0;
	
}else{
	$msg ="Servicios listo";
	$status=1;
}
//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>$msg,"status"=>$status,"data"=>$respuesta2));
}
//----------------------------------------------------
private function agregaservicioPermisos(){
$usuario=$this->post["usuario"];
$ischeked=$this->post["ischeked"];
$ideServicio=$this->post["ideServicio"];


$respuesta2= $this->apiAGK('agregaservicioPermisostouser',
	array(
		'idusuario'=>$usuario,
		'ischeked'=>$ischeked,
		'ideServicio'=>$ideServicio
));

	$status=0;
	$folio=0;//$cadena["folio"];
	$msg="";
if (isset($respuesta2[0]->status) && $respuesta2[0]->status==0) {
	
	$msg= "Error al agregar servicio Permisos to user";
	$status=0;
	
}else{
	$msg ="Servicios listo";
	$status=1;
}
//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>$msg,"status"=>$status,"data"=>$respuesta2));
}

//_-----------------------------------------


//----------------------------------------------------
private function agregaservicioPermisos_roles(){
$usuario=$this->post["usuario"];
$ischeked=$this->post["ischeked"];
$ideServicio=$this->post["ideServicio"];
$rol=$this->post["rol"];


$respuesta2= $this->apiAGK('agregaservicioPermisostouser_rol',
	array(
		'idusuario'=>$usuario,
		'ischeked'=>$ischeked,
		'rol'=>$rol,
		'ideServicio'=>$ideServicio
));

	$status=0;
	$folio=0;//$cadena["folio"];
	$msg="";
if (isset($respuesta2[0]->status) && $respuesta2[0]->status==0) {
	
	$msg= "Error al agregar rol";
	$status=0;
	
}else{
	$msg ="rol listo";
	$status=1;
}
//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>$msg,"status"=>$status,"data"=>$respuesta2));
}

//_-----------------------------------------



private function verServiciosPlantilla(){
//$idEncuesta=$this->post["encuesta"];
$respuesta= json_decode($this->apiAGK('showTableServicios',array()));
//var_dump($respuesta);
$details=true;	
include_once("../views/ajax/verServiciosPaltillaAgregar.php");
 
}
//_-----------------------------------------
//_-----------------------------------------
private function vereditarPlantilla(){
$id=$this->post["id"];
$usuario=$this->post["usuario"];
$respuesta= json_decode($this->apiAGK('showTableServiciosbyCliente',array("user"=>$id)));
//var_dump($respuesta);
$details=true;	
include_once("../views/ajax/EditarPermisos.php");
 
}
//_-----------------------------------------

private function agregarServiciodato(){
$servicioname=$this->post["servicioname"];
$serviciodescripcion=$this->post["serviciodescripcion"];

echo $respuesta= $this->apiAGK('ServiciosAgregarLGN',array("servicioname"=>$servicioname , "serviciodescripcion"=>$serviciodescripcion));
 //echo json_encode($this->post);
}











private function buscarDatosDeGrafica(){
$idEncuesta=$this->post["encuesta"];
/*$cadena["tb"]="bEstGrafic";
$cadena["encuesta"]=$idEncuesta;
$parametro=urlencode(json_encode($cadena));
$respuesta=file_get_contents($this->urlUpdateTables.$parametro);
	$status=0;
	$folio=0;//$cadena["folio"];
	$msg="";
if ($respuesta) {
	$msg ="Encuesta lista";
	$status=1;
	
}else{
	$msg= "Error al buscar Encuesta";
	$status=0;
}
*/

$permisos= json_decode( Login::init($this->post,"permisos"));
$token=$permisos->permisos[0]->oratkn;
$apiak= $this->apiAGK('showdatosGrafica',array('idencuesta'=>$idEncuesta,'oratkn'=>$token));


//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>'Encuesta',"status"=>1,"data"=>$apiak));
}


private function buscarYagregarClientes(){
$idEncuesta=$this->post["encuesta"];
$cliente=$this->post["cliente"];

$permisos= json_decode( Login::init($this->post,"permisos"));
$token=$permisos->permisos[0]->oratkn;
$apiak= json_decode($this->apiAGK('InsertarCliente',array('idencuesta'=>$idEncuesta,'ncliente'=>$cliente,'oratkn'=>$token)));
$status=0;
if(isset($apiak[0]->status) && $apiak[0]->status==1){

if($apiak[0]->totalclientefound>0){
	$msg =$apiak[0]->msg;
	$status=0;
}
else{
	$msg =$apiak[0]->msg;
	$status=1;
}
}
else{
	$status=0;
	$msg ='ocurrio algun error';
}
if($apiak[0]->totalclientefound>0){
/*/$msg ="cliente tiene encuesta asignada";
$status=0;
/*/
}else{
/*
$apiakInserta= json_decode($this->apiAGK('InsertarCliente',array('idencuesta'=>$idEncuesta,'ncliente'=>$cliente,'oratkn'=>$token)));
if(isset($apiakInserta[0]->status) && $apiakInserta[0]->status==1){
$msg= "Encuesta asignada correctamente";
	$status=1;
}
else{
	$msg= "Ocurrio un error desconocido al intentar guardar el cliente";
	$status=0;
}

*/
}

//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"msg"=>$msg,"status"=>$status,"data"=>$respuesta));
echo json_encode(array("msg"=>$msg,"status"=>$status,"url"=>$cadena,"permisos"=>0));
}


}//end Class ajax



if(
   !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
){
   # Ejecuta si la petición es a través de AJAX.

$imprime= new Ajax($_POST);
$imprime->init();

}else{

	if (isset($_GET["folio"]) && $_GET["folio"]!="") {
		$valida=true;
		$data=0;

		//include_once("../views/pdf/convenio.php");
		//require_once('../tools/TCPDF-master/tcpdf.php');//incluye la libreria pdf

//forzar las descarga
		// header("Content-Type: application/octet-stream");
 //header("Content-Disposition: attachment; filename=ejemplo.pdf");
 //header("Content-Transfer-Encoding: binary");

	}else
	{
		echo "Accion no permitida";
	}

   
  
}


?>