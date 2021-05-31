<?php
session_start();
//importa a conexão com o banco de dados
include_once('connectbd.php');

//Aqui a receberemos os dados do usuario do front-end via parametros e as colocaremos nas variaveis 
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = $_POST["senha"];

//A variavel $query recebe os valores das variaveis e joga dentro dela
//exista uma coluna ID mas ela não precisar sem inserida pois ela se auto incrementa no banco de dados (id é a chave primaria)
//A tabela usada é a tabela clientes
$query = "INSERT INTO clientes (nome, sobrenome, idade, sexo, telefone, endereco, email, senha) VALUES ('$nome', '$sobrenome', '$idade', '$sexo', '$telefone', '$endereco', '$email', '$senha')";

//A variavel resultado recebe conexão do banco de dados e envia os comandos pro banco de dados
$resultado = mysqli_query($conectar, $query);

//Este é um comando  verifica se o cadastro foi bem sucessedido
if(mysqli_affected_rows($conectar)):
    $_SESSION['cadastrado'] = "<script>window.alert('Cadastro realizado com sucesso!!!')</script>";
    header("Location: login.php");
endif;
?>