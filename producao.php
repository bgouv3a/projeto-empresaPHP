<?php
include "conexao.php";

$sql = "SELECT 
            producao.ProducaoID, 
            produtos.Nome AS Produto, 
            funcionarios.Nome AS Funcionario, 
            clientes.Empresa AS Cliente, 
            producao.DataProducao, 
            producao.DataEntrega 
        FROM producao 
        INNER JOIN produtos ON producao.ProdutoID = produtos.ProdutoID 
        INNER JOIN funcionarios ON producao.FuncionarioID = funcionarios.FuncionarioID 
        INNER JOIN clientes ON producao.ClienteID = clientes.ClienteID 
        ORDER BY producao.DataProducao DESC";

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produção</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "componentes/header.php"; ?>

    <main class="container">
        <section class="titulo-pagina">
            <h1>Produção</h1>
        </section>

        <div class="tabela-container">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Funcionário</th>
                        <th>Cliente</th>
                        <th>Data produção</th>
                        <th>Data entrega</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $item["ProducaoID"]; ?></td>
                            <td><?php echo $item["Produto"]; ?></td>
                            <td><?php echo $item["Funcionario"]; ?></td>
                            <td><?php echo $item["Cliente"]; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($item["DataProducao"])); ?></td>
                            <td>
                                <?php 
                                if ($item["DataEntrega"] == null) {
                                    echo "Em aberto";
                                } else {
                                    echo date("d/m/Y", strtotime($item["DataEntrega"]));
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo ($item["DataEntrega"] == null) ? "Em aberto" : "Concluída"; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include "componentes/footer.php"; ?>
</body>
</html>