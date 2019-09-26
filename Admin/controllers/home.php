<?php

class Home //extends AnotherClass
{
	
	function __construct()
	{
		# code...
	}
	public function init(){
		session_start();
			

		$inicio=true;
		$sesion="";
		$nameSesion="datosUsuarioLGN";
		if(isset($_SESSION[$nameSesion])){
			$inicio=false;
			$sesion=$_SESSION[$nameSesion];
		}
		else{
		$_SESSION[$nameSesion]=true;
		$sesion=$_SESSION[$nameSesion];
		}

				
		$details=array("title"=>"Administrador usuarios LGN" , "sesion"=>$sesion,"usuario"=>"Invitado","validainicio"=>$inicio);


			$Acceso= json_decode($this->apiAGK('verstatus',array()));
			 	if(isset($Acceso[0]->estatusAplicacion)){
	 			if($Acceso[0]->estatusAplicacion==1){
            $this->viewsLectura($details);
        }
        else{
        	
            echo "La aplicacion Ha sido desactivada por el administrador del sistema";
        }
	 	}
	 	else{
	 			echo '<h3>'.$Acceso[0]->msg.'</h3>';
	 	}
        
        
	}
	private function viewsLectura($details){
			include_once("views/index.php");
	}


	private function apiAGK($action,  $data){
 $get='urlget=';
 $get.='lgn/1.0/lgn/';
 		$build=array();
 switch ($action) {
 	case 'login':
 	//$get.='lgn/1.0/lgn/';
 	$build = array('action' => $action,'login' => $data['mail'],'pass'=>$data['pass']  );
 		break;
 		case 'verstatus':
 		//$get.='cns/1.0/encuestas/';
 	$build = array('action' => $action);
 		break;
 	
 	default:
 		# code...
 		break;
 }
 $urlLogin='http://aguakan.com/git/api/apiagk.php?'.$get;

   $postdata = http_build_query($build);
$opts = array('http' => array( 'method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata  ));
$context  = stream_context_create($opts);
return file_get_contents($urlLogin,false,$context);
   
}


}
?>
