<?php

try{

    include('../conexao.php');
	
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	
	if(isset($email) == true){
	    if(isset($mensagem) == true){
	        $admin_email = "isaqueborin@hotmail.com";
	        $assunto = "Contato com o cliente do site Rental System";
	        
	        mail($admin_email, "$assunto", $mensagem, "From:" . $email);
	        echo "Obrigado pelo contato.";
	    }
	    else{
    	    echo "Erro ao enviar o e-mail.";
    	}
	}
	else{
	    echo "Erro ao enviar o e-mail.";
	}

  } catch (Exception $e) {
    echo "Erro ao enviar: ".$e;
  }