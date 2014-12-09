<?php
    require('includes/fnc.php');
	require_once('class/class_db.php');
	verifica_sesion();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Consulta Puntos SO Tarjeta</title>
		
        <script src="includes/jquery-1.8.0.min.js" type="text/javascript"></script>
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
                                
                                <img src="images/LogoSO.png" width="349" height="198" />
                                <br>
                                    <div class="span1"></div>
                                    <div class="wrap span8">
                                        <h4>CONSULTA DE PUNTOS TARJETA SO PUNTOS</h4>

                                        <form class="cmxform" action="pro_consultaso.php" method="post" id="formcon">
                                            <div class="alert alert-error hide" id="errorMsg">
                                                <span class="error"><i class="fa fa-warning fa-2x "></i></span> <strong>Error!</strong> Ingrese los datos para validarse.
                                            </div>
                                            <div class="alert alert-error hide" id="errorMsgValidate">
                                                <span class="error"><i class="fa fa-warning fa-2x "></i></span>  <strong>Error!</strong> Su nombre de 'afiliado' o su 'clave' están incorrectas.
                                            </div>
                                            <div class="login_body text-left ">
                                                <div class="email">
                                                    <label for="user" class="text-info"><h3>Por Favor Ingrese el Período a Consultar</h3></label>
                                                </div>
                                                <fieldset>
                                                <div class="pw span4">
                                                    <label for="pw" class="text-left">Fecha Inicio:</label>
                                                    <div class="pw-input">
                                                        <div class="control-group success">
                                                            <div class="input-prepend">
                                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                                                <input name="txtfechai" type="text" class="required" id="txtfechai" value="" size="8" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="pw span4">
                                                    <label for="pw" class="text-left">Fecha Final:</label>
                                                    <div class="pw-input">
                                                        <div class="control-group success">
                                                            <div class="input-prepend">
                                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                                                <input name="txtfechaf" type="text" class="required" id="txtfechaf" value="" size="8" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                    </fieldset>
                                            </div>
                                            <div class="submit">
                                                <input class="btn btn-info" type="submit" value="Consultar">
                                            </div>
                                        </form>
                                        <div  align="center">
                                        <a href="frm_catalogo.php" class="link_little"><img src="images/calatogo.png" width="50" height="50" border="0" /><br />
      Ir a Catalogo de Productos</a>
                                        </div>

                                    </div>
                                    <div class="span1"></div>
                            </div>
                        </div>

                    </body>
                    </html>
                    <script>
                        $(document).ready(function() {
                            $("#txtfechai").datepicker();
                            $("#txtfechaf").datepicker();

                            if (!event.preventDefault) {
                                event.preventDefault = function() {
                                    event.returnValue = false; //ie
                                };
                            }
                        });
                    </script>