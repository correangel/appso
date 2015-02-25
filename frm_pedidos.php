<?php
	require('includes/fnc.php');
	require_once('class/class_db.php');	
	verifica_sesion();

	$cliente = $_SESSION['cliente'];
	$db = new Database();
		
		//obtiene datos de Cliente
		$datos_cliente = $db->getOrden($cliente);
		if (!$datos)
			{
				//echo 'esta pasando por aqui';				
			}
		foreach($datos_cliente as $dat):											 
				$optica = $dat['codigocliente'];
				$nombre = $dat['nombretrabajo'];				
		endforeach;		
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de Ordenes en Linea</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link type="text/css" href="styles/start/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
<script src="includes/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery-ui-1.8.23.custom.min.js"></script>
<script src="includes/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery.ui.datepicker-es.js"></script>
<script src="includes/jquery.magnific-popup.js"></script> 
<link href="includes/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="includes/magnific-popup.css"> 
<link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">
<script type="text/javascript" src="includes/interactions.js"></script>

<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #009;
}
body {
	background-color: #FFFFFF;
}
label.error {
	color:red;
}
.DDDD {
	font-family: "Comic Sans MS", cursive;
	color: #000;
}
.spaceField {	
	margin-bottom: 15px;
}
</style>
</head>

<body>
	<header>
		<div class="container" align="center">		
			<img src="images/LogoSO.png" width="349" height="198" />
		</div>
	</header>

	<div class="container spaceField" align="center">	
		<h4><strong>FORMULARIO DE ORDENES DE TRABAJO</strong></h4>
		<input name="button_search" type="button" class="btn btn-primary" id="button_add" value="AGREGAR" />
  		<input name="button_buscar" type="button" class="btn btn-primary" id="button_buscar" value="CONSULTAR" />
  		<input name="button_back" type="button" class="btn btn-primary" id="button_back" value="MENU PRINCIPAL" />
  		<input name="button_logout" type="button" class="btn btn-danger" id="button_logout" value="SALIR" />
	</div>	
	
	<div class="container" style="display:none" id="consulta" align="center">		
		<input name="txt_codOptica" type="hidden" id="txt_codOptica" value="<?= $cliente ?>" size="5" />
		No. de Orden:
		<input name="txt_busca_numero" type="text" class="required" id="txt_busca_numero" value="" size="5" />
		<input name="button_search" type="button" class="btn btn-success" id="button_search" value="BUSCAR" />  
	</div>
	<br />
	<div class='container' style="display:none" id="ingreso">
		<form id="form1" name="form1" method="post" action="mnt_ordenes.php" >
					
			<div class="container row">
				<article class="col-md-3">
					<label for='id_optica'>Nombre de la Optica:</label>
				</article>
				<article class="col-md-5">
					<input name="id_optica" type="hidden" id="id_optica" value="<?= $cliente ?>" />
					<input name="txt_nombre" type="text" class="form-control input-sm" id="txt_nombre" value="<?= $nombre ?>" disabled />
					<!--<?=$info[id_lote];?><select name="id_optica" id="id_optica" class="textbox form-control input-sm" >
					                        <?php $db = new Database();
												$db->getOpciones('cliente','codigocliente','nombretrabajo');
											?>										    
			        		            </select>-->			        			        
				</article>
			</div>

			<hr />

			<div class="container" align="center">	
				<h4><strong>DATOS DE LA RECETA</strong></h4>
			</div>

			<div class="container row" align="left">
				<article class="col-md-2">
					<label for='txt_control'>No. de Control</label>
				</article>
				<article class="col-md-6">
					<label for='txt_paciente'>Nombre</label>
				</article>
			</div>

			<div class="container row spaceField align="center" ">
				<article class="col-md-2">
					<input name="txt_control" type="text" class="required form-control input-sm" id="txt_control" value="" size="15" />
				</article>
				<article class="col-md-6">
					<input name="txt_paciente" type="text" class="required form-control input-sm" id="txt_paciente" value="" size="75" />
				</article>
			</div>

			<hr />

			<!--Sección Selección de Variedad -->
			<div class="container row spaceField" align="center">
				<article class="col-md-3">
					<label for="txt_variedad">VARIEDAD DE LENTE</label>
				</article>
				<article class="col-md-6">
					<textarea name="txt_variedad" rows="2" cols="74" class="textbox form-control" id="txt_variedad" type="text" ></textarea>
				</article>
				<article class="col-md-2">
					<input name="buttonv" type="button" class="btn btn-primary" id="buttonv" value="Seleccionar" />
				</article>	
			</div>

			<div class="container" style="display:none" id="informacion">

				<div class="container row" align="center">
					<h3><small>POR FAVOR SELECCIONE SU CONFIGURACION</small></h3>
				</div>

				<div class="container row">
					<div class="col-md-2">
						<label for="tecnologia">TECNOLOGIA</label>
					</div>
					<div class="col-md-2 question2" style="display:none">
						<label for="focalidad">FOCALIDAD</label>
					</div>
					<div class="col-md-2 question3" style="display:none">
						<label for="material">MATERIAL</label>
					</div>
					<div class="col-md-2 question4" style="display:none">
						<label for="color">COLOR</label>
					</div>
					<div class="col-md-2 question5" style="display:none">
						<label for="marca">MARCA</label>
					</div>
				</div>

				<div class="container row">
					<div class="col-md-2">
						<input name="op_tipo" type="radio" class="required " id="op_tipo" value="Convencional" /> Convencional
					</div>
					<div class="col-md-2 question2" style="display:none">
						<input name="op_focal" type="radio" class="required " id="op_focal" value="Monofocal" /> Monofocal
					</div>
					<div class="col-md-2 question3" style="display:none">
						<input name="op_material" type="radio" class="required " id="op_material" value="Policarbonato" /> Policarbonato
					</div>
					<div class="col-md-2 question4" style="display:none">
						<input name="op_color" type="radio" class="required " id="op_color" value="Blanco" /> Blanco
					</div>
					<div class="col-md-2 question5" style="display:none">
						<input name="op_marca" type="radio" class="required " id="op_marca" value="CZ" /> Carl Zeiss
					</div>
				</div>

				<div class="container row">
					<div class="col-md-2">
						<input name="op_tipo" type="radio" class="required" id="op_tipo2" value="Basic Vision" /> Basic Vision
					</div>
					<div class="col-md-2 question2" style="display:none">
						<input name="op_focal" type="radio" class="required " id="op_focal2" value="Bifocal" /> Bifocal
					</div>
					<div class="col-md-2 question3" style="display:none">
						<input name="op_material" type="radio" class="required" id="op_material2" value="Plastico" /> Plástico
					</div>
					<div class="col-md-2 question4" style="display:none">
						<input name="op_color" type="radio" class="required" id="op_color2" value="Brown" /> Café
					</div>
					<div class="col-md-2 question5" style="display:none">
						<input name="op_marca" type="radio" class="required " id="op_marca2" value="VE" /> Vision Easy
					</div>
				</div>

				<div class="container row">
					<div class="col-md-2">
						<input name="op_tipo" type="radio" class="required" id="op_tipo3" value="Perfect Vision" /> Perfect Vision
					</div>
					<div class="col-md-2 question2" style="display:none">
						<input name="op_focal" type="radio" class="required " id="op_focal3" value="Progresivo" /> Progresivo
					</div>	
					<div class="col-md-2 col-md-offset-2 question4" style="display:none">
						<input name="op_color" type="radio" class="required" id="op_color3" value="Gray" /> Gris
					</div>	
					<div class="col-md-2 question5" style="display:none">
						<input name="op_marca" type="radio" class="required " id="op_marca3" value="SO" /> Solución Optica
					</div>					
				</div>

				<div class="container row">
					<div class="col-md-2">
						<input name="op_tipo" type="radio" class="required" id="op_tipo4" value="Precise Form" /> Precise Form
					</div>	
					<div class="col-md-2 col-md-offset-4 question4" style="display:none">
						<input name="op_color" type="radio" class="required" id="op_color4" value="Oro" /> Otro
					</div>					
				</div>

				<div class="container row" align="center">
					<div class="col-md-2">
						<input name="txt_familia" class="form-control input-sm" type="hidden" id="txt_familia" value="Convencional" />
					</div>
					<div class="col-md-2">
						<input name="txt_focalidad" class="form-control input-sm" type="hidden" id="txt_focalidad" value="Monofocal" />
					</div>
					<div class="col-md-2">
						<input name="txt_material" class="form-control input-sm" type="hidden" id="txt_material" value="Policarbonato" />
					</div>
					<div class="col-md-2">
						<input name="txt_color" class="form-control input-sm" type="hidden" id="txt_color" value="Blanco" />
					</div>
					<div class="col-md-2">
						<input name="txt_marca" class="form-control input-sm" type="hidden" id="txt_marca" value="CZ" />
					</div>					
				</div>
				<div class="container row spaceField" align="center">
						<input name="buttonok" type="button" class="btn btn-primary" id="buttonok" value="Listo!" />
				</div>

				<div class="container spaceField" style="display:none" id="opciones">
					<div class="container row" align="center">
						<h3><small>POR FAVOR SELECCIONE OPCION</small></h3>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var1" value="" /> 
							<input name="txt_var1" type="text" class="required" id="txt_var1" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var2" value="" /> 
							<input name="txt_var2" type="text" class="required" id="txt_var2" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var3" value="" />  
							<input name="txt_var3" type="text" class="required" id="txt_var3" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var4" value="" />  
							<input name="txt_var4" type="text" class="required" id="txt_var4" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var5" value="" />   
							<input name="txt_var5" type="text" class="required" id="txt_var5" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var6" value="" />   
							<input name="txt_var6" type="text" class="required" id="txt_var6" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var7" value="" />    
							<input name="txt_var7" type="text" class="required" id="txt_var7" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var8" value="" />    
							<input name="txt_var8" type="text" class="required" id="txt_var8" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var9" value="" />     
							<input name="txt_var9" type="text" class="required" id="txt_var9" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var10" value="" />     
							<input name="txt_var10" type="text" class="required" id="txt_var10" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var11" value="" />      
							<input name="txt_var11" type="text" class="required" id="txt_var11" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var12" value="" />      
							<input name="txt_var12" type="text" class="required" id="txt_var12" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var13" value="" />       
							<input name="txt_var13" type="text" class="required" id="txt_var13" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var14" value="" />       
							<input name="txt_var14" type="text" class="required" id="txt_var14" value="" size="55" />
						</article>
					</div>

					<div class="container row" align="left">
						<article class="col-md-6 ">
							<input name="opcion_var" type="radio" class="required" id="opcion_var15" value="" />        
							<input name="txt_var15" type="text" class="required" id="txt_var15" value="" size="55" />
						</article>
						<article class="col-md-6">
							<input name="opcion_var" type="radio" class="required" id="opcion_var16" value="" />        
							<input name="txt_var16" type="text" class="required" id="txt_var16" value="" size="55" />
						</article>
					</div>
				</div>
			</div>		

			<hr />

			<div class="container row" align="center">
				<article class="col-md-1">
					<label for="ojo">OJO</label> 
				</article>
				<article class="col-md-1">
					<label for="esfera">ESFERA</label>
				</article>
				<article class="col-md-1">
					<label for="cilindro">CILINDRO</label>
				</article>
				<article class="col-md-1">
					<label for="eje">EJE</label>
				</article>
				<article class="col-md-1">
					<label for="prisma">PRISMA</label>
				</article>
				<article class="col-md-1">
					<label for="adicion">ADICION</label>
				</article>
				<article class="col-md-1">
					<label for="altura">ALTURA</label>
				</article>
				<article class="col-md-1">
					<label for="dnp">DNP</label>
				</article>
				<article class="col-md-1">
					<p>&nbsp;</p>
				</article>
				<article class="col-md-2">
					<label for="distancia">DISTANCIA</label>
				</article>
			</div>
			

			<div class="container row" align="center">
				<article class="col-md-1">
					<label for="ojod">O.D</label>
				</article>
				<article class="col-md-1" align="center">
					<input name="txt_esferad" type="text" class="form-control input-sm" id="txt_esferad" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_cilindrod" type="text" class="form-control input-sm" id="txt_cilindrod" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_ejed" type="text" class="form-control input-sm" id="txt_ejed" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_prismad" type="text" class="form-control input-sm" id="txt_prismad" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_adiciond" type="text" class="form-control input-sm" id="txt_adiciond" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_alturad" type="text" class="form-control input-sm" id="txt_alturad" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_dnpd" type="text" class="form-control input-sm" id="txt_dnpd" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="buttoni" type="button" class="btn btn-info" id="buttoni" value="Info" />
				</article>
				<article class="col-md-2">
					<label for="inter">INTER PUPILAR</label>
				</article>			
			</div>

			<div class="container row spaceField" align="center">
				<article class="col-md-1">
					<label for="ojoi">O.I</label>
				</article>
				<article class="col-md-1">
					<input name="txt_esferai" type="text" class="form-control input-sm" id="txt_esferai" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_cilindroi" type="text" class="form-control input-sm" id="txt_cilindroi" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_ejei" type="text" class="form-control input-sm" id="txt_ejei" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_prismai" type="text" class="form-control input-sm" id="txt_prismai" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_adicioni" type="text" class="form-control input-sm" id="txt_adicioni" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_alturai" type="text" class="form-control input-sm" id="txt_alturai" value="" size="15" />
				</article>
				<article class="col-md-1">
					<input name="txt_dnpi" type="text" class="form-control input-sm" id="txt_dnpi" value="" size="15" />
				</article>
				<article class="col-md-1">
					<p>&nbsp;</p>
				</article>
				<article class="col-md-2">
					<input name="txt_distancia" type="text" class="form-control input-sm" id="txt_distancia" value="" size="15" />
				</article>			
			</div>

			<hr />

			<div class="container row spaceField" align="center">
				<article class="col-md-3">
					<label for="colores">COLORES ESPECIALES</label>
				</article>
				<article class="col-md-6">
					<textarea name="txt_colores" rows="2" cols="74" class="textbox form-control" id="txt_colores" type="text" ><?=$info[observacion];?></textarea>
				</article>
				<article class="col-md-2">						
					<input type="checkbox" name="txt_vision" id="txt_vision"><label for="topVision"> TOP VISION</label>
				</article>	
			</div> 

			<hr />

			<div class="container row " align="center">
				<article class="col-md-6">
					<label for="txt_montura">DATOS DE LA MONTURA</label>
				</article>
				<article class="col-md-1">
					<label for="txt_horizontal">H</label>
				</article>
				<article class="col-md-1">
					<label for="txt_patilla">P</label>
				</article>
				<article class="col-md-1">
					<label for="txt_vertical">V</label>
				</article>
				<article class="col-md-1">
					<label for="txt_diagonal">D</label>
				</article>
				<article class="col-md-1">
					<p>&nbsp;</p> 
				</article>
			</div>

			<div class="container row spaceField" align="center">
				<article class="col-md-6">
					<input name="txt_montura" type="text" class="required form-control" id="txt_montura" value="" size="55" placeholder="Es Montura Cerrada? Ranurada? ó con Perforaciones... Cuantas?" />
				</article>
				<article class="col-md-1">
					<input name="txt_horizontal" type="text" class="required form-control" id="txt_horizontal" value="" />
				</article>
				<article class="col-md-1">
					<input name="txt_patilla" type="text" class="required form-control" id="txt_patilla" value="" size="6" />
				</article>
				<article class="col-md-1">
					<input name="txt_vertical" type="text" class="required form-control" id="txt_vertical" value="" size="6" />
				</article>
				<article class="col-md-1">
					<input name="txt_diagonal" type="text" class="required form-control" id="txt_diagonal" value="" size="6" />
				</article>
				<article class="col-md-1">
					<input name="buttoni2" type="button" class="btn btn-info" id="buttoni2" value="Info" /> 
				</article>
			</div>

			<hr />

			<div class="container row spaceField" align="center">
				<article class="col-md-8">
					<label for="txt_adicionales">OBSERVACIONES O INDICACIONES ADICIONALES:</label>
				</article>
			</div>

			<div class="container row spaceField" align="center">
				<article class="col-md-8">
					<textarea name="txt_observacion" rows="2" cols="74" class="textbox form-control" id="txt_observacion" type="text" ></textarea>
				</article>
				<article class="col-md-2">
					<input name="buttons" type="button" class="btn btn-primary" id="buttons" value="Servicios" />
				</article>			
			</div>		

			<div style="display:none" id="servicios">
				<table width="300" align="center" border="0">
				  <tr><td align="center">Agregar Servicios</td></tr>
				  <tr>
				  	<td><input type="checkbox" name="txt_servicio[]" id="txt_servicio" value=" APLICACION LAKA">APLICACION LAKA</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio2" value=" CAMBIO DE FORMA">CAMBIO DE FORMA</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio3" value=" DOS CARAS (BICONVEXO)">DOS CARAS</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio4" value=" ENDURECIDO">ENDURECIDO</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio5" value=" FACETADO">FACETADO</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio6" value=" GRAPAS">GRAPAS</td>
				  <tr>
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio7" value=" MONTAJE">MONTAJE</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio8" value=" MONTAJE ARO DE SOL">MONTAJE ARO DE SOL</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio9" value=" MONTAJE OAKLEY">MONTAJE OAKLEY</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio10" value=" PERFORACIONES">PERFORACIONES</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio11" value=" PINTAR ARO">PINTAR ARO</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio12" value=" PLAQUETAS">PLAQUETAS</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio13" value=" RANURADO">RANURADO</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio14" value=" RLX">RLX</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio15" value=" SERVICIO PLUSS">SERVICIO PLUSS</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio[]" id="txt_servicio16" value=" SERVICIO EXPRESS">SERVICIO EXPRESS</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio" id="txt_servicio17" value=" TINTE">TINTE</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio" id="txt_servicio18" value=" TOP VISION">TOP VISION</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio" id="txt_servicio19" value=" TORNILLO">TORNILLO</td>
				  </tr>  
				    <td><input type="checkbox" name="txt_servicio" id="txt_servicio20" value=" TUERCA">TUERCA</td>
				  <tr>  
				    <td><input type="checkbox" name="txt_servicio" id="txt_servicio21" value=" UV">UV</td>
				  </tr>
				  <tr>  
				    <td align="center"><input name="buttono" type="button" class="" id="buttono" value="CERRAR" /></td>
				  </tr>
				</table>
			</div>	
	
	 		<input name="tipo_trn" type="hidden" id="tipo_trn" value="Add" />
			<input name="txt_idorden" type="hidden" id="txt_idorden" value="" />
			<input name="txt_mailDestino" type="hidden" id="txt_mailDestino" value="raures01@gmail.com;safcrace@gmail.com">
			<input name="txt_mailOrigen" type="hidden" id="txt_mailOrigen" value="info@solucionoptica.com">			
			<input name="txt_asunto" type="hidden" id="txt_asunto" value="Nuevo Pedido en Linea">
			
			<p align="center"><input name="buttong" type="submit" class="btn btn-primary" id="buttong" value="Guardar" /></p>
			<p align="center"><input name="buttonm" type="submit" class="btn btn-primary" id="buttonm" value="Modificar" /> | <input name="buttone" type="button" class="btn btn-danger" id="buttone" value="Eliminar" /> </p>
		</form>

		<div class="container" align="center">	
			<input name="txtmensaje" type="text" class="lblsky" id="txtmensaje" value="" size="70" readonly="readonly" align="middle" />
		</div>
	</div>

<div class="container" style="display:block" id="message">
	<?php
		if (isset($_GET) and $_GET["m"]==1)
		{
			?>
		    <h3 align="center" style="color:#06F">El Registro se ha creado satisfactoriamente</h3>
		    <?php	
			
		} elseif (isset($_GET) and $_GET["m"]==2) {
			?>
		    <h3 align="center" style="color:#06F">El Registro se ha modificado satisfactoriamente</h3>
		    <?php	
		} elseif (isset($_GET) and $_GET["m"]==3){
			?>
		    <h3 align="center" style="color:#06F">El Registro se ha eliminado satisfactoriamente</h3>
		    <?php	
		}
	?>
</div>



</body>
</html>