<?php

// === PEGAR OS DADOS DO BOTAO LOGIN === //
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
    session_start();
    // ===  SE ENTROU NO IF, VAI ABRIR A CONEXAO COM BD, PEGAR AS VARIAVEIS === //
    include_once 'bd/conexao.php';
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    // === CASO SEJA VAZIO, VAI DAR ERRO, CASO SEJA TRUE, VAI PEGAR OS DADOS ATRAVES DAS QUERYS === //
    if ((!empty($login)) and (!empty($senha))) {
        $result = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE login_user='$login' AND usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep limit 1";
        $result = mysqli_query($con, $result);
        mysqli_close($con);


        if ($result) {
            $row_usuario = mysqli_fetch_assoc($result);
            
        }
        // === VERIFICAR SE A SENHA ESTA CORRETA, E DIRECIONAR PARA A 2FA === //
        if (password_verify($senha, $row_usuario['senha'])) {
            $_SESSION['id_usuario'] = $row_usuario['id_usuario'];
            $_SESSION['nome'] = $row_usuario['nome'];
            $_SESSION['datanasc'] = $row_usuario['datanasc'];
            $_SESSION['cpf'] = $row_usuario['cpf'];
            $_SESSION['nomemae'] = $row_usuario['nomemae'];
            $_SESSION['telefone'] = $row_usuario['telefone'];
            $_SESSION['celular'] = $row_usuario['celular'];
            $_SESSION['email'] = $row_usuario['email'];
            $_SESSION['login_user'] = $row_usuario['login_user'];
            
            $_SESSION['id_status'] = $row_usuario['id_status'];
            $_SESSION['id_perfil'] = $row_usuario['id_perfil'];
            $_SESSION['cep'] = $row_usuario['cep'];
            $_SESSION['rua'] = $row_usuario['rua'];
            $_SESSION['bairro'] = $row_usuario['bairro'];
            $_SESSION['cidade'] = $row_usuario['cidade'];
            $_SESSION['uf'] = $row_usuario['uf'];
            $_SESSION['complemento'] = $row_usuario['end_complemento'];
            $_SESSION['numero'] = $row_usuario['end_numero'];
            $_SESSION['btnLogin'] = $_POST['btnLogin'];
            $_SESSION['ip'] = userinfo::get_ip();
           
            if($_SESSION['id_status'] === "A"){
                header("Location: verificacao.php");
            } else if($_SESSION['id_status'] === "I"){
                
                $_SESSION['msg'] = "Usuario Desativado do Sistema";
                header("Location: login.php");
            }
        } else {
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Login e Senha Incorretos ! ";
            header("Location: login.php");
        }
    } else {
        $_SESSION['msg'] = "Login e Senha Incorretos ! ";
        header("Location: login.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada ! ";
    // VAI MANDAR O USUARIO PARA A INDEX, CASO ELE TENTE IR ATRAVÉS DA URL
    header("Location: login.php");
}

