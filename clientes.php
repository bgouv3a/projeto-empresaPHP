<?php
include "conexao.php";

$sql = "SELECT ClienteID, Nome, Empresa, Email, Telefone, Cidade, Estado FROM clientes ORDER BY Empresa ASC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "componentes/header.php"; ?>

    <main class="container">
        <section class="titulo-pagina">
            <h1>Clientes</h1>
            <p>Consulta simples de clientes cadastrados no banco de dados.</p>
        </section>

        <div class="tabela-container">
            <table class="tabela-dados">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Contato</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>UF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cliente = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $cliente["ClienteID"]; ?></td>
                            <td><?php echo $cliente["Empresa"]; ?></td>
                            <td><?php echo $cliente["Nome"]; ?></td>
                            <td><?php echo $cliente["Email"]; ?></td>
                            <td><?php echo $cliente["Telefone"]; ?></td>
                            <td><?php echo $cliente["Cidade"]; ?></td>
                            <td><?php echo $cliente["Estado"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include "componentes/footer.php"; ?>
</body>
</html>