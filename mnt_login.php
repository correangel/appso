<?php
    require_once('includes/fnc.php'); 
    require_once('class/class_db.php');
	//verifica_sesion();
	
	$db = new Database();


//if(!$afiliado || !$clave){
//	alert("Ingrese afiliado y/o contraseña","login.php");    
//}
$validacion = $db->getValidacion($afiliado,$clave);
			if (!$validacion)
			{
				//alert("Usuario o contraseña inválida","login.php");	
                            //echo "redirect";exit();
                                redireccionar("login.php?msg=true");
			}
			foreach($validacion as $val):	
						$afiliado = $val['plastico_no'];							 
						$contra   = $val['clave'];
			endforeach;

 
  $_SESSION["afi_tarjeta"]=$afiliado;
  redireccionar("frm_consultapts.php");
?>
