<?php
session_destroy();
session_start();





$_SESSION['msgSair'] = "Deslogado com sucesso ! ";
$_SESSION['modal'] = "entrou";

header("Location: login.php");
