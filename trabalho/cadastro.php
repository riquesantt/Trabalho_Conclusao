<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="estilo.css">
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
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
    </nav><br><br><br><br>
		<center><h1>Cadastrar Usuário</h1></center>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<br> <br> <center><h2> Seja mais um usuário feliz!</h2></center><BR>
		<center><P>Insira seus dados abaixo.</P><form method="POST" action="processa.php">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>
			
			<label>Login: </label>
			<input type="text" name="login" placeholder="Digite o seu e-mail"><br><br>

			<label>Senha: </label>
			<input type="password" name="senha" placeholder="Digite o seu e-mail"><br><br>

			<input type="submit" value="Cadastrar">
		</form> </center>
	</body>
</html>