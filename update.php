<?php 
session_start(); 
include 'functions.php';
include_once ("SQL/conexao.php");
if (empty($_SESSION['id'])) {
	$_SESSION['msg_login'] = "Acesso restrito";
	header("location: login/login.php");
}
if ($_SESSION['nv'] == 2){
	$_SESSION['aaa'] = "<p class='text-center' style='color: #6c757d'><b>" . ucwords(utf8_encode(strtolower($_SESSION['nome']))) . "</b> você não tem permissão para essa funcionalidade.";
	header("location: read_basic.php?pagina=1");
}

$cod_manut = filter_input(INPUT_GET, 'cod_manut', FILTER_SANITIZE_NUMBER_INT);
$select_maq = "SELECT * FROM manut_maquinas WHERE cod_manut = '$cod_manut' LIMIT 1";
$result_select = mysqli_query($Conect, $select_maq);
$tuplas = mysqli_fetch_assoc($result_select);

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
		width: 45%;
	}
	}


	@media only screen and (min-width: 1340px) {
	.container-fluid {
		width: 30%;
	}
	}

	@media only screen and (min-width: 2000px) {
	.container-fluid {
		width: 18%;
	}
	}

	</style>
	<title>Editar Registro</title>
</head>
<body>
<?php inicio_nav(); ?>
    <ul class="nav navbar-nav">
        <li class="nav-item"><a href="read.php?pagina=1" class="nav-link">Registros</a></li>
        <li class="nav-item"><a href="create.php" class="nav-link">Adicionar</a></li>
        <li class="nav-item"><a href="#" class="nav-link active">Inserir Laudo</a></li>
        <li class="nav-item"><a href="tag.php?pagina=1" class="nav-link">Gerar Etiqueta</a></li>
        <li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
        <li class="nav-item"><a href="search_filial.php" class="nav-link">Consultar Filial</a></li>
     </ul>
<?php fim_nav(); ?>
       

<div class="container-fluid">
	    
		    <div class="row" align="center">
		        <div class="col-lg-12" >
		            <h3 class="text-center">Editar Registro</h3>
		            	<?php 
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						?>
		 
		    <form method="post" action="update_process.php">
				  <div class="form-group">
				    <input type="text" class="form-control" id="" aria-describedby="Filial" placeholder="Sigla da Filial" name="filial" 
				    value="<?php echo $tuplas['filial']; ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_filial2'])) { echo $_SESSION['msg_filial2']; unset($_SESSION['msg_filial2']);}?></small>
				  </div>

				  <div class="form-row">
				    <div class="form-group col-md-6">
				      	<input type="text" class="form-control" id="" aria-describedby="Patrimonio" placeholder="Patrimônio" name="patrimonio" min="0"
				    value="<?php echo $tuplas['patrimonio']; ?>">
				    </div>

				    <div class="form-group col-md-6">
				     <input type="number" class="form-control" id="" aria-describedby="Jira" placeholder="Jira" name="jira" min="0" value="<?php echo $tuplas['jira']; ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_jira2'])) { echo $_SESSION['msg_jira2']; unset($_SESSION['msg_jira2']);}?></small>
				    </div>

				  </div>

				  <div class="form-group">
				    <input type="text" class="form-control"  id="" name="defeito" aria-describedby="Defeito" placeholder="Defeito relatado"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['defeito']))); ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_defeito2'])) { echo $_SESSION['msg_defeito2']; unset($_SESSION['msg_defeito2']);}?></small>
				  </div>

				  <div class="form-group">
				    <input type="text" class="form-control"  autofocus  name="laudo_tec" aria-describedby="Defeito" placeholder="Laudo Técnico"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['laudo_tec']))); ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_laudo_tec2'])) { echo $_SESSION['msg_laudo_tec2']; unset($_SESSION['msg_laudo_tec2']);}?></small>
				 </div>

				 <div class="form-group">
				    <input type="date" class="form-control"  id="" name="data"  value="<?php  echo $tuplas['dt_manu'];?>">
				 </div>

				 <div class="form-group">
				    <input type="text" class="form-control"  id="" name="obs" aria-describedby="Defeito" placeholder="Observações"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['OBS']))); ?>">
				 </div>

				 <div class="form-group">
			     	 <label for="exampleFormControlSelect1">Selecione o Técnico</label>
				     <select class="form-control" id="exampleFormControlSelect1" name="tec_resp">
				      <option value="CRISTIANO ISAIAS">Cristiano Isaias</option>
				      <option value="LUCAS BARBOSA">Lucas Barbosa</option>
				      <option value="LUCAS MARQUES">Lucas Marques</option>
				      <option value="VILMAR FELIX">Vilmar Felix</option>
				    </select>
			    </div>

			    <div class="form-group">
			     	 <label for="exampleFormControlSelect1">Status</label>
				    <select class="form-control" name="status">
				    	<option value="Em manutenção">Em manutenção</option>
				    	<option value="Aguardando NF">Aguardando NF</option>
				    	<option value="Enviado">Enviado</option>
				    	<option value="No laboratório">No laboratório</option>   
				    	<option value='option-1'>Outros</option>
					    
				    </select>

    			<input type="text" placeholder="Informe o status da manutenção" class="form-control one input" 
    			style="display: none" id="option-1" name="status_outros" />

			    </div>

			      <input type="hidden" name="cod_manut" value="<?php echo $tuplas['cod_manut'] ?>">
			  	  <button type="submit" class="btn btn-md btn-primary btn-block">Registrar</button>

			</form>

				</div>
			</div>
	</div>

	    	

	    	<!--<form method="post" action="update_process.php">
				  <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control" id="" aria-describedby="Filial" placeholder="Sigla da Filial" name="filial" 
				    value="<?php echo $tuplas['filial']; ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_filial2'])) { echo $_SESSION['msg_filial2']; unset($_SESSION['msg_filial2']);}?></small>
				  </div>	 

				  <div class="form-group col-xs-3 col-xs-offset-3 col-sm-3 col-sm-offset-4 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4">
				    <input type="number" class="form-control" id="" aria-describedby="Patrimonio" placeholder="Patrimônio" name="patrimonio" min="0"
				    value="<?php echo $tuplas['patrimonio']; ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_pat2'])) { echo $_SESSION['msg_pat2']; unset($_SESSION['msg_pat2']);}?></small>
				  </div>

				  <div class="col-xs-2 offset-1 col-sm-2 offset-1 col-md-2 offset-1 col-lg-2 offset-1">
				    <input type="number" class="form-control" id="" aria-describedby="Jira" placeholder="Jira" name="jira" min="0" value="<?php echo $tuplas['jira']; ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_jira2'])) { echo $_SESSION['msg_jira2']; unset($_SESSION['msg_jira2']);}?></small>
				  </div>  

				  <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control"  id="" name="defeito" aria-describedby="Defeito" placeholder="Defeito relatado"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['defeito']))); ?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_defeito2'])) { echo $_SESSION['msg_defeito2']; unset($_SESSION['msg_defeito2']);}?></small>
				 </div>

				 <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control"  autofocus  name="laudo_tec" aria-describedby="Defeito" placeholder="Laudo Técnico"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['laudo_tec']))); ?>">
				     <small class="form-text text-muted"><?php if (isset($_SESSION['msg_laudo_tec2'])) { echo $_SESSION['msg_laudo_tec2']; unset($_SESSION['msg_laudo_tec2']);}?></small>
				 </div> 

				 <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="date" class="form-control"  id="" name="data"  value="<?php  echo $tuplas['dt_manu'];?>">
				 </div> 

				 <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control"  id="" name="obs" aria-describedby="Defeito" placeholder="Observações"
				    value="<?php echo ucwords(utf8_encode(strtolower($tuplas['OBS']))); ?>">
				 </div>	

				 <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				 	 <label for="exampleFormControlSelect1">Selecione o Técnico</label>
				     <select class="form-control" id="exampleFormControlSelect1" name="tec_resp">
				      <option value="CRISTIANO ISAIAS">Cristiano Isaias</option>
				      <option value="LUCAS BARBOSA">Lucas Barbosa</option>
				      <option value="LUCAS MARQUES">Lucas Marques</option>
				      <option value="VILMAR FELIX">Vilmar Felix</option>
				    </select>
				 </div>

				 <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				  	<button type="submit" class="btn btn-md btn-primary btn-block">Editar</button>
				 </div>	
				 <input type="hidden" name="cod_manut" value="<?php echo $tuplas['cod_manut']; ?>">
	    	</form>-->
	

<!-- Footer -->
<?php footer();?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
    	      $('.form-control').on({change: listChildren}).trigger('change');

      function listChildren(){

        if ( $(this).val() != '' ) {
          children = $('other');
          $(".input").hide();
          $("#" + $(this).val() ).show();
        }

      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html