
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="estilo.css">
    <title>Produtos</title>
    <style type="text/css">
    
    .produto{
        width: 33.3%;
        padding: 0 30px;    
    }

    .produto img{
        max-width: 400px;
        max-height: 150px;
    }

    .produto a{
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #9ACD32;
        text-align: center;
        text-decoration: none;
        color: black;
    }

    .title{
        width: 100%;
        padding: 20px;
        text-align: 20px;
        text-align: center;
        color: white;
        background-color: black;
    }

    .carrinho-item{
        max-width: 1200px;
        margin: 10px auto;
        padding-bottom: 10px;
        border-bottom: 2px dotted #ccc;
    }

    .carrinho-item p{
        font-size: 18px;
        color: black;
    }

    .pedidos{
        padding: 20px;
        width: 25%;
        background-color: black;
    }

    .pedidos a{
        color:white;
        text-decoration: none;
        list-style: none;
    }
    
    </style>
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
    </nav> <br> <br>

    <!--<div class="carrinho-container">-->

<?php 
 
    $items = array(['nome'=>'Mamão','imagem'=> 'mamao.jpg','preco'=>'2'],
    ['nome'=>'Tomate','imagem'=>'tomate.jpg','preco'=>'2'],
    ['nome'=>'Rucula','imagem'=>'rucula.png','preco'=>'2'],
    ['nome'=>'Alface','imagem'=>'alface.jpeg','preco'=>'2'],
    ['nome'=>'Alho Poró','imagem'=>'alho-poro.jpg','preco'=>'2'],
    ['nome'=>'Cenoura','imagem'=>'cenoura.jpg','preco'=>'2']);

    foreach ($items as $key => $value) {
?>

            <div class="produto">
                <center><img src="<?php echo $value['imagem'] ?>" />
                <a href="?adicionar=<?php echo $key ?>"> Adicionar ao carrinho!</a><br>
                <a href="?remover=<?php echo $key ?>">Remover do carrinho!</a>
            </div></center> <!--produto-->

<?php
    }
?>
   <!-- </div>container-->

    <?php 
    if (isset($_GET['adicionar'])){
        //vamos adicionar ao carrinho.
        $idProduto = (int) $_GET['adicionar'];
        if (isset($items[$idProduto])){
            if(isset($_SESSION['carrinho'][$idProduto])){
                $_SESSION['carrinho'][$idProduto]['quantidade']++;
            }else {
                $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'nome'=>$items[$idProduto]['nome'],'preco'=>$items[$idProduto]['preco']);
            }
               // echo '<script>alert("O item foi adicionado ao carrinho.");</script>';
            }else{
                die('Você não pode adicionar um item que não existe.');

            }      
    }
?>

<?php
if(isset($_GET['remover']))
{
    $idProduto = (int) $_GET['remover'];
    if(isset($_SESSION['carrinho']))
    {
        unset($_SESSION['carrinho'][$idProduto]);
    }
}
?>

<br><br>
<h2 class="title">Carrinho de compras</h2> 
<?php
    foreach($_SESSION['carrinho'] as $key => $value){
        echo'<div class="carrinho-item">';
        echo '<p>Nome do produto: '.$value['nome'].' | Quantidade: '.$value['quantidade'].' | Preço: R$ '.($value['quantidade']*$value['preco']).'</p>';
        echo'<hr>';
        echo '</div>';
    
    } 
?>
<br>
<br>
<div class="pedidos">
<a href="finalizar-pedido.php"><center><h3>Finalizar pedido com PagSeguro</h3> </a></div></center><br><br>
</body>
</html>