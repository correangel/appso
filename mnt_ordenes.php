<?php
	require_once('includes/fnc.php');
	require_once('class/class_db.php');	
	verifica_sesion();	
	
	$db = new Database();
	
	if (isset($_GET['tipo_trn'])){
		$accion = $_GET['tipo_trn'];
	}
	else
	{
		$accion = $_POST["tipo_trn"];
	}
		
	
	
	switch($accion){
  	  case "Add":      
                    $campos=Array();
                    $campos[optica]=strip_tags($_POST["id_optica"]);
                    $campos[nombre]=strip_tags($_POST["txt_nombre"]);
					$campos[no_control]=strip_tags($_POST["txt_control"]);
					$campos[paciente]=strip_tags($_POST["txt_paciente"]);
					$campos[esfera_der]=strip_tags($_POST["txt_esferad"]);
					$campos[cilindro_der]=strip_tags($_POST["txt_cilindrod"]);
					$campos[eje_der]=strip_tags($_POST["txt_ejed"]);
					$campos[prisma_der]=strip_tags($_POST["txt_prismad"]);
					$campos[adicion_der]=strip_tags($_POST["txt_adiciond"]);
					$campos[altura_der]=strip_tags($_POST["txt_alturad"]);
					$campos[dnp_der]=strip_tags($_POST["txt_dnpd"]);					
					$campos[esfera_izq]=strip_tags($_POST["txt_esferai"]);
					$campos[cilindro_izq]=strip_tags($_POST["txt_cilindroi"]);
					$campos[eje_izq]=strip_tags($_POST["txt_ejei"]);
					$campos[prisma_izq]=strip_tags($_POST["txt_prismai"]);
					$campos[adicion_izq]=strip_tags($_POST["txt_adicioni"]);
					$campos[altura_izq]=strip_tags($_POST["txt_alturai"]);
					$campos[dnp_izq]=strip_tags($_POST["txt_dnpi"]);
					$campos[distancia]=strip_tags($_POST["txt_distancia"]);
					$campos[variedad]=strip_tags($_POST["txt_variedad"]);
					$campos[colores]=strip_tags($_POST["txt_colores"]);
					$campos[top_vision]=strip_tags($_POST["txt_vision"]);
					$campos[montura]=strip_tags($_POST["txt_montura"]);
					$campos[horizontal]=strip_tags($_POST["txt_horizontal"]);
					$campos[patilla]=strip_tags($_POST["txt_patilla"]);
					$campos[vertical]=strip_tags($_POST["txt_vertical"]);
					$campos[diagonal]=strip_tags($_POST["txt_diagonal"]);
					$campos[observaciones]=strip_tags($_POST["txt_observacion"]);					
					
					$db->getInsOrden($campos);

					header('Location: frm_pedidos.php?m=1');
					/*$ins=insertar("ingresos",$campos);
                    redireccionar("index1.php?op=$op&msg=Ingreso agregado!");*/
    break;
    
    
    case "Update":
                    $campos=Array();
                    $campos[optica]=strip_tags($_POST["id_optica"]);
                    $campos[nombre]=strip_tags($_POST["txt_nombre"]);
					$campos[no_control]=strip_tags($_POST["txt_control"]);
					$campos[paciente]=strip_tags($_POST["txt_paciente"]);
					$campos[esfera_der]=strip_tags($_POST["txt_esferad"]);
					$campos[cilindro_der]=strip_tags($_POST["txt_cilindrod"]);
					$campos[eje_der]=strip_tags($_POST["txt_ejed"]);
					$campos[prisma_der]=strip_tags($_POST["txt_prismad"]);
					$campos[adicion_der]=strip_tags($_POST["txt_adiciond"]);
					$campos[altura_der]=strip_tags($_POST["txt_alturad"]);
					$campos[dnp_der]=strip_tags($_POST["txt_dnpd"]);					
					$campos[esfera_izq]=strip_tags($_POST["txt_esferai"]);
					$campos[cilindro_izq]=strip_tags($_POST["txt_cilindroi"]);
					$campos[eje_izq]=strip_tags($_POST["txt_ejei"]);
					$campos[prisma_izq]=strip_tags($_POST["txt_prismai"]);
					$campos[adicion_izq]=strip_tags($_POST["txt_adicioni"]);
					$campos[altura_izq]=strip_tags($_POST["txt_alturai"]);
					$campos[dnp_izq]=strip_tags($_POST["txt_dnpi"]);
					$campos[distancia]=strip_tags($_POST["txt_distancia"]);
					$campos[variedad]=strip_tags($_POST["txt_variedad"]);
					$campos[colores]=strip_tags($_POST["txt_colores"]);
					$campos[top_vision]=strip_tags($_POST["txt_vision"]);
					$campos[montura]=strip_tags($_POST["txt_montura"]);
					$campos[horizontal]=strip_tags($_POST["txt_horizontal"]);
					$campos[patilla]=strip_tags($_POST["txt_patilla"]);
					$campos[vertical]=strip_tags($_POST["txt_vertical"]);
					$campos[diagonal]=strip_tags($_POST["txt_diagonal"]);
					$campos[observaciones]=strip_tags($_POST["txt_observacion"]);
					$campos[id_orden]=strip_tags($_POST["txt_idorden"]);
					
					$db->getUpdateOrden($campos);					
					header('Location: frm_pedidos.php?m=2');
					/*
                    $ins=actualizar("ingresos",$campos,"correlativo = '$pk'");
                    redireccionar("index1.php?op=$op&msg=Ingreso actualizado!");*/
    
    break;

	case "Delete":
					$campos[id_orden] = $_GET['id'];
					echo 'Esta info trae:  ' . $accion . ' y ' . $_GET['id'];
					
        			if($confirm=="Ok"){
    				      $db->getDeleteOrden($campos);
    			    }
        //redireccionar("index1.php?op=$op&ac=$ac&msg2=Ingreso eliminado!");
  break;
}
?>
