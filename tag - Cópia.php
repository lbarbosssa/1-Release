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
    width: 50%;
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
  <title>Gerar Etiqueta</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark top" role="navigation" style="margin: -5px -3px 5px -3px;">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fas fa-bomb" style="font-size: 40px; color: #6c757d"></i></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="read.php?pagina=1" class="nav-link active">Registros</a></li>
                <li class="nav-item"><a href="create.php" class="nav-link">Adicionar</a></li>
                <li class="nav-item"><a href="#" class="nav-link disabled">Inserir Laudo</a></li>
                <li class="nav-item"><a href="tag.php?pagina=1" class="nav-link">Gerar Etiqueta</a></li>
                <li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <!--<li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>-->
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"><?php echo ucwords(strtolower($_SESSION['nome'])); ?><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                       <li class="px-3 py-2">
                           <form class="form" role="form">
                                <!--<div class="form-group">
                                    <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <div class="form-group text-center">-->
                                    <a href="login/logout.php"><i class="fas fa-sign-out-alt" style="font-size: 18px; float: left; margin: 5px 1px">
                                      
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

<!--<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>-->


<?php //echo ucwords(strtolower($_SESSION['nome'])); ?>

<?php
  //Variaveis para a paginação
  $atual_page = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
  //Se a pagina atual não for vaiza, ela recebe o valor dela, e se for recebe 1
  $pag = (!empty($atual_page))?$atual_page:1;
  //Quantidade de itens por página
   $qnt_result_pag = 40;
  //Incicialização desses itens 
  $inicio = ($qnt_result_pag * $atual_page) - $qnt_result_pag; //
  if (empty($atual_page)) {
    header('location: read.php?pagina=1');
  }

  include_once ("SQL\conexao.php");
  
  //Busca por cod_manut
  $result_user = "SELECT * from manut_maquinas ORDER BY cod_manut DESC LIMIT $inicio, $qnt_result_pag"; 
  $resultado_usuario = mysqli_query($Conect, $result_user);



  echo "
  <div class=\"container-fluid\" id=\"myUL\">
    <div class=\"row\">

    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h3 class=\"text-center\">Listagem de Maquinas</h3>";
            if (isset($_SESSION['msg'])) { echo $_SESSION['msg']; unset($_SESSION['msg']);}

        echo "</div>
    </div>
    <div class=\"d-flex justify-content-center\">
        <div class=\"col-lg-6 col-lg-offset-3\">
            <input type=\"search\" class=\"form-control light-table-filter\" data-table=\"order-table\" placeholder=\"Busca rápida\"><br>

        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <table class=\"table table-hover order-table table\" id=\"dataTable\">
                <thead>
                    <tr>
                      <th></th>
                        <th scope=\"col\">Filial</th>
                        <th scope=\"col\">Patrimônio</th>
                        <th scope=\"col\">Jira</th>
                        <th scope=\"col\">Defeito</th>
                        <th scope=\"col\">Laudo Técnico</th>
                        <th scope=\"col\">Data Manutenção</th>
                        <th scope=\"col\">Observações</th>
                        <th scope=\"col\">Técnico responsável</th>
                        <th scope=\"col\">Status</th>

                    </tr>
                </thead>
                <tbody>
    ";

  while ($row_manut = mysqli_fetch_assoc($resultado_usuario)) {
    echo "<tr>";
    echo "<th scope=\"row\"> <a href='update.php?cod_manut=" . $row_manut['cod_manut'] . "'><i class=\"far fa-edit\" style=\"font-size: 22px;\"></i</a></th>";
    echo "<td>" . strtoupper(utf8_encode($row_manut['filial'])) . "</td>";
    echo "<td>" . $row_manut['patrimonio'] . "</td>";
    echo "<td><a href='http://jira.braspress.com.br/browse/HD-".$row_manut['jira']."' target='_blank'>".$row_manut['jira']."</a></td>";
    echo "<td>" . ucfirst(utf8_encode(strtolower($row_manut['defeito']))) . "</td>";
    echo "<td>" . ucfirst(utf8_encode(strtolower($row_manut['laudo_tec']))) . "</td>";
    $dt_exibida =  $row_manut['dt_manu'];
    echo "<td>" . inverteData($dt_exibida) . "</td>";
    echo "<td>" . ucfirst(utf8_encode(strtolower($row_manut['OBS']))) . "</td>";
    echo "<td>" . ucfirst(utf8_encode(strtolower($row_manut['tec_responsavel']))) . "</td>";
    echo "<td>" . ucwords(utf8_encode(strtolower($row_manut['status']))) . "</td>";
    echo "</tr>";
  }
  echo "
        </tbody>
        </table>
        <hr>
        </div>
        </div>
        
  ";
    echo "<div class=\"d-flex justify-content-center\">
    <div style='padding: 10px;'>
    ";


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
    $max_links = 2;
    
    //Primeira
    if ($atual_page == 1) {
      //echo "<button type='button' class='btn btn-primary' disabled>Primeira</button> ";
    }
    elseif ($atual_page >1){
      echo "<a href='read.php?pagina=1'><button type='button' class='btn btn-primary' align='center'>Primeira</button> </a>";

    }

    //Anteriores
    for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) { 
      if ($pag_ant > 1) {
        echo " <a href='read.php?pagina=$pag_ant'><button type='button' class='btn btn-secondary'>$pag_ant</button> </a>";
      }

    }

    //Atual
    echo "<button type='button' class='btn btn-info'>$pag</button>";

    //Posteriores
    for ($pag_dep = $pag + 1; $pag_dep <= $pag + $max_links; $pag_dep++) { 
      if ($pag_dep <= $qnt_pg) {
        echo " <a href='read.php?pagina=$pag_dep'><button type='button' class='btn btn-secondary'>$pag_dep</button> </a>";
      }
    }
    //Ultima
    if ($atual_page == $qnt_pg) {
      //echo " <a href='read.php?pagina=$qnt_pg' class='btn btn-primary'>Ultima</a>";
    }else{
    echo " <a href='read.php?pagina=$qnt_pg' class='btn btn-primary'>Ultima</a>"; 
    }
    echo "</div>";
    echo "</div> ";// container

    footer();
    //Search Bar
    search();

?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>