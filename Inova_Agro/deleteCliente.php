<?php
//Da acesso a variaveis globais
session_start();

//Puxa o ID do usuario e joga na variavel $id
if (isset($_SESSION['copyID'])): 
	$id = $_SESSION['copyID'];
endif;

//Inclui os comandos do banco de dados
include_once('connectbd.php');

//Variaveis que serão recebidos do html ou do front end
//essas variaveis fazem um filtro no SQL e conectam com o BD além de receber o email e a senha via parametros
$email = mysqli_escape_string($conectar,$_POST['email']);
$senha = mysqli_escape_string($conectar,$_POST['senha']);

//Verifica se os campos de email (login) e senha estão vazios
if(empty($email) or empty($senha)):
    echo "Campos precisam ser preenchidos";
else:
    //Esse comando compara o email (login) com o banco de dados
    //Esse comando vai verificar se email inserido pelo usuario é igual a uns dos emails do banco de dados
    $query = "SELECT email FROM clientes WHERE email = '$email'";
    
    //Essse comando conecta com banco de dados e envia os resultados para variavel $resultado
    $resultado = mysqli_query($conectar,$query);

    //Se os numeros de linhas iguais $resultado for maior que zero
    if(mysqli_num_rows($resultado) > 0):

        ///Comando SQL que ira excluir o usuario do banco de dados
        $sqldelete = "DELETE FROM clientes WHERE id = '$id'";
        //Converte a conexão do BD e os camandos na variavel $resultado
        $resultado = mysqli_query($conectar,$sqldelete);
    endif;    
endif;

//Esse comando verfica se o comando afetou alguma linha banco de dados
if(mysqli_affected_rows($conectar)):
    //Essa é uma variavel global que pode ser inserida em outros arquivos
    $_SESSION['delete'] = "<script>window.alert('Cadastro excluído com sucesso!!!')</script>";
    //Redireciona para login.php
    header("Location: login.php");
else:
    $_SESSION['delete'] = "<script>window.alert('Erro ao excluir Cadastro!!!')</script>";
    header("Location: login.php");
endif;
?>