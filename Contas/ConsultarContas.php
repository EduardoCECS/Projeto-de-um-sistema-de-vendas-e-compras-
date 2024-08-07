<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultar Contas</title>
        <link type="text/css" rel="stylesheet" href="css/consultarGeral.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="background-color: gray;">
        <h1 style="color: white; font-weight: bold; text-align: center;">Consultar Contas Cadastradas</h1>
        <table style="background-color: #0dcaf0; font-weight: bold; font-size: 20px;  " width="100%" border="1" bordercolor="black" cellspacing="2" cellpadding="5">
            <tr>
                <td align="center"><strong>ID</strong></td>
                <td align="center"><strong>Tipo de Conta</strong></td>
                <td align="center"><strong>Descrição</strong></td>
                <td align="center"><strong>Valor</strong></td>
                <td align="center"><strong>Data de Vencimento</strong></td>
                <td align="center"><strong>Status da Conta</strong></td>
                <td align="center"><strong>Observações</strong></td>
                <td width="10"><strong>Editar</strong></td>
                <td width="10"><strong>Deletar</strong></td>
            </tr>

            <?php
            include("../conectarbd.php");
            $selecionar = mysqli_query($conn, "SELECT * FROM tb_contas");
            while ($campo = mysqli_fetch_array($selecionar)) {
                ?>
                <tr>
                    <td align="center"><?= $campo["id_conta"] ?></td>
                    <td align="center"><?= $campo["tipo_conta"] ?></td>
                    <td align="center"><?= $campo["descricao"] ?></td>
                    <td align="center"><?= $campo["valor"] ?></td>
                    <td align="center"><?= $campo["data_vencimento"] ?></td>
                    <td align="center"><?= $campo["status_conta"] ?></td>
                    <td align="center"><?= $campo["observacoes"] ?></td>
                    <td align="center"><a href="../Contas/FormEditarContas.php?editarid=<?php echo $campo ['id_conta']; ?>" class="btn btn-success">Editar</a></td>
                    <td align="center"><i><a href="../Contas/ExcluirContas.php?p=excluir&conta=<?php echo $campo['id_conta']; ?>" class="btn btn-danger">Excluir</i></a></td>
                </tr>
<?php } ?>
        </table><br>
        <a href="../indexadmin.php" class="btn btn-success" role="button" style="margin-left: 20px;">Voltar</a>

    </body>
</html>
