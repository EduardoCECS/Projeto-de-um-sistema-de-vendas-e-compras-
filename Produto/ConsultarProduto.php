<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultar Produto</title>
        <link type="text/css" rel="stylesheet" href="../css/consultarGeral.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="background-color: gray;">
        <h1 style="color: white; font-weight: bold; text-align: center;">Consultar Produtos Cadastrados</h1>
                <table  style="background-color: #0dcaf0; font-weight: bold; font-size: 20px;  "
                   width="100%"
                   border="1" 
                   bordercolor="black"
                   cellspacing="2" 	
                   cellpadding="5"
                   >
                    <tr >
                        <td " align="center"> <strong>ID</strong></td>		
                        <td align="center"> <strong>Nome</strong></td>
                        <td align="center"> <strong>Valor</strong></td>
                        <td align="center"> <strong>Valor de Compra</strong></td>
                        <td align="center"> <strong>Valor de Venda</strong></td>
                        <td align="center"> <strong>Descrição</strong></td>
                        <td align="center"> <strong>Imagem</strong></td>
                        <td width="10" > <strong >Editar</strong></td>
                        <td width="10"> <strong >Deletar</strong></td>
                    </tr>

                    <?php
                        include("../conectarbd.php");
                        $selecionar= mysqli_query($conn, "SELECT * FROM tb_produto");
                        while ($campo= mysqli_fetch_array($selecionar)){?>
                            <tr>
                                <td align="center"><?=$campo["id_produto"]?></td>
                                <td align="center"><?=$campo["nome"]?></td>
                                <td align="center"><?=$campo["valor"]?></td>
                                <td align="center"><?=$campo["valor_compra"]?></td>
                                <td align="center"><?=$campo["valor_venda"]?></td>
                                <td align="center"><?=$campo["descricao"]?></td>
                                <td align="center"><?=$campo["imagem"]?></td>
                                <td align="center"><a href="FormEditarProduto.php?editarid=<?php echo $campo ['id_produto'];?>" class="btn btn-success">Editar</a></td>
                                <td align="center"><i><a href="Excluirproduto.php?p=excluir&produto=<?php echo $campo['id_produto'];?>" class="btn btn-danger">Excluir</i></a></td>
                            </tr>
                    <?php }?>
                </table><br>
                <a href="../indexadmin.php" class="btn btn-success" role="button" style="margin-left: 20px;">Voltar</a>
                
    </body>
</html>
