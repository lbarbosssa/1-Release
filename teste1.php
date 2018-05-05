<?php
session_start(); 
include 'functions.php';
if (empty($_SESSION['id'])) {
  $_SESSION['msg_login'] = "Acesso restrito";
  header("location: login/login.php");
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
  </style>
  <title>Registros</title>
</head>
<body>


  <nav class='navbar navbar-expand-lg navbar-dark bg-dark top' role='navigation' style='margin: -5px -3px 5px -3px;'>
    <div class='container'>
        <a class='navbar-brand' href='#'><i class='fas fa-bolt' style='font-size: 40px; color: #6c757d'></i></a>
        <button class='navbar-toggler border-0' type='button' data-toggle='collapse' data-target='#exCollapsingNavbar'>
            &#9776;
        </button>
        <div class='collapse navbar-collapse' id='exCollapsingNavbar'>
            <ul class="nav navbar-nav">
    <li class="nav-item"><a href="read.php?pagina=1" class="nav-link active">Registros</a></li>
    <li class="nav-item"><a href="create.php" class="nav-link">Adicionar</a></li>
    <li class="nav-item"><a href="#" class="nav-link disabled">Inserir Laudo</a></li>
    <li class="nav-item"><a href="tag.php?pagina=1" class="nav-link">Gerar Etiqueta</a></li>
    <li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
    <li class="nav-item"><a href="search_filial.php" class="nav-link">Consultar Filial</a></li>
  </ul> 


  


          <ul class='nav navbar-nav flex-row justify-content-between ml-auto'>
            <form class="form-inline my-2 my-lg-0" method="post" action="search_page">
              <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
              <button type="submit" class="btn btn-md btn btn-link d-none d-sm-block" name="btn_search" 
              style="font-size: 25px; color: #007bff; padding: 0px 20px 0px -0px;"><i class="fas fa-search"></i></button>
            </form>
                <!--<li class='nav-item order-2 order-md-1'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>-->
                <li class='dropdown order-1'>
                    <button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle'><?php echo ucwords(strtolower($_SESSION['nome'])); ?><span class='caret'></span></button>
                    <ul class='dropdown-menu dropdown-menu-right mt-2'>
                       <li class='px-3 py-2'>
                           <form class='form' role='form'>
                                <!--<div class='form-group'>
                                    <input id='emailInput' placeholder='Email' class='form-control form-control-sm' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <input id='passwordInput' placeholder='Password' class='form-control form-control-sm' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary btn-block'>Login</button>
                                </div>
                                <div class='form-group text-center'>
                                    <a href='login/logout.php'><i class='fas fa-sign-out-alt' style='font-size: 18px; float: left; margin: 5px 1px'>
                                      
                                    </i>Efetuar Logout </a></a></li>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>