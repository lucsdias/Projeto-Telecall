<?php
#### PEGA O ID PELA URL #####
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$components = parse_url($url);
parse_str($components['query'], $results);


if ($results['id']) {
    include_once 'bd/conexao.php';
    $sql = "SELECT * FROM usuario where id_usuario = '" . $results['id'] . "'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result);
    if ($dados['id_status'] == "A") {
        $sql = "UPDATE usuario SET id_status = 'I' WHERE id_usuario = '" . $results['id'] . "' ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            session_start();
            $_SESSION['msg'] = "Usuário desativado com sucesso ! ";
            header("Location: tableUsuario.php");
            mysqli_close($con);
        }
    }
    if ($dados['id_status'] == "I") {
        $sql = "UPDATE usuario SET id_status = 'A' WHERE id_usuario = '" . $results['id'] . "' ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            session_start();
            $_SESSION['msg'] = "Usuário ativado com sucesso ! ";
            header("Location: tableUsuario.php");
            mysqli_close($con);
        } else {
            session_start();
            $_SESSION['msgNeg'] = "Falhou";
            header("Location: tableUsuario.php");
            mysqli_close($con);
        }
    } 
    } else {
        session_start();
        $_SESSION['msgNeg'] = "Falhou";
        header("Location: tableUsuario.php");
    }

