<?php
session_start();

//importa o banco de dados
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

        //Esse comando verifica se o E-mail e a senha existem no banco de dados para logar
        //a variavel $sqlselect tem a mesma função da variavel $query foi mudada para evitar confusão
        $sqlselect = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
        $resultadoo = mysqli_query($conectar,$sqlselect);
        
        //Verfica se a uma correspondecia de duas linhas de senha e email
        if(mysqli_num_rows($resultadoo) == 1):
            //Se tiver sucesso no login ira redirecionar para pagina a seguir
            header("Location: home.php"); //Redireciona para pagina inicial
            $_SESSION['login'] = "Seja bem-vindo(a) $nome $sobrenome com ID:$id<br><hr>";
            //Joga o conteudo da variavel email na varialvel global $_SESSION['copyemail'];
            $_SESSION['copyemail'] = $email;//Copia o email do usuario para a variavel global
            $_SESSION['copysenha'] = $senha;//Copia a senhda do usuario para a variavel global
        else:
            echo "Erro no login";
            header("Location: login.html");
        endif;
    endif;
endif;

?>