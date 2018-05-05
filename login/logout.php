<?php
session_start();
unset($_SESSION['id'],$_SESSION['nome'], $_SESSION['login'], $_SESSION['senha']);
$_SESSION['msg'] = "<p style='font-size: 12px'>Logout efetuado com sucesso</p>";
header("location: login.php");
?>