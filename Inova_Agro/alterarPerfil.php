<?php
//Esse comandos serão de uma sessão que buscara dados como email e senha
session_start();
include('connectbd.php');
if(isset($_SESSION['copyemail'])):
    $email = $_SESSION['copyemail'];
endif;
if(isset($_SESSION['copysenha'])):
    $senha = $_SESSION['copysenha'];
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>ALTERAR PERFIL</title>
</head>
<body>

 <nav class="header">
        <a href="home.php"><button>Inicio</button>
        <a href="readProduto.php"><button>Produtos</button></a>
        <a href="alterarPerfil.php"><button>Alterar Perfil</button></a>
        <a href="excluirPerfil.html"><button>Excluir Perfil</button></a>
        <a href="login.php"><button>Sair</button></a>
    </nav>
   
    <header>Inova Agro</header>
     <?php

//Se a variavel global login for ativada os comandos abaixo serão realizados 
if(isset($_SESSION['login'])):
        $sqlselect = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $resultado = mysqli_query($conectar, $sqlselect);
        while($mostar = mysqli_fetch_array($resultado)):
            $id = $mostar['id'];
            $nome = $mostar['nome'];
            $sobrenome = $mostar['sobrenome'];
            $idade = $mostar['idade'];
            $sexo = $mostar["sexo"];
            $telefone = $mostar["telefone"];
            $endereco = $mostar["endereco"];
            $email = $mostar["email"];

            echo $_SESSION['login'] = "<center>Deseja alterar seus dados? $nome $sobrenome de ID: $id<hr></center>";
            $_SESSION['copyID'] = $id;//Esse comando copia o ID do cliente para uma variavel global

        endwhile;    
endif;
    ?>
    <div><!--DIV do formulario-->
        <!--A Ação usara o arquivo updateCliente.php e metodo a ser utilizado sera o POST-->
        <form action="updateCliente.php" method="POST"><!--Esse é o formulario que ira alterar os dados do usuario-->
            <h2>Alterar dados</h2>
            <label for="nome">Alterar nome</label><br>
            <input type="text" name="nome" placeholder="<?php echo $nome ?>"  required autofocus><!--Esse altera o nome do usuario-->
            <br><br>
        
            <label for="sobrenome">Alterar Sobrenome</label><br>
            <input for="text" name="sobrenome" placeholder="<?php echo $sobrenome ?>" required autofocus><!--Esse altera o sobrenome-->
            <br><br>
    
            <label for="idade">Alterar Idade</label><br><!--Esse altera a idade-->
            <input for="idade" name="idade" placeholder="<?php echo $idade ?>" required autofocus>
            <br><br>
                    
            <label for="sexo">Altere o sexo: <?php echo $sexo ?></label><br>
            <select name="sexo" id="sexo"><!--altera o sexo-->
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            </select>
            <br><br>
             
            <label for="telefone">Altere seu telefone</label><br>
            <input type="text" name="telefone" placeholder="<?php echo $telefone ?>"><!--Esse altera o telefone do usuario-->
            <br><br> 

            <label for="endereco">Altere seu endereço</label><br>
            <input type="text" name="endereco" placeholder="<?php echo $endereco ?>"><!--Esse altera o endereço-->
            <br><br>
 
            <label for="text" name="email">Alterar E-mail</label><br><!--Esse altera o e-mail-->
            <input type="email" name="email" placeholder="<?php echo $email ?>" required autofocus>
            <br><br>
        
            <label for="senha">Alterar Senha</label><br><!--Esse altera a senha-->
            <input type="password" name="senha" placeholder="Digite sua nova senha" required>
            <br><br>
            
            <button type="submit" name="update">Alterar Perfil</button><!--Esse botão confirma a alteração dos dados-->
        </form>
    </div>
    <div class="container"><!--Rodapé-->
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
</html>