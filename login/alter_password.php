<?php 
session_start();
include '../functions.php';
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
  <link rel="stylesheet"  href="../css/style.css">
  
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

  @media only screen and (min-height: : 420px) {
   footer{
    position: relative;
    font-size: 20pt;
    bottom: 160px;
    left: 0px;
  }
  }


  #center_display{
    height: 99vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    }


  

  </style>
  <title>Alterar Senha</title>
</head>
<body>

    <div class="container-fluid">
      
      <div class="row" align="center">
        <div class="col-lg-12">

            <form method="post" action="alter_password_process.php" id="center_display">
              <i class="fas fa-key" style="font-size: 80px; margin-bottom: 30px; color: #6c757d"></i>

              <div class="form-group">
                <label class="sr-only">ID:</label>
                  <input type="number" name="id" placeholder="ID Localizado atrás do seu crachá" class="form-control"
                  value="<?php if (isset($_SESSION['msg_id'])) {  echo $_SESSION['msg_id']; unset($_SESSION['msg_id']);}?>">
                  <small class="form-text text-muted"><?php if (isset($_SESSION['msg_id2'])) { echo $_SESSION['msg_id2']; unset($_SESSION['msg_id2']);}?></small>
              </div>

              <div class="form-group">
                <input type="text" name="nome" placeholder="Seu Nome" class="form-control" 
                value="<?php if (isset($_SESSION['msg_nome'])) {  echo $_SESSION['msg_nome']; unset($_SESSION['msg_nome']);}?>">
                <small class="form-text text-muted"><?php if (isset($_SESSION['msg_nome2'])) { echo $_SESSION['msg_nome2']; unset($_SESSION['msg_nome2']);}?></small>
              </div>

              <div class="input-group">
                <input type="text" name="email" placeholder="E-mail" class="form-control"
                value="<?php if (isset($_SESSION['msg_email'])) { echo $_SESSION['msg_email']; unset($_SESSION['msg_email']);}?>"><br>
                <span class="input-group-addon" id="basic-addon2">@braspress.com</span>
                <small class="form-text text-muted" id="center_small"><?php if (isset($_SESSION['msg_email2'])) { echo $_SESSION['msg_email2']; unset($_SESSION['msg_email2']);}?></small>
              </div><div style="padding-bottom: 14px;"></div>

              <div class="form-group">
                <input type="password" name="senha" placeholder="Nova Senha" class="form-control">
              </div>

              <div class="form-group">
                <input type="password" name="c_senha" placeholder="Confirme sua Senha" class="form-control">
              </div>

            <input type="submit" class="btn btn-md btn-primary btn-block" name="btn_alter_psw" value="Alterar">
            <?php if (isset($_SESSION['msg'])) {  echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
                <div>
                <a href="login.php">Lembrou sua Senha?</a></div>
     
            <?php footer();?>
          </form>
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