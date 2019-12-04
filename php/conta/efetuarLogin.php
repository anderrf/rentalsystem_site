<?php

try{

    include('../conexao.php');

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);

    if($_POST['nome'] != NULL){
        $query = "SELECT * FROM tb_Cliente WHERE nm_cliente = '$nome' AND ds_status = true";

        $resultado = mysqli_query($conecta, $query);
        
        $verificaNome = NULL;
        $verificaSenha = NULL;
        while($linha = mysqli_fetch_assoc($resultado)){
            $verificaNome = $linha['nm_cliente'];
            $verificaSenha = $linha['ds_senha'];
            $nivel = $linha['id_nivel'];
            $codigo = $linha['cd_cliente'];
        }
        
        session_start();
        
        if(($verificaNome == '') || ($verificaNome == NULL)){
            $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
            header('Location: ../../rentalsystem_site_cliente/login.php');
            
        }
        else{
            if(($verificaSenha == '') || ($verificaSenha == NULL)){
                $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
                header('Location: ../../rentalsystem_site_cliente/login.php');
            }
            else{
                if($nome == $verificaNome){
                    if($senha == $verificaSenha){
                        if($nivel == 1){
                            $varLogin = true;
                            $_SESSION['varLogin'] = $varLogin;
                            $_SESSION['nome'] = $nome;
                            $_SESSION['senha'] = $senha;
                            $_SESSION['nivel'] = $nivel;
                            $_SESSION['codigo'] = $codigo;
                            $_SESSION['erro'] = null;
                            header('Location: ../../rentalsystem_site_adm/index.php');
                        }
                        else if($nivel == 2){
                            $varLogin = true;
                            $_SESSION['varLogin'] = $varLogin;
                            $_SESSION['nome'] = $nome;
                            $_SESSION['senha'] = $senha;
                            $_SESSION['nivel'] = $nivel;
                            $_SESSION['codigo'] = $codigo;
                            $_SESSION['erro'] = null;
                            header('Location: ../../rentalsystem_site_cliente/conta.php');
                        }
                        else{
                            $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
                            header('Location: ../../rentalsystem_site_cliente/login.php');
                        }
                    }
                    else{
                        $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
                        header('Location: ../../rentalsystem_site_cliente/login.php');
                    }
                }
                else{
                    $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
                    header('Location: ../../rentalsystem_site_cliente/login.php');
                }
            }
        }
    }
    else{
        $_SESSION['erro'] = "Nome e/ou senha incorreto(s).";
        header('Location: ../../rentalsystem_site_cliente/login.php');
    }

    



  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }