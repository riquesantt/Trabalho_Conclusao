
<?php 
//conexão
require_once ('db_connect.php');

//sessão
session_start();
//botão enviar
if (isset($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) or empty ($senha)):
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
    else:
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
        $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
        $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: index.php');
            endif;        
    else:
            $erros[] = "<li> Usuário inexistente </li>";
        endif;
    endif;
endif;
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="estilo.css">
    <head>
        <title>Login        </title>
        <style type="text/css"> 
        .login{
            width:350px;
            height: 210px;
            background-color: #9ACD32;
            border-radius: 5px;
        }     
        </style>
        <meta charset="utf-8">
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
    </nav>
           <br><br><br><br><br><br>
     <center> <h2>Acesse sua conta</h2> </center><br>
<div class="login"> <center> <?php 
        if(!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
        endif;
        ?> </center>
        <br><br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <center><b>Login:</b> <input type="text" name="login"><br><br>
             <b>Senha:</b> <input type="password" name="senha"> <br><br>
        </center>
             <div class="btn"><center><button type="submit" name="btn-entrar"> Entrar</button></center>
             </div> <br>
            <center> <a href="cadastro.php"> Cadastre-se </a></center>
            </div>
</form>
</body>
</html> 