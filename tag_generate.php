<?php 
session_start();
include_once ("SQL/conexao.php"); 
if (empty($_SESSION['id'])) {
  $_SESSION['msg_login'] = "Acesso restrito";
  header("location: login/login.php");
}
if ($_SESSION['nv'] == 2){
  $_SESSION['aaa'] = "<p class='text-center' style='color: #6c757d'><b>" . ucwords(utf8_encode(strtolower($_SESSION['nome']))) . "</b> você não tem permissão para essa funcionalidade.";
  header("location: read_basic.php?pagina=1");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet"  href="css/style.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
		body{
			
		}

		table{
			font-size: 12pt;
		}
		th {
    		width: 4cm;
		}

		@media print {
			body{
				margin-top: -0px;

			}
			.tag{
				padding: 6px;
			}
			table.table-bordered,tr{
    			border: 2px solid;
  			}

		}

		

  	

	</style>
	<title>Imprimir</title>
</head>
<body onload="self.print();self.close();">


	<?php

	if (!empty($_POST['chk_cod_manut'])) {

		foreach ($_POST['chk_cod_manut'] as $id_tag) {
			//echo "$id_tag<br>";
			$select = "SELECT filial, patrimonio, jira, defeito FROM manut_maquinas WHERE cod_manut = '$id_tag';";
			$retorno_banco = mysqli_query($Conect, $select);
			while ($row_select = mysqli_fetch_assoc($retorno_banco)){
				echo "<div class='tag'>";
				echo "<table class=\"table table-bordered\" style=\" width: 10cm; height: 2cm;\">";
				echo "<tbody>";
				echo "<tr>";
				echo "<th><b>Filial:</b></th>";
				echo "<td>". strtoupper(utf8_encode($row_select['filial'])) . "</tr>";
				echo "<th><b>Patrimônio:</b></th>";
				echo "<td>". utf8_encode($row_select['patrimonio']) . "</td>";
				echo "</tr><tr>";
				echo "<th><b>Jira:</b></th>";
				echo "<td>". utf8_encode($row_select['jira']) . "</td>";
				echo "</tr><tr>";
				echo "<th><b>Defeito:</b></th>";
				echo "<td>". strtoupper(utf8_encode($row_select['defeito'])) . "</td>";
				echo "<tr>";
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
				
			
			}
			
		}

	}
	/*else{
		$_SESSION['msg'] = "Selecione pelo menos um registro para gerar etiqueta";
		echo "<script language=\"javascript\">

			  setTimeout( 'fechar(); ',0);
			  function fechar(){
              if(document.all){
	              window.opener = window
		          window.close(\"#\")
              }else{
	            self.close();
              }
			  }			
			  </script>";
		header('location: tag.php?pagina=1');
	

	}*/
	?>


</body>
</html>