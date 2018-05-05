<?php 
session_start(); 
include 'functions.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Bootstrap Start -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  <!-- Fontawesome Start -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

  <!-- Local Styles -->
  <link rel="stylesheet"  href="css/style.css">
  
  <style>
  .container-fluid {
    width: 90%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }
  button:focus {
    outline: 0;
  }

  .navbar .dropdown-menu .form-control {
      width: 200px;
  }

  h3{
    margin-top: 10px
  }



  /*Ajustes*/
  @media only screen and (min-width: 600px) {
  .container-fluid {
    width: 30%;
  }
  }


  @media only screen and (min-width: 1340px) {
  .container-fluid {
    width: 20%;
  }
  }

  @media only screen and (min-width: 2000px) {
  .container-fluid {
    width: 18%;
  }
  }


  #center_display{
    height: 89vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    }  

  .container{
  width: 85%
}

  </style>

  <script language="javascript">
	function CopyToClipboard(containerid) {
	if (document.selection) { 
	    var range = document.body.createTextRange();
	    range.moveToElementText(document.getElementById(containerid));
	    range.select().createTextRange();
	    document.execCommand("copy"); 

	} else if (window.getSelection) {
	    var range = document.createRange();
	     range.selectNode(document.getElementById(containerid));
	     window.getSelection().addRange(range);
	     document.execCommand("copy");
	     
	}}
</script>
  <title>Consultar Filial</title>
</head>
<body>
	<title>Consultar Filial</title>
	<script language="javascript">
	function CopyToClipboard(containerid) {
	if (document.selection) { 
	    var range = document.body.createTextRange();
	    range.moveToElementText(document.getElementById(containerid));
	    range.select().createTextRange();
	    document.execCommand("copy"); 

	} else if (window.getSelection) {
	    var range = document.createRange();
	     range.selectNode(document.getElementById(containerid));
	     window.getSelection().addRange(range);
	     document.execCommand("copy");
	     
	}}
</script>
</head>
<body>
<?php inicio_nav();?>
    <ul class="nav navbar-nav">
    	<li class="nav-item"><a href="read.php?pagina=1" class="nav-link">Registros</a></li>
   		<li class="nav-item"><a href="create.php" class="nav-link">Adicionar</a></li>
    	<li class="nav-item"><a href="#" class="nav-link disabled">Inserir Laudo</a></li>
    	<li class="nav-item"><a href="tag.php?pagina=1" class="nav-link">Gerar Etiqueta</a></li>
    	<li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
    	<li class="nav-item"><a href="search_filial.php" class="nav-link active">Consultar Filial</a></li>
  </ul>
<?php fim_nav();?>

<?php
	$f = isset($_POST["n_filial"])?$_POST["n_filial"]:"Não informado";
	$filial = strtoupper($f);
	$default = "Não encontramos: $filial";

	switch ($filial) {

		case "AJU":
		case "ARACAJU":
			$filial = "Filial: Aracaju<br> Sigla: AJU<br>Código: 1006<br>CNPJ: <span id=\"div1\">48740351003423 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SE";
			break;	

		case "AQA":
		case "ARARAQUARA":
			$filial = "Filial: Araraquara<br> Sigla: AQA<br>Código: 1036<br>CNPJ: <span id=\"div1\">48740351008816 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px;\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;	

		case "ARU":
		case "ARAçATUBA":
		case "ARACATUBA":
			$filial = "Filial: Araçatuba<br> Sigla: ARU<br>Código: 1087<br>CNPJ: <span id=\"div1\">48740351009464 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "BAU":
		case "BAURU":
			$filial = "Filial: Bauru<br> Sigla: BAU<br>Código: 1000<br>CNPJ: <span id=\"div1\">48740351005639 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;	

		case "BEL":
		case "BELéM":
		case "BELEM":
			$filial = "Filial: Belém<br> Sigla: BEL<br>Código: 1053<br>CNPJ: <span id=\"div1\">48740351006791 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PA";
			break;

		case "BHZ":
		case "BELO HORIZONTE":
		case "BELOHORIZONTE":
			$filial = "Filial: Belo Horizonte<br> Sigla: BHZ<br>Código: 1001<br>CNPJ: <span id=\"div1\">48740351000246 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;	

		case "BNU":
		case "BlUMENAU":
			$filial = "Filial: Blumenau<br> Sigla: BNU<br>Código: 1003<br>CNPJ: <span id=\"div1\">48740351001480 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;	

		case "BSB":
		case "BRASILIA":
		case "BRASíLIA":	
			$filial = "Filial: Brasília<br> Sigla: BSB<br>Código: 1002<br>CNPJ: <span id=\"div1\">48740351001137 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: DF";
			break;

		case "BTA":
		case "BTI":
		case "AEROPRESS":
			$filial = "Filial: AeroPress<br> Sigla: BTA<br>Código: 1254<br>CNPJ: <span id=\"div1\">48740351011361 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;		

		case "BTB":
		case "TAMBORE":
		case "TAmBORé":
			$filial = "Filial: Tamboré<br> Sigla: BTB<br>Código: 1081<br>CNPJ: <span id=\"div1\">48740351008220 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "CAC":
		case "CASCAVEL":
			$filial = "Filial: Cascavel<br> Sigla: CAC<br>Código: 1026<br>CNPJ: <span id=\"div1\">48740351002532 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "CAU":
		case "CARUARU":
			$filial = "Filial: Caruaru<br> Sigla: CAU<br>Código: 1104<br>CNPJ: <span id=\"div1\">48740351010802 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PE";
			break;

		case "CAW":
		case "CAMPOS DOS GOYTACAZES":
		case "CAMPOSDOSGOYTACAZES":
		case "CAMPOSDOS GOYTACAZES":		
		case "CAMPOS DOSGOYTACAZES":
			$filial = "Filial: Campos dos Goytacazes<br> Sigla: CAW<br>Código: 1004<br>CNPJ: <span id=\"div1\">48740351003261 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RJ";
			break;

		case "CCM":
		case "CRICIUMA":
			$filial = "Filial: Criciuma<br> Sigla: CCM<br>Código: 1063<br>CNPJ: <span id=\"div1\">48740351005558 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;

		case "CCT":
		case "CANTAREIRA":
			$filial = "Filial: Cantareira<br> Sigla: CCM<br>Código: 1108<br>CNPJ: <span id=\"div1\">48740351011442 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "CGB":
		case "CUIABA":
		case "CUIABá":
			$filial = "Filial: Cuiabá<br> Sigla: CGB<br>Código: 1038<br>CNPJ: <span id=\"div1\">48740351000912 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MT";
			break;
		
		 case "COL":
		 case "COLATINA":
		 	$filial = "Filial: Colatina<br> Sigla: COL<br>Código: 1054<br>CNPJ: <span id=\"div1\">48740351006449 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: ES";
			break;

		case "CPQ":
		case "CAMPINAS":
			$filial = "Filial: Campinas<br> Sigla: CPQ<br>Código: 1005<br>CNPJ: <span id=\"div1\">48740351011523 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;
	
		case "CPV":
		case "CAMPINA GRADE":
		case "CAMPINAGRANDE":
			$filial = "Filial: Campina Grande<br> Sigla: CPV<br>Código: 1103<br>CNPJ: <span id=\"div1\">48740351010985 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PB";
			break;

		case "CSU":
		case "SANTA CRUZ DO SUL":
		case "SANTACRUZDOSUL":
		case "SANTA CRUZDOSUL":	
		case "SANTACRUZ DOSUL":
		case "SANTACRUZDO SUL":
		case "SANTA CRUZDOSUL":
		case "SANTA CRUZ DOSUL":
		case "SANTA CRUZDO SUL":
		case "SANTACRUZ DO SUL":
			$filial = "Filial: Santa Cruz do Sul<br> Sigla: CSU<br>Código: 1073<br>CNPJ: <span id=\"div1\">48740351007763 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;	

		case "CWB":
		case "CURITIBA":	
			$filial = "Filial: Curitiba<br> Sigla: CWB<br>Código: 1022<br>CNPJ: <span id=\"div1\">48740351000327 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "CXJ":
		case "CAXIAS DO SUL":
		case "CAXIASDOSUL":
		case "CAXIAS DOSUL":
		case "CAXIASDO SUL":
			$filial = "Filial: Caxias do Sul<br> Sigla: CXJbr>Código: 1046<br>CNPJ: <span id=\"div1\">48740351004667 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;

		case "CXO":
		case "CACHOEIRO DE ITAPAPEMIRIM":
		case "CACHOEIRODEITAPAPEMIRIM":
		case "CACHOEIRODE ITAPAPEMIRIM":
		case "CACHOEIRO DEITAPAPEMIRIM":
			$filial = "Filial: Caxhoeiro de Itapemirim<br> Sigla: CXO<br>Código: 1057<br>CNPJ: <span id=\"div1\">48740351007178 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: ES";
			break;

		case "DIQ":
		case "DIVINOPOLIS":
		case "DIVINóPOLIS":
			$filial = "Filial: Divinópolis <br> Sigla: DIQ<br>Código: 1085<br>CNPJ: <span id=\"div1\">48740351009030 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "DPW":
		case "PIRACICABA":
			$filial = "Filial: Piracicaba <br> Sigla: DWB<br>Código: 1070<br>CNPJ: <span id=\"div1\">48740351008492 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "FLN":
		case "FLORIANOPOLIS":
		case "FLORIANÓPOLIS":
			$filial = "Filial: Florianópolis <br> Sigla: FLN<br>Código: 1009<br>CNPJ: <span id=\"div1\">48740351001560 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;

		case "FOR":
		case "FORTALEZA":
			$filial = "Filial: Fortaleza <br> Sigla: FOR<br>Código: 1007<br>CNPJ: <span id=\"div1\">48740351002885 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: CE";
			break;

		case "FRC":
		case "FRANCA":
			$filial = "Filial: Franca <br> Sigla: FRC<br>Código: 1111<br>CNPJ: <span id=\"div1\">48740351011876 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;	

		case "FSA":
		case "FEIRA DE SANTANA DE PARANAIBA":
		case "FEIRA DE SANTANA DE PARANAíBA":
		case "FEIRADESANTANADEPARANAíBA":
		case "FEIRADESANTANADEPARANAIBA":	
			$filial = "Filial: Feira de Santana de Parnaíba <br> Sigla: FSA<br>Código: 1044<br>CNPJ: <span id=\"div1\">48740351003180 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: BA";
			break;

		case "GEL":
		case "SANTO ANGELO":
		case "SANTOANGELO":
			$filial = "Filial: Santo Angelo <br> Sigla: GEL<br>Código: 1077<br>CNPJ: <span id=\"div1\">48740351003938 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;		

		case "GPB":
		case "GARAPUAVA":
			$filial = "Filial: Guarapuava <br> Sigla: GPB<br>Código: 1061<br>CNPJ: <span id=\"div1\">48740351003857 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;	

		case "GRU":
		case "GUARULHOS":
			$filial = "Filial: Guarulhos<br> Sigla: GRU<br>CNPJ: <span id=\"div1\">48740351013909 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;
			
		case "GVR":
		case "GOVERNADOR VALADARES":	
		case "GOVERNADORVALADARES":
			$filial = "Filial: Governador Valadares <br> Sigla: GVR<br>Código: 1010<br>CNPJ: <span id=\"div1\">48740351005043 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;	

		case "GYN":
		case "GOIANIA":
			$filial = "Filial: GOIANIA <br> Sigla: GYN<br>Código: 1011<br>CNPJ: <span id=\"div1\">48740351001218 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: GO";
			break;

		case "IMP":
		case "IMPERATRIZ":
			$filial = "Filial: Imperatriz <br> Sigla: IMP<br>Código: 1049<br>CNPJ: <span id=\"div1\">48740351006872 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MA";
			break;			

		case "IPN":
		case "IPATINGA":
			$filial = "Filial: Ipatinga <br> Sigla: IPN<br>Código: 1086<br>CNPJ: <span id=\"div1\">48740351009200 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "ITJ":
		case "ITAJAI":
		case "ITAJAí":
			$filial = "Filial: Itajaí <br> Sigla: ITJ<br>Código: 1122<br>CNPJ: <span id=\"div1\">48740351012767 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;				

		case "JDF":
		case "JUIZ DE FORA":
		case "JUIZDEFORA":	
		case "JUIZ DEFORA":
		case "JUIZDE FORA":
			$filial = "Filial: Juiz de Fora <br> Sigla: JDF<br>Código: 1012<br>CNPJ: <span id=\"div1\">48740351005205 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "JDO":
		case "JUAZEIRO DO NORTE":
		case "JUAZEIRODONORTE":
		case "JUAZEIRO DONORTE":
		case "JUAZEIRODO NORTE":
		case "JOAZEIRO DO NORTE":
		case "JOAZEIRODONORTE":
		case "JOAZEIRO DONORTE":
		case "JOAZEIRODO NORTE":
			$filial = "Filial: Juazeiro do Norte <br> Sigla: JDO<br>Código: 1099<br>CNPJ: <span id=\"div1\">48740351010632 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: CE";
			break;		

		case "JOI":
		case "JOINVILLE":
		case "JOINVILE":
			$filial = "Filial: Joinville <br> Sigla: JOI<br>Código: 1051<br>CNPJ: <span id=\"div1\">48740351002290 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;

		case "JPA":
		case "JOAO PESSOA":
		case "JOAOPESSOA":
		case "JOãO PESSOA":
		case "JOãOPESSOA":
			$filial = "Filial: João Pessoa <br> Sigla: JPA<br>Código: 1008<br>CNPJ: <span id=\"div1\">48740351004586 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PB";
			break;

		case "LDB":
		case "LONDRINA":
			$filial = "Filial: Londrina <br> Sigla: LDB<br>Código: 1028<br>CNPJ: <span id=\"div1\">48740351002451 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "MAB":
		case "MARABA":
		case "MARABá":
			$filial = "Filial: Marabá <br> Sigla: MAB<br>Código: 1055<br>CNPJ: <span id=\"div1\">48740351002451 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PA";
			break;

		case "MAO":
		case "MANUAS"	:
			$filial = "Filial: Manaus <br> Sigla: MAO<br>Código: 1062<br>CNPJ: <span id=\"div1\">48740351005396 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: AM";
			break;	

		case "MCZ":
		case "MACEIO":
		case "MACEIó":
			$filial = "Filial: Maceió <br> Sigla: MCZ<br>Código: 1015<br>CNPJ: <span id=\"div1\">48740351006600 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: AL";
			break;	

		case "MEA":
		case "MACAE":
		case "MACAé":
			$filial = "Filial: Macaé <br> Sigla: MCZ<br>Código: 1100<br>CNPJ: <span id=\"div1\">48740351010390 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RJ";
			break;

		case "MGF":
		case "MARINGA":
		case "MARINGá":
			$filial = "Filial: Maringá <br> Sigla: MGF<br>Código: 1060<br>CNPJ: <span id=\"div1\">48740351003695 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "MOC":
		case "MONTES CLAROS":
		case "MONTESCLAROS":
			$filial = "Filial: Montes Claros <br> Sigla: MOC<br>Código: 1013<br>CNPJ: <span id=\"div1\">48740351005981 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "MSS":
		case "CAMPO GRANDE":
		case "CAMPOGRANDE":
			$filial = "Filial: Campo Grande <br> Sigla: MSS<br>Código: 1039<br>CNPJ: <span id=\"div1\">48740351007097 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MS";
			break;

		case "NAT":
		case "NATAL":
			$filial = "Filial: Natal <br> Sigla: NAT<br>Código: 1023<br>CNPJ: <span id=\"div1\">48740351001307 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RN";
			break;
		
		case "NBR":
		case "BARREIRAS":
			$filial = "Filial: Barreiras <br> Sigla: NBR<br>Código: 1129<br>CNPJ: <span id=\"div1\">48740351013143 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: BA";
			break;

		case "NFG":
		case "NOVA FRIBURGO":
		case "NOVAFRIBURGO":
			$filial = "Filial: Nova Friburgo <br> Sigla: NFG<br>Código: 1052<br>CNPJ: <span id=\"div1\">48740351003008 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RJ";
			break;	

		case "NZA":
		case "POUSO ALEGRE":
		case "POUSOALEGRE":
			$filial = "Filial: Pouso Algre <br> Sigla: NZA<br>Código: 1094<br>CNPJ: <span id=\"div1\">48740351010128 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "PET":
		case "PELOTAS":
		case "PELóTAS":
			$filial = "Filial: Pelotas <br> Sigla: PET<br>Código: 1047<br>CNPJ: <span id=\"div1\">48740351004071 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;

		case "PFB":
		case "PASSO FUNDO":
		case "PASSOFUNDO":
			$filial = "Filial: Passo Fundo <br> Sigla: PFB<br>Código: 1035<br>CNPJ: <span id=\"div1\">48740351004403 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;

		case "PGT":
		case "PORANGATU":
			$filial = "Filial: Porangatu <br> Sigla: PGT<br>Código: 1045<br>CNPJ: <span id=\"div1\">48740351002028 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: GO";
			break;

		case "PGZ":
		case "PONTA GROSSA":
		case "PONTAGROSSA":
			$filial = "Filial: Ponta Grossa <br> Sigla: PGZ<br>Código: 1059<br>CNPJ: <span id=\"div1\">48740351003776 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "PMW":
		case "PALMAS":
			$filial = "Filial: Palmas <br> Sigla: PMW<br>Código: 1040<br>CNPJ: <span id=\"div1\">48740351004748 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: TO";
			break;

		case "PNZ":
		case "PETROLINA":
			$filial = "Filial: Petrolina <br> Sigla: PNZ<br>Código: 1050<br>CNPJ: <span id=\"div1\">48740351006520 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PE";
			break;

		case "POA":
		case "PORTO ALEGRE":
		case "PORTOALEGRE":
			$filial = "Filial: Porto Alegre <br> Sigla: POA<br>Código: 1014<br>CNPJ: <span id=\"div1\">48740351000831 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;
		
		case "POJ":
		case "PATOS DE MINAS":
		case "PATOSDEMINAS":
		case "PATOS DEMINAS":
		case "PATOSDE MINAS":
			$filial = "Filial: Patos de Minas <br> Sigla: POJ<br>Código: 1033<br>CNPJ: <span id=\"div1\">48740351009979 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "PPR":
		case "PRESIDENTE PRUDENTE":
		case "PRESIDENTEPRUDENTE":
			$filial = "Filial: Presidente Prudente <br> Sigla: PPR<br>Código: 1016<br>CNPJ: <span id=\"div1\">48740351001722 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "PTO":
		case "PATO BRANCO":
		case "PATOBRANCO":
			$filial = "Filial: Pato Branco <br> Sigla: PTO<br>Código: 1058<br>CNPJ: <span id=\"div1\">48740351003504 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "PTU":
		case "PARACATU":
			$filial = "Filial: Paracatu <br> Sigla: PTU<br>Código: 1017<br>CNPJ: <span id=\"div1\">48740351005124 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "QHV":
		case "NOVO HAMBURGO":
		case "NOVOHAMBURGO":
			$filial = "Filial: Novo Hamburgo <br> Sigla: QHV<br>Código: 1029<br>CNPJ: <span id=\"div1\">48740351004233 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;

		case "QJA":
		case "JARAGUá DO SUL":
		case "JARAGUáDOSUL":
		case "JARAGUá DOSUL":
		case "JARAGUáDO SUL":
		case "JARAGUA DO SUL":
		case "JARAGUADOSUL":
		case "JARAGUA DOSUL":
		case "JARAGUADO SUL":
			$filial = "Filial: Jaraguá do Sul <br> Sigla: QJA<br>Código: 1117<br>CNPJ: <span id=\"div1\">48740351012090 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;

		case "RAO":
		case "RIBEIRãO PRETO":
		case "RIBEIRAO PRETO":
		case "RIBEIRãOPRETO":
		case "RIBEIRAOPRETO":
			$filial = "Filial: Ribeirão Preto <br> Sigla: RAO<br>Código: 1018<br>CNPJ: <span id=\"div1\">48740351005477 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "RDS":
		case "RIO DO SUL":
		case "RIODOSUL":
		case "RIODO SUL":
		case "RIO DOSUL":
			$filial = "Filial: Rio do Sul <br> Sigla: RDS<br>Código: 1109<br>CNPJ: <span id=\"div1\">48740351011957 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			break;	

		case "REC":
		case "RECIFE":
			$filial = "Filial: Recife <br> Sigla: REC<br>Código: 1030<br>CNPJ: <span id=\"div1\">48740351002613 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PE";
			break;

		case "RIA":
		case "SANTA MARIA":
		case "SANTAMARIA":
			$filial = "Filial: Santa Maria <br> Sigla: RIA<br>Código: 1048<br>CNPJ: <span id=\"div1\">48740351004152 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;
		
		case "RIO":
		case "RIO DE JANEIRO":
		case "RIODEJANEIRO":
		case "RIO DEJANEIRO":
		case "RIODE JANEIRO":
			$filial = "Filial: Rio de Janeiro <br> Sigla: RIO<br>Código: 1019<br>CNPJ: <span id=\"div1\">48740351000408 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RJ";
			break;

		case "ROO":
		case "RONDONOPOLIS":
		case "RONDONóPOLIS":
			$filial = "Filial: Rondonópolis <br> Sigla: ROO<br>Código: 1066<br>CNPJ: <span id=\"div1\">48740351005710 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MT";
			break;
		
		case "RVD":
		case "RIO VERDE":
		case "RIOVERDE":
			$filial = "Filial: Rio Verde <br> Sigla: RVD<br>Código: 1020<br>CNPJ: <span id=\"div1\">48740351002702 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: GO";
			break;

		case "SDR":
		case "RESENDE":
		case "REZENDE":
			$filial = "Filial: Resende <br> Sigla: SDR<br>Código: 1116<br>CNPJ: <span id=\"div1\">48740351012252 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RJ";
			break;

		case "SJK":
		case "SAO JOSE DOS CAMPOS":
		case "SAOJOSEDOSCAMPOS":
		case "SAO JOSEDOSCAMPOS":
		case "SAOJOSE DOSCAMPOS":
		case "SAOJOSEDOS CAMPOS":
		case "SAO JOSE DOSCAMPOS":
		case "SAOJOSE DOS CAMPOS":
		case "SAOJOSEDOS CAMPOS":
		case "SãO JOSé DOS CAMPOS":
		case "SãOJOSéDOSCAMPOS":
		case "SãO JOSéDOSCAMPOS":
		case "SãOJOSé DOSCAMPOS":
		case "SãOJOSéDOS CAMPOS":
		case "SãO JOSé DOSCAMPOS":
		case "SãOJOSé DOS CAMPOS":
		case "SãOJOSéDOS CAMPOS":
			$filial = "Filial: São José dos Campos <br> Sigla: SJK<br>Código: 1021<br>CNPJ: <span id=\"div1\">48740351001056 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "SJP":
		case "SAO JOSE DO RIO PRETO":
		case "SAOJOSEDORIOPRETO":
		case "SAOJOSE DO RIO PRETO":
		case "SAOJOSEDO RIO PRETO":
		case "SAOJOSEDORIO PRETO":
		case "SAO JOSEDORIOPRETO":
		case "SAO JOSEDORIOPRETO":
		case "SAO JOSE DORIOPRETO":
		case "SAO JOSE DO RIOPRETO":
		case "SãO JOSé DO RIO PRETO":
		case "SãOJOSéDORIOPRETO":
		case "SãOJOSé DO RIO PRETO":
		case "SãOJOSéDO RIO PRETO":
		case "SãOJOSéDORIO PRETO":
		case "SãO JOSéDORIOPRETO":
		case "SãO JOSéDORIOPRETO":
		case "SãO JOSé DORIOPRETO":
		case "SãO JOSé DO RIOPRETO":
			$filial = "Filial: São José do Rio Preto <br> Sigla: SJP<br>Código: 1024<br>CNPJ: <span id=\"div1\">48740351001994 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "SLZ":
		case "SAO LUIS":
		case "SAOLUIS":
		case "SãO LUíS":
		case "SãOLUíS":
		case "SãO LUIS":
		case "SãOLUIS":
		case "SAO LUíS":
		case "SAOLUíS":
		case "SAO LUIZ":
		case "SAOLUIZ":
		case "SãO LUíZ":
		case "SãOLUíZ":
		case "SãO LUIZ":
		case "SãOLUIZ":
		case "SAO LUíZ":
		case "SAOLUíZ":
			$filial = "Filial: São Luíz <br> Sigla: SLZ<br>Código: 1041<br>CNPJ: <span id=\"div1\">48740351006368 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MA";
			break;

		case "SOD":
		case "SOROCABA":
			$filial = "Filial: Sorocaba <br> Sigla: SOD<br>Código: 1080<br>CNPJ: <span id=\"div1\">48740351007410 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "SSA":
		case "SALVADOR":
		case "SAUVADOR":
			$filial = "Filial: Salvador <br> Sigla: SSA<br>Código: 1027<br>CNPJ: <span id=\"div1\">48740351002966 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: BA";
			break;

		case "SSZ":
		case "SANTOS":
			$filial = "Filial: Santos <br> Sigla: SSZ<br>Código: 1032<br>CNPJ: <span id=\"div1\">48740351002370 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "STO":
		case "SANTO AMARO":
		case "SANTOAMARO":
		case "SANTO áMARO":
		case "SANTOáMARO":
			$filial = "Filial: Santo Amaro <br> Sigla: STO<br>Código: 1131<br>CNPJ: <span id=\"div1\">48740351013739 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SP";
			break;

		case "THE":
		case "TERESINA":
		case "THERESINA":
		case "TEREZINA":
		case "THEREZINA":
			$filial = "Filial: Teresina <br> Sigla: THE<br>Código: 1042<br>CNPJ: <span id=\"div1\">48740351006287 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PI";
			break;

		case "TRL":
		case "TRES LAGOAS":
		case "TRESLAGOAS":
		case "TRêS LAGOAS":
		case "TRêSLAGOAS":
			$filial = "Filial: Três Lagoas <br> Sigla: TRL<br>Código: 1110<br>CNPJ: <span id=\"div1\">48740351011795 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "UBA":
		case "UBERABA":
			$filial = "Filial: Uberaba <br> Sigla: UBA<br>Código: 1034<br>CNPJ: <span id=\"div1\">48740351009545 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "UDI":
		case "UBERLANDIA":
		case "UBERLâNDIA":
			$filial = "Filial: Uberlândia <br> Sigla: UDI<br>Código: 1031<br>CNPJ: <span id=\"div1\">48740351004900 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "UMU":
		case "UMUARAMA":
			$filial = "Filial: Umuarama <br> Sigla: UMU<br>Código: 1101<br>CNPJ: <span id=\"div1\">48740351010470 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: PR";
			break;

		case "URG":
		case "URUGUAIANA":
			$filial = "Filial: Uruguaiana <br> Sigla: URG<br>Código: 1056<br>CNPJ: <span id=\"div1\">48740351004314 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: RS";
			break;

		case "VAG":
		case "VARGINHA":
		case "VáRGINHA":
			$filial = "Filial: Varginha <br> Sigla: VAG <br>Código: 1025<br>CNPJ: <span id=\"div1\">48740351004829 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: MG";
			break;

		case "VDC":
		case "VITORIA DA CONQUISTA":
		case "VITORIADACONQUISTA":
		case "VITORIA DACONQUISTA":
		case "VITORIADA CONQUISTA":
		case "VITóRIA DA CONQUISTA":
		case "VITOóIADACONQUISTA":
		case "VITóRIA DACONQUISTA":
		case "VITóRIADA CONQUISTA":
			$filial = "Filial: Vitória da Conquista <br> Sigla: VDC <br>Código: 1043<br>CNPJ: <span id=\"div1\">48740351003342 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: BA";
			break;

		case "VIX":
		case "VITóRIA":
		case "VITORIA":
			$filial = "Filial: Vitória <br> Sigla: VIX <br>Código: 1037<br>CNPJ: <span id=\"div1\">48740351001641 </span> <button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: ES";
			break;

		case "XAP":
		case "CHAPECO":
		case "CHAPECó":
		case "XAPECO":
		case "XAPECó":
			$filial = "Filial: Chapecó <br> Sigla: XAP <br>Código: 1098<br>CNPJ: <span id=\"div1\">48740351010209 </span><button class=\"btn btn-md btn btn-link\" name=\"btn_search\" onclick=\"CopyToClipboard('div1')\" style=\"font-size: 20px; color:\"><i class=\"fas fa-copy\"></i></button><br>Estado: SC";
			
			break;

		default:
			$filial = $default ;
	}/* end switch*/
?>
<div class="container-fluid">
      
        <div class="row" align="center">
            <div class="col-lg-12">
            	<section id="center_display">        		
            	
			          
			          <i class="fas fa-building" style="font-size: 80px; margin: 0px 0px 30px 0px; color: #6c757d"></i>
			          <form method="post" class="cx_busca form-inline" action="search_filial1.php">
				          	<div class="form-group">
				            	<input type="text-left" name="n_filial" class="form-control" placeholder="Informe a Filial" required>
				            	<button type="submit" class="btn btn-md btn btn-link d-none d-sm-block" name="btn_search" style="font-size: 25px; color: #007bff"><i class="fas fa-search"></i></button>
				            	
				            	<div style="padding: 10px 0px 0px 0px">
				            		<button type="submit" class="btn btn-md btn-primary btn-block d-block d-sm-none" name="btn_search">Pesquisar</button>
				            	</div>

				            </div>
			        
			        	</form>

					<div id="">
						<p style="text-align: left; padding: 5px 0px 0px 10px"><?php echo "$filial"?></p><br>
					</div>

			          <?php footer();?>
			    </section>
			</div>
		</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>