<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consultar Funcionario</title>
        <link type="text/css" rel="stylesheet" href="../Funcionario/consultarGeral.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body style="background-color: gray;">
        <h1 style="color: white; font-weight: bold; text-align: center;">Consultar Funcionarios Cadastrados</h1>
                <table  style="background-color: #0dcaf0; font-weight: bold; font-size: 20px;  "
                   width="100%"
                   border="1" 
                   bordercolor="black"
                   cellspacing="2" 	
                   cellpadding="5"
                   >
                    <tr >
                        <td align="center"> <strong>ID</strong></td>	
                        <td align="center"> <strong>Nome:</strong></td>		
                        <td align="center"> <strong>Telefone Celular:</strong></td>
                        <td align="center"> <strong>Email</strong></td>
                        <td align="center"> <strong>CPF</strong></td>
                        <td align="center"> <strong>Gênero</strong></td>
                        <td align="center"> <strong>Estado</strong></td>
                        <td align="center"> <strong>Rg</strong></td>
                        <td align="center"> <strong>Ctps</strong></td>
                        <td align="center"> <strong>Pis</strong></td>
                        
                        
                       
                        <td width="10" > <strong >Editar</strong></td>
                        <td width="10"> <strong >Deletar</strong></td>
                    </tr>

                    <?php
                        include("../conectarbd.php");
                        $selecionar= mysqli_query($conn, "SELECT * FROM tb_funcionario");
                        while ($campo= mysqli_fetch_array($selecionar)){?>
                            <tr>
                                <td align="center"><?=$campo["id_funcionario"]?></td>
                                <td align="center"><?=$campo["nome"]?></td>
                                <td align="center"><?=$campo["tel_cel"]?></td>
                                <td align="center"><?=$campo["email"]?></td>
                                <td align="center"><?=$campo["cpf"]?></td>
                                <td align="center"><?=$campo["genero"]?></td>
                                <td align="center"><?=$campo["estado"]?></td>
                                <td align="center"><?=$campo["rg"]?></td>
                                <td align="center"><?=$campo["ctps"]?></td>
                                <td align="center"><?=$campo["pis"]?></td>
                                
                                
                                <td align="center"><a href="FormEditarFuncionario.php?editarid=<?php echo $campo ['id_funcionario'];?>" class="btn btn-success">Editar</a></td>
                                <td align="center"><i><a href="Excluirfuncionario.php?p=excluir&funcionario=<?php echo $campo['id_funcionario'];?>" class="btn btn-danger">Excluir</i></a></td>
                            </tr>
                    <?php }?>
                </table><br>
                <a href="../indexadmin.php" class="btn btn-success" role="button" style="margin-left: 20px;">Voltar</a>
                
    </body>
</html>
