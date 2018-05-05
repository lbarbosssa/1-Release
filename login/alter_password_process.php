<?php 
session_start();
include '../functions.php';
$btn_alter_psw = filter_input(INPUT_POST, 'btn_cad_user', FILTER_SANITIZE_STRING);
//if ($btn_alter_psw){
	include_once ("../SQL/conexao.php");
	$dados_rec = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$error = false;

	//Retirar tags
	$dados_strip = array_map('strip_tags', $dados_rec);
	$dados = array_map('trim', $dados_strip);

	$pass = $dados['senha'];
	$c_pass= $dados['c_senha'];

	$search_dados = "SELECT * FROM usuario WHERE id='".$dados['id']."' LIMIT 1";
	$retorno_search = mysqli_query($Conect, $search_dados);
	$tuplas = mysqli_fetch_assoc($retorno_search);
	
	if(in_array('', $dados)){ //Campos Vazios
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: red;'>É necessário preencher todos os campos</p>";
		header('location: alter_password.php');
	}
	elseif(strlen($dados['senha']) < 6){//Senha Menor que 6
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>A senha deve conter mais que 6 digitos</p>";
		header('location: alter_password.php');
	}
	elseif(stristr($dados['senha'], "'")){// Aspas simples 
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>Caractere ( ' ) Inválido</p>";
		header('location: alter_password.php');	
	}
	elseif($pass <> $c_pass){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>As Senhas não conferem</p>";
		header('location: alter_password.php');
	}
	elseif(!($dados['id'] === $tuplas['id'])){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>O ID não foi encontrado</p>";
		header('location: alter_password.php');
	}
	elseif(strtoupper(utf8_decode($dados['nome'])) != $tuplas['nome']){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>O nome Não corresponde ao ID</p>";
		header('location: alter_password.php');
	}
	elseif($dados['email']."@braspress.com" != $tuplas['email']){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>O email Não corresponde ao ID</p>";
		header('location: alter_password.php');
	}

	if(!$error){
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		$update_senha = "UPDATE usuario SET senha = '".$dados['senha']."', modified = NOW() WHERE id = '".$dados['id']."' 
		AND nome = '".strtoupper(utf8_decode($dados['nome']))."' AND email ='".$dados['email']."@braspress.com' AND login = '".$dados['email']."';";
		$update_banco = mysqli_query($Conect, $update_senha);
		
		$_SESSION['msg_user'] = $tuplas['login'];
		$_SESSION['msg'] = "<p style='color: #6c757d'><b>". ucwords(utf8_encode(strtolower($tuplas['nome']))) . "</b> Sua senha foi alterada com sucesso</p>";
		header("location: login.php");
		echo "feito<br>";
		
	}	
	else{
		echo "ruim";
	}
//}//btn_alter_psw


//
?>