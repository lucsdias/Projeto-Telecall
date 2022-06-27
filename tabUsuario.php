<?php 
session_start();
if($_SESSION['id_perfil'] == 'C'){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/bootstrap.bundle.min.js"></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/table.css">
  <link rel="stylesheet" href="./css/teste.css">
  <script src="./js/table.js"></script>

  <title>Document</title>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #00497a;">
<div class="image" >
    <a href="usuario.php"><img src="./css/image/logo-hdr2.png" alt="" srcset=""style="width: 190px;"></a>
  
</div>
              
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Olá, <?php echo $_SESSION['nome']; ?>.
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="alterarUsuario.php">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Alterar Dados
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
  
    </ul>
  
  </nav>

<!-- FIM DA NAV BAR -->



</div>
</div>
</div>

<!-- INICIO DAS OPÇÕES DO CADEADO -->

<div class="container">
  <div class="row">
    
    <div class="col-xl-6 col-md-6 mb-0">
      <div class="card text-bg-primary  mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white;  " href="tabUsuario.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class="">  DADOS PESSOAIS <div class="col-auto"><i
                  class="d-flex fas fa-user-astronaut fa-2x text-gray-300 justify-content-between"> </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-0">
      <div class="card text-bg-primary  mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white;  " href="endUsuario.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class=" "> ENDEREÇO <div class="col-auto"><i
                  class="d-flex fas fa-map fa-2x text-gray-300 justify-content-between"> </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
    
  </div>
</div>

<!-- FIM DAS OPÇÕES DO CADEADO -->


<div class="container ">
<table  align="center" class="table table-striped table-hover mt-5">
        <thead>
            
            <th>ID#</th>
              <th>Nome</th>
              <th>Data de nascimento</th>
              <th>CPF</th>
              <th>Nome da mãe</th>
              <th>Telefone</th>
              <th>Celular</th>
              <th>E-mail</th>
              <th>Login</th>
              
            
               
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?php echo $_SESSION['id_usuario']; ?></td>
                <td><?php echo $_SESSION['nome']; ?></td>
                <td><?php echo $_SESSION['datanasc']; ?></td>
                <td><?php echo $_SESSION['cpf']; ?></td>
                <td><?php echo $_SESSION['nomemae']; ?></td>
                <td><?php echo $_SESSION['telefone']; ?></td>
                <td><?php echo $_SESSION['celular']; ?></td>
                <td><?php echo $_SESSION['email']; ?></td>
                <td><?php echo $_SESSION['login_user']; ?></td>
               
            </tr>

        </tbody>

    </table>
  </div>









<!-- MODAL PARA SAIR -->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Você realmente deseja sair ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="" href="login.php"  ><button class="btn btn-primary"style="background-color: #00497a;">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
<!-- FIM DO MODAL -->




</body>


</html>

<?php
} else{
  header("Location: index.php");
}
?>