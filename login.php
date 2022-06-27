<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/stylelogin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <script src="./js/javascript.js"></script>
  <!-- VALIDAÇÃO DE CAMPO INPUT COM JS -->
    <script type="text/javascript">
        function validar(){
            let senha = formCad.senha.value;
            let login = formCad.login.value;
            if (senha == '' && login == '') {
                alert('Precisa preencher todos os campos  ');
                
                return false;
            }
            if (senha == '') {
                alert('A senha precisa ser preenchida ! ');
                formCad.senha.focus();
                return false;
            }
            if (login == '') {
                alert('O login precisa ser preenchido ! ');
                formCad.login.focus();
                return false;
            }
        }
    </script>
  
  <title>Tela de login</title>

</head>

<div class="login-root">
  <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
  
    <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
      <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        <a href="index.php">
        <img src="./css/image/telecall-logo.svg" alt="logo telecall-logo" width="300" srcset="">
        </a>
      </div>
      <div class="formbg-outer">
        <div class="formbg">
          <div class="formbg-inner padding-horizontal--48">
            <span class="padding-bottom--15">Entrar na sua conta</span>
            <form id="stripe-login" name="formCad" action="valida.php" method="post">
              <div class="field padding-bottom--24">
                <label for="login">Usuario</label>
                <input type="text" name="login" id="login" placeholder="Informe seu login">
              </div>
              <div class="field padding-bottom--24">
                <div class="grid--50-50">
                  <label for="senha">Senha</label>
                </div>
                <input type="password" name="senha" id="senha" placeholder="Informe sua senha">
              </div>
              
              <?php 
              session_start();
              if (isset($_SESSION['msg'])) {
                echo "<div id='session'>";
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                echo "</div>";
                
            } else if (isset($_SESSION['msgSair'])){
              echo "<div id='sessionSair'>";
              echo $_SESSION['msgSair'];
              unset($_SESSION['msgSair']);
              echo "</div>";
            }
             else if (isset($_SESSION['msgD'])) {
                echo $_SESSION['msgD'];
                unset($_SESSION['msgD']);
            }
            else if (isset($_SESSION['msgErro'])) {
              echo "<div id='sessionErro'>";
              echo $_SESSION['msgErro'];
              unset($_SESSION['msgErro']);
              echo "</div>";
          }
              ?>
              
              <div class="field padding-bottom--24">
                <input type="submit" name="btnLogin" value="entrar" onclick="return validar()">
              </div>
            </form>
          </div>
        </div>
        <div class="footer-link padding-top--24">
          <span>Não tem uma conta ? <a href="cadastro.php">Inscreva-se</a></span>
          <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">

           

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>





<?php
session_destroy();

?>