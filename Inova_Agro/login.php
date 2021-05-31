<?php
session_start();

if(isset($_SESSION['cadastrado'])):
   echo $_SESSION['cadastrado'];
   unset($_SESSION['cadastrado']);
endif;
if(isset($_SESSION['delete'])):
   echo $_SESSION['delete'];
   unset($_SESSION['delete']);
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Login</title>
</head>
<body>
    <nav class="header">
        <a href="login.php"><button>Login</button></a>
        <a href="cadastro.html"><button>Cadastrar-se</button></a>
        <a href="sobre.html"><button>Sobre</button></a>
        <a href="creditos.html"><button>Créditos</button></a>
    </nav>

    <header>Inova Agro</header>
    
    <div class="formulario">
        <form action="confirmLogin.php" method="POST"><!--Esse formilario valida o login-->
            <h2>Faça seu Login</h2>
            <label for="text" name="email">E-mail</label><br>
		    <input type="email" name="email" placeholder="seu@email.com" required autofocus><!--Aqui o usuario coloca o email-->
		    <br><br>

            <label for="senha">Senha</label><br>
		    <input type="password" name="senha" placeholder="Digite sua senha" required autofocus><!--Aqui o usuario coloca a senha-->
            <br><br>
             
            <button type="submit">Entrar</button><!--Botão que e entra no sistema-->
            <br><br>     
        </form>
    </div>
    <div class="container">
<div>
    <h3>Local para retirada dos produtos</h3>
    <p>Avenida da Liberdade, Altura 255 - SP</p>
    <p>ou</p>
    <p>Por nosso delivery ou aplicativos</p>
    <br>
</div>   

<div>
    <h3>Formas de pagamentos</h3>
    <p>Pix</p>
    <p>Cartão de Crédito</p>
    <p>Parcelamentos em até 12x</p>
    <p>Cartão de Débito</p>
    <p>Boleto</p>
</div>

<div>
    <h3>Contatos</h3>
    <p>E-mail: inovaagro@outlook.com.br</p>
    <p>Telefone: 115612-7583</p>
    <p>Celular para Whatsapp: 11 94935-9903</p>
    <br>
</div>
</div>
</body>