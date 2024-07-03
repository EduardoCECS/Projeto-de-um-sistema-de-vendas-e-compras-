<?php
include_once './conectarbd.php';
session_start();

// Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['senha'])) {
    // Aqui você deve verificar no seu banco de dados se o usuário existe e as credenciais estão corretas
    // Vou fornecer um exemplo simples apenas para demonstração

    // Supondo que as credenciais estão corretas, armazene o nome do usuário na sessão
    $nomeUsuario = ""; // Defina uma variável para armazenar o nome do usuário

    // Consulta SQL para verificar se o usuário e senha correspondem a um registro na tabela tb_cliente
    // Substitua 'email' e 'senha' pelos nomes reais dos campos em seu banco de dados
    $sql = "SELECT nome FROM tb_cliente WHERE email='{$_POST['email']}' AND senha='{$_POST['senha']}'";
    
    // Execute a consulta
    // Supondo que você está usando MySQLi para interagir com o banco de dados
    $result = $conn->query($sql);

    // Verifica se o usuário foi encontrado
    if ($result->num_rows == 1) {
        // Obtém o nome do usuário
        $row = $result->fetch_assoc();
        $nomeUsuario = $row['nome'];

        // Armazena o nome do usuário na sessão
        $_SESSION['usuario'] = $nomeUsuario;

        // Redirecione para a página principal ou para onde desejar
        header("Location: index.php");
        exit();
    } else {
        // Caso as credenciais estejam incorretas, você pode definir uma mensagem de erro e redirecionar de volta para a página de login
        $_SESSION['login_error'] = "Usuário ou senha incorretos";
        header("Location: login.php"); // Altere isso para o caminho correto da página de login
        exit();
    }
}
?>
