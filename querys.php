<?php 
##### CADASTRO DE USUARIO ###### cadastro.php
$verificacao = "SELECT * FROM usuario WHERE login_user = '" . $dados['login_user'] . "'";
    $result = mysqli_query($con, $verificacao);

#### VERIFICAR SE TEM OU NÃO CEP JÁ CADASTRADO ###### cadastro.php
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

######## SELECIONAR OS DADOS PARA QUE SEJAM INTEGRADOS À SESSÃO ###### valida.php

$result = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE login_user='$login' AND usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep limit 1";
        $result = mysqli_query($con, $result);
        mysqli_close($con);


##### VERIFICACAO DE SEGUNDA ETAPA, O id_perfil É igual para ambos, adm e usuario ######## verificacao.php 
$v2fsql = "SELECT * FROM usuario where id_usuario='" . $_SESSION['id_usuario'] . "'";
        $result = mysqli_query($con, $v2fsql);
        if ($result) {
            $row_dados = mysqli_fetch_array($result);
            $cpfi = substr($row_dados['cpf'], 0, 3);
            $cpff = substr($row_dados['cpf'], -3);
            $celular = substr($_SESSION['celular'], -4);
            $cell = $celular;


            if ($_SESSION['id_perfil'] == 'A') {

                if (isset($dados['nomemae'])) {
                    if ($nomemae == $row_dados['nomemae']) {

                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Nome da Mãe', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acessou pelo nome da mãe";
                        logger($log);
                        mysqli_close($con);
                        header("Location: adm.php");
                    } else {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Acesso negado: Nome da mae inválido', 'OFF')";
                        $result = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acesso negado: Nome da mae inválido";
                        logger($log);

                        $_SESSION['msg'] = "Acesso negado: Nome da mae inválido !";
                        header("Location: login.php");
                        mysqli_close($con);
                    }
                }

                if (isset($dados['vfcell'])) {
                    if ($vfcell === $cell) {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Numero do Celular', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acessou pelo 4 ultimos numeros do celular";
                        logger($log);
                        mysqli_close($con);
                        header("Location: adm.php");
                    } else {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Acesso negado: celular Inválido', 'OFF')";
                        $result = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acesso negado: celular Inválido ";
                        logger($log);

                        $_SESSION['msg'] = "Acesso negado: celular Inválido !";
                        header("Location: login.php");
                        mysqli_close($con);
                    }
                }
                if (isset($dados['vfcpfi'])) {
                    if ($vfcpfi === $cpfi) {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', '3 primeiros numeros do CPF', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") acessou pelo 3  numeros do inicias do cpf";
                        logger($log);
                        mysqli_close($con);
                        header("Location: adm.php");
                    } else {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Acesso negado: numeros iniciais do cpf inválidos', 'OFF')";
                        $result = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acesso negado: numeros iniciais do cpf inválidos";
                        logger($log);

                        $_SESSION['msg'] = "Acesso negado: numeros iniciais do cpf inválidos !";
                        header("Location: login.php");
                        mysqli_close($con);
                    }
                }
                if (isset($dados['vfcpff'])) {
                    if ($vfcpff === $cpff) {

                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', '3 ultimos numeros do CPF', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") acessou pelo 3 ultimos numeros do cpf";
                        logger($log);
                        mysqli_close($con);
                        header("Location: adm.php");
                    } else {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Acesso negado: numeros finais do cpf inválidos', 'OFF')";
                        $result = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acesso negado: numeros finais do cpf inválidos";
                        logger($log);

                        $_SESSION['msg'] = "Acesso negado: numeros finais do cpf inválidos !";
                        header("Location: login.php");
                        mysqli_close($con);
                    }
                }
                if (isset($dados['datanasc'])) {
                    if ($datanasc === $_SESSION['datanasc']) {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Data de nascimento', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") acessou pela data de nascimento";
                        logger($log);
                        mysqli_close($con);
                        header("Location: adm.php");
                    } else {
                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Acesso negado:  data de nasc inválida', 'OFF')";
                        $result = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acesso negado:  data de nasc inválida";
                        logger($log);
                        
                        $_SESSION['msg'] = "Acesso negado:  data de nasc inválida !";
                        header("Location: login.php");
                        mysqli_close($con);
                    }
                }
            }


######### ÁREA DE ADMS ############ adms.php
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
            
      </tbody>

    </table>


<?php

########## alterarUsuario.php ####################### 

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

?>

<?php 

##############  PARTE QUE VAI DESATIVAR OU ATIVAR O USUARIO    ##################### desativa.php

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
        }
    }
    if ($dados['id_status'] == "I") {
        $sql = "UPDATE usuario SET id_status = 'A' WHERE id_usuario = '" . $results['id'] . "' ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            session_start();
            $_SESSION['msg'] = "Usuário ativado com sucesso ! ";
            header("Location: tableUsuario.php");
        } else {
            session_start();
            $_SESSION['msgNeg'] = "Falhou";
            header("Location: tableUsuario.php");
        }
    } 




?>


<?php 
    ####### PARTE QUE PEGA TODOS OS INATIVOS ######## inativos.php
    $sql = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE  usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep AND status_descricao = 'Inativo' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($dados = mysqli_fetch_array($result)) {
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
          <button type='button' id='<?php echo $dados['id_usuario']; ?>' onclick='visUSER(<?php echo $dados["id_usuario"];?>)' class="btn btn-outline-dark fa fa-eye btn-sm" data-bs-toggle="modal" data-bs-target="#visuModal" ></button>
          <button type="button" id='<?php echo $dados['id_usuario']; ?>' onclick='alterUSER(<?php echo $dados["id_usuario"]; ?>)' class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#desativaModal"><span class=" fa fa-power-off"></span></button>
          </td>
        </tr>
<?php
        mysqli_close($con);


?>


<?php 
######## PARTE DO LOG ############## logs.php
$sql = "SELECT * FROM logacesso inner join usuario where logacesso.id_usuario = usuario.id_usuario";   
    $result = mysqli_query($con, $sql);
    ?>            
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


?>

<?php 
############ TABELA QUE BUSCA OS USUARIOS ############ tableUsuario.php

include_once 'bd/conexao.php';
$sql = "SELECT usuario.*, endereco.*, status_user.*, perfil_user.*  FROM usuario, endereco, status_user, perfil_user WHERE  usuario.id_status=status_user.id_status AND usuario.id_perfil = perfil_user.id_perfil AND usuario.cep = endereco.cep AND perfil_descricao = 'Comum' AND status_descricao = 'Ativo' ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($dados = mysqli_fetch_array($result)) {
?>
    <tr>
      <td><?php echo $dados['id_usuario']; ?></td>
      <td><?php echo $dados['nome']; ?></td>

      <td><?php echo $dados['cpf']; ?></td>

      <td><?php echo $dados['celular']; ?></td>
      <td><?php echo $dados['email']; ?></td>
      <td><?php echo $dados['login_user']; ?></td>


      <td><?php echo $dados['status_descricao']; ?></td>
      <td><?php echo $dados['perfil_descricao']; ?></td>
      <td>
        <button type='button' id='<?php echo $dados['id_usuario']; ?>' onclick='visUSER(<?php echo $dados["id_usuario"]; ?>)' class="btn btn-outline-dark fa fa-eye  btn-sm" data-bs-toggle="modal" data-bs-target="#visuModal"></button>
        <button type='button' id='<?php echo $dados['id_usuario']; ?>' onclick='editUSER(<?php echo $dados["id_usuario"]; ?>)' class="btn btn-outline-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><span class="fa fa-edit"></span></button>
        <button type="button" id='<?php echo $dados['id_usuario']; ?>' onclick='alterUSER(<?php echo $dados["id_usuario"]; ?>)' class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#desativaModal"><span class=" fa fa-power-off"></span></button>
      </td>


    </tr>
<?php
  }
}
mysqli_close($con);


?>


<?php 
########### PARTE DO NIVEL DE ACESSO, ONDE PODE SETAR A PESSOA COMO USUARIO COMUM OU COMO ADM ######### nivelAcesso.php
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






?>