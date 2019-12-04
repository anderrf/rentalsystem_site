<?php

try{

    include('../conexao.php');

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);

    $query = "SELECT * FROM tb_Cliente WHERE nm_cliente = '$nome' AND ds_status = true AND id_nivel = 1";

    $resultado = mysqli_query($conecta, $query);
    
    if(isset($resultado) == true){
        while($linha = mysqli_fetch_assoc($resultado)){
            $nomeVerificar =  $linha['nm_cliente'];
            $senhaVerificar = $linha['ds_senha'];
        }
        
        if(isset($nomeVerificar) == true){
            if(isset($senhaVerificar) == true){
                if($nomeVerificar == $nome){
                    if($senhaVerificar == $senha){
                        echo true;
                    }
                    else{
                        echo "Acesso negado";
                    }
                }
                else{
                    echo "Acesso negado";
                }
            }
            else{
                echo "Acesso negado";
            }
        }
        else{
            echo "Acesso negado";
        }
    }
    else{
        echo "Acesso negado";
    }

  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }