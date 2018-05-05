<?php
	session_start();
	ini_set('default_charset', 'UTF-8');
	$btn_cad = filter_input(INPUT_POST, 'btn_cad', FILTER_SANITIZE_STRING);
		include_once ("SQL/conexao.php");
		$error = false;

		//Consultar nivel

		//Recebendo os dados
		$rec_filial = filter_input(INPUT_POST, 'filial', FILTER_SANITIZE_STRING);
		$filial = trim(strtoupper(utf8_decode($rec_filial)));
		$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
		$jira = filter_input(INPUT_POST, 'jira', FILTER_SANITIZE_NUMBER_INT);
		$rec_defeito = filter_input(INPUT_POST, 'defeito', FILTER_SANITIZE_STRING);
		$defeito = trim(strtoupper(utf8_decode($rec_defeito)));
		if(!(empty($_POST['status_outros']))){
			$status_rec = $_POST['status_outros'];
			$status_rec1 = filter_input(INPUT_POST, 'status_outros', FILTER_SANITIZE_STRING);
			$status = strtoupper(utf8_decode($status_rec1));
		}
		else{
			$status_rec = $_POST['status'];
			$status_rec1 = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
			$status = strtoupper(utf8_decode($status_rec1));
		}
	
		
		//Validações
		if(!(strlen($filial) === 3)){
			$error = true;
			$_SESSION['msg_filial'] = "$filial";
			$_SESSION['msg_pat'] = "$patrimonio";
			$_SESSION['msg_jira'] = "$jira";
			$_SESSION['msg_filial2'] = "A filial deve conter 3 caracteres";
			header('location: create.php');	
		}elseif ((strlen($patrimonio) > 8) OR empty($patrimonio)){
			$error = true;
			$_SESSION['msg_filial'] = "$filial";
			$_SESSION['msg_pat'] = "$patrimonio";
			$_SESSION['msg_jira'] = "$jira";
			$_SESSION['msg_pat2'] = "Patrimônio deve ser preenchido com até 6 números";
			header('location: create.php');	
		}elseif (((!is_numeric($jira)) OR strlen($jira) > 6) OR empty($jira)){
			$error = true;		
			$_SESSION['msg_filial'] = "$filial";
			$_SESSION['msg_pat'] = "$patrimonio";
			$_SESSION['msg_jira'] = "$jira";
			$_SESSION['msg_jira2'] = "Jira deve ser preenchido com até 6 números";
			header('location: create.php');
		}elseif ((empty($defeito)) OR (strlen($defeito) > 60)) {
			$error = true;
			$_SESSION['msg_filial'] = "$filial";
			$_SESSION['msg_pat'] = "$patrimonio";
			$_SESSION['msg_jira'] = "$jira";
			$_SESSION['msg_defeito'] = "$defeito";
			$_SESSION['msg_defeito2'] = "Preencha Defeito com até 60 caracteres";
			header('location: create.php');
		}

		
		if (!$error == true) {
				//Insere no banco
			$insert_registro = "INSERT INTO manut_maquinas (filial, patrimonio, jira, defeito, dt_manu, status, dt_criacao, dt_hr_criacao, criado_por) VALUES ('$filial', '$patrimonio', '$jira', '$defeito', '0000-00-00', '$status', NOW(), NOW(), '".$_SESSION['nome']."');";
			$retorno_banco = mysqli_query($Conect, $insert_registro);
			$_SESSION['msg'] = "<p style='color: gray'><b>Patrimônio: $patrimonio</b> Registrado com sucesso</p>";
			header('location: create.php');
		}
		
?>	


