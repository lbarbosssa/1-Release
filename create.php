<?php 
session_start(); 
include 'functions.php';
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
	<title>Adicionar Registros</title>
</head>
<body>
<?php inicio_nav(); ?>
    <ul class="nav navbar-nav">
        <li class="nav-item"><a href="read.php?pagina=1" class="nav-link">Registros</a></li>
        <li class="nav-item"><a href="create.php" class="nav-link active">Adicionar</a></li>
        <li class="nav-item"><a href="#" class="nav-link disabled">Inserir Laudo</a></li>
        <li class="nav-item"><a href="tag.php?pagina=1" class="nav-link">Gerar Etiqueta</a></li>
        <li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
        <li class="nav-item"><a href="search_filial.php" class="nav-link">Consultar Filial</a></li>
    </ul>
<?php fim_nav(); ?>
           
	<div class="container-fluid">
	    
		    <div class="row" align="center">
		        <div class="col-lg-12" >
		            <h3 class="text-center">Adicionar um novo Registro</h3>
		            	<?php 
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
						?>
		 
		    <form method="post" action="create_process.php">
				  <div class="form-group">
				    <input type="text" class="form-control" id="" aria-describedby="Filial" placeholder="Insira a Sigla da Filial" autofocus name="filial" 
				    value="<?php if (isset($_SESSION['msg_filial'])) {	echo $_SESSION['msg_filial']; unset($_SESSION['msg_filial']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_filial2'])) {	echo $_SESSION['msg_filial2']; unset($_SESSION['msg_filial2']);}?></small>
				  </div>

				  <div class="form-row">
				    <div class="form-group col-md-6">
				      	<input type="text" class="form-control" id="" aria-describedby="Patrimonio" placeholder="Patrimônio" name="patrimonio" min="0"
				    value="<?php if (isset($_SESSION['msg_pat'])) {	echo $_SESSION['msg_pat']; unset($_SESSION['msg_pat']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_pat2'])) { echo $_SESSION['msg_pat2']; unset($_SESSION['msg_pat2']);}?></small>
				    </div>

				    <div class="form-group col-md-6">
				      <input type="number" class="form-control" id="" aria-describedby="Jira" placeholder="Jira" name="jira" min="0" value="<?php if (isset($_SESSION['msg_jira'])) {	echo $_SESSION['msg_jira']; unset($_SESSION['msg_jira']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_jira2'])) { echo $_SESSION['msg_jira2']; unset($_SESSION['msg_jira2']);}?></small>
				    </div>

				  </div>

				  <div class="form-group">
				    <input type="text" class="form-control"  id="" name="defeito" aria-describedby="Defeito" placeholder="Informe o defeito relatado"
				    value="<?php if (isset($_SESSION['msg_defeito'])) {	echo $_SESSION['msg_defeito']; unset($_SESSION['msg_defeito']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_defeito2'])) { echo $_SESSION['msg_defeito2']; unset($_SESSION['msg_defeito2']);}?></small>
				  </div>

				  <div class="form-group">
			     	 <label for="exampleFormControlSelect1">Status</label>
				    <select class="form-control" name="status">
				    	<option value="No laboratório">No laboratório</option>  
				    	<option value="Aguardando NF">Aguardando NF</option>
				    	<option value="Em manutenção">Em manutenção</option>    	
				    	<option value="Enviado">Enviado</option>
				    	<option value='option-1'>Outros</option>
					    
				    </select>
				  </div>  

    			<input type="text" placeholder="Informe o status da manutenção" class="form-control one input" 
    			style="display: none" id="option-1" name="status_outros" />

				  <button type="submit" class="btn btn-md btn-primary btn-block">Registrar</button>
			</form>

				</div>
			</div>
	</div>




	    <!--<div class="row center">
	        <div class="col-md-12 col-md-offset-5">
				<form method="post" action="create_process.php" class="form-signin">

				  <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control" id="" aria-describedby="Filial" placeholder="Insira a Sigla da Filial" autofocus name="filial" 
				    value="<?php if (isset($_SESSION['msg_filial'])) {	echo $_SESSION['msg_filial']; unset($_SESSION['msg_filial']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_filial2'])) {	echo $_SESSION['msg_filial2']; unset($_SESSION['msg_filial2']);}?></small>
				  </div>
				  
				  <div class="form-group col-xs-3 col-xs-offset-3 col-sm-3 col-sm-offset-4 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4">
				    <input type="number" class="form-control" id="" aria-describedby="Patrimonio" placeholder="Patrimônio" name="patrimonio" min="0"
				    value="<?php if (isset($_SESSION['msg_pat'])) {	echo $_SESSION['msg_pat']; unset($_SESSION['msg_pat']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_pat2'])) { echo $_SESSION['msg_pat2']; unset($_SESSION['msg_pat2']);}?></small>
				  </div>

				   <div class="col-xs-2 offset-1 col-sm-2 offset-1 col-md-2 offset-1 col-lg-2 offset-1">
				    <input type="number" class="form-control" id="" aria-describedby="Jira" placeholder="Jira" name="jira" min="0" value="<?php if (isset($_SESSION['msg_jira'])) {	echo $_SESSION['msg_jira']; unset($_SESSION['msg_jira']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_jira2'])) { echo $_SESSION['msg_jira2']; unset($_SESSION['msg_jira2']);}?></small>

				  </div>	

				  <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				    <input type="text" class="form-control"  id="" name="defeito" aria-describedby="Defeito" placeholder="Informe o defeito relatado"
				    value="<?php if (isset($_SESSION['msg_defeito'])) {	echo $_SESSION['msg_defeito']; unset($_SESSION['msg_defeito']);}?>">
				    <small class="form-text text-muted"><?php if (isset($_SESSION['msg_defeito2'])) { echo $_SESSION['msg_defeito2']; unset($_SESSION['msg_defeito2']);}?></small>
				  </div>

				   <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
				  	
				   </div>
				   <div class="form-group col-xs-5 col-xs-offset-3 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">

				</div>
				</form>
			</div>
		</div>
	</div>-->
<!-- Search Bar -->
<?php footer();?>
<script>
function searchBar() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("searcher");
  filter = input.value.toUpperCase();
  table = document.getElementById("manut_maquinas");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>