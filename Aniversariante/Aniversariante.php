<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aniversariantes</title>
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
    <h1>Nossos clientes Aniversariantes</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center"><strong>Nome</strong></td>
                <td align="center"><strong>Data de aniversário</strong></td>
                <td align="center"><strong>Situação</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../conectarbd.php");

            // Obtendo a data atual em Brasília (considerando fuso horário)
            date_default_timezone_set('America/Sao_Paulo');
            $data_atual = new DateTime();

            // Selecionando clientes aniversariantes
            $selecionar = mysqli_query($conn, "SELECT nome, data_nascimento FROM tb_cliente");

            if (!$selecionar) {
                // Verificar erros na consulta SQL
                echo "Erro na consulta SQL: " . mysqli_error($conn);
            } else {
                while ($cliente = mysqli_fetch_assoc($selecionar)) {
                    $nome = $cliente['nome'];
                    $data_nascimento = new DateTime($cliente['data_nascimento']);

                    // Verificar se o aniversário é hoje, ainda vai ocorrer ou já passou
                    if ($data_nascimento->format('m-d') === $data_atual->format('m-d')) {
                        $situacao = "Hoje é o aniversário!";
                    } else {
                        $situacao = "Ainda vai ocorrer ou já passou";
                    }

                    // Exibir os dados do cliente
                    echo "<tr>";
                    echo "<td>{$nome}</td>";
                    echo "<td>{$data_nascimento->format('d/m/Y')}</td>";
                    echo "<td>{$situacao}</td>";
                    echo "</tr>";
                }
            }
            ?>
            
        </tbody>
        
    </table>
    <a href="../indexadmin.php" class="btn btn-success" role="button" style="margin-left: 20px;">Voltar</a>
</body>
</html>
