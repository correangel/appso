<?php
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
				$apellidos = $dat['Apellido_afiliado'];
				$nombre    = $dat['Nombre_afiliado'];				
				$saldo_act = $dat['saldo_actual'];				
		endforeach;
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalogo de Productos</title>
<link type="text/css" href="styles/start/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
<script src="includes/jquery-1.8.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery-ui-1.8.23.custom.min.js"></script>
<script src="includes/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/jquery.ui.datepicker-es.js"></script>
<script src="includes/jquery.magnific-popup.js"></script>
<link href="includes/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="includes/magnific-popup.css"> 
<script>
$(document).ready(function () {

	$('.popup-modal').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#username',
		modal: true
	});
	$(document).on('click', '.popup-modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});

	$("#txtcan").change(function(evento){	
		valcan  	=	$("#txtcan").val();
		valop		=	$("#txtopcion").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();				
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan2").change(function(evento){	
		valcan  	=	$("#txtcan2").val();
		valop		=	$("#txtopcion2").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total2').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcan2").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan2").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});	

	$("#txtcan3").change(function(evento){	
		valcan  	=	$("#txtcan3").val();
		valop		=	$("#txtopcion3").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total3').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcan3").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan3").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});	

	$("#txtcan4").change(function(evento){	
		valcan  	=	$("#txtcan4").val();
		valop		=	$("#txtopcion4").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total4').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan4").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan4").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});

	$("#txtcan5").change(function(evento){	
		valcan  	=	$("#txtcan5").val();
		valop		=	$("#txtopcion5").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total5').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan5").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan5").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});

	$("#txtcan6").change(function(evento){	
		valcan  	=	$("#txtcan6").val();
		valop		=	$("#txtopcion6").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total6').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan6").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan6").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	$("#txtcan7").change(function(evento){	
		valcan  	=	$("#txtcan7").val();
		valop		=	$("#txtopcion7").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total7').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan7").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan7").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan8").change(function(evento){	
		valcan  	=	$("#txtcan8").val();
		valop		=	$("#txtopcion8").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total8').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcan8").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan8").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});	

	$("#txtcan9").change(function(evento){	
		valcan  	=	$("#txtcan9").val();
		valop		=	$("#txtopcion9").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total9').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan9").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan9").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});

	$("#txtcan10").change(function(evento){	
		valcan  	=	$("#txtcan10").val();
		valop		=	$("#txtopcion10").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total10').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtcan10").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan10").val();
		total		= 	valcanti * 2400;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});	

	$("#txtcan11").change(function(evento){	
		valcan  	=	$("#txtcan11").val();
		valop		=	$("#txtopcion11").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total11').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan11").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan11").val();
		total		= 	valcanti * 200;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan13").change(function(evento){	
		valcan  	=	$("#txtcan13").val();
		valop		=	$("#txtopcion13").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total13').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan13").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan13").val();
		total		= 	valcanti * 22000;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan14").change(function(evento){	
		valcan  	=	$("#txtcan14").val();
		valop		=	$("#txtopcion14").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total14').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan14").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan14").val();
		total		= 	valcanti * 23000;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan15").change(function(evento){	
		valcan  	=	$("#txtcan15").val();
		valop		=	$("#txtopcion15").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total15').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan15").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan15").val();
		total		= 	valcanti * 8000;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan16").change(function(evento){	
		valcan  	=	$("#txtcan16").val();
		valop		=	$("#txtopcion16").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total16').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan16").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan16").val();
		total		= 	valcanti * 4000;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
	
	$("#txtcan17").change(function(evento){	
		valcan  	=	$("#txtcan17").val();
		valop		=	$("#txtopcion17").val();
		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_total",val: valcan, prove: valop},
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#txt_total17').val(data[0]);
			
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	$("#txtcan17").change(function(evento){	
		valsaldo  	=	$("#txt_sal").val();
		valcanti	=	$("#txtcan17").val();
		total		= 	valcanti * 8000;		
		if(total > valsaldo){
			alert ('Su Saldo es Insuficiente para realizar este Canje!!!')
			$("#formcon")[0].reset();	
		}
		else{
			valnews		=	valsaldo - total;
			$('#txt_sal').val(valnews);		
		}
	});
		
})

//Para Deshabilitar Enter 
 $(document).ready(function() {
   /* Aquí podría filtrar que controles necesitará manejar,
    * en el caso de incluir un dropbox $('input, select');
    */
   tb = $('input');
    
   if ($.browser.mozilla) {
       $(tb).keypress(enter2tab);
   } else {
       $(tb).keydown(enter2tab);
   }
   });
 
function enter2tab(e) {
       if (e.keyCode == 13) {
           cb = parseInt($(this).attr('tabindex'));
    
           if ($(':input[tabindex=\'' + (cb + 1) + '\']') != null) {
               $(':input[tabindex=\'' + (cb + 1) + '\']').focus();
               $(':input[tabindex=\'' + (cb + 1) + '\']').select();
               e.preventDefault();
    
               return false;
           }
       }
   }

</script>     
            
</head>

<body>
                            
                            
                            
                            <table width="800" align="center" border="0">
  <tr>
  <td align="center"><blockquote>
    <p><img src="images/LogoSO.png" width="349" height="198" />
    </p>
  </blockquote>
    
</tr>
<tr>
  <td align="center"><h2 align="center">Catalogo de Productos</h2></td>
</tr>
</table>

<table width="800" border="0" cellpadding="0" cellspacing="1" align="center">
  <tr>
    <td align="justify" class="lblgris">Nombre Afiliado: <?php echo $apellidos . ', ' . $nombre; ?></td>
  </tr>
  <tr>  
    <td align="justify" class="lblgris">Saldo Actual: <input name="txt_sal" type="text" class="textbox" id="txt_sal" value="<?php echo $saldo_act; ?>" size="5" disabled="disabled" /></td>
  </tr>
  
</table>


<table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
<form name="formcon"class="cmxform" action="enviar.php" method="post" id="formcon">
  <tr bordercolorlight="#FFFFFF">
    <td colspan="8" bgcolor="#000099" class="lblblanca" align="center" bordercolorlight="#FFFFFF">LISTADO DE PRODUCTOS</td>
  </tr>
  <tr>
    <td align="center" width="6%" bgcolor="#000099" class="lblblanca">SELECCIONE OPCION</td>
    <td colspan="2" align="center" width="34%" bgcolor="#000099" class="lblblanca">PRODUCTO (DESCRIPCION)</td>    
    <td align="center" width="12%" bgcolor="#000099" class="lblblanca">VALOR QUETZALEZ</td>
    <td align="center" width="12%" bgcolor="#000099" class="lblblanca">SO PUNTOS</td>
    <td align="center" width="12%" bgcolor="#000099" class="lblblanca">CANTIDAD</td>
    <td align="center" width="12%" bgcolor="#000099" class="lblblanca">TOTAL PUNTOS</td>
    <td align="center" width="12%" bgcolor="#000099" class="lblblanca">DURACION CERTIFICADO</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion" type="radio" class="required" id="txtopcion" value="Max Distelsa"/>
      <td align="center" width="22%"><img src="images/max.png" alt="" width="200" height="100" /></td>
      <td align="center" width="12%">CERTIFICADO MAX</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan" type="text" class="textbox" id="txtcan" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total" type="text" class="textbox" id="txt_total" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion2" type="radio" class="required" id="txtopcion2" value="Figaly"/>
      <td align="center" width="22%"><img src="images/figaly.png" /></td>
      <td align="center" width="12%">Figaly (Ropa)</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan2" type="text" class="textbox" id="txtcan2" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total2" type="text" class="textbox" id="txt_total2" value="" readonly="readonly" size="10"/></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
      <td align="center" width="6%"><input name="txtopcion3" type="radio" class="required" id="txtopcion3" value="Siman"/>
      <td align="center" width="22%"><img src="images/siman.png" /></td>
      <td align="center" width="12%">SIMAN</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan3" type="text" class="textbox" id="txtcan3" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total3" type="text" class="textbox" id="txt_total3" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
      <td align="center" width="6%"><input name="txtopcion4" type="radio" class="required" id="txtopcion4" value="Walmart"/>
      <td align="center" width="22%"><img src="images/walmart.png" /></td>
      <td align="center" width="12%">WALMART</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan4" type="text" class="textbox" id="txtcan4" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total4" type="text" class="textbox" id="txt_total4" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
      <td align="center" width="6%"><input name="txtopcion5" type="radio" class="required" id="txtopcion5" value="Cemaco"/>
      <td align="center" width="22%"><img src="images/cemaco.png" /></td>
      <td align="center" width="12%">CEMACO</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan5" type="text" class="textbox" id="txtcan5" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total5" type="text" class="textbox" id="txt_total5" value="" readonly="readonly" size="10"/></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
      <td align="center" width="6%"><input name="txtopcion6" type="radio" class="required" id="txtopcion6" value="Tre Fratelli"/>
      <td align="center" width="22%"><img src="images/trefratelli.png" /></td>
      <td align="center" width="12%">TRE FRATELLI</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan6" type="text" class="textbox" id="txtcan6" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total6" type="text" class="textbox" id="txt_total6" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion7" type="radio" class="required" id="txtopcion7" value="Tony Romas"/>
      <td align="center" width="22%"><img src="images/tonyromas.png" /></td>
      <td align="center" width="12%">TONY ROMA'S</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan7" type="text" class="textbox" id="txtcan7" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total7" type="text" class="textbox" id="txt_total7" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
   	  <td align="center" width="6%"><input name="txtopcion8" type="radio" class="required" id="txtopcion8" value="Hacienda Real"/>
      <td align="center" width="22%"><img src="images/hacienda.png" /></td>
      <td align="center" width="12%">HACIENDA REAL</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan8" type="text" class="textbox" id="txtcan8" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total8" type="text" class="textbox" id="txt_total8" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion9" type="radio" class="required" id="txtopcion9" value="MD Zapateria"/>
      <td align="center" width="22%"><img src="images/mdzapatos.png" /></td>
      <td align="center" width="12%">MD (ZAPATOS)</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan9" type="text" class="textbox" id="txtcan9" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total9" type="text" class="textbox" id="txt_total9" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion10" type="radio" class="required" id="txtopcion10" value="Decameron"/>
      <td align="center" width="22%"><img src="images/decameron.png" /></td>
      <td align="center" width="12%">DECAMERON DECAGIFT*</td>
      <td align="center" width="12%">Q.2,400.00</td>
      <td align="center" width="12%">2400</td>
      <td align="center" width="12%"><input name="txtcan10" type="text" class="textbox" id="txtcan10" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total10" type="text" class="textbox" id="txt_total10" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion11" type="radio" class="required" id="txtopcion11" value="De Museo"/>
      <td align="center" width="22%"><img src="images/demuseo.png" /></td>
      <td align="center" width="12%">DE MUSEO</td>
      <td align="center" width="12%">Q.200.00</td>
      <td align="center" width="12%">200</td>
      <td align="center" width="12%"><input name="txtcan11" type="text" class="textbox" id="txtcan11" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total11" type="text" class="textbox" id="txt_total11" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion13" type="radio" class="required" id="txtopcion13" value="Tour Santiago Bernabeu"/>
      <td align="center" width="22%"><img src="images/santiago.png" /></td>
      <td align="center" width="12%"><a class="popup-modal" href="#real-madrid">TOUR SANTIAGO BERNABEU</a></td>
      <td align="center" width="12%">---</td>
      <td align="center" width="12%">22,000</td>
      <td align="center" width="12%"><input name="txtcan13" type="text" class="textbox" id="txtcan13" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total13" type="text" class="textbox" id="txt_total13" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion14" type="radio" class="required" id="txtopcion14" value=" Tour Camp Nou"/>
      <td align="center" width="22%"><img src="images/campnou.png" /></td>
      <td align="center" width="12%"><a class="popup-modal" href="#barcelona">TOUR BARCELONA</a></td>
      <td align="center" width="12%">---</td>
      <td align="center" width="12%">23,000</td>
      <td align="center" width="12%"><input name="txtcan14" type="text" class="textbox" id="txtcan14" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total14" type="text" class="textbox" id="txt_total14" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion15" type="radio" class="required" id="txtopcion15" value="Tour Canal de Panama"/>
      <td align="center" width="22%"><img src="images/canalpanam.png" /></td>
      <td align="center" width="12%"><a class="popup-modal" href="#panama">TOUR CANAL DE PANAMA</a></td>
      <td align="center" width="12%">---</td>
      <td align="center" width="12%">8,000</td>
      <td align="center" width="12%"><input name="txtcan15" type="text" class="textbox" id="txtcan15" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total15" type="text" class="textbox" id="txt_total15" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion16" type="radio" class="required" id="txtopcion16" value="Casa Santo Domingo"/>
      <td align="center" width="22%"><img src="images/santodomingo.png" /></td>
      <td align="center" width="12%"><a class="popup-modal" href="#santo-domingo">TE LLEVAMOS A CASA SANTO DOMINGO</a></td>
      <td align="center" width="12%">---</td>
      <td align="center" width="12%">4,000</td>
      <td align="center" width="12%"><input name="txtcan16" type="text" class="textbox" id="txtcan16" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total16" type="text" class="textbox" id="txt_total16" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr>
  	  <td align="center" width="6%"><input name="txtopcion17" type="radio" class="required" id="txtopcion17" value=" Paquete Roatan"/>
      <td align="center" width="22%"><img src="images/roatan.png" /></td>
      <td align="center" width="12%"><a class="popup-modal" href="#roatan">TE LLEVAMOS A ROATAN</a></td>
      <td align="center" width="12%">---</td>
      <td align="center" width="12%">8,000</td>
      <td align="center" width="12%"><input name="txtcan17" type="text" class="textbox" id="txtcan17" value="" size="5" /></td>
      <td align="center" width="12%"><input name="txt_total17" type="text" class="textbox" id="txt_total17" value="" readonly="readonly" size="10" /></td>
      <td align="center" width="12%">UN MES**</td>
  </tr>
  <tr><td colspan="8">
  <p align="center"><input name="buttonc" type="submit" class="" id="buttonc" value="Canjear Puntos" /></p></td></tr>
</form>
</table>
<p>&nbsp;</p>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="34%" valign="middle"><div align="center"><a href="frm_consultapts.php" class="link_little"><img src="images/boton_consultar.jpg" width="152" height="50" border="0" /><br />Nueva Consulta</a></div></td>
    <td width="33%" valign="middle"></td> 
    <td width="33%" valign="middle"><div align="center"><a href="logout.php" class="link_little"><img src="images/logout.png" width="50" height="50" border="0" /><br />Salir</a></div></td> 
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


<div id="real-madrid" class="white-popup mfp-hide">
	<h1 align="center">PAQUETE MADRID</h1>
	<ul>Paquete Incluye:
	
		<li>Boleto aéreo Guatemala – Madrid – Guatemala operado por Avianca o Iberia (Quien tenga disponibilidad en
		ese momento)</li>
		<li>03 noches de alojamiento y desayuno en Hotel Mayorazgo.</li>
		<li>Traslado aeropuerto-hotel-aeropuerto.</li>
		<li>Madrid City Tour en Bus Hop-on Hop-off para 2 días</li>
		<li>Guía y Plano de Madrid incluyendo invitación a una tapa típica + copa de vino</li>
		<li>Tarjeta Madrid Card 48horas que incluye; entrada con acceso preferente sin esperas a:</li>
		<ul>
			<li>Museo de Prado</li>
			<li>Palacio Real</li>
			<li>Estadio de Futbol Santiago Bernabéu</li>
			<li>Plaza de Toros de las ventas</li>
		</ul>
		<li>Asistencia Personal para paseo a pie por 3hrs</li>
		<li>Tarjeta de descuento grandes almacenes El Corte Ingles</li>
		<li>Traslado desde Madrid hasta las Rozas Village y regreso en bus regular</li>
		<li>Impuestos incluidos</li>
		</ul>
		<p align="center"> RESERVACIONES CON DOS MESES DE ANTICIPACION </br> PAQUETE PARA UNA PERSONA</p>
	<p><a class="popup-modal-dismiss" href="#">Cerrar</a></p>
</div>

<div id="barcelona" class="white-popup mfp-hide">
	<h1 align="center">PAQUETE BARCELONA</h1>
	<ul>Paquete Incluye:
	
		<p align="center"> RESERVACIONES CON DOS MESES DE ANTICIPACION </br> PAQUETE PARA UNA PERSONA</p>
	<p><a class="popup-modal-dismiss" href="#">Cerrar</a></p>
</div>

<div id="panama" class="white-popup mfp-hide">
	<h1 align="center">PAQUETE CANAL DE PANAMA</h1>
	<ul>Paquete Incluye:
	
		<li>Boleto aéreo Guatemala – Panamá – Guatemala operado por Avianca o Copa(Quien tenga disponibilidad en
ese momento)</li>
		<li>03 noches de alojamiento y desayuno en Hotel Continental & Casino.</li>
		<li>Traslado aeropuerto-hotel-aeropuerto</li>
		<li>Tour Canal de Panamá</li>
		<li>Tour de Compras Albrook Mall</li>		
		<li>Impuestos incluidos</li>		
		</ul>
		<p align="center"> RESERVACIONES CON DOS MESES DE ANTICIPACION </br> PAQUETE PARA UNA PERSONA</p>
	<p><a class="popup-modal-dismiss" href="#">Cerrar</a></p>
</div>

<div id="santo-domingo" class="white-popup mfp-hide">
	<h1 align="center">PAQUETE SANTO DOMINGO</h1>
	<ul>Paquete Incluye:
		<li>Una Noche de Hotel para 2 personas, incluye cena y desayuno día siguiente.</li>
	</ul>
		<p align="center"> RESERVACIONES CON DOS MESES DE ANTICIPACION </br> PAQUETE PARA DOS PERSONAS</p>
	<p><a class="popup-modal-dismiss" href="#">Cerrar</a></p>
</div>

<div id="roatan" class="white-popup mfp-hide">
	<h1 align="center">PAQUETE ROATAN</h1>
	<ul>Paquete Incluye:
	
		<li>Boleto aéreo Guatemala – Roatán – Guatemala operado por Avianca o Aerolíneas Sosa (Quien tenga
disponibilidad en ese momento)</li>
		<li>03 noches de alojamiento y desayuno en Hotel ClarionSuites.</li>
		<li>Traslado aeropuerto-hotel-aeropuerto.</li>
		<li>Impuestos incluidos</li>		
		<li>*no incluye impuesto de salida de Roatán</li>		
		</ul>
		<p align="center"> RESERVACIONES CON DOS MESES DE ANTICIPACION </br> PAQUETE PARA UNA PERSONA</p>
	<p><a class="popup-modal-dismiss" href="#">Cerrar</a></p>
</div>

</body>
                           
</html>




