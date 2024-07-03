<?php

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
    include_once "../conectarbd.php";

    // Estabelece a conexão com o banco de dados
    $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);

    // Verifica a conexão com o banco de dados
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Recebe os dados do formulário
    $tipo_conta = $_POST["tipo_conta"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $data_vencimento = $_POST["data_vencimento"];
    $status_conta = $_POST["status_conta"];
    $observacoes = $_POST["observacoes"];

    // Prepara a consulta SQL para inserção de dados
    $sql = "INSERT INTO tb_contas (tipo_conta, descricao, valor, data_vencimento, status_conta, observacoes) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepara a declaração SQL
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Vincula os parâmetros da declaração preparada como parâmetros
        mysqli_stmt_bind_param($stmt, "ssdsss", $tipo_conta, $descricao, $valor, $data_vencimento, $status_conta, $observacoes);

        // Executa a declaração preparada
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Conta cadastrada com sucesso!');</script>";
            mysqli_stmt_close($stmt); // Fecha a declaração preparada

            // Exibe a mensagem de sucesso e redireciona para a página de cadastro de contas
            echo "<script>window.location.href = 'FormCadContas.html';</script>";
            exit(); // Certifique-se de sair após o redirecionamento
        } else {
            echo "<script>alert('Erro ao cadastrar a conta. Tente novamente mais tarde.');</script>";
        }
    } else {
        echo "<script>alert('Erro na preparação da consulta SQL.');</script>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Redireciona se o script for acessado diretamente sem dados do formulário
    header("Location: ../index.php");
    exit();
}
?>
