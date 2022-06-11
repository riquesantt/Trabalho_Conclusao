<?php
session_start();
include_once ("db_connect.php");

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha')";
$salvar = mysqli_query($connect, $sql);

$linhas = mysqli_affected_rows($connect);

mysqli_close($connect);
?>

<html>
<head><link rel="stylesheet" href="estilo.css"></head>
<body>
    
    <nav id="menu-h">
        <ul>
            <li>
                <a href="index.php"> Home </a></li>

            <li><a href="produtos.php">Produtos</a></li>
            
            <li><a href="sobre.html">Benefícios</a></li>
            
            <li><a href="contato.html">Contato</a></li>
            
            <li><a href="login.php">Entrar</a></li>
        </ul>
    </nav> <br> <br> 
    <center><h1> CONFIRMAÇÃO DE CADASTRO </h1></center>
<HR><BR><BR><center>
<?php 
if ($linhas ==1){
    echo "Cadastro efetuado com sucesso! <br> Seja Bem Vindo(a) <b> $nome, </b> ao Natural Food Guaíba";
    
}else {
    echo "Cadastro NÃO efetuado com sucesso. <br> Tente novamente!";
}

?></center>
</body></html>