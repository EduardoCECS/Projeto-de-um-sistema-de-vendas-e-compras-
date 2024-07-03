<?php
session_start();

// Verifica se o carrinho não está inicializado, inicializa se necessário
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['contador'] = 0;
}

// Verifica se o formulário de login admin foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_usuario']) && isset($_POST['admin_senha'])) {
    // Inclui o arquivo de conexão ao banco de dados
    include_once './conectarbd.php';

    // Obtém os valores do formulário
    $admin_usuario = mysqli_real_escape_string($conn, $_POST['admin_usuario']);
    $admin_senha = mysqli_real_escape_string($conn, $_POST['admin_senha']);

    // Query para verificar se o usuário e senha estão corretos
    $query = "SELECT * FROM admin WHERE usuario = '$admin_usuario' AND senha = '$admin_senha'";
    $result = mysqli_query($conn, $query);

    // Verifica se encontrou um usuário com essas credenciais
    if (mysqli_num_rows($result) == 1) {
        // O login é válido, define as variáveis de sessão
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $admin_usuario;

        // Redireciona para a página do admin
        header("Location: admin/indexadmin.php");
        exit();
    } else {
        // Login inválido, mostra mensagem de erro
        $login_error = "Usuário ou senha incorretos";
    }
}
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cadastrar Contato</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link 
            rel="stylesheet" href="../css/estilo_contato.css" />
        <link rel="icon" type="image/png" href="../img/logo.png">
    </head>
    <body class="bg-login">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt=""/>
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="../index.php"> <b>Home</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login.php"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="FormCadContatoUsuario.php"><b>Contato</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                        </li>
                        <div class="dropdown">
                            <button class="btn btn-bg-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-weight: bold;">
                                Categorias
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../Brinco/brincos.php">Brincos</a></li>
                                <li><a class="dropdown-item" href="../Colar/colares.php">Colares</a></li>
                                <li><a class="dropdown-item" href="../Anel/aneis.php">Aneis</a></li>
                                <li><a class="dropdown-item" href="../Piercing/piercings.php">Piercings</a></li>
                                <li><a class="dropdown-item" href="../Pulseira/pulseiras.php">Pulseiras</a></li>
                                <li><a class="dropdown-item" href="../Bracelete/braceletes.php">Braceletes</a></li>
                                <li><a class="dropdown-item" href="../Tornozeleira/tornozeleiras.php">Tornozeleiras</a></li>

                            </ul>


                        </div>
                       <ul class="navbar-nav mr-auto">
                        <!-- Outros itens de navegação aqui -->

                        <!-- Verifica se o usuário está logado -->
                        <?php if (isset($_SESSION['usuario'])) { ?>
                            <li class="nav-item">
                                <!-- Exibe uma mensagem de boas-vindas com o nome do usuário -->
                                <span class="nav-link text-white"><b>Olá, lindo(a):</b> <?php echo $_SESSION['usuario']; ?></span>
                            </li>
                            <li class="nav-item">
                                <!-- Adiciona um botão de sair -->
                                <a class="nav-link text-white" href="../logout.php"><b>Sair</b></a>
                            </li>
                        <?php } ?>
                    </ul>

                        </nav>
                        </header>
                        <!--Corpo da página -->
                        <main>
                            <section id="section-cliente">
                                <h1>Contate-nos</h1>
                                <div class="d-flex justify-content-center">
                                    <form method="POST" action="../Contato/cadastrarContato.php">
                                    <form method="post" action="https://api.staticforms.xyz/submit" id="login">
                                        <input type="hidden" name="accessKey" value="bb42029b-389d-4cbe-a9ab-e907cb81ebe0">
                                        <input type="hidden" name="redirectTo" value="http://localhost/TatyCrisBiju/Contato/FormCadContatoUsuario.php">
                                        <p>
                                            <label for="nome">Nome: </label>
                                            <input
                                                id="nome" 
                                                name="nome"
                                                required="required"
                                                type="text"
                                                placeholder="Insira o seu nome"
                                                class="form-control"
                                                />
                                        </p>

                                        <p>
                                            <label for="tel_cel">Telefone Celular: </label>
                                            <input
                                                id="tel_cel" 
                                                name="tel_cel"
                                                required="required"
                                                type="text"
                                                placeholder="Coloque o seu Telefone celular"
                                                class="form-control"
                                                />
                                        </p>

                                        <p>
                                            <label for="email">E-mail: </label>
                                            <input
                                                id="email" 
                                                name="email"
                                                required="required"
                                                type="email"
                                                placeholder="Insira seu email"
                                                class="form-control"
                                                />
                                        </p>

                                        <p>
                                            <label for="observacoes">Observações: </label>
                                            <textarea
                                                id="observacoes"
                                                name="observacoes"
                                                required="required"
                                                placeholder="Insira as observações"
                                                class="form-control"
                                                ></textarea>
                                        </p>


                                        <p>
                                            <input
                                                type="submit"
                                                value="Cadastrar"
                                                class="btn btn-primary"
                                                id="bt-login"
                                                />
                                        </p>
                                    </form>
                                        </form>


                                </div>
                            </section>

                        </main>

                        <footer>
                            <p></p>
                        </footer>

                        <script>

                            var tel_cel = document.getElementById("tel_cel");

                            tel_cel.addEventListener("input", () => {
                                var limparValor = tel_cel.value.replace(/\D/g, "").substring(0, 11);
                                var numerosArray = limparValor.split("");
                                var numeroformatado = "";

                                if (numerosArray.length > 0) {
                                    numeroformatado += `(${numerosArray.slice(0, 2).join("")})`;
                                }

                                if (numerosArray.length > 2) {
                                    numeroformatado += ` ${numerosArray.slice(2, 7).join("")}`;
                                }

                                if (numerosArray.length > 7) {
                                    numeroformatado += `-${numerosArray.slice(7, 11).join("")}`;
                                }

                                tel_cel.value = numeroformatado;
                            });

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