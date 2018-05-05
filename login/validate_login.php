<?php 
	session_start();
	include_once ("../SQL/conexao.php");
	$btn_login = filter_input(INPUT_POST, 'btn_login', FILTER_SANITIZE_STRING);
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario";
	
			$result_usuario = "SELECT id, nome, login, senha FROM usuario WHERE login='$usuario' LIMIT 1";
			$resultado_usuario = mysqli_query($Conect, $result_usuario);
			if ($resultado_usuario) {
				$row_user = mysqli_fetch_assoc($resultado_usuario);
			}

		if (!empty($usuario) and (!empty($senha))){
			//Gerar senha criptografada
			//echo password_hash($senha, PASSWORD_DEFAULT);
			//Pesquisar user no ID
			
				if ($usuario <> $row_user['login']){
					$_SESSION['msg'] = "<p style='color: red'>Usuario Incorreto</p>";
					header("location: login.php");
				}elseif(empty($senha)){
					$_SESSION['msg_user'] = $row_user['login'];
					$_SESSION['msg'] = "<p style='color: red'>Informe sua senha</p>";
					header("location: login.php");

				}

				elseif (password_verify($senha, $row_user['senha'])) {
				$_SESSION['id'] = $row_user['id'];
				$_SESSION['nome'] = $row_user['nome'];
				$_SESSION['login'] = $row_user['login'];
					$command_nivel_aceso = "select nivel_acesso_id from usuario where login='$usuario';";
					$result_nivel_acesso = mysqli_query($Conect, $command_nivel_aceso);
					$row_nivel_acesso = mysqli_fetch_assoc($result_nivel_acesso);
					$nivel_acesso = $row_nivel_acesso['nivel_acesso_id'];
					$_SESSION['nv'] = $row_nivel_acesso['nivel_acesso_id'];
						if($nivel_acesso == 1){
							header("location: ../read.php?pagina=1");
						}else {
							header("location: ../read_basic.php?pagina=1");
						}							
				}else{
					$_SESSION['msg_user'] = $row_user['login'];
					$_SESSION['msg'] = "<p style='color: red'>Senha Incorreta</p>";
					header("location: login.php");
				}

			
		}//end if !empty
		
		elseif ($usuario === $row_user['login']) {
			$_SESSION['msg_user'] = $row_user['login'];
			$_SESSION['msg'] = "<p style='color: #6c757d'><b>". ucwords(strtolower(utf8_decode($row_user['nome']))). "</b> Informe sua senha</p>";
			header("location: login.php");
			}

		else{
			unset($_SESSION['msg_user']);
			$_SESSION['msg'] = "<p style='color: red'>Informe o usuário e a senha</p>";
			header("location: login.php");
		}
			



?>