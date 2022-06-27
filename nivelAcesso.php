<?php
$dados =  filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['id'])){
    session_start();
    include_once 'bd/conexao.php';
    $acesso = $dados['acesso'];
    $sql = "SELECT * FROM usuario WHERE usuario.id_usuario = '".$dados['id']."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    ##### NÃO DEIXA ALTERAR O ID 1 COMO COMUM, POIS ELE É O ADM MASTER ######
    if ($row['id_usuario'] != '1'){
   $sql = "UPDATE usuario set usuario.id_perfil='$acesso' WHERE usuario.id_usuario = '".$dados['id']."' ";
   $result = mysqli_query($con, $sql);
   if($result){
       $_SESSION['msg'] = "Alterado com sucesso ! ";
       header("Location: tableUsuario.php");
        mysqli_close($con);
    }
} else{
    $_SESSION['msgNeg'] = "Este ADM não pode ser alterado ! ";
    header("Location: tableUsuario.php");
    mysqli_close($con);
}
} else{
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não editado com sucesso!</div>"];
    mysqli_close($con);
}

echo json_encode($retorna);
?>


