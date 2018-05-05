<?php
	//Paginação				   	tipo       valor     Filtrp do valor
	$atual_page = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	//Se a pagina atual não for vaiza, ela recebe o valor dela, e se for recebe 1
	$pag = (!empty($atual_page))?$atual_page:1;
	//Quantidade de itens por página
	 $qnt_result_pag = 50;
	//Incicialização desses itens 
	$inicio = ($qnt_result_pag * $atual_page) - $qnt_result_pag; //

	include_once ("C:\\xampp\htdocs\projects\Historic_machines\SQL\conexao.php");
	
	$result_user = "SELECT * from manut_maquinas LIMIT $inicio, $qnt_result_pag";	
	$resultado_usuario = mysqli_query($Conect, $result_user);


	
	echo "
		<table>
		<tr>
		<td>Filial</td>
		</tr>
		";
	while ($row_user = mysqli_fetch_assoc($resultado_usuario)) {
		echo "<tr>";
		echo "<td>" . utf8_encode($row_user['filial']) . "</td>";
		echo "</tr>";
	}
	echo "</table><br>";


		//Prog Paginação
		$result_user = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pag";
		//Nome do array     executa $result_user dento do banco
		$resultado_usuario = mysqli_query($Conect, $result_user);
	    //Paginação
		$result_pag = "SELECT COUNT(cod_manut) AS num_result FROM manut_maquinas "; //Contou linhas e atribui para num_result 
		$resultado_pag = mysqli_query($Conect, $result_pag); // Manda a query pro servidor e recebe
		$row_pag = mysqli_fetch_assoc($resultado_pag);//Retorna resuldado
		//echo $row_pag['num_result'];//exibe as linhas	
		$qnt_pg = ceil($row_pag['num_result'] / $qnt_result_pag);

		//Limitar os links antes e depois
		$max_links = 25;
		//Primeira
		echo "<a href='read.php?pagina=1'>Primeira </a>";
		//Anteriores
		for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) { 
			if ($pag_ant > 1) {
				echo "<a href='read.php?pagina=$pag_ant'>$pag_ant </a>";
			}

		}
		//Atual
		echo "$pag ";
		//Posteriores
		for ($pag_dep = $pag + 1; $pag_dep <= $pag + $max_links; $pag_dep++) { 
			if ($pag_dep <= $qnt_pg) {
				echo "<a href='lerdados.php?pagina=$pag_dep'>$pag_dep </a>";
			}
		}
		//Ultima
		echo "<a href='read.php?pagina=$qnt_pg'>Ultima</a>";
?>