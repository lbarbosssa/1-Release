<?php
session_start();
ini_set('default_charset', 'UTF-8');
include_once ("SQL/conexao.php");
$error = false;

		//Recebendo os dados
		$cod_manut = filter_input(INPUT_POST, 'cod_manut', FILTER_SANITIZE_NUMBER_INT);
		$rec_filial = filter_input(INPUT_POST, 'filial', FILTER_SANITIZE_STRING);
		$filial = trim(strtoupper(utf8_decode($rec_filial)));
		$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
		$jira = filter_input(INPUT_POST, 'jira', FILTER_SANITIZE_NUMBER_INT);
		$rec_defeito = filter_input(INPUT_POST, 'defeito', FILTER_SANITIZE_STRING);
		$defeito = trim(strtoupper(utf8_decode($rec_defeito)));
		$rec_laudo_tec = filter_input(INPUT_POST, 'laudo_tec', FILTER_SANITIZE_STRING);
		$laudo_tec = trim(strtoupper(utf8_decode($rec_laudo_tec)));
		$rec_obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
		$obs = trim(strtoupper(utf8_decode($rec_obs)));
		$rec_tecnico = filter_input(INPUT_POST, 'tec_resp', FILTER_SANITIZE_STRING);
		$tecnico = trim(strtoupper(utf8_decode($rec_tecnico)));
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

		$data = $_POST['data'];
		echo "$status";

		if (empty($data)) {
			$comand = "update manut_maquinas 
						SET filial = '$filial', patrimonio = '$patrimonio', jira = '$jira', defeito = '$defeito', laudo_tec = '$laudo_tec', dt_manu = NOW(), 
						OBS = '$obs', tec_responsavel = '$tecnico', status = '$status', dt_modificacao = NOW(), modificado_por = '".$_SESSION['nome']."'
						WHERE cod_manut = '$cod_manut';";
		}else{//Data Preenchida
			$comand = "update manut_maquinas 
						SET filial = '$filial', patrimonio = '$patrimonio', jira = '$jira', defeito = '$defeito', laudo_tec = '$laudo_tec', dt_manu = '$data', 
						OBS = '$obs', tec_responsavel = '$tecnico', status = '$status', dt_modificacao = NOW(), modificado_por = '".$_SESSION['nome']."'
						WHERE cod_manut = '$cod_manut';";
		}
		


	
		
		//Validações
		
		if((!(strlen($filial) === 3)) OR stristr($filial, "'")){
			$error = true;
			$_SESSION['msg_filial2'] = "<p style='color: gray'><b>$filial Invalido.</b> A filial deve conter 3 caracteres</p>";
			header('location: update.php?cod_manut='.$cod_manut.'.php');	
		}elseif ((strlen($patrimonio) > 8) OR empty($patrimonio)){
			$error = true;
			$_SESSION['msg_pat2'] = "<p style='color: gray'><b>$patrimonio Invalido.</b> O patrimônio deve ser preenchido com até 6 números</p>";
			header('location: update.php?cod_manut='.$cod_manut.'.php');
		}elseif (((!is_numeric($jira)) OR strlen($jira) > 6) OR empty($jira)){		
			$error = true;
			$_SESSION['msg_jira2'] = "<p style='color: gray'><b>$jira Invalido.</b> O Jira deve ser preenchido com até 6 números</p>";
			header('location: update.php?cod_manut='.$cod_manut.'.php');
		}elseif ((empty($defeito)) OR (strlen($defeito) > 60) OR (strlen($defeito) < 5) OR stristr($defeito, "'")) {
			$error = true;
			$_SESSION['msg_defeito2'] = "<p style='color: gray'><b>$defeito Invalido.</b> Preencha Defeito com até 60 caracteres</p>";
			header('location: update.php?cod_manut='.$cod_manut.'.php');
		}elseif ((empty($laudo_tec)) OR (strlen($laudo_tec) < 5) OR (strlen($laudo_tec) > 100) OR stristr($laudo_tec, "'")) {
			$error = true;
			$_SESSION['msg_laudo_tec2'] = "<p style='color: gray'><b>$laudo_tec Invalido.</b> Preencha o Luado com até 100 caracteres</p>";
			header('location: update.php?cod_manut='.$cod_manut.'.php');
		}
		elseif (empty($tecnico)){
			$error = true;
			$_SESSION['msg_tec_resp2'] = "<p style='color: gray'><b>$laudo_tec Invalido.</b> Preencha Defeito com até 100 caracteres</p>";

		}

		if ($error == false) {	
			$update_banco = $comand;
			echo "$update_banco";
			$retorno_banco = mysqli_query($Conect, $update_banco);
			if (mysqli_insert_id($Conect)) {
				header('location: read.php?pagina=1');
			}
			else{
				$_SESSION['msg'] = "<p class='text-center'>Manutenção do patrimônio <b>$patrimonio</b> inserido com sucesso</p>";
				header('location: read.php?pagina=1');
			}
		}
?>