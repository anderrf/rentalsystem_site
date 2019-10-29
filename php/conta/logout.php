<?php

try{

    session_start();
	
	$varLogin = false;
    $_SESSION['varLogin'] = false;
    $_SESSION['nome'] = "";
    $_SESSION['senha'] = "";
    $_SESSION['nivel'] = 0;
    $_SESSION['codigo'] = 0;

    header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/index.php');

  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }