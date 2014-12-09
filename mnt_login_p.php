<?php
    require_once('includes/fnc.php'); 
    require_once('class/class_db.php');
	//verifica_sesion();
	
	$db = new Database();


//if(!$afiliado || !$clave){
//	alert("Ingrese afiliado y/o contraseña","login.php");    
//}
$validacion = $db->getValidacionCliente($cliente,$clave);
			
			if (!$validacion)
			{
				//alert("Usuario o contraseña inválida","login.php");	
                            //echo "redirect";exit();
                                redireccionar("login_p.php?msg=true");
			}
			foreach($validacion as $val):	
						$cliente = $val['codigocliente'];							 
						$contra   = $val['clave'];
			endforeach;

 
  $_SESSION["afi_tarjeta"]=$cliente;
  redireccionar("frm_pedidos.php");
?>
