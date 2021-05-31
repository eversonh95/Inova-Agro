<?php
//Incia uma sessão
session_start();
if (isset($_SESSION['copyID'])): 
	$id = $_SESSION['copyID'];
endif;

//importa a conexão com o banco de dados
include_once('connectbd.php');

//Aqui a receberemos os dados do Cliente do front-end via parametros e as colocaremos nas variaveis 
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = $_POST["senha"];

//$sqlupate é variavel que recebe os comandos SQL
$sqlupdate = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', idade = '$idade', sexo = '$sexo', telefone = '$telefone', endereco = '$endereco',  email = '$email', senha = '$senha' WHERE id = '$id'";

//Conecta e envia os comandos para o BD
$resultado = mysqli_query($conectar, $sqlupdate);

//Comando que verifica se o comando funcionou ou não
if(mysqli_affected_rows($conectar)):
   $_SESSION['atualizado'] = "<script>window.alert('Cadastro realizado com sucesso!!!')</script>";
   header('Location: home.php');
else:
   $_SESSION['atualizado'] = "<script>window.alert('Erro ao atualizar Cadastro!!!')</script>";
   header('Location: home.php');
endif;

?>