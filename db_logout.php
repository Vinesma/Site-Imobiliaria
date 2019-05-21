<?php
 	session_start();

 	unset($_SESSION['login']);
  	unset($_SESSION['senha']);
  	unset($_SESSION['id']);
  	unset($_SESSION['isAdm']);
  	unset($_SESSION['tipo_pessoa']);
  	session_destroy();
  	header('location: index.php');
?>