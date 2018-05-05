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
<?php inicio_nav(); ?>
    <ul class="nav navbar-nav">
      <li class="nav-item"><a href="read.php?pagina=1" class="nav-link">Registros</a></li>
      <li class="nav-item"><a href="create.php" class="nav-link">Adicionar</a></li>
      <li class="nav-item"><a href="#" class="nav-link disabled">Inserir Laudo</a></li>
      <li class="nav-item"><a href="tag.php?pagina=1" class="nav-link active">Gerar Etiqueta</a></li>
      <li class="nav-item"><a href="NF.php?pagina=1" class="nav-link">Relatório p/ NF</a></li>
      <li class="nav-item"><a href="search_filial.php" class="nav-link">Consultar Filial</a></li>
    </ul>
<?php fim_nav(); ?>
    

<?php
  //Variaveis para a paginação
  $atual_page = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
  //Se a pagina atual não for vaiza, ela recebe o valor dela, e se for recebe 1
  $pag = (!empty($atual_page))?$atual_page:1;
  //Quantidade de itens por página
   $qnt_result_pag = 40;
  //Incicialização desses itens 
  $inicio = ($qnt_result_pag * $atual_page) - $qnt_result_pag; //

  include_once ("SQL/conexao.php");
  
  //Busca por cod_manut
  $result_user = "SELECT * from manut_maquinas ORDER BY cod_manut DESC LIMIT $inicio, $qnt_result_pag"; 
  $resultado_usuario = mysqli_query($Conect, $result_user);



  echo "
  <div class=\"container-fluid\" style=\"\">
    <div class=\"row\">

    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
          <form method=\"post\" action=\"tag_generate.php\">
            <h3 class=\"text-center\">Selecione os registros e clique na etiqueta azul</h3>";
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
            <table class=\"table table-hover order-table table\" id=\"manut_maquinas\">
                <thead>
                    <tr>
                        <th><button type=\"submit\" class=\"btn btn-md btn-link\" formtarget=\"_blank\">
                        <i class=\"fas fa-tags\" style=\"font-size: 25px;\" ></i></button></th>
                        <th>Filial</th>
                        <th>Patrimônio</th>
                        <th>Jira</th>
                        <th>Defeito</th>
                        <th>Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                <form method=\"post\" action=\"tag_generate.php\">
               
    ";
  while ($row_manut = mysqli_fetch_assoc($resultado_usuario)) {
    echo "<tr>";
    //echo "<td><div class='checkbox'> <input type='checkbox' value='". $row_manut['cod_manut']."' name='chk_cod_manut[]'> </div></td>";
    echo "<td> 
    <label class=\"custom-control custom-checkbox\">
      <input type=\"checkbox\" class=\"custom-control-input\"name='chk_cod_manut[]' value='". $row_manut['cod_manut']."'>
      <span class=\"custom-control-indicator\"></span>
      <span class=\"custom-control-description\"></span>
    </label>
    </td>";
    echo "<td>" . strtoupper(utf8_encode($row_manut['filial'])) . "</td>";
    echo "<td>" . utf8_encode($row_manut['patrimonio']) . "</td>";
    echo "<td><a href='http://jira.braspress.com.br/browse/HD-".$row_manut['jira']."' target='_blank'>".$row_manut['jira']."</a></td>";
    echo "<td>" . ucfirst(utf8_encode(strtolower($row_manut['defeito']))) . "</td>";
    $dt_exibida =  $row_manut['dt_criacao'];
    echo "<td>" . inverteData($dt_exibida) . "</td>";


    echo "</tr>";
  }
  echo "
        </form>
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
      echo "<a href='tag.php?pagina=1'><button type='button' class='btn btn-primary'>Primeira</button> </a>";

    }

    //Anteriores
    for ($pag_ant = $pag - $max_links; $pag_ant <= $pag - 1; $pag_ant++) { 
      if ($pag_ant > 1) {
        echo " <a href='tag.php?pagina=$pag_ant'><button type='button' class='btn btn-secondary'>$pag_ant</button> </a>";
      }

    }

    //Atual
    echo "<button type='button' class='btn btn-info'>$pag</button>";

    //Posteriores
    for ($pag_dep = $pag + 1; $pag_dep <= $pag + $max_links; $pag_dep++) { 
      if ($pag_dep <= $qnt_pg) {
        echo " <a href='tag.php?pagina=$pag_dep'><button type='button' class='btn btn-secondary'>$pag_dep</button> </a>";
      }
    }
    //Ultima
    if ($atual_page == $qnt_pg) {
      //echo " <a href='read.php?pagina=$qnt_pg' class='btn btn-primary'>Ultima</a>";
    }else{
    echo " <a href='tag.php?pagina=$qnt_pg' class='btn btn-primary'>Ultima</a>"; 
    }
    echo "</div> </div>";
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