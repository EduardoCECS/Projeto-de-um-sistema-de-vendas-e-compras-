<?php
session_start();

// Verifica se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['senha'])) {
    // Obtém os valores do formulário e sanitiza
    $admin_usuario = $_POST['usuario'];
    $admin_senha = $_POST['senha'];

    // Verificar os valores recebidos do formulário
    var_dump($admin_usuario);
    var_dump($admin_senha);

    // Verifica se os valores correspondem aos valores esperados
    if ($admin_usuario === "admin" && $admin_senha === "12345") {
        // Login é válido, define as variáveis de sessão
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin_usuario;

        // Redireciona para a página do admin
        header("Location: ./indexadmin.php");
        exit();
    } else {
        // Login inválido, mostra mensagem de erro
        $login_error = "Usuário ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estiloAdm.css" />
</head>
<body>
    <header>
        <!-- Seu código de navegação aqui -->
    </header>

    <main>
        <section id="section-login">
            <h1>Login ADM</h1>
            <div class="d-flex justify-content-center">
                <form onsubmit="return validarLogin()" method="post" action="" id="login">

                    <p>
                        <label for="usuario"><b>Login:</b> </label>
                        <input
                            id="usuario"
                            name="usuario"
                            required="required"
                            type="text"
                            placeholder="Insira o seu usuário"
                            class="form-control"
                        />
                    </p>

                    <p>
                        <label for="senha"><b>Senha:</b> </label>
                        <input
                            id="senha"
                            name="senha"
                            required="required"
                            type="password"
                            placeholder="Insira a sua senha"
                            class="form-control"
                        />
                    </p>

                    <p>
                        <input
                            type="submit"
                            value="Login"
                            class="btn btn-primary"
                            id="bt-login"
                        />
                    </p>
                </form>

                <?php
                // Exibir mensagem de erro, se houver
                if (isset($login_error)) {
                    echo '<div class="alert alert-danger" role="alert">' . $login_error . '</div>';
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p></p>
    </footer>

    <script>
        function validarLogin() {
            var usuario = document.getElementById("usuario").value;
            var senha = document.getElementById("senha").value;

            // Verifica se o usuário e a senha correspondem aos valores esperados
            if (usuario === "admin" && senha === "12345") {
                return true; // Permite o envio do formulário
            } else {
                // Login inválido, mostra mensagem de erro
                var loginError = document.getElementById("login-error");
                loginError.innerHTML = "Usuário ou senha incorretos";
                loginError.style.display = "block";
                return false; // Impede o envio do formulário
            }
        }
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"
    ></script>
    <script src="js/script.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="js/jquery-script.js"></script>
</body>
</html>
