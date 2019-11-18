<?php

try{

    session_start();
	
	$varLogin = false;

    include('../conexao.php');

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);

    if($_POST['nome'] != NULL){
        $query = "SELECT * FROM tb_Cliente WHERE nm_cliente = '$nome' AND ds_status = true";

        $resultado = mysqli_query($conecta, $query);

        while($linha = mysqli_fetch_assoc($resultado)){
            $verificaNome = $linha['nm_cliente'];
            $verificaSenha = $linha['ds_senha'];
            $nivel = $linha['id_nivel'];
            $codigo = $linha['cd_cliente'];
        }

        if($nome == $verificaNome){
            if($senha == $verificaSenha){
                if($nivel == 1){
                    $varLogin = true;
                    $_SESSION['varLogin'] = $varLogin;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['codigo'] = $codigo;
                    header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_adm/index.php');
                }
                else if($nivel == 2){
                    $varLogin = true;
                    $_SESSION['varLogin'] = $varLogin;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['codigo'] = $codigo;
                    header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/conta.php');
                }
                else{
                    header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/login.php');
                }
            }
            else{
                echo "Senha incorreta.";
                header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/login.php');
            }
        }
        else{
            echo "Nome não encontrado.";
            header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/login.php');
        }
    }
    else{
        echo "Nome não encontrado.";
        header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/login.php');
    }

    



  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }