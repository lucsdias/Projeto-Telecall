<?php
session_start();

##################### PARTE QUE VAI ATUALIZAR NO BANCO DE DADOS OS DADOS PREENCHIDOS ######################
if (isset($_POST['btn-atualizar'])) {

    include_once 'bd/conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $verificacao = "SELECT * FROM endereco WHERE cep = '" . $dados['cep'] . "'";
    $result = mysqli_query($con, $verificacao);

    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE  usuario  SET usuario.nome = '" . $dados['nome'] . "', usuario.datanasc = '" . $dados['datanasc'] . "', usuario.cpf = '" . $dados['cpf'] . "', usuario.nomemae = '" . $dados['nomemae'] . "', usuario.telefone = '" . $dados['telefone'] . "', usuario.celular = '" . $dados['celular'] . "' , usuario.email = '" . $dados['email'] . "',
        usuario.end_numero = '" . $dados['end_numero'] . "', usuario.end_complemento = '" . $dados['end_complemento'] . "' WHERE usuario.id_usuario = '" . $_SESSION['id_usuario'] . "' ";
        $results = mysqli_query($con, $sql);
        $_SESSION['msgSair'] = "Atualizado com sucesso ! ";

        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['datanasc'] = $dados['datanasc'];
        $_SESSION['nomemae'] = $dados['nomemae'];
        $_SESSION['celular'] = $dados['celular'];
        $_SESSION['telefone'] = $dados['telefone'];
        $_SESSION['cpf'] = $dados['cpf'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['numero'] = $dados['end_numero'];
        $_SESSION['complemento'] = $dados['end_complemento'];
    } else {
        ### SE O USUARIO SE MUDOU E COLOCU UM CEP QUE NAO ESTA NO BD, ENTAO TERÁ QUE CADASTRAR ESSE NOVO CEP ###

        $endNovo = "INSERT INTO endereco (cep,rua,bairro, cidade, uf) values ( '" . $dados['cep'] . "',  '" . $dados['rua'] . "',  '" . $dados['bairro'] . "',  '" . $dados['cidade'] . "', '" . $dados['uf'] . "')";
        $resultEndNovo = mysqli_query($con, $endNovo);

        $sql = "UPDATE  usuario INNER JOIN endereco SET usuario.nome = '" . $dados['nome'] . "', usuario.datanasc = '" . $dados['datanasc'] . "', usuario.cpf = '" . $dados['cpf'] . "', usuario.nomemae = '" . $dados['nomemae'] . "', usuario.telefone = '" . $dados['telefone'] . "', usuario.celular = '" . $dados['celular'] . "' , usuario.email = '" . $dados['email'] . "',
        usuario.end_numero = '" . $dados['end_numero'] . "', usuario.end_complemento = '" . $dados['end_complemento'] . "', endereco.cep = '" . $dados['cep'] . "',endereco.rua = '" . $dados['bairro'] . "', endereco.cidade = '" . $dados['cidade'] . "', endereco.uf = '" . $dados['uf'] . "' WHERE usuario.id_usuario = '" . $_SESSION['id_usuario'] . "' AND endereco.cep = '" . $dados['cep'] . "'";
        $results = mysqli_query($con, $sql);
        $_SESSION['msgSair'] = "Atualizado com sucesso ! ";

        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['datanasc'] = $dados['datanasc'];
        $_SESSION['nomemae'] = $dados['nomemae'];
        $_SESSION['celular'] = $dados['celular'];
        $_SESSION['telefone'] = $dados['telefone'];
        $_SESSION['cpf'] = $dados['cpf'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['numero'] = $dados['end_numero'];
        $_SESSION['cep'] = $dados['cep'];
        $_SESSION['complemento'] = $dados['end_complemento'];
        $_SESSION['cidade'] = $dados['cidade'];
        $_SESSION['bairro'] = $dados['bairro'];
        $_SESSION['uf'] = $dados['uf'];
    }
}
########## QUANDO CONFIRMAR QUE QUER DESATIVAR O ACESSO ############
if (isset($_POST['btn-desativar'])) {
    include_once 'bd/conexao.php';
    $sql = "UPDATE usuario SET id_status = 'I' WHERE id_usuario = '" . $_SESSION['id_usuario'] . "' ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        session_start();
        $_SESSION['msg'] = "Usuário desativado com sucesso ! ";
        header("Location: login.php");
    }
}


if (isset($_SESSION['id_usuario'])) {
?>

    <!-- PARTE DE ATUALIZAÇÃO -  INPUTS -->
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
        <script src="./js/table.js"></script>
        <script src="./js/cep.js"></script>


        <title>Document</title>
    </head>

    <body id="page-top">
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #00497a;">
            <div class="image">
                <a href="usuario.php"><img src="./css/image/logo-hdr2.png" alt="" srcset="" style="width: 190px;"></a>

            </div>

            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Olá, <?php echo $_SESSION['nome']; ?>.
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="alterarUsuario.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Alterar Dados
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Desativar Conta
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
        </div>
        </div>
        </div>
        <!-- FIM DA NAV BAR -->
        <div class="container p-4 ">
            <form method="post" action="">
                <h3>Alterar dados Pessoais</h3>
                <span> <?php if (isset($_SESSION['msgSair'])) {
                            echo $_SESSION['msgSair'];
                            unset($_SESSION['msgSair']);
                        } ?></span>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome">Nome</label>
                        <div class="form-group mb-1">
                            <input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" class="form-control" placeholder="Your Name *" />
                        </div>
                        <label for="cpf">CPF</label>
                        <div class="form-group mb-1">
                            <input type="text" name="cpf" readOnly value="<?php echo $_SESSION['cpf']; ?>" class="form-control" placeholder="Informe seu cpf" />
                        </div>
                        <label for="celulara">Celular</label>
                        <div class="form-group mb-1">
                            <input type="text" name="celular" class="form-control" value="<?php echo $_SESSION['celular']; ?>" placeholder="Informe seu celular *" />
                        </div>
                        <label for="telefone">Telefone</label>
                        <div class="form-group mb-1">
                            <input type="text" name="telefone" class="form-control" value="<?php echo $_SESSION['telefone']; ?>" placeholder="Informe seu telefone" />
                        </div>
                        <label for="nomemae">Nome Materno</label>
                        <div class="form-group mb-1">
                            <input type="text" name="nomemae" readOnly class="form-control" value="<?php echo $_SESSION['nomemae']; ?>" placeholder="Informe nome materno" />
                        </div>
                        <label for="email">E-mail:</label>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="Informe seu email" />
                        </div>
                        <label for="datanasc">Data de nascimento</label>
                        <div class="form-group mb-1">
                            <input type="date" name="datanasc" readOnly class="form-control" value="<?php echo $_SESSION['datanasc']; ?>" />
                        </div>


                    </div>
                    <div class="col-md-6">
                        <label for="cep">CEP:</label>
                        <div class="form-group mb-1">
                            <input type="text" maxlength="8" class="form-control" name="cep" id="cep" placeholder="Informe seu CEP" value="<?php echo $_SESSION['cep']; ?>" onblur="pesquisacep(this.value);">
                        </div>

                        <label for="rua">Rua</label>
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" name="rua" value="<?php echo $_SESSION['rua']; ?>" Readonly type="text" id="rua" size="60" placeholder="Endereço">
                        </div>
                        <label for="end_numero">Numero</label>
                        <div class="form-group mb-1">
                            <input type="text" name="end_numero" class="form-control" value="<?php echo $_SESSION['numero']; ?>" placeholder="Your Phone Number *" />
                        </div>
                        <label for="end_complemento">Complemento</label>
                        <div class="form-group mb-1">
                            <input type="text" name="end_complemento" value="<?php echo $_SESSION['complemento']; ?>" class="form-control" placeholder="Your Phone Number *" />
                        </div>

                        <label for="bairro">Bairro</label>
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" value="<?php echo $_SESSION['bairro']; ?>" name="bairro" Readonly type="text" id="bairro" size="40" placeholder="Informe seu Bairro">
                        </div>
                        <label for="cidade">Cidade</label>
                        <div class="form-group mb-1">
                            <input type="text" class="form-control" Readonly value="<?php echo $_SESSION['cidade']; ?>" name="cidade" type="text" id="cidade" size="40" placeholder="Cidade">
                        </div>
                        <label for="uf" class="mt-2">UF</label>
                        <div class="form-group mt-1">
                            <input type="text" class="form-control" Readonly value="<?php echo $_SESSION['uf']; ?>" name="uf" type="text" id="uf" size="40" placeholder="Cidade">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <input type="hidden">
                    <button type="submit" name="btn-atualizar" class="btn btn-outline-primary fa fa-save btn-block btn-sm"> </button>
                </div>
            </form>
            <div class="form-group">
                <button type="button" class="btn   btn-outline-danger  btn-block btn-sm " data-bs-toggle="modal" data-bs-target="#desativaModal"> <span class="fa fa-user-slash"></span> </button>
            </div>

        </div>

        <!-- MODAL PARA SAIR -->

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a class="" href="sair.php"><button class="btn btn-primary" style="background-color: #00497a;">Sim</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO MODAL -->

        <!-- MODAL PARA desativar -->
        <div class="modal fade" id="desativaModal" tabindex="-1" aria-labelledby="desativaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="desativaModalLabel">
                            DESATIVAR USUÁRIO
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <span id="">você realmente deseja desativar sua conta ? <br>
                                <h6><strong>*</strong> uma vez desativada, não terá mais acesso a ela.</h6>
                            </span> <br>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close"> Cancelar </button>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary" name="btn-desativar" style="background-color: #00497a;">Sim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FIM DO MODAL desativar -->

    </body>

    </html>¨





<?php



} else {
    header("Location: login.php");
}
?>