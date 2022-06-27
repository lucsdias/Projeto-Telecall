<?php 
session_start();
if ($_SESSION['id_perfil'] == 'A'){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS e JS do Bootstrap 5 -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" >
  <script src="./js/bootstrap.bundle.min.js" ></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
 
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        
        <script type="text/javascript" language="javascript">
            $(document).ready(function() {
                $('#listar-usuario').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
        }
    }

                );
            });
        </script>

<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #00497a;">
<div class="image" >
  <a href="adm.php">
  <img src="./css/image/LUCAS23.png" alt="" srcset=""style="width: 190px;"></a>
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
  <br>
<!-- FIM DAS OPÇÕES DO CADEADO -->





<?php
    include_once 'bd/conexao.php';
    
    
    $sql = "SELECT * FROM logacesso inner join usuario where logacesso.id_usuario = usuario.id_usuario";
    
    $result = mysqli_query($con, $sql);
    ?>
    
    <html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <title>DataTable</title>
        
        
    </head>
    
    <body>
    
        <div class="container">
        
        
        
        <table id="listar-usuario" class="table table-striped table-hover " style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Metodo</th>
                    <th>Hora</th>
                    <th>Status</th>
                    <th>Ip</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                
                if (mysqli_num_rows($result) > 0) {
                    while ($dados = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $dados['id_usuario']; ?></td>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td><?php echo $dados['metodo']; ?></td>
                            <td><?php echo $dados['hora']; ?></td>
                            <td><?php echo $dados['status_log']; ?></td>
                            <td><?php  echo $_SESSION['ip']; ?></td>
                            
                        </tr>
                <?php
                    }
                   
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
        </div>
        <div class="container">
         <span>  <a href="gerarPDF.php" target="_blank" class="btn btn-outline-info btn-xl mb-3 fa fa-file-pdf"> GERAR PDF</a></span>
            </div>
        
    </body>
    
    </html>

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
                    <a class="" href="sair.php"  ><button class="btn btn-primary"style="background-color: #00497a;">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
    </body>
<!-- FIM DO MODAL -->





<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







              


</html>

<?php 
} else {
  header("Location: erro.html");
}
?>