<?php
  try{
    include('../conexao.php');

    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    
    $query1 = "SELECT nm_produto FROM tb_Produto WHERE nm_produto = '$produto' LIMIT 1";
    $resultado1 = mysqli_query($conecta, $query1);
    while($linha = mysqli_fetch_assoc($resultado1)){
        $verificaNomeProduto = $linha['nm_produto'];
    }
    
    if($verificaNomeProduto == "Mesa"){
        echo "Já há um produto 'Mesa' no estoque.";
    }
    else{
        if($verificaNomeProduto == "Cadeira"){
            echo "Já há um produto 'Cadeira' no estoque.";
        }
        else{
            $query2 = "SELECT nm_produto, ds_produto FROM tb_Produto WHERE nm_produto = '$produto' AND ds_produto = '$descricao' LIMIT 1";
            $resultado2 = mysqli_query($conecta, $query2);
            while($linha = mysqli_fetch_assoc($resultado2)){
                $verificaDescricao = $linha['ds_produto'];
            }
            if(isset($verificaDescricao) == true){
                if(($verificaNomeProduto == "Toalha") && ($verificaDescricao == $descricao)){
                    echo "Já há um produto 'Toalha' no estoque com a mesma descrição.";
                }
                else{
                    if($_FILES['foto']['name'] != ''){
                      $test = explode('.', $_FILES['foto']['name']);
                      $extensao = end($test);
                      if($extensao == "jpg" || $extensao == "png"){
                        $nome = rand(100, 9999).'.'.$extensao;
                        $local = '../../php/foto/produto/'.$nome;
                        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
                      }
                    }
                
                    $query3 = "insert into tb_Produto values (null, '$produto', '$descricao', '$quantidade', '$valor', '$local');";
                
                    mysqli_query($conecta, $query3);
                    echo "Cadastro realizado com sucesso";
                }
            }
            else{
                if($_FILES['foto']['name'] != ''){
                    $test = explode('.', $_FILES['foto']['name']);
                    $extensao = end($test);
                    if($extensao == "jpg" || $extensao == "png"){
                        $nome = rand(100, 9999).'.'.$extensao;
                        $local = '../../php/foto/produto/'.$nome;
                        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
                    }
                }
                
                $query3 = "insert into tb_Produto values (null, '$produto', '$descricao', '$quantidade', '$valor', '$local');";
                
                mysqli_query($conecta, $query3);
                echo "Cadastro realizado com sucesso";
            }
        }
    }

    

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
