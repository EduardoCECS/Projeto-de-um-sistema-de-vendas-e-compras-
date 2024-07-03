<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultar Pedido</title>
        <link type="text/css" rel="stylesheet" href="css/consultarGeral.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="background-color: gray;">
        <h1 style="color: white; font-weight: bold; text-align: center;">Consultar Pedidos Cadastrados</h1>
        <table style="background-color: #0dcaf0; font-weight: bold; font-size: 20px;" width="100%" border="1" bordercolor="black" cellspacing="2" cellpadding="5">
            <tr>
                <td align="center"> <strong>ID</strong></td>
                <td align="center"> <strong>Nome</strong></td>
                <td align="center"> <strong>Produtos</strong></td>
                <td align="center"> <strong>Quantidade Total</strong></td>
                <td align="center"> <strong>Valor Total</strong></td>
                <td align="center"> <strong>Forma de Pagamento</strong></td>  
                   
                <td width="10"> <strong >Deletar</strong></td>
            </tr>

            <?php
            include("../conectarbd.php");
            $selecionar = mysqli_query($conn, "SELECT * FROM tb_pedido");
            while ($campo = mysqli_fetch_array($selecionar)) {
                ?>
                <tr>
                    <td align="center"><?= $campo["id_pedido"] ?></td>
                    <td align="center"><?= $campo["nome"] ?></td>
                    <td align="center"><?= $campo["produtos"] ?></td>
                    <td align="center"><?= $campo["qtde_total"] ?></td>
                    <td align="center"><?= $campo["valor_total"] ?></td>
                    <td align="center"><?= $campo["forma_pg"] ?></td>
                    
                    
                    <td align="center"><i><a href="../Pedido/ExcluirPedido.php?p=excluir&pedido=<?php echo $campo['id_pedido']; ?>" class="btn btn-danger">Excluir</i></a></td>
                </tr>
            <?php } ?>
        </table><br>
        <a href="../indexadmin.php" class="btn btn-success" role="button" style="margin-left: 20px;">Voltar</a>
    </body>
</html>
