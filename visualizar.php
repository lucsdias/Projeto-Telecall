<?php

include_once('bd/conexao.php');

$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $sql = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE  usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep  AND id_usuario='$id'";
    $result= mysqli_query($con,$sql);
    $rowUSER=mysqli_fetch_array($result);
    $resposta=['status' => true, 'dados'=>$rowUSER ];
    mysqli_close($con);





}else{
$resposta=['status' => false, 'msg'=>'Dados não encontrado'];
mysqli_close($con);
}
echo json_encode($resposta);



?>