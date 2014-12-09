
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Solución Optica.com 1.0</title>

        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
            <link href="bootstrap/css/so.css" rel="stylesheet" media="screen">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
                        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

                            </head>
                            <body>
                                <div class="container">
                                    <script src="http://code.jquery.com/jquery.js"></script>
                                    <script src="bootstrap/js/bootstrap.min.js"></script>
                                    <div class="span12 text-center">
                                        <img src="images/LogoSO.png" width="349" height="198" />
                                        <br>
                                            <div class="span3"></div>
                                            <div class="wrap span6">
                                                <h4>Ingrese sus datos de acceso:</h4>
                                                <form action="mnt_login.php" autocomplete="off" method="post" class="validate" novalidate="novalidate" id="frmValidate">
                                                    <div class="alert alert-error hide" id="errorMsg">
                                                        <span class="error"><i class="fa fa-warning fa-2x "></i></span> <strong>Error!</strong> Ingrese los datos para validarse.
                                                    </div>
                                                    <div class="alert alert-error hide" id="errorMsgValidate">
                                                       <span class="error"><i class="fa fa-warning fa-2x "></i></span>  <strong>Error!</strong> Su nombre de 'afiliado' o su 'clave' están incorrectas.
                                                    </div>
                                                    <div class="login_body text-left">
                                                        <div class="email">
                                                            <label for="user" class="text-left">Afiliado:</label>
                                                            <div class="email-input">
                                                                <div class="control-group success">
                                                                    <div class="input-prepend">
                                                                        <span class="add-on"><i class="icon-user"></i></span>
                                                                        <input type="text" placeholder="####-####-####-####" id="afiliado" name="afiliado" onkeyup="mascara(this,'-',patron,true)" class="{required:true} valid">
                                                                    </div>
                                                                    <label for="user" generated="true" class="error valid"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pw">
                                                            <label for="pw" class="text-left">Clave:</label>
                                                            <div class="pw-input">
                                                                <div class="control-group success">
                                                                    <div class="input-prepend">
                                                                        <span class="add-on"><i class="icon-lock"></i></span>
                                                                        <input type="password" id="clave" name="clave" class="{required:true} valid">
                                                                    </div>
                                                                    <label for="pw" generated="true" class="error valid"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--                                                <div class="remember">
                                                                                                            <label class="checkbox">
                                                                                                                <input type="checkbox" value="1" name="remember"> Remember me on this computer
                                                                                                            </label>
                                                                                                        </div>-->
                                                    </div>
                                                    <div class="submit">
                                                        <a href="#">Olvidó su clave?</a>
                                                        <input class="btn btn-info" type="button"  onclick="frmSubmit()" value="Validar">
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="span3"></div>
                                    </div>
                                </div>

                            </body>
                            </html>
<script>
$( document ).ready(function() {
// Handler for .ready() called.

var paramMsg = getUrlVars()["msg"];

if (paramMsg == "true"){
    $("#errorMsgValidate").show();
};

});
function frmSubmit() {
  if ( $( "#afiliado" ).val() != "" && $( "#clave" ).val() != "" ) {
      $("#frmValidate").submit();
  }else{
      $("#errorMsg").show();
  }
  event.preventDefault();
};

// Read more at: http://w3lessons.info/2013/02/25/how-to-get-url-parameters-values-using-jquery/
// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
var patron = new Array(4,4,4,4)

function mascara(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]	
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}
</script>

</script>
