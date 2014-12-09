<?
  require_once('includes/fnc.php');
  encabezados();
  $_SESSION = array();
  setcookie (session_name(),'',time()-56000);
  session_destroy();
  redireccionar("login.php");  
?>
