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
  <link rel="stylesheet" href="./css/index.css">
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/all.min.css">
  <title>Document</title>
</head>

<body id="page-top">

  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" style="background-color: #00497a;">
    <a href="index.php" id="logoTelecall" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none p-2">
      <img src="./css/image/logo-hdr2.png" alt="" srcset="" width="70%">
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

  



  <!-- FIM DA NAV BAR -->

   <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="sideNav" style="background-color: #00497a;">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/diasfoto.jpg" alt="..." /></span>
            </a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                <?php
  session_start();
  if (isset($_SESSION['modal'])) { ?>

    <h5 class="modal-title" style="color: white;">Página Restrita ! </h5>
    <a href="#"><button type="button" value="Refresh Page" class="btn btn-outline-primary" onClick="window.location.reload()" id="button" style="background-color: white;" >Entendi</button></a>


  <?php }
  session_destroy(); ?>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        LUCAS
                        <span class="" style="color: #00497a;">DIAS</span>
                    </h1>
                    <div class="subheading mb-5">
                        
                        <a href="mailto:name@email.com">ldias_98@hotmail.com</a>
                    </div>
                    <p class="lead mb-5">Desenvolvedor em desenvolvimento .</p>
                   
                    
                    <h2 class="mb-5">HABILIDADES</h2>
                    <div class="subheading mb-3">Conhecimento em</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-html5" ></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-php"></i></li>
                        <li class="list-inline-item"><i class="fa fa-database"></i></li>
                    </ul>
                </div>
                <div class="social-icons">
                    <label for="" class="lead"> Linkedln </label>
                    <a class="social-icon" href="https://www.linkedin.com/in/lucsdias/"><i class="fab fa-linkedin-in"></i></a>
                    
                </div>
            </section>


  
</body>

</html>