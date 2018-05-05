<?php 
session_start();
include_once ("SQL/conexao.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Download</title>
	<style>
		table{
			text-align: center;
			
		}

	</style>
</head>
<body>
<?php

$html = "
<table border=\"1\">
    <thead>
        <tr>               
    	    <th>Filial</th>
            <th>Patrimônio</th>
            <th>Jira</th>                       
        </tr>
    </thead>
    <tbody>

";
echo "$html";

			if (!empty($_POST['chk_cod_manut'])) {
				foreach ($_POST['chk_cod_manut'] as $id_tag) {
					//echo "$id_tag<br>";			
					$select = "SELECT filial, patrimonio, jira, defeito FROM manut_maquinas WHERE cod_manut = '$id_tag';";
					$retorno_select = mysqli_query($Conect, $select);
					while ($row_select = mysqli_fetch_assoc($retorno_select)){
						echo "<tr>";
						echo "<td>" . strtoupper(utf8_encode($row_select['filial'])) . "</td>";
						echo "<td>" . utf8_encode($row_select['patrimonio']) . "</td>";
						echo "<td>" . utf8_encode($row_select['jira']) . "</td>";
						echo "</tr>";
					}
				}
			}	


$html_end = "
	</tbody>
</table>
";
echo "$html_end";
?>

<?php
   // Determina que o arquivo é uma planilha do Excel
   header("Content-type: application/vnd.ms-excel");   

   // Força o download do arquivo
   header("Content-type: application/force-download");  

   // Seta o nome do arquivo
   header("Content-Disposition: attachment; filename=export_".date('d_m_Y').".xls");

   header("Pragma: no-cache");
   // Imprime o conteúdo da nossa tabela no arquivo que será gerado
   //echo $html;
?>
	


<?php /*if (!empty($_POST['chk_cod_manut'])) {
		foreach ($_POST['chk_cod_manut'] as $id_tag) {
			//echo "$id_tag<br>";			
			$select = "SELECT filial, patrimonio, jira, defeito FROM manut_maquinas WHERE cod_manut = '$id_tag';";
			$retorno_select = mysqli_query($Conect, $select);
			while ($row_select = mysqli_fetch_assoc($retorno_select)){

				$insert = "INSERT INTO nf (filial, patrimonio, jira, hr_adicao) VALUES ('".strtoupper(utf8_decode($row_select['filial']))."', '". $row_select['patrimonio']."', '".$row_select['jira']."', NOW());";
				$retorno_insert = mysqli_query($Conect, $insert);		
				echo "feito";				
			}			
		}
	}*/	
?>


</body>
</html>