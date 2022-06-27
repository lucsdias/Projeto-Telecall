<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=BIZ+UDPGothic&family=DM+Sans:wght@500&family=Roboto+Mono&display=swap" rel="stylesheet">
  <!-- JavaScript Bundle with Popper -->
  <script src="./js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/all.min.css">
  <title>Document</title>
</head>

<body id="page-top">

  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" style="background-color: #00497a;">
    <a href="index.php" id="logoTelecall" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none p-2">
      <img src="./css/image/logo-hdr2.png" alt="" srcset="" width="60%">
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 " style="color: #ffff; font-family:'Roboto Mono', monospace; font-size: 20px;">HOME</a></li>
      <li><a href="modelo.php" class="nav-link px-2 " style="color: #ffff; font-family:'Roboto Mono', monospace; font-size: 20px;">MODELO</a></li>
      <li><a href="login.php" class="nav-link px-2 " style="color: #ffff; font-family:'Roboto Mono', monospace; font-size: 20px;">LOGIN</a></li>
      <li><a href="cadastro.php" class="nav-link px-2 " style="color: #ffff; font-family:'Roboto Mono', monospace; font-size: 20px;">CADASTRE-SE</a></li>
    </ul>

    <div class="col-md-2 text-end">
      <!-- PRECISEI DEIXAR ISTO AQUI VAZIO, PARA QUE OS DE CIMA FICA-SE ALINHADO -->
    </div>
  </header>

  <div class="container">
    <img src="./css/image/query.png" alt="" srcset="">
  </div>



  <!-- FIM DA NAV BAR -->


  <?php
  session_start();
  if (isset($_SESSION['modal'])) { ?>

    <h5 class="modal-title">Página Restrita ! </h5>
    <a href="#"><button type="button" value="Refresh Page" onClick="window.location.reload()" id="button" style="border: none;
    background-color: #00497a;
    border-radius: 6px;
    color: #ffff;
    display: flex;
    margin: 20px;">Entendi</button></a>


  <?php }
  session_destroy(); ?>
</body>

</html>