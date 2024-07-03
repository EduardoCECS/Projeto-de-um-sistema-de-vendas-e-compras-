<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estilo.css" />
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light-blue">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php"><b>Login</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Contato/FormCadContatoUsuario.php"><b>Contato</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-bg-light-blue dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-weight: bold;">
                            Categorias
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./Brinco/brincos.php">Brincos</a></li>
                            <li><a class="dropdown-item" href="./Colar/colares.php">Colares</a></li>
                            <li><a class="dropdown-item" href="./Anel/aneis.php">Aneis</a></li>
                            <li><a class="dropdown-item" href="./Piercing/piercings.php">Piercings</a></li>
                            <li><a class="dropdown-item" href="./Pulseira/pulseiras.php">Pulseiras</a></li>
                            <li><a class="dropdown-item" href="./Bracelete/braceletes.php">Braceletes</a></li>
                            <li><a class="dropdown-item" href="./Tornozeleira/tornozeleiras.php">Tornozeleiras</a></li>
                        </ul>
                    </div>
                </ul>
                <?php
                // Iniciar a sessão
                session_start();

                // Verificar se o usuário está logado
                if (isset($_SESSION['usuario'])) {
                    $nomeUsuario = $_SESSION['usuario'];
                    echo '<span class="navbar-text text-white"><b>Olá, lindo(a):</b> ' . $nomeUsuario . '</span>';
                }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <section id="section-login">
            <h1>Login</h1>
            <div class="d-flex justify-content-center">
                <form method="post" action="verificar_login.php" id="login-form">
                    <p>
                        <label for="nome"><b>Nome:</b> </label>
                        <input id="nome" name="nome" required="required" type="text" placeholder="Insira o seu usuário" class="form-control" />
                    </p>
                    <p>
                        <label for="email"><b>Email:</b></label>
                        <input id="email" name="email" required="required" type="email" placeholder="Insira o seu email" class="form-control" />
                    </p>
                    <p>
                        <label for="senha"><b>Senha:</b> </label>
                        <input id="senha" name="senha" required="required" type="password" placeholder="Insira a sua senha" class="form-control" />
                    </p>
                    <input type="submit" value="login" class="btn btn-primary" id="bt-login" />
                </form>
                <div id="botao-cadastrar">
                    <a href="Cliente/FormCadCliente.html">
                        <button type="button" class="btn btn-info">
                            Não é cadastrado ainda? Cadastre-se
                        </button>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
