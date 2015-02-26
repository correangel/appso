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
			alert ('Por Favor Introduzca un Valor Válido');
			$('#txt_busca_numero').focus();
		}
	});
	
	$("#button_search").click(function(evento){	
		valbus	=	$("#txt_busca_numero").val();		
		valopt  =   $("#txt_codOptica").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_buscara", id:  valbus, optica: valopt },													
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
			valor = $('#txt_vision').val(); 
			//alert(valor);
			if (valor == '1')
			{
				$("#txt_vision").attr('checked', true); 
			}
			else
			{
				$("#txt_vision").attr('checked', false);
			}

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});			
	});
	
	$("#buttone").click(function(evento){	
	 	orden = $("#txt_control").val();	 	
	 	id = $("#id_optica").val();
   		respuesta = confirm("Está seguro de eliminar esta Orden?");
        if(respuesta){	
			window.location = 'mnt_ordenes.php?confirm=Ok&tipo_trn=Delete&id=' + id + '&orden=' + orden;
		}		
	});
	
	$("#buttonv").click(function(evento){
		$("#informacion").css("display","block");		
	});
   
	//Se cargan datos para hacer el query de variedades
	/*
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
	});*/
	
	$("#buttonok").click(function(evento){	
		//valmate = $("#op_material2").val();
		//$('#txt_material').val(valmate);
		$("#opciones").css("display","block");
		valtipo		=	$("#txt_familia").val();
		valfocalidad=	$("#txt_focalidad").val();
		valmaterial	=	$("#txt_material").val();
		valcolor	=	$("#txt_color").val();
		valmarca	=	$("#txt_marca").val();
		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_variedad", tipo: valtipo, material: valmaterial, color: valcolor,
		  										focalidad: valfocalidad, marca: valmarca },													
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
			$('#txt_var1').focus();
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

	/*Despliega Opciones segun el usuario vaya avanzando*/

	$("#op_tipo").click(function(){	
			valfamilia = $("#op_tipo").val();
			$('#txt_familia').val(valfamilia);	
			$(".question2").css("display","block");
			$('#op_focal').focus();			
						
	});	

	$("#op_tipo2").click(function(){	
			valfamilia = $("#op_tipo2").val();
			$('#txt_familia').val(valfamilia);	
			$(".question2").css("display","block");
			$('#op_focal').focus();			
						
	});	

	$("#op_tipo3").click(function(){	
			valfamilia = $("#op_tipo3").val();
			$('#txt_familia').val(valfamilia);	
			$(".question2").css("display","block");
			$('#op_focal').focus();			
						
	});	

	$("#op_tipo4").click(function(){	
			valfamilia = $("#op_tipo4").val();
			$('#txt_familia').val(valfamilia);	
			$(".question2").css("display","block");
			$('#op_focal').focus();			
						
	});	

	$("#op_focal").click(function(){	
			valfocalidad = $("#op_focal").val();
			$('#txt_focalidad').val(valfocalidad);	
			$(".question3").css("display","block");
			$('#op_material').focus();			
						
	});	

	$("#op_focal2").click(function(){	
			valfocalidad = $("#op_focal2").val();
			$('#txt_focalidad').val(valfocalidad);	
			$(".question3").css("display","block");
			$('#op_material').focus();			
						
	});	

	$("#op_focal3").click(function(){	
			valfocalidad = $("#op_focal3").val();
			$('#txt_focalidad').val(valfocalidad);	
			$(".question3").css("display","block");
			$('#op_material').focus();			
						
	});	

	$("#op_material").click(function(){	
			valmaterial = $("#op_material").val();
			$('#txt_material').val(valmaterial);	
			$(".question4").css("display","block");
			$('#op_color').focus();			
						
	});	

	$("#op_material2").click(function(){	
			valmaterial = $("#op_material2").val();
			$('#txt_material').val(valmaterial);	
			$(".question4").css("display","block");
			$('#op_color').focus();				
	});	

	$("#op_color").click(function(){	
			valcolor = $("#op_color").val();
			$('#txt_color').val(valcolor);	
			$(".question5").css("display","block");
			$('#op_marca').focus();			
						
	});	

	$("#op_color2").click(function(){	
			valcolor = $("#op_color2").val();
			$('#txt_color').val(valcolor);	
			$(".question5").css("display","block");
			$('#op_marca').focus();			
						
	});	

	$("#op_color3").click(function(){	
			valcolor = $("#op_color3").val();
			$('#txt_color').val(valcolor);	
			$(".question5").css("display","block");
			$('#op_marca').focus();			
						
	});	

	$("#op_color4").click(function(){	
			valcolor = $("#op_color4").val();
			$('#txt_color').val(valcolor);	
			$(".question5").css("display","block");
			$('#op_marca').focus();			
						
	});	

	$("#op_marca").click(function(){	
			valmarca = $("#op_marca").val();
			$('#txt_marca').val(valmarca);	
			//$(".question3").css("display","block");
			$('#opcion_var1').focus();			
						
	});	

	$("#op_marca2").click(function(){	
			valmarca = $("#op_marca2").val();
			$('#txt_marca').val(valmarca);	
			//$(".question3").css("display","block");
			$('#opcion_var1').focus();			
						
	});	

	$("#op_marca3").click(function(){	
			valmarca = $("#op_marca3").val();
			$('#txt_marca').val(valmarca);	
			//$(".question3").css("display","block");
			$('#opcion_var1').focus();			
						
	});	
	
	$("#opcion_var1").click(function(){		
			valvar = $('#txt_var1').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var2").click(function(){		
			valvar = $('#txt_var2').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var3").click(function(){		
			valvar = $('#txt_var3').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var4").click(function(){		
			valvar = $('#txt_var4').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var5").click(function(){		
			valvar = $('#txt_var5').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
					
	});	
	
	$("#opcion_var6").click(function(){		
			valvar = $('#txt_var6').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var7").click(function(){		
			valvar = $('#txt_var7').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var8").click(function(){		
			valvar = $('#txt_var8').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var9").click(function(){		
			valvar = $('#txt_var19').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var10").click(function(){		
			valvar = $('#txt_var10').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var11").click(function(){		
			valvar = $('#txt_var11').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var12").click(function(){		
			valvar = $('#txt_var12').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var13").click(function(){		
			valvar = $('#txt_var13').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var14").click(function(){		
			valvar = $('#txt_var14').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var15").click(function(){		
			valvar = $('#txt_var15').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});	
	
	$("#opcion_var16").click(function(){		
			valvar = $('#txt_var16').val();
			$('#txt_variedad').val(valvar);
			$("#informacion").css("display","none");
			$('#txt_esferad').focus();			
						
	});		
	
	$("#txt_esferad").change(function(evento){			
		valor_variedad = $('#txt_variedad').val();
        //alert(valor_variedad);		
		vurl			=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_top", vari: valor_variedad },													
		  type: "GET",
		  dataType: "json",		  
		  success: function(data)          //on recieve of reply
		  {			
			$('#txt_vision').val(data[0]);			
			vision = $('#txt_vision').val(); 
			//alert(vision);
			if (vision == '1')
			{
				$("#txt_vision").attr('checked', true); 
			}
			else
			{
				$("#txt_vision").attr('checked', false);
			}

		  } ,
			error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(xhr.responseText);
		    }    		  
		});
	});	
	
	/*
	$("#txt_esferad").change(function(){
		
			valor = $('#txt_vision').val();
			
			if (valor == 'on')
			{
				$("#txt_vision").attr('checked', true); 
			}
			else
			{
				$("#txt_vision").attr('checked', false);
			}
			
	});*/	
	
	$("#buttons").click(function(evento){
		$("#servicios").css("display","block");		
	});
	
	$("#button_buscar").click(function(evento){
		$("#tipo_trn").val('Update');
		$("#consulta").css("display","block");
		$("#message").css("display","none");
		$("#ingreso").css("display","block");
		$("#buttong").css("display","none");
		$("#form1")[0].reset();		
		$("#txt_vision").attr('checked', false);		
	});
	
	$("#button_add").click(function(evento){
		$("#tipo_trn").val('Add');		
		$("#ingreso").css("display","block");
		$("#message").css("display","none");
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

	$("#buttong").click(function(evento){	
		$("#message").css("display","block");
		valdest  	=	$("#txt_mailDestino").val();		
		valasun		=	$("#txt_asunto").val();
		valcont		= 	$("#id_optica").val();
		valdesd		=	$("#txt_mailOrigen").val();
		

		vurl		=	'fnc_ajax.php';
		$.ajax({                                      
		  url: vurl,             //the script to call to get data          
		  //data: "op=reload_capacidadx", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		  data:   {op 		: "reload_mailPedido",des: valdest, asu: valasun, id: valcont, rem: valdesd},
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
	
});