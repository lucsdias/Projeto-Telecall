<?php
session_start();


//============ VAI CADASTRAR AQUI ======================//
if (isset($_POST['btn-cadastrar'])) {

    include_once 'bd/conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $verificacao = "SELECT * FROM usuario WHERE login_user = '" . $dados['login_user'] . "'";
    $result = mysqli_query($con, $verificacao);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['msgErro'] = "Erro ao cadastrar, usuario já existente ! ";
        header("Location: login.php");
    } else {
        include_once 'bd/conexao.php';
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        
        $verificaend = "SELECT * FROM endereco WHERE cep = '" . $dados['cep'] . "'";
        $resultend = mysqli_query($con, $verificaend);

        if (mysqli_num_rows($resultend) > 0) {
            $usuario = "INSERT INTO usuario (id_usuario, nome, datanasc, cpf, nomemae, telefone, celular, email, login_user, senha, id_status, id_perfil, cep, end_numero, end_complemento ) VALUES (null, '" . $dados['nome'] . "',  '" . $dados['datanasc'] . "',  '" . $dados['cpf'] . "',  '" . $dados['nomemae'] . "', '" . $dados['telefone'] . "',  '" . $dados['celular'] . "',  '" . $dados['email'] . "', '" . $dados['login_user'] . "','" . $dados['senha'] . "', '" . $dados['id_status'] . "','" . $dados['id_perfil'] . "', '" . $dados['cep'] . "', '" . $dados['end_numero'] . "', '" . $dados['end_complemento'] . "')";
            $usuario = mysqli_query($con, $usuario);
        } else {
            $endereco = "INSERT INTO endereco (cep,rua,bairro, cidade, uf) values ( '" . $dados['cep'] . "',  '" . $dados['rua'] . "',  '" . $dados['bairro'] . "',  '" . $dados['cidade'] . "', '" . $dados['uf'] . "')";
            $endereco = mysqli_query($con, $endereco);

            $usuario = "INSERT INTO usuario (id_usuario, nome, datanasc, cpf, nomemae, telefone, celular, email, login_user, senha, id_status, id_perfil, cep, end_numero, end_complemento ) VALUES (null, '" . $dados['nome'] . "',  '" . $dados['datanasc'] . "',  '" . $dados['cpf'] . "',  '" . $dados['nomemae'] . "', '" . $dados['telefone'] . "',  '" . $dados['celular'] . "',  '" . $dados['email'] . "', '" . $dados['login_user'] . "','" . $dados['senha'] . "', '" . $dados['id_status'] . "','" . $dados['id_perfil'] . "', '" . $dados['cep'] . "', '" . $dados['end_numero'] . "', '" . $dados['end_complemento'] . "')";
            $usuario = mysqli_query($con, $usuario);
        }

        if (mysqli_insert_id($con)) {
            $_SESSION['msgSair'] = "Cadastrado(a) com sucesso ! ";
            mysqli_close($con);
            header("Location: login.php");
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar ! ";
            mysqli_close($con);
            header("Location: login.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" type="text/css" href="./css/montserrat-font.css">

    <script src="js/cep.js"></script>
    
    <script type="text/javascript">
        function validar() {
            let senha = formCad.senha.value;
            let rep_senha = formCad.rep_senha.value;


            if (senha == '' || rep_senha == '') {
                alert('Preencher o campo senha ');
                formCad.senha.focus();
                return false;
            }
            if (senha != rep_senha) {
                alert('As senhas não conferem ! ');
                formCad.rep_senha.focus();
                return false;
            }
        }
    </script>
    <title>Novo Usuário</title>

</head>

<body class="form-v10 mb-5">
    <div class="container" id="logoTelecall">
        <a href="index.php" class="m-1 " ><img src="./css/image/telecall-logo.svg" alt="" srcset="" width="400"></a>
    </div>
    <div class="page-content">
        <div class="form-v10-content">
            <form class="form-detail" name="formCad" action="#" method="post" id="myform">
                <div class="form-left">
                    <h2>Infomações Pessoais</h2>

                    <div class="form-left">
                        
                            <div class="form-row ">
                            <input type="text" name="nome" id="first_name" placeholder="Informe seu nome" class="" required>
                            </div>
                        
                    </div>
                    <div class="form-group ">
                        <div class="form-row form-row-1">
                            
                            <input  placeholder="Data de Nascimento: " readonly>
                        </div>
                        <div class="form-row form-row-2">
                            
                            <input type="date" name="datanasc" class="input-text" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            
                            <input type="text" name="cpf" id="first_name" class="form-control" placeholder="Informe seu CPF " required>
                        </div>
                        <div class="form-row form-row-2">
                           
                            <input type="text" name="nomemae" class="input-text" placeholder="Nome Materno" required>
                        </div>
                    </div>

                    <div class="form-row">
                        
                        <input type="text" name="email"  placeholder="Informe seu e-mail" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            
                            <input type="text" name="telefone" maxlength="10" placeholder="Informe seu telefone" >
                        </div>
                        <div class="form-row form-row-2">
                            
                            <input type="text" name="celular" maxlength="11" class="input-text" placeholder="Informe seu celular" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            
                            <input type="text" name="login_user" id="first_name" class="" placeholder="Informe seu login" required>
                        </div>
                        <div class="form-row form-row-2">

                            <input name="id_status" type="hidden"  value="A">
                            <input name="id_perfil" type="hidden"  value="C">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <label for="">Senha</label>
                            <input type="password" name="senha" class="input-text" placeholder="Informe sua senha" required>

                        </div>
                        <div class="form-row form-row-2">
                            <label for="">Repetir senha</label>
                            <input type="password" name="rep_senha" class="input-text" placeholder="Informe sua senha" required>

                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <h2>Endereço</h2>
                    <div class="form-row">
                        <label for="" class="textEndereco">CEP</label>
                        <input type="text" maxlength="8" name="cep" id="cep" placeholder="Informe seu CEP" onblur="pesquisacep(this.value);" required>
                    </div>
                    <div class="form-row">
                        <label for="" class="textEndereco">Endereço</label>
                        <input name="rua" Readonly type="text" id="rua" size="60" placeholder="Endereço" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <label for="" class="textEndereco">Número</label>
                            <input type="text" name="end_numero" class="zip" id="zip" placeholder="Número" required>
                        </div>
                        <div class="form-row form-row-2">
                            <label for="" class="textEndereco">Complemento</label>
                            <input type="text" name="end_complemento" placeholder="Complemento" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="" class="textEndereco">Bairro</label>
                        <input type="text" name="bairro" Readonly type="text" id="bairro" size="40" placeholder="Informe seu Bairro">
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <label for="" class="textEndereco">UF</label>
                            <input type="text" name="uf" type="text" id="uf" size="2" placeholder="Estado" readOnly>
                        </div>
                        <div class="form-row form-row-2">
                            <label for="" class="textEndereco">Cidade</label>
                            <input type="text" Readonly name="cidade" type="text" id="cidade" size="40" placeholder="Cidade">
                        </div>
                    </div>

                    <div class="form-row-last">
                        <input type="submit" name="btn-cadastrar" class="register" onclick="return validar()" value="REGISTRAR">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>