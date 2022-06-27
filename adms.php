<?php 
session_start();
if($_SESSION['id_perfil'] == 'A'){

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./js/mostrar.js"></script>

  <title>ADMINISTRADORES</title>
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #00497a;">
<div class="image" >
  <a href="adm.php">
  <img src="./css/image/logo-hdr2.png" alt="" srcset=""style="width: 190px;"></a>
</div>
              
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Olá, <?php echo $_SESSION['nome']; ?>
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Encerrar sessão
                </a>
            </div>
        </li>
  
    </ul>
  
  </nav>
  </div>
  </div>
  </div>
<!-- FIM DA NAV BAR -->

<!-- INICIO DAS OPÇÕES DO CADEADO -->
<div class="container">
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-0" style="border-radius: 20px;">
      <div class="card text-bg-primary mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white;  " href="tableUsuario.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class=""> USUARIOS <div class="col-auto"><i
                  class="d-flex fas fa-user fa-2x text-gray-300 justify-content-between"> </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-0">
      <div class="card text-bg-primary  mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white;  " href="logs.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class="">  LOGS <div class="col-auto"><i
                  class="d-flex fas fa-database fa-2x text-gray-300 justify-content-between"> </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-0">
      <div class="card text-bg-primary  mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white;  " href="inativos.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class=" "> INATIVOS <div class="col-auto"><i
                  class="d-flex fas fa-power-off fa-2x text-gray-300 justify-content-between"> </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card text-bg-primary  mt-5" style="max-width: 500px;">
        <a class="" style="text-decoration:none; color:white; " href="adms.php">
          <div class="card-body" style="background-color: #00497a;">
            <h5 class=""> ADMINISTRADORES <div class="col-auto"><i
                  class="d-flex fas fa-user-circle fa-2x text-gray-300 justify-content-between">  </i></div>
            </h5>

          </div>
        </a>
      </div>
    </div>
  </div>
  </div>
<!-- FIM DAS OPÇÕES DO CADEADO -->

<div class="container">
    <table id="listar-user" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID#</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Celular</th>
          <th>E-mail</th>
          <th>Usuário</th>
          <th>Status</th>
          <th>Tipo</th>
          <th>Ações</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include_once 'bd/conexao.php';
        $sql = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE  usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep AND perfil_descricao = 'Administrador' ";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($dados = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?php echo $dados['id_usuario'];?></td>
              <td><?php echo $dados['nome']; ?></td>
             
              <td><?php echo $dados['cpf']; ?></td>
 
              <td><?php echo $dados['celular']; ?></td>
              <td><?php echo $dados['email']; ?></td>
              <td><?php echo $dados['login_user']; ?></td>
        
  
              <td><?php echo $dados['status_descricao']; ?></td>
              <td><?php echo $dados['perfil_descricao']; ?></td>
              <td>
              <button type='button' id='<?php echo $dados['id_usuario']; ?>' onclick='editUSER(<?php echo $dados["id_usuario"]; ?>)' class="btn btn-outline-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><span class="fa fa-edit"></span></button>
              </td>
             



            </tr>
            
        <?php
          }
        }

        ?>

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
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="" href="sair.php"  ><button class="btn btn-primary"style="background-color: #00497a;">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
<!-- FIM DO MODAL --> 


<!--  INICIO MODAL edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">
              ALTERAR NIVEL DE ACESSO
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <span id=""></span>
              <form action="nivelAcesso.php" method="post" id="form-edit-usuario">
                <input type="hidden" name="id" id="editid">

               
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="acesso" value="A" checked >
                  <label class="form-check-label" for="flexRadioDefault1">
                    Administrador
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="acesso" value="C" >
                  <label class="form-check-label" for="flexRadioDefault2">
                    Comum
                  </label>
                </div>
                </div>


                <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
              </form>
            </div>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
    <!--  FIM MODAL edit -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php 
} else{
  header("Location: erro.html");
}

?>