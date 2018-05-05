<?php 
session_start(); 
include 'functions.php';
if (empty($_SESSION['id'])) {
	$_SESSION['msg_login'] = "Acesso restrito";
	header("location: login/login.php");
}

if ($_SESSION['nv'] == 2){
	$_SESSION['aaa'] = "<p class='text-center' style='color: #6c757d'><b>" . ucwords(utf8_encode(strtolower($_SESSION['nome']))) . "</b> você não tem permissão para essa funcionalidade.";
	header("location: read_basic.php?pagina=1");
}
else{
	header("location: read.php?pagina=1");
}

?>