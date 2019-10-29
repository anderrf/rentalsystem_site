<?php

try{

    session_start();
	
	$varLogin = false;

    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);

    $query = "SELECT * FROM tb_Cliente WHERE nm_cliente = '$nome' AND ds_status = true";

    $resultado = mysqli_query($conecta, $query);

    $linha = mysql_num_rows ($resultado); // define os registros
	
	for($x = 0; $x < $linha; $x++) // laço de repetição que verifica nome e senha
	{
		$nomeVerificar = mysql_result($resultado, $x, 'nm_cliente'); // puxa o nome do banco de dados
        $senhaVerificar = mysql_result($resultado, $x, 'ds_senha');
        $nivel = mysql_result($resultado, $x, 'id_nivel'); // puxa a senha do banco de dados
		if($nome == $nomeVerificar){ //caso o nome esteja certo 
			if($senha == $senhaVerificar){ // caso a senha esteja certa 
				$varLogin = true; // define o nome como verdadeiro 
				$_SESSION['varLogin'] = $varLogin; // define a constante varLogin na session
                $_SESSION['nome'] = $nome; // define a constante nome na session
                $_SESSION['nivel'] = $nivel;
                if($nivel == 1){
                    header('location: /rentalsystem_site_adm/index.html');
                }
                else if($nivel == 2){
                    header('location: /rentalsystem_site_cliente/conta.html');
                }
				else{
                    header('location: /rentalsystem_site_cliente/index.html');
                }
			}
			else{ // caso a senha esteja errada
				echo "<script>alert('Nome e/ou senha incorretos!')</script>";
				header('location: /login.html');
			}
		}
		else{ // caso o login esteja errado
			echo "<script>alert('Nome e/ou senha incorretos!')</script>";
			header('location: /login.html');
		}
	}

  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }