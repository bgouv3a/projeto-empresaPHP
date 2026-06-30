<?php
include "conexao.php";

$id = 0;
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
}

$sql = "SELECT 
            produtos.ProdutoID, 
            produtos.Nome AS Produto, 
            produtos.Preco, 
            produtos.Referencia, 
            produtos.Descricao, 
            produtos.Peso, 
            categorias.Nome AS Categoria 
        FROM produtos 
        INNER JOIN categorias ON produtos.CategoriaID = categorias.CategoriaID 
        WHERE produtos.ProdutoID = $id";

$resultado = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe do Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "componentes/header.php"; ?>

    <main class="container">
        <?php if ($produto) { ?>
            <section class="detalhe-produto">
                <div class="icone-produto">PE</div>
                <div>
                    <span><?php echo $produto["Categoria"]; ?></span>
                    <h1><?php echo $produto["Produto"]; ?></h1>
                    <p>Referência: <?php echo $produto["Referencia"]; ?></p>
                    <p>Peso: <?php echo $produto["Peso"]; ?> kg</p>
                    <strong>R$ <?php echo number_format($produto["Preco"], 2, ",", "."); ?></strong>
                    <p><?php echo $produto["Descricao"]; ?></p>
                    <a class="botao" href="produtos.php">Voltar para produtos</a>
                </div>
            </section>
        <?php } else { ?>
            <section class="titulo-pagina">
                <h1>Produto não encontrado</h1>
                <p>O código enviado pela URL não corresponde a um produto cadastrado.</p>
                <a class="botao" href="produtos.php">Voltar para produtos</a>
            </section>
        <?php } ?>
    </main>

    <?php include "componentes/footer.php"; ?>
</body>
</html>