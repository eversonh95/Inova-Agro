<?php
session_start();
include('connectbd.php');
if(isset($_SESSION['copyemail'])):
    $email = $_SESSION['copyemail'];
endif;
if(isset($_SESSION['copysenha'])):
    $senha = $_SESSION['copysenha'];
endif;
if (isset($_SESSION['atualizado'])):
    echo $_SESSION['atualizado'];
    unset($_SESSION['atualizado']);
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css"><!--Importa o CSS-->
    <title>Inicio</title>
</head>
<body>
<nav class="header">
        <a href="home.php"><button>Inicio</button>
        <a href="readProduto.php"><button>Produtos</button></a>
        <a href="alterarPerfil.php"><button>Alterar Perfil</button></a>
        <a href="excluirPerfil.html"><button>Excluir Perfil</button></a>
        <a href="login.php"><button>Sair</button></a>
    </nav>

    <header>Pagina inicial</header>
    <div>
        <?php
    	//Verificar a existencia da variavel $_POST['email']
	if(isset($_SESSION['login'])):
        $sqlselect = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $resultado = mysqli_query($conectar, $sqlselect);
        while($mostar = mysqli_fetch_array($resultado)):
            $id = $mostar['id'];
            $_SESSION['copyID'] = $id;
            $nome = $mostar['nome'];
            $sobrenome = $mostar['sobrenome'];
            $idade = $mostar['idade'];
            $sexo = $mostar["sexo"];
            $telefone = $mostar["telefone"];
            $endereco = $mostar["endereco"];
            $email = $mostar["email"];

            echo $_SESSION['login'] = "Seja bem-vindo(a) $nome $sobrenome com ID:$id<br><hr>";

            echo "
            <center><table>
            <caption>Seus Dados</caption>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Telefone</th>
                <th>Endereco</th>
                <th>E-mail</th>      
            </tr>
            <tr>
              <td>$id</td>
              <td>$nome</td>
              <td>$sobrenome</td>
              <td>$idade</td>
              <td>$sexo</td>
              <td>$telefone</td>
              <td>$endereco</td>
              <td>$email</td>
            </tr>
            </center></table>";
        endwhile;
    endif;
    ?>
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
</html>