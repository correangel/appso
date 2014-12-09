<?PHP
	require_once('includes/fnc.php');
	require_once('class/class_db.php');	
	verifica_sesion();	
	//conectado();
		$tarjeta = "'" . $_SESSION['afi_tarjeta'] . "'";
		$db = new Database();		
		
		//obtiene datos de Tarjeta
		$datos_tarjeta = $db->getDatosTarjeta($tarjeta);
		if (!$datos)
			{
				//echo 'esta pasando por aqui';
				
			}
		foreach($datos_tarjeta as $dat):
				$tarjeta 	=$dat['plastico_no'];											 
				$apellidos = $dat['Apellido_afiliado'];
				$nombre    = $dat['Nombre_afiliado'];				
				$saldo_act = $dat['saldo_actual'];
				$email	   = $dat['email'];				
		endforeach;
		
		

		$saldo_sub = 0;
		//obtiene datos de canje segun proveedor
		if ($_POST['txtopcion'] = 'Max Distelsa' and $_POST['txtcan'] >= 1)
		{
			$canje  	=	'</br>Proveedor:  ' . $_POST['txtopcion'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total']) . '</br>' . '</br>';
			$canjefin  	=	'PROVEEDOR:  ' . $_POST['txtopcion'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total'];		
		}
		if ($_POST['txtopcion2'] = 'Figaly' and $_POST['txtcan2'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion2'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan2']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total2']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion2'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan2']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total2']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total2'];
		}
		if ($_POST['txtopcion3'] = 'Siman' and $_POST['txtcan3'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion3'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan3']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total3']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion3'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan3']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total3']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total3'];
		}
		if ($_POST['txtopcion4'] = 'Walmart' and $_POST['txtcan4'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion4'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan4']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total4']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion4'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan4']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total4']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total4'];
		}
		if ($_POST['txtopcion5'] = 'Cemaco' and $_POST['txtcan5'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion5'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan5']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total5']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion5'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan5']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total5']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total5'];
		}
		if ($_POST['txtopcion6'] = 'Tre Fratelli' and $_POST['txtcan6'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion6'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan6']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total6']) . '</br>' . '</br>';
			$canjefin  	.=	'PROVEEDOR:  ' . $_POST['txtopcion6'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan6']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total6']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total6'];
		}
		if ($_POST['txtopcion7'] = 'Tony Romas' and $_POST['txtcan7'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion7'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan7']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total7']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion7'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan7']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total7']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total7'];
		}
		if ($_POST['txtopcion8'] = 'Hacienda Real' and $_POST['txtcan8'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion8'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan8']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total8']) .  '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion8'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan8']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total8']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total8'];
		}
		if ($_POST['txtopcion9'] = 'MD Zapateria' and $_POST['txtcan9'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion9'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan9']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total9']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion9'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan9']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total9']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total9'];
		}
		if ($_POST['txtopcion10'] = 'Decameron' and $_POST['txtcan10'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion10'] . '</br>';			
			$canje		.=  'Valor Producto: 2,400 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan10']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total10']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion10'] . '.  ';			
			$canjefin	.=  'Valor Producto: 2,400 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan10']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total10']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total10'];
		}
		if ($_POST['txtopcion11'] = 'De Museo' and $_POST['txtcan11'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion11'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan11']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total11']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion11'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan11']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total11']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total11'];
		}
		if ($_POST['txtopcion121'] = 'Figaly' and $_POST['txtcan12'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion2'] . '</br>';			
			$canje		.=  'Valor Producto: 200 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan2']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total2']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion13'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan12']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total12']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total12'];
		}
		if ($_POST['txtopcion13'] = 'Tour Santiago Bernabeu' and $_POST['txtcan13'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion13'] . '</br>';			
			$canje		.=  'Valor Producto: 22,000 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan13']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total13']) . '</br>' . '</br>';
			$canjefin  	=	'  PROVEEDOR:  ' . $_POST['txtopcion13'] . ".  ";		
			$canjefin	.=  'Valor Producto: 200 pts.' . "  ";
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan13']) . ".  ";
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total13']) . ".  ";
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total13'];
		}
		if ($_POST['txtopcion14'] = 'Tour Camp Nou' and $_POST['txtcan14'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion14'] . '</br>';			
			$canje		.=  'Valor Producto: 23,000 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan14']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total14']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion14'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan14']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total14']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total14'];
		}
		if ($_POST['txtopcion15'] = 'Tour Canal de Panama' and $_POST['txtcan15'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion15'] . '</br>';			
			$canje		.=  'Valor Producto: 8,000 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan15']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total15']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion15'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan15']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total15']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total15'];
		}
		if ($_POST['txtopcion16'] = 'Casa Santo Domingo' and $_POST['txtcan16'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion16'] . '</br>';			
			$canje		.=  'Valor Producto: 4,000 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan16']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total16']) . '</br>' . '</br>';
			$canjefin  	.=	'PROVEEDOR:  ' . $_POST['txtopcion16'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan16']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total16']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total16'];
		}
		if ($_POST['txtopcion17'] = 'Paquete Roatan' and $_POST['txtcan17'] >= 1)
		{
			$canje  	.=	'Proveedor:  ' . $_POST['txtopcion17'] . '</br>';			
			$canje		.=  'Valor Producto: 8,000 pts.' . '</br>';
			$canje    	.=  'Cantidad de Productos:  ' . ($_POST['txtcan17']) . '</br>';
			$canje		.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total17']) . '</br>' . '</br>';
			$canjefin  	.=	'  PROVEEDOR:  ' . $_POST['txtopcion17'] . '.  ';			
			$canjefin	.=  'Valor Producto: 200 pts.' . '  ';
			$canjefin  	.=  'Cantidad de Productos:  ' . ($_POST['txtcan17']) . '.  ';
			$canjefin	.=  'Cantidad de Puntos Canjeados:  ' . ($_POST['txt_total17']) . '.  ';
			$saldo_sub  = 	$saldo_sub + $_POST['txt_total17'];
		}
		
		
		$fecha 		= 	date('d-m-Y');
		$hora 		= 	date('H:i:s');
		$destino	=	'sopuntos@solucionoptica.com'; //safcrace@gmail.com
		$desde		=	$email;
		$asunto		=	'Solicitud de Canje Tarjeta SOPuntos ' . $tarjeta;
		$nuevo_sal  =   $saldo_act-$saldo_sub;
				
	$mensaje = "
	\n
		Nombre: $nombre $apellidos \n
		Tarjeta: $tarjeta \n
		Saldo de Puntos: $saldo_act \n
		Total Puntos Canjeados: $saldo_sub \n
		Nuevo Saldo: $nuevo_sal \n
		***** Datos del Canje ***** \n
		$canjefin
	\n ";
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Envio de Canje</title>
<link type="text/css" href="styles/start/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
<script src="includes/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery-ui-1.8.23.custom.min.js"></script>
<script src="includes/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery.ui.datepicker-es.js"></script>
<link href="includes/estilo.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function () {
	$("#buttony").click(function(evento){	
		valdest  	=	$("#txtdestino").val();;
		valasun		=	$("#txtasunto").val();
		valcont		= 	$("#txtcontenido").val();
		valdesd		=	$("#txtdesde").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_mail",des: valdest, asu: valasun, men: valcont, rem: valdesd},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txtmensaje').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#buttonn").click(function(evento){		
		window.location = 'frm_catalogo.php';		
	});
})
</script>    
</head>

<body>
                            
                            
<table width="800" align="center" border="0">
  <tr>
  	<td align="center"><blockquote>
   		<p><img src="images/LogoSO.png" width="349" height="198" /></p>
  	</blockquote></td>   
  </tr>
  <tr>
	<td align="center"><h2 align="center">Confirmación de Canje</h2></td>
</tr>
</table>
<p> </p>

<table width="600" align="center" border="0">
  <tr>
    <td width="30%" class="lblnegra">Afiliado(a):</td>
    <td width="70%" class="lblgris" ><? echo $apellidos . ', ' . $nombre;?></td>
  </tr>
  <tr>
    <td width="30%" class="lblnegra">Tarjeta:</td>
    <td width="70%" class="lblgris" ><? echo $tarjeta;?></td>
  </tr>
  <tr>
    <td width="30%" class="lblnegra">Saldo de Puntos:</td>
    <td width="70%" class="lblgris" ><? echo $saldo_act?></td>
  </tr>
  <tr>
  	<td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="lblnegra">Datos del Canje</td>
  </tr>
  <tr>
    <td width="30%" class="lblnegra">Detalle:</td>
    <td width="70%" class="lblgris" ><? echo $canje;?></td>
  </tr>  
  <tr>
    <td width="30%" class="lblnegra">Total Puntos Canjeados:</td>
    <td width="70%" class="lblgris"><? echo $saldo_sub;?></td>
  </tr>
  <tr>
    <td width="30%" class="lblnegra">Nuevo Saldo:</td>
    <td width="70%" class="lblgris"><? echo $nuevo_sal;?></td>
  </tr>
  <tr>
    <td width="30%" class="lblnegra">Fecha:</td>
    <td width="70%" class="lblgris"><? echo $fecha;?></td>
  </tr>

</table>

<p>&nbsp;</p>

<table align="center" width="800" border="0" cellspacing="0" cellpadding="0">
<form class="cmxform" action="enviar.php" method="post" id="formcon">
  <tr>
    <td align="center" colspan="2" class="lblnaranja">La Información de su Solicitud de canje es correcta?</td>    
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td align="right" width="50%"><input name="buttony" type="button" class="" id="buttony" value="SI, ENVIAR SOLICITUD" /></td>
    <td align="left" width="50%"><input name="buttonn" type="button"  class="" id="buttonn" value="NO, IR A CATALOGO" /></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td align="center" colspan="2"><input name="txtmensaje" type="text" class="lblsky" id="txtmensaje" value="" size="70" readonly="readonly" align="middle" /></td>
  </tr>  
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td align="center" width="50%"><input name="txtdestino" type="hidden" class="" id="txtdestino" value="<?=$destino;?>" /></td>
    <td align="center" width="50%"><input name="txtasunto" type="hidden" class="" id="txtasunto" value="<?=$asunto;?>" /></td>
  </tr>  
  <tr>
    <td align="center" width="50%"><input name="txtcontenido" type="hidden" class="" id="txtcontenido" value="<?=$mensaje;?>"/></td>
    <td align="center" width="50%"><input name="txtdesde" type="hidden" class="" id="txtdesde" value="<?=$desde;?>" /></td>
  </tr>
</form>
</table>




<p>&nbsp;</p>

</body>
</html>
