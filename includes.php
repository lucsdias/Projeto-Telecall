<?php
if (isset($_POST['btn-ok'])) {
  //session_start();
  include_once 'bd/conexao.php';
  $data = date('d/m/Y H:i:s');
  $sql = "SELECT * FROM logacesso where id_usuario='" . $_SESSION['id_usuario'] . "'";
  $resultlog = mysqli_query($con, $sql);
  $row_dados = mysqli_fetch_array($resultlog);

  if (mysqli_num_rows($resultlog) > 0) {

    $_SESSION['id'] = $row_dados['id_usuario'];
    $_SESSION['hora'] = $row_dados['hora'];
    $_SESSION['metodo'] = $row_dados['metodo'];
    $_SESSION['status'] = $row_dados['status_log'];
    function logger($log)
    {
      if (!file_exists('log.txt')) {
        file_put_contents('log.txt', '');
      }
      $id = $_SESSION['id'];
      $hora = date('d/m/Y H:i:s');
      $metodo = $_SESSION['metodo'];
      $status = $_SESSION['status'];

      $contents = file_get_contents('log.txt');
      $contents .= "\t$hora\t$log\r";

      file_put_contents('log.txt', $contents);
    }
  }
}
