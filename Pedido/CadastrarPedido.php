<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Inicia a sessão

include_once "../conectarbd.php";

// Função para limpar e escapar os dados de entrada
function limpar_dados($conexao, $dados) {
    return mysqli_real_escape_string($conexao, htmlspecialchars($dados));
}

// Verifica se os campos obrigatórios foram enviados
if (isset($_POST["nome"], $_POST["forma_pg"])) {
    // Limpa e valida os dados de entrada
    $nome = isset($_POST["nome"]) ? limpar_dados($conn, $_POST["nome"]) : '';

    // Verifica e armazena apenas a forma de pagamento escolhida
    $forma_pg = "";
    if (isset($_POST["forma_pg"]) && !empty($_POST["forma_pg"])) {
        // Recupera a forma de pagamento selecionada pelo usuário
        $forma_pg_selecionada = limpar_dados($conn, $_POST["forma_pg"]);
        // Verifica se a forma de pagamento selecionada pelo usuário é válida
        if ($forma_pg_selecionada) {
            $forma_pg = $forma_pg_selecionada;
        } else {
            // Se a forma de pagamento não for válida, defina como vazio ou outra ação apropriada
            $forma_pg = ""; // Ou defina uma mensagem de erro ou outro tratamento apropriado
        }
    } else {
        // Se nenhum campo de forma de pagamento foi enviado, defina como vazio ou outra ação apropriada
        $forma_pg = ""; // Ou defina uma mensagem de erro ou outro tratamento apropriado
    }

    // Verifica se há produtos no carrinho
    if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        // Inicializa as variáveis para armazenar os produtos
        $produtos = "";
        $qtdeTotal = 0;
        $valorTotal = 0;

        // Itera sobre os produtos no carrinho para calcular a quantidade total e o valor total
        foreach ($_SESSION['carrinho'] as $key => $carrinho) {
            $sql = "SELECT * FROM tb_produto WHERE id_produto = '$key'";
            $query = mysqli_query($conn, $sql);
            if ($query && mysqli_num_rows($query) > 0) {
                $linha = mysqli_fetch_assoc($query);
                $produtos .= $linha["nome"] . ", ";
                $qtdeTotal += $carrinho;
                $valorTotal += $linha["valor_compra"] * $carrinho;
            }
        }

        // Remove a vírgula extra e o espaço no final da string de produtos
        $produtos = rtrim($produtos, ", ");

        // Insira aqui o código para inserir os dados no banco de dados, utilizando a variável $forma_pg
        // Prepara a query para inserir os dados na tabela tb_pedido
        $sql_pedido = "INSERT INTO tb_pedido (nome, produtos, qtde_total, valor_total, forma_pg) 
               VALUES ('$nome', '$produtos', '$qtdeTotal', '$valorTotal', '$forma_pg')";

        // Executa a query
        if (mysqli_query($conn, $sql_pedido)) {
            // Limpa o carrinho após o pedido ser cadastrado com sucesso
            unset($_SESSION['carrinho']);
            // Redireciona para a página index.php após o pedido ser cadastrado
            echo "<script>alert('Seus dados foram salvos!'); window.location = '../index.php';</script>";
            exit; // Termina o script para evitar que mais código seja executado após o redirecionamento
        } else {
            echo "Deu erro: " . mysqli_error($conn);
        }
    } else {
        echo "Erro: Não há produtos no carrinho.";
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    // Se algum campo obrigatório não foi enviado, exibe uma mensagem de erro
    echo "Erro: Campos obrigatórios não foram preenchidos.";
}
?>
