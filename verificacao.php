<?php
session_start();


include_once 'includes.php';
$rand = rand(1, 5);
if (isset($_SESSION['id_usuario'])) {
    switch ($rand) {

        case 1:
            include_once './html/verificacao.html';
?>
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="card py-4 px-4">
                    <div class="text-center">
                        <span class="info-text"> Verificacao de segunda etapa</span>
                    </div>
                    <div class="text-center mt-3">

                        <span class="info-text">------------------------------------</span> <br>
                        <span class="info-text">Informe os 3 primeiros digitos do seu cpf</span> <br>
                        <span class="info-text">------------------------------------</span>

                    </div>
                    <form action="" method="post">
                        <div class="position-relative mt-3 form-input">
                            <input class="form-control" type="text" name="vfcpfi" placeholder="Ex: 120">
                            <i class='bx bxs-ca'></i>
                        </div>


                        <div class=" mt-5 d-flex justify-content-center align-items-center">

                            <button type="submit" name="btn-ok" class="go-button"><i class='bx bxs-right-arrow-alt'></i></button>
                        </div>
                    </form>
                </div>
            </div>

        <?php
            break;
        case 2:
            include_once './html/verificacao.html';
        ?>
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="card py-4 px-4">
                    <div class="text-center">
                        <span class="info-text"> Verificacao de segunda etapa</span>
                    </div>
                    <div class="text-center mt-3">

                        <span class="info-text">------------------------------------</span> <br>
                        <span class="info-text">Informe os 4 ultimos digitos do seu celular</span> <br>
                        <span class="info-text">------------------------------------</span>

                    </div>
                    <form action="" method="post">
                        <div class="position-relative mt-3 form-input">
                            <input class="form-control" type="text" name="vfcell" placeholder="Ex: 8976">
                            <i class='bx bxs-ca'></i>
                        </div>


                        <div class=" mt-5 d-flex justify-content-center align-items-center">

                            <button type="submit" name="btn-ok" class="go-button"><i class='bx bxs-right-arrow-alt'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        <?php

            break;
        case 3:
            include_once './html/verificacao.html';
        ?>
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="card py-4 px-4">
                    <div class="text-center">
                        <span class="info-text"> Verificacao de segunda etapa</span>
                    </div>
                    <div class="text-center mt-3">

                        <span class="info-text">------------------------------------</span> <br>
                        <span class="info-text">Informe sua data de nascimento</span> <br>
                        <span class="info-text">------------------------------------</span>

                    </div>
                    <form action="" method="post">
                        <div class="position-relative mt-3 form-input">

                            <input class="form-control" type="date" name="datanasc" placeholder="      ">
                            <i class='bx bxs-ca'></i>
                        </div>


                        <div class=" mt-5 d-flex justify-content-center align-items-center">

                            <button type="submit" name="btn-ok" class="go-button"><i class='bx bxs-right-arrow-alt'></i></button>
                        </div>
                    </form>
                </div>
            </div>
            </body>
        <?php
            break;
        case 4:
            include_once './html/verificacao.html';
        ?>
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="card py-4 px-4">
                    <div class="text-center">
                        <span class="info-text"> Verificacao de segunda etapa</span>
                    </div>
                    <div class="text-center mt-3">

                        <span class="info-text">------------------------------------</span> <br>
                        <span class="info-text">Informe o nome da sua mãe</span> <br>
                        <span class="info-text">------------------------------------</span>

                    </div>
                    <form action="" method="post">
                        <div class="position-relative mt-3 form-input">
                            <input class="form-control" type="text" name="nomemae" placeholder="Ex: Catarina">
                            <i class='bx bxs-ca'></i>
                        </div>


                        <div class=" mt-5 d-flex justify-content-center align-items-center">

                            <button type="submit" name="btn-ok" class="go-button"><i class='bx bxs-right-arrow-alt'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
            break;
        case 5:
            include_once './html/verificacao.html';
        ?>
            <div class="container vh-100 d-flex justify-content-center align-items-center">
                <div class="card py-4 px-4">
                    <div class="text-center">
                        <span class="info-text"> Verificacao de segunda etapa</span>
                    </div>
                    <div class="text-center mt-3">

                        <span class="info-text">------------------------------------</span> <br>
                        <span class="info-text">Informe os 3 ultimos digitos do seu cpf</span> <br>
                        <span class="info-text">------------------------------------</span>
                    </div>
                    <form action="" method="post">
                        <div class="position-relative mt-3 form-input">
                            <input class="form-control" type="text" name="vfcpff" placeholder="Ex: 740">
                            <i class='bx bxs-ca'></i>
                        </div>


                        <div class=" mt-5 d-flex justify-content-center align-items-center">

                            <button type="submit" name="btn-ok" class="go-button"><i class='bx bxs-right-arrow-alt'></i></button>
                        </div>
                    </form>
                </div>
            </div>
<?php
            break;
    }
# ########################### QUANDO APERTAR O BOTAO DE ENVIAR ############################################### #
    if (isset($_POST['btn-ok'])) {
        include_once 'bd/conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $vfcpfi = $_POST['vfcpfi'];
        $nomemae = $_POST['nomemae'];
        $vfcpff = $_POST['vfcpff'];
        $datanasc = filter_input(INPUT_POST, 'datanasc', FILTER_SANITIZE_STRING);
        $vfcell = $_POST['vfcell'];
        $v2f = array($vfcpfi, $vfcpff, $nomemae, $datanasc, $vfcell);
        $_SESSION['array'] = $v2f;

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

            if ($_SESSION['id_perfil'] == 'C') {
                if (isset($dados['nomemae'])) {
                    if ($nomemae == $row_dados['nomemae']) {

                        $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Nome da Mãe', 'ON')";
                        $resultlog = mysqli_query($con, $sql);
                        $log = "usuario (" . $_SESSION['id_usuario'] . ") Acessou pelo nome da mãe";
                        logger($log);
                        mysqli_close($con);
                        header("Location: usuario.php");
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
                        header("Location: usuario.php");
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
                        header("Location: usuario.php");
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
                        header("Location: usuario.php");
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
                        header("Location: usuario.php");
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
            } else {
                $sql = "INSERT INTO logacesso (id_usuario, hora, metodo, status_log) values ('" . $_SESSION['id_usuario'] . "', '" . date('d/m/Y H:i:s') . "', 'Verificação Inválida', 'OFF')";
                $result = mysqli_query($con, $sql);
                $log = "usuario (" . $_SESSION['id_usuario'] . ") Verificação Inválida";
                logger($log);
                session_destroy();
                session_start();
                $_SESSION['msg'] = "Dados inseridos inválidos !";
                header("Location: login.php");
                mysqli_close($con);
            }
        }
    }
} else {
    session_destroy();
    session_start();
    header("Location: index.html");
    $_SESSION['msg'] = "Pagina Restrita ! ";
}


?>