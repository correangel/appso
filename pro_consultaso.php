<?php
	require_once('includes/fnc.php');
	require_once('class/class_db.php');	
	verifica_sesion();	
		
		//conectado();
		$tarjeta = "'" . $_SESSION['afi_tarjeta'] . "'";		
		$fechai  = fechabd($_POST['txtfechai']);
		$fechaf  = fechabd($_POST['txtfechaf']);			
		$db = new Database();
		
		//obtiene datos de Tarjeta
		$datos_tarjeta = $db->getDatosTarjeta($tarjeta);
		if (!$datos)
			{
				//echo 'esta pasando por aqui';
				
			}
		foreach($datos_tarjeta as $dat):											 
				$apellidos = $dat['Apellido_afiliado'];
				$nombre    = $dat['Nombre_afiliado'];
				$categoria = $dat['TipoPlastico'];
				$saldo_ant = $dat['saldo_anterior'];
				$puntos_ob = $dat['ventas_mes_C'];
				$puntos_pe = $dat['ventas_mes_X'];
				$puntos_ca = $dat['canjes_mes'];
				$saldo_act = $dat['saldo_actual'];
				$codigo    = $dat['codigocliente'];
		endforeach;
			
		//obtiene datos de Empresa			
		$empresa = $db->getDatosEmpresa($codigo);
		foreach($empresa as $emp):											 
				$nom_empresa = $emp['razonsocial'];
		endforeach;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estado de Cuenta Tarjeta SO Puntos</title>
<script src="includes/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/jquery-ui-1.8.23.custom.min.js"></script>
        <script src="includes/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/jquery.ui.datepicker-es.js"></script>
        <link type="text/css" href="styles/start/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <link href="bootstrap/css/so.css" rel="stylesheet" media="screen">
                <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
                            <div class="container">
                            
                            <div class="span12 text-center">
                                
<table width="800" align="center" border="0">
<tr>
  <td align="center"><img src="images/LogoSO.png" width="349" height="198" /></td>
</tr>
<tr>
  <td align="center"><h2 align="center">Estado de Cuenta Tarjeta SO Puntos</h2></td>
</tr>
</table>
<p>&nbsp;</p>
<table width="800" border="0" cellpadding="0" cellspacing="1" align="center">
  <tr>
    <td width="17%">Nombre Afiliado:</td>
    <td><?php echo $apellidos . ', ' . $nombre; ?></td>
  </tr>
  <tr>
    <td width="15%">Empresa:</td>
    <td><?php echo $nom_empresa; ?></td>
  </tr>
  <tr>
    <td width="15%">Categoria:</td>
    <td><?php echo $categoria; ?></td>
  </tr>
  
</table>
<p>&nbsp;</p>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center" bordercolor="#FFFFFF">RESUMEN DE PUNTOS  A LA FECHA</td>
  </tr>
  <tr>
    <td align="center">SALDO ANTERIOR</td>
    <td align="center">PUNTOS OBTENIDOS</td>
    <td align="center">PUNTOS POR OBTENER</td>
    <td align="center">PUNTOS CANJEADOS</td>
    <td align="center">SALDO ACTUAL</td>
  </tr>
  <tr>
    <td align="center"><?php echo $saldo_ant; ?></td>
    <td align="center"><?php echo $puntos_ob; ?></td>
    <td align="center"><?php echo $puntos_pe; ?></td>
    <td align="center"><?php echo $puntos_ca; ?></td>
    <td align="center"><?php echo $saldo_act; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="800" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bordercolorlight="#FFFFFF">
    <td colspan="4" align="center" bordercolorlight="#FFFFFF">DETALLE DE PUNTOS OBTENIDOS DEL <?php echo fecha($fechai); ?> AL <?php echo fecha($fechaf); ?></td>
  </tr>
  <tr>
    <td align="center" width="17%">FECHA TRANSACCION</td>
    <td align="center" width="50%">DESCRIPCION</td>
    <td align="center" width="16%">PUNTOS OBTENIDOS</td>
    <td align="center" width="17%">ESTADO</td>
  </tr>
  <?php
  //obtiene detalle de puntos
		$detalle = $db->getDetalleTarjeta($tarjeta,$fechai,$fechaf);		
		foreach($detalle as $det):
  
              if ((int)$det['estado']<1)
			  {
				  $status = 'PENDIENTES';
			  }
			  else
			  {
				  $status = 'DISPONIBLES';
			  }
	?>
              <tr>
                <td align="center"><?php echo fecha($det['fecha_transac']); ?></td>
                <td align="center"><?php echo $det['descripcion_transac']; ?></td>
                <td align="center"><?php echo $det['cantidad']; ?></td>
                <td align="center"><?php echo $status; ?></td>
              </tr>
  <?php
  //$nom_empresa = $emp['razonsocial'];
  		endforeach;
  ?>
</table>
<p>&nbsp;</p>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="34%" valign="middle"><div align="center"><a href="frm_consultapts.php" class="link_little"><img src="images/boton_consultar.jpg" width="152" height="50" border="0" /><br />Nueva Consulta</a></div></td>
    <td width="33%" valign="middle"><div align="center"><a href="frm_catalogo.php" class="link_little"><img src="images/calatogo.png" width="50" height="50" border="0" /><br />
      Catalogo de Productos</a></div></td> 
    <td width="33%" valign="middle"><div align="center"><a href="logout.php" class="link_little"><img src="images/logout.png" width="50" height="50" border="0" /><br />Salir</a></div></td> 
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
                            </div>
                                </div>
</body>
</html>