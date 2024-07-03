<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos clientes VIPS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: gray;
        }
        h1 {
            color: white;
            font-weight: bold;
            text-align: center;
        }
        table {
            background-color: #0dcaf0;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Nossos clientes VIPS</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center"><strong>Nome</strong></td>
                <td align="center"><strong>Mensagem</strong></td>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui você insere os dados dos clientes VIPs obtidos do PHP -->
            <?php
            include("../conectarbd.php");
            $selecionar = mysqli_query($conn, "SELECT nome, SUM(qtde_total) AS total_compras
                                                FROM tb_pedido
                                                GROUP BY nome
                                                HAVING SUM(qtde_total) >= 3");
            while ($campo = mysqli_fetch_array($selecionar)) {?>
                <tr>
                    <td align="center"><?=$campo["nome"]?></td>
                    <td align="center">Cliente VIP</td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../indexadmin.php" class="btn btn-success" style="margin-left: 20px;">Voltar</a>
</body>
</html>
