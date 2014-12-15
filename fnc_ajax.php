<?
require_once('includes/fnc.php');
require_once('class/class_db.php');
$db = new Database();

switch($op){
	
	case "reload_total":
			switch ($prove){
				case "Decameron":
					$array[0] 	= 	$val * 2400;                      //fetch result    
					echo json_encode($array);
			    break;
				case "Tour Santiago Bernabeu":
					$array[0] 	= 	$val * 22000;                      //fetch result    
					echo json_encode($array);
			    break;
				case "Tour Camp Nou":
					$array[0] 	= 	$val * 23000;                      //fetch result    
					echo json_encode($array);
			    break;
				case "Tour Canal de Panama":
					$array[0] 	= 	$val * 8000;                      //fetch result    
					echo json_encode($array);
			    break;
				case "Casa Santo Domingo":
					$array[0] 	= 	$val * 4000;                      //fetch result    
					echo json_encode($array);
			    break;
				case "Paquete Roatan":
					$array[0] 	= 	$val * 8000;                      //fetch result    
					echo json_encode($array);
			    break;
				default:			
					$array[0] 	= 	$val * 200;                      //fetch result    
					echo json_encode($array);
				break;
			}
	break;
	
	case "reload_mail":			
			if(mail($des,$asu,$men,$rem))
			{
				$array[0] 	= 	'                   Gracias por Participar. Solicitud de canje enviada con exito!!!';
				echo json_encode($array); 
			}
			else
			{
				$array[0] 	=	 '                         Fallo al enviar la Solicitud de Canje';
				echo json_encode($array);
			}
	break;

	case "reload_mailPedido":			
			$datos = $db->getOrden($id);
			foreach($datos as $dat):											 
						$optica = $dat['nombretrabajo'];
			endforeach;
			$men = "Orden de Pedido en Linea realizado por $optica";
			
			if(mail($des,$asu,$men,$rem))
			{
				$array[0] 	= 	'                   Gracias por su Pedido. Pedido en Linea enviado con exito!!!';
				echo json_encode($array); 
			}
			else
			{
				$array[0] 	=	 '                         Fallo al enviar la Solicitud de Canje';
				echo json_encode($array);
			}
			
	break;
	
	case "reload_buscara":
			$datos = $db->getDatosOrdenId($id,$optica);
			if (!$datos)
			{
				//echo 'esta pasando por aqui';
				
			}
			foreach($datos as $dat):											 
					$array[0] 		= 	$dat['optica'];
					$array[1] 		=	$dat['no_control'];
					$array[2]		=	$dat['paciente'];
					$array[3]		=	$dat['esfera_der'];
					$array[4]		=	$dat['cilindro_der'];
					$array[5]		=	$dat['eje_der'];
					$array[6]		=	$dat['prisma_der'];
					$array[7]		=	$dat['adicion_der'];
					$array[8]		=	$dat['altura_der'];
					$array[9]		=	$dat['dnp_der'];
					$array[10]		=	$dat['esfera_izq'];
					$array[11]		=	$dat['cilindro_izq'];
					$array[12]		=	$dat['eje_izq'];
					$array[13]		=	$dat['prisma_izq'];
					$array[14]		=	$dat['adicion_izq'];
					$array[15]		=	$dat['altura_izq'];
					$array[16]		=	$dat['dnp_izq'];
					$array[17]		=	$dat['distancia'];
					$array[18]		=	$dat['variedad'];
					$array[19]		=	$dat['colores'];	
					$array[20]		=	$dat['top_vision'];
					$array[21]		=	$dat['montura'];
					$array[22]		=	$dat['horizontal'];
					$array[23]		=	$dat['patilla'];
					$array[24]		=	$dat['vertical'];
					$array[25]		=	$dat['diagonal'];
					$array[26]		=	$dat['observaciones'];
					$array[27]		=	$dat['id_orden'];
			endforeach;
			$array[28]	=	'Update';
			$array[29]  =   'Poly Blanco  Multifocal 72 Compac Ultra CZ';
			echo json_encode($array);
	break;
	
	case "reload_variedad":			
			$qry	=	'select variedad from combinaciones where familia = ' . "'$tipo'" . ' AND material = ' . "'$material'" . ' AND color = ' . "'$color'" ;
			
			
			$datos = $db->getCombiVariedad($qry);
			$i=0;
			foreach($datos as $dat):	
					$array[$i] = $dat['variedad'];
					$i=$i+1;					
			endforeach;				
			echo json_encode($array);			
	break;
	
	case "reload_servicio":					
			
			$array[0] = $servicios;

			echo json_encode($array);			
	break;
}

?>