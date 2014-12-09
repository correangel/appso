<?php
	require('includes/fnc.php');
	require_once('class/class_db.php');	
	verifica_sesion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de Ordenes en Linea</title>
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

	$('#buttoni').magnificPopup({
    items: {
      src: 'images/alturas.JPG'
    },
    type: 'image' // this is default type
	});
	
	$("#form1").validate({	
  		rules: {
    		txtexp:{
      				required: true      				
   				 	}
  		}
	});
	
	$('#buttoni2').magnificPopup({
    items: {
      src: 'images/medidas.JPG'
    },
    type: 'image' // this is default type
	});
	
	$("#form1").validate({	
  		rules: {
    		txtexp:{
      				required: true      				
   				 	}
  		}
	});
	
	jQuery.extend(jQuery.validator.messages, {
		required: "Campo obligatorio.",
		remote: "Por favor, rellena este campo.",
		email: "Por favor, escribe una dirección de correo válida",
		url: "Por favor, escribe una URL válida.",
		date: "Por favor, escribe una fecha válida.",
		dateISO: "Por favor, escribe una fecha (ISO) válida.",
		number: "Por favor, escriba un número entero válido.",
		digits: "Por favor, escribe sólo dígitos.",
		creditcard: "Por favor, escribe un número de tarjeta válido.",
		equalTo: "Por favor, escribe el mismo valor de nuevo.",
		accept: "Por favor, escribe un valor con una extensión aceptada.",
		maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
		minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
		rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
		range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
		max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
		min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});
	
	$('#button_search').click(function(evento){
		valbus = $("#txt_busca_numero").val();
		if(valbus == "") {
			alert ('Por Favor Introduzca un Número Correlativo');
			$('#txt_busca_numero').focus();
		}
	});
	
	$("#button_search").click(function(evento){	
		valbus	=	$("#txt_busca_numero").val();		
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_buscara", id:  valbus },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {
			$('#id_optica').val(data[0]);
			$('#txt_control').val(data[1]);
			$('#txt_paciente').val(data[2]);
			$('#txt_esferad').val(data[3]);
			$('#txt_cilindrod').val(data[4]);
			$('#txt_ejed').val(data[5]);
			$('#txt_prismad').val(data[6]);
			$('#txt_adiciond').val(data[7]);
			$('#txt_alturad').val(data[8]);
			$('#txt_dnpd').val(data[9]);
			$('#txt_esferai').val(data[10]);
			$('#txt_cilindroi').val(data[11]);
			$('#txt_ejei').val(data[12]);
			$('#txt_prismai').val(data[13]);
			$('#txt_adicioni').val(data[14]);
			$('#txt_alturai').val(data[15]);
			$('#txt_dnpi').val(data[16]);
			$('#txt_distancia').val(data[17]);
			$('#txt_variedad').val(data[18]);
			$('#txt_colores').val(data[19]);
			$('#txt_vision').val(data[20]);
			$('#txt_montura').val(data[21]);
			$('#txt_horizontal').val(data[22]);
			$('#txt_patilla').val(data[23]);
			$('#txt_vertical').val(data[24]);
			$('#txt_diagonal').val(data[25]);
			$('#txt_observacion').val(data[26]);
			$('#txt_idorden').val(data[27]);	
			$('#tipo_trn').val(data[28]);	
			$('#opcion_uno').val(data[29]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#buttone").click(function(evento){	
	 	orden = $("#txt_paciente").val();
   		respuesta = confirm("Está seguro de eliminar esta Orden?");
        if(respuesta){	
			window.location = 'mnt_ordenes.php?confirm=Ok&tipo_trn=Delete&id='+orden;
		}			
	});
	
	$("#buttonv").click(function(evento){
		$("#informacion").css("display","block");		
	});
   
	//Se cargan datos para hacer el query de variedades
	$("#op_tipo").change(function(evento){
		valfamilia = $("#op_tipo").val();
		$('#txt_familia').val(valfamilia);
		valtipo		=	$("#txt_familia").val();		
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_tipo2").change(function(evento){	
		valfamilia = $("#op_tipo2").val();
		$('#txt_familia').val(valfamilia);
		valtipo		=	$("#txt_familia").val();	
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_tipo3").change(function(evento){	
		valfamilia = $("#op_tipo3").val();
		$('#txt_familia').val(valfamilia);
		valtipo		=	$("#txt_familia").val();	
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_tipo4").change(function(evento){	
		valfamilia = $("#op_tipo4").val();
		$('#txt_familia').val(valfamilia);
		valtipo		=	$("#txt_familia").val();	
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_material").change(function(evento){	
		valmate = $("#op_material").val();
		$('#txt_material').val(valmate);
		valtipo		=	$("#txt_familia").val();
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_material2").change(function(evento){	
		valmate = $("#op_material2").val();
		$('#txt_material').val(valmate);
		valtipo		=	$("#txt_familia").val();
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_color").change(function(evento){	
		valcol = $("#op_color").val();
		$('#txt_color').val(valcol);
		valtipo		=	$("#txt_familia").val();
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#op_color2").change(function(evento){	
		valcol = $("#op_color2").val();
		$('#txt_color').val(valcol);
		valtipo		=	$("#txt_familia").val();
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();				
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_var1').val(data[0]);
			$('#txt_var2').val(data[1]);
			$('#txt_var3').val(data[2]);
			$('#txt_var4').val(data[3]);
			$('#txt_var5').val(data[4]);
			$('#txt_var6').val(data[5]);
			$('#txt_var7').val(data[6]);
			$('#txt_var8').val(data[7]);
			$('#txt_var9').val(data[8]);
			$('#txt_var10').val(data[9]);
			$('#txt_var11').val(data[10]);
			$('#txt_var12').val(data[11]);
			$('#txt_var13').val(data[12]);
			$('#txt_var14').val(data[13]);
			$('#txt_var15').val(data[14]);
			$('#txt_var16').val(data[15]);
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#buttono").click(function(evento){			
		var categorias = new Array(); 
        $("input[name='txt_servicio[]']:checked").each(function() {
            categorias.push($(this).val());
        }); 
        		
		vurl			=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_servicio", servicios: categorias },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_observacion').val(data[0]);			
			$('#txt_paciente').focus();
		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});
	
	$("#txtexp").change(function(){
		var expe = $('#txtexp').val();
		if (expe < 35000) 
		{
		    $("#servidor").css("display","block");		
		}
		else
		{
			$("#beneficiario").css("display","block");		
		}
	});
	
	$("#opcion_var1").click(function(){		
			valvar = $('#txt_var1').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var2").click(function(){		
			valvar = $('#txt_var2').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var3").click(function(){		
			valvar = $('#txt_var3').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var4").click(function(){		
			valvar = $('#txt_var4').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var5").click(function(){		
			valvar = $('#txt_var5').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var6").click(function(){		
			valvar = $('#txt_var6').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var7").click(function(){		
			valvar = $('#txt_var7').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var8").click(function(){		
			valvar = $('#txt_var8').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var9").click(function(){		
			valvar = $('#txt_var19').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var10").click(function(){		
			valvar = $('#txt_var10').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var11").click(function(){		
			valvar = $('#txt_var11').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var12").click(function(){		
			valvar = $('#txt_var12').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var13").click(function(){		
			valvar = $('#txt_var13').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var14").click(function(){		
			valvar = $('#txt_var14').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var15").click(function(){		
			valvar = $('#txt_var15').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});	
	
	$("#opcion_var16").click(function(){		
			valvar = $('#txt_var16').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_colores').focus();			
						
	});		
		
	$("#button_search").click(function(){
		
			valor = $('#txt_vision').val();
			
			if (valor == 'on')
			{
				$("#txt_vision").attr('checked', true); 
			}
			else
			{
				$("#txt_vision").attr('checked', false);
			}
			
	});	
	
	$("#buttons").click(function(evento){
		$("#servicios").css("display","block");		
	});
	
	$("#button_buscar").click(function(evento){
		$("#consulta").css("display","block");
		$("#ingreso").css("display","block");
		$("#buttong").css("display","none");
		$("#form1")[0].reset();		
		$("#txt_vision").attr('checked', false);		
	});
	
	$("#button_add").click(function(evento){		
		$("#ingreso").css("display","block");
		$("#consulta").css("display","none");
		$("#buttong").css("display","block");
		$("#buttonm").css("display","none");
		$("#buttone").css("display","none");
		$("#form1")[0].reset();		
		$("#txt_vision").attr('checked', false);
	});
	
	$("#buttono").click(function(evento){		
		$("#servicios").css("display","none");		
	});
	
	$("#button_back").click(function(evento){		
		window.location = 'frm_menu.php';		
	});
	
	$("#button_logout").click(function(evento){		
		window.location = 'logout.php';		
	});
	
});
</script>

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
</style>
</head>

<body>
<table width="800" align="center" border="0">
<tr>
  <td align="center"><img src="images/LogoSO.png" width="349" height="198" /></td>
</tr>
<tr>
  <td align="center"><h2 align="center" class="DDDD">FORMULARIO DE ORDENES DE TRABAJO</h2></td>
</tr>
</table>
<table width="800" align="center" border="0">
<tr>
  <td align="center"><input name="button_search" type="button" class="" id="button_add" value="AGREGAR" />
  				<input name="button_buscar" type="button" class="" id="button_buscar" value="CONSULTAR" />
  				<input name="button_back" type="button" class="" id="button_back" value="MENU PRINCIPAL" />
  				<input name="button_logout" type="button" class="" id="button_logout" value="SALIR" /></td>  
</tr>
</table>
<br />
<div style="display:none" id="consulta">
<table width="900" align="center" border="0">
<tr>
  <td>Buscar Correlativo de Orden: <input name="txt_busca_numero" type="text" class="required" id="txt_busca_numero" value="" size="50" /><input name="button_search" type="button" class="" id="button_search" value="BUSCAR" />
  </td>
</tr>
</table>
</div>
<br />
<div style="display:none" id="ingreso">
<form id="form1" name="form1" method="post" action="mnt_ordenes.php" >
<table align="center" width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >Nombre de la Optica:</td>
    <td colspan="9"><?=$info[id_lote];?><select name="id_optica" id="id_optica" class="textbox" >
      <option value="01">Valor 01</option>
      <option value="02">Valor 02</option>
      <option value="03">Valor 03</option>
        
      </select></td>
  </tr>
  <tr>
    <td colspan="10" align="center" >DATOS DE LA RECETA</td>
  </tr>
  <tr>
    <td align="left" colspan="2" >No. de Control</td>
    <td align="left" colspan="8" >Nombre</td
  ></tr>
  <tr>
    <td align="left" colspan="2" ><input name="txt_control" type="text" class="required" id="txt_control" value="" size="15" /></td>
    <td align="left" colspan="8" ><input name="txt_paciente" type="text" class="required" id="txt_paciente" value="" size="75" /></td
  ></tr>
  <tr>
  	<td>OJO</td>
    <td>ESFERA</td>
    <td>CILINDRO</td>
    <td>EJE</td>
    <td>PRISMA</td>
    <td>ADICION</td>
    <td>ALTURA</td>
    <td>DNP</td>
    <td>&nbsp;</td>
    <td>Distancia </td>
  </tr>
  <tr>
    <td>O.D.</td>
    <td><input name="txt_esferad" type="text" class="required" id="txt_esferad" value="" size="15" /></td>
    <td><input name="txt_cilindrod" type="text" class="required" id="txt_cilindrod" value="" size="15" /></td>
    <td><input name="txt_ejed" type="text" class="required" id="txt_ejed" value="" size="15" /></td>
    <td><input name="txt_prismad" type="text" class="required" id="txt_prismad" value="" size="15" /></td>
    <td><input name="txt_adiciond" type="text" class="required" id="txt_adiciond" value="" size="15" /></td>
    <td><input name="txt_alturad" type="text" class="required" id="txt_alturad" value="" size="15" /></td>
    <td><input name="txt_dnpd" type="text" class="required" id="txt_dnpd" value="" size="15" /></td>
    <td><input name="buttoni" type="button" class="" id="buttoni" value="Info" /></td>
    <td>Inter Pupilar</td>
  </tr>
  <tr>
    <td>O.I.</td>
    <td><input name="txt_esferai" type="text" class="required" id="txt_esferai" value="" size="15" /></td>
    <td><input name="txt_cilindroi" type="text" class="required" id="txt_cilindroi" value="" size="15" /></td>
    <td><input name="txt_ejei" type="text" class="required" id="txt_ejei" value="" size="15" /></td>
    <td><input name="txt_prismai" type="text" class="required" id="txt_prismai" value="" size="15" /></td>
    <td><input name="txt_adicioni" type="text" class="required" id="txt_adicioni" value="" size="15" /></td>
    <td><input name="txt_alturai" type="text" class="required" id="txt_alturai" value="" size="15" /></td>
    <td><input name="txt_dnpi" type="text" class="required" id="txt_dnpi" value="" size="15" /></td>
    <td></td>
    <td><input name="txt_distancia" type="text" class="required" id="txt_distancia" value="" size="15" /></td>
  </tr>
  
  <tr>
    <td colspan="2">VARIEDAD DE LENTE:</td>
    <td colspan="6"><textarea name="txt_variedad" rows="3" cols="74" class="textbox" id="txt_variedad" type="text" ></textarea></td>
    <td colspan="2" align="center"> <input name="buttonv" type="button" class="" id="buttonv" value="Seleccionar" /></td>    
  </tr>
</table>

<div style="display:none" id="informacion">
<table width="900" align="center" border="0">  
  <tr>
  	<td width="900"colspan="3" align="center">Seleccione Por Favor</td>  
  </tr>
  <tr>
  	<td width="300" align="center">Tipo</td>
    <td width="300" align="center">Material</td>
    <td width="300" align="center">Color</td>  
  </tr>
  <tr>
  	<td width="300" align="left"><input name="op_tipo" type="radio" class="required" id="op_tipo" value="Convencional" />
  	Convencional</td>
    <td width="300" align="left"><input name="op_material" type="radio" class="required" id="op_material" value="policarbonato" />
  	Policarbonato</td>
    <td width="300" align="left"><input name="op_color" type="radio" class="required" id="op_color" value="blanco" />
  	Blanco</td>  
  </tr>
   <tr>
  	<td width="300" align="left"><input name="op_tipo" type="radio" class="required" id="op_tipo2" value="Basic Vision" />
  	Basic Vision</td>
    <td width="300" align="left"><input name="op_material" type="radio" class="required" id="op_material2" value="plastico" />
  	Plástico</td>
    <td width="300" align="left"><input name="op_color" type="radio" class="required" id="op_color2" value="otro" />
  	Otro</td>  
  </tr>
  <tr>
  	<td width="300" align="left"><input name="op_tipo" type="radio" class="required" id="op_tipo3" value="Perfect Vision" />
  	Perfect Vision</td>    
  </tr>
  <tr>
  	<td width="300" align="left"><input name="op_tipo" type="radio" class="required" id="op_tipo4" value="Precise Form" />
  	Precise Form</td>    
  </tr>
 
  
  
  
</table>  

<table width="900" align="center" border="0">
 <tr>
  	<td align="center" colspan="4">Seleccione Opción</td>
  </tr>
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var1" value="" /></td>
    <td width="438"><input name="txt_var1" type="text" class="required" id="txt_var1" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var2" value="" /></td>
    <td width="438"><input name="txt_var2" type="text" class="required" id="txt_var2" value="" size="75" /></td>
  </tr>  
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var3" value="" /></td>
    <td width="438"><input name="txt_var3" type="text" class="required" id="txt_var3" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var4" value="" /></td>
    <td width="438"><input name="txt_var4" type="text" class="required" id="txt_var4" value="" size="75" /></td>
  </tr>
  
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var5" value="" /></td>
    <td width="438"><input name="txt_var5" type="text" class="required" id="txt_var5" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var6" value="" /></td>
    <td width="438"><input name="txt_var6" type="text" class="required" id="txt_var6" value="" size="75" /></td>
  </tr>
  
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var7" value="" /></td>
    <td width="438"><input name="txt_var7" type="text" class="required" id="txt_var7" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var8" value="" /></td>
    <td width="438"><input name="txt_var8" type="text" class="required" id="txt_var8" value="" size="75" /></td>
  </tr>
  
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var9" value="" /></td>
    <td width="438"><input name="txt_var9" type="text" class="required" id="txt_var9" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var10" value="" /></td>
    <td width="438"><input name="txt_var10" type="text" class="required" id="txt_var10" value="" size="75" /></td>
  </tr>
  
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var11" value="" /></td>
    <td width="438"><input name="txt_var11" type="text" class="required" id="txt_var11" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var12" value="" /></td>
    <td width="438"><input name="txt_var12" type="text" class="required" id="txt_var12" value="" size="75" /></td>
  </tr>
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var13" value="" /></td>
    <td width="438"><input name="txt_var13" type="text" class="required" id="txt_var13" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var14" value="" /></td>
    <td width="438"><input name="txt_var14" type="text" class="required" id="txt_var14" value="" size="75" /></td>
  </tr>
  <tr>
  	<td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var15" value="" /></td>
    <td width="438"><input name="txt_var15" type="text" class="required" id="txt_var15" value="" size="75" /></td>
    <td width="12"><input name="opcion_var" type="radio" class="required" id="opcion_var16" value="" /></td>
    <td width="438"><input name="txt_var16" type="text" class="required" id="txt_var16" value="" size="75" /></td>
  </tr>
  
  
<input name="txt_familia" type="text" id="txt_familia" value="Convencional" />
<input name="txt_material" type="text" id="txt_material" value="Policarbonato" />
<input name="txt_color" type="text" id="txt_color" value="Blanco" /> 
  
</table>

</div>

<table align="center" width="900" border="0" cellspacing="0" cellpadding="0">
<tr>
  	<td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
    <td width="100"> </td>
</tr> 



  <tr>
    <td colspan="2">COLORES ESPECIALES:</td>
    <td colspan="6"><textarea name="txt_colores" rows="2" cols="74" class="textbox" id="txt_colores" type="text" ><?=$info[observacion];?></textarea></td>
    <td colspan="2"><input type="checkbox" name="txt_vision" id="txt_vision"> 
    TOP VISION<br></td>    
  </tr>
  <tr>
  	<td colspan="5">DATOS DE LA MONTURA</td>
    <td>H</td>
    <td>P</td>
    <td>V</td>
    <td>D</td>
    <td>&nbsp;</td>    
  </tr>
   <tr>
  	<td colspan="5"><input name="txt_montura" type="text" class="required" id="txt_montura" value="" size="75" /></td>
    <td><input name="txt_horizontal" type="text" class="required" id="txt_horizontal" value="" size="6" /></td>
    <td><input name="txt_patilla" type="text" class="required" id="txt_patilla" value="" size="6" /></td>
    <td><input name="txt_vertical" type="text" class="required" id="txt_vertical" value="" size="6" /></td>
    <td><input name="txt_diagonal" type="text" class="required" id="txt_diagonal" value="" size="6" /></td>
    <td><input name="buttoni2" type="button" class="" id="buttoni2" value="Info" /></td>    
  </tr>
  <tr>
    <td colspan="2">OBSERVACIONES O INDICACIONES ADICIONALES:</td>
    <td colspan="6"><textarea name="txt_observacion" rows="3" cols="74" class="textbox" id="txt_observacion" type="text" ></textarea></td>
    <td colspan="2" align="center"><input name="buttons" type="button" class="" id="buttons" value="Servicios" /></td>    
  </tr>
</table>
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
<p align="center"><input name="buttong" type="submit" class="" id="buttong" value="Guardar" /></p>
<p align="center"><input name="buttonm" type="submit" class="" id="buttonm" value="Modificar" /> | <input name="buttone" type="button" class="" id="buttone" value="Eliminar" /> </p>


</form>
</div>


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

<!--<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#D1DDE7">
  <tr>
    <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" background="images/bg_titulo_frm.gif"><div align="left"><img src="images/ic_recordatorio.png" width="35" height="32" /></div></td>
        <td width="96%" background="images/bg_titulo_frm.gif" class="titulo_frm">Controles Existentes</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="535" class="lbl"><div align="center"><strong>Lote</strong></div></td>
    <td width="186" class="lbl"><div align="center">Activo</div></td>
    <td width="255" class="lbl"><div align="center"><strong>Acciones</strong></div></td>
  </tr>
 /* <?
  $cnt_lista=0;
  $qlista=runsql("select * from granja order by id_granja");
  while($ilista=registro($qlista)){
  $cnt_lista++;
  ?>*/
  <tr class="<?=set_row_class($cnt_lista);?>">
    <td height="22" class="texto"><?=$ilista[lote];?></td>
    <td height="22" class="texto"><div align="center"><img src="images/ic_<?if($ilista[activo]==0){echo "no";}?>ok.gif" width="16" height="16" /></div></td>
    <td><div align="center"><a href="index1.php?<?="op=$op&pk={$ilista[id_granja]}";?>"><img src="images/ic_editar.gif" alt="Modificar" width="15" height="15" border="0" /></a> &nbsp;&nbsp;&nbsp;
    <a href="javascript:void(0);" onclick="cf_eliminar_granja('<?=$ilista[id_granja];?>');"><img src="images/ic_delete.gif" alt="Eliminar" width="15" height="15" border="0"/></a></div></td>
  </tr>
  <?
  }
  ?>
</table>
 -->
</body>
</html>