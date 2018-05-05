<?php
session_start();
$btn_cad_user = filter_input(INPUT_POST, 'btn_cad_user', FILTER_SANITIZE_STRING); //Recebendo dados do botão
if ($btn_cad_user) { 
	include_once ("../SQL/conexao.php");
	$dados_rec = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	
	$error = false;

	//Retirar tags
	$dados_strip = array_map('strip_tags', $dados_rec);
	$dados = array_map('trim', $dados_strip);

	$pass = $dados['senha'];
	$c_pass= $dados['c_senha'];
	

	//Validação
	if(in_array('', $dados)){ //Campos Vazios
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: red;'>É necessário preencher todos os campos</p>";
		header('location: register.php');

	}
	elseif(!(is_numeric($dados['id']))){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'> O ID deve ser preenchido apenas com números</p>";
		header('location: register.php');
	}
	elseif ($dados['id'] < 4){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'> O ID do seu crachá, possui mais que 4 números</p>";
		header('location: register.php');

	}
	elseif(strpos($dados['email'], "@")){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>Informe apenas o inicio do seu E-mail</p>";
		header('location: register.php');
	}
	elseif(strlen($dados['senha']) < 6){//Senha Menor que 6
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>A senha deve conter mais que 6 digitos</p>";
		header('location: register.php');	
	}
	elseif(stristr($dados['senha'], "'")){// Aspas simples 
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>Caractere ( ' ) Inválido</p>";
		header('location: register.php');	
	}
	elseif($pass <> $c_pass){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>As Senhas não conferem</p>";
		header('location: register.php');
	}
	
	//Email existente
	$search_login = "SELECT id FROM usuario WHERE email='" .$dados['email']. "@braspress.com'";
	$retorno_banco = mysqli_query($Conect, $search_login);
	if (($search_login) AND ($retorno_banco ->num_rows != 0)) {
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>O email: <b>" .$dados['email']. "@braspress.com</b> já está em uso</p>";
		header('location: register.php');
	}

	//ID Existente
	$search_id = "SELECT id from usuario where id='" .$dados['id']."'";
	$retorno_search_id = mysqli_query($Conect, $search_id);
	if (($search_id) AND ($retorno_search_id ->num_rows != 0)){
		$error = true;
		$_SESSION['msg_id'] = $dados['id'];
		$_SESSION['msg_nome'] = $dados['nome'];
		$_SESSION['msg_email'] = $dados['email'];
		$_SESSION['msg'] = "<p style='color: #6c757d'>O ID: <b>" .$dados['id']. "</b> já está em uso</p>";	
		header('location: register.php');
	}


	//echo "<pre>"; print_r($dados); echo "</pre>";
	if (!$error) {
		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		//echo "<pre>"; print_r($dados['senha']); echo "</pre>";
		$insert_usuario = "INSERT INTO usuario (id, nome, email, login, senha, nivel_acesso_id, created) VALUES (
			'" .$dados['id']. "',
			'" .trim(strtoupper(utf8_decode($dados['nome']))). "',
			'" .trim(strtolower(utf8_decode($dados['email']))). "@braspress.com',
			'" .trim(strtolower(utf8_decode($dados['email']))). "',
			'" .trim($dados['senha']). "',
			2,
			NOW());";
		$retorno_banco = mysqli_query($Conect, $insert_usuario);
		if (mysqli_insert_id($Conect)) {
			$_SESSION['msg_reg'] = "<p style='color: green'>Cadastrado com sucesso</p>";
			$_SESSION['msg_nome'] = $dados['nome'];
			header("location: sucess.php");
		}
		else{
			$_SESSION['msg_id'] = $dados['id'];
			$_SESSION['msg_nome'] = $dados['nome'];
			$_SESSION['msg_email'] = $dados['email'];
			$_SESSION['msg'] = "<p style='color: #6c757d'>Algo deu errado, tente novamente e se não for possivel concluir, contate-me via e-mail <a href='mailto:ti.lucas@braspress.com?Subject=Problemas%20ao%20registrar%20novo%20usuário'>ti.lucas@braspress.com</a></p>";
			header('location: register.php');
		}
	}//end Error
}	
?>