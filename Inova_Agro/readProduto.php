<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css"><!--Importa o CSS-->
    <title>Produtos</title>
</head>
<body>
<nav class="header">
        <a href="home.php"><button>Inicio</button>
        <a href="readProduto.php"><button>Produtos</button></a>
        <a href="alterarPerfil.php"><button>Alterar Perfil</button></a>
        <a href="excluirPerfil.html"><button>Excluir Perfil</button></a>
        <a href="login.php"><button>Sair</button></a>
    </nav>
    <div class="texto">
    <?php

session_start();

include('connectbd.php');

$sqlselect = "SELECT * FROM produtos";

$resultado = mysqli_query($conectar, $sqlselect);

while($mostar = mysqli_fetch_array($resultado)):

    $id_produto = $mostar['ID_PRODUTO'];
    $nomeproduto = $mostar['NOME_PRODUTO'];
    $preco = $mostar['PRECO'];

    echo "Código: $id_produto<br> Nome: $nomeproduto<br> Preço: $preco<hr>";

endwhile;

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