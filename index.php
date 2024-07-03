<?php
session_start();

// Verifica se o carrinho não está inicializado, inicializa se necessário
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['contador'] = 0;
}
?>

<!-- Restante do seu arquivo index.php -->


<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio</title>

        <link
            rel="stylesheet"
            href="./bootstrap-5.0.2-dist/css/bootstrap.min.css"
            />
        <link rel="stylesheet" href="css/estilo_produtos.css" />
        <link rel="icon" type="image/png" href="img/logo.png">

    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="" />
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
                            <a class="nav-link text-white" href="./index.php"> <b>Home</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./login.php"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./Contato/FormCadContatoUsuario.php"><b>Contato</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                        </li>
                        <div class="dropdown" style=";">
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
                    <!--Verifica se o usuario está logado-->
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
                                <a class="nav-link text-white" href="logout.php"><b>Sair</b></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav ms-auto" style="margin-top: 20px;">
                        <!-- Se o usuário estiver logado, exibe o nome -->
                        <ul class="navbar-nav mr-auto">
                            <!-- Outros itens de navegação aqui -->


                        </ul>

                        <!-- Restante dos itens de navegação -->
                        <li class="nav-item">
                            <div class="carrinho ms-3">
                                <a href="CarrinhoTatyCrisBiju/PCarrinho.php">
                                    <?php
                                    foreach ($_SESSION['carrinho'] as $key => $carrinho) {
                                        //    echo "" . $key . "" . $carrinho . "<br>";
                                    }
                                    echo "<img src='./img/carrinho-removebg-preview.png' width='76'>";
                                    echo "<label style='position:relative; top: -5px; left: -38px; font-weight: bold; font-size:24; color:#b12f0a'>" . $_SESSION['contador'] . "</label>";
                                    ?>
                                </a>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>

        </header>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <main>
            <section id="section-banners" class="container-fluid">
                <div
                    id="carouselExampleControls"
                    class="carousel slide"
                    data-bs-ride="carousel"
                    >
                    <div class="lancamentos">
                        <h2>Novos lançamentos</h2>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                class="d-block w-100 borda-imagens"

                                src="img/Colar_condecorado_resized.jpg"
                                alt="Venha comprar na nossa loja"
                                />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="d-block w-100 borda-imagens"
                                src="img/Brinco_corrente_resized.jpg"
                                alt="Produtos bons"
                                />
                        </div>
                        <div class="carousel-item">
                            <img
                                class="d-block w-100 borda-imagens"
                                src="img/Brinco_bolinha_resized.jpg"
                                alt="Várias novas"
                                />
                        </div>

                        <div class="carousel-item">
                            <img
                                class="d-block w-100  borda-imagens"
                                src="img/Brinco_redondo_resized.jpg"
                                alt="Várias novas"
                                />
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselExampleControls"
                        role="button"
                        data-bs-slide="prev"
                        >
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only controle-carrosel" style=" color: white; font-weight: bold;" >Anterior</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselExampleControls"
                        role="button"
                        data-bs-slide="next"
                        >
                        <span class="sr-only controle-carrosel" style="color: white; font-weight: bold;">Próximo</span>
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </section>

            <section id="section-vendidos" class="container">
                <h2>OS MAIS VENDIDOS DO MÊS! 50% DE DESCONTO!</h2>



                <br><!-- comment -->

                <div class="container"> <!-- Desconto 50% -->
                    <div class="row">
                        <?php
                        include_once './conectarbd.php';
                        $selecionar = mysqli_query($conn, "SELECT * FROM tb_produto WHERE tipo='desconto'");
                        $linhas = mysqli_fetch_array($selecionar);
                        while ($linhas) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-0 shadow-sm rounded">
                                    <img src="<?php echo './img/' . $linhas['imagem']; ?>" class="card-img-top rounded-top" style="object-fit: contain; height: 200px;" alt="<?php echo $linhas['nome']; ?>"> <!-- Alterada a propriedade "object-fit" -->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="card-title text-center"><?php echo $linhas["nome"]; ?></h5>
                                            <p class="card-text text-center">Valor: R$ <?php echo $linhas["valor_venda"]; ?></p>
                                            <p class="card-text text-center"><?php echo $linhas["descricao"]; ?></p>
                                        </div>
                                        <div class="text-center">
                                            <form method="get" action="./CarrinhoTatyCrisBiju/produto.php">
                                                <input type="hidden" name="produto" value="<?php echo $linhas['id_produto']; ?>">
                                                <button type="submit" class="btn btn-dark">Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $linhas = mysqli_fetch_array($selecionar);
                        }
                        ?>
                    </div>
                </div>


                <h1 style="color: white;">PROMOÇÕES 40% DESCONTO</h1><!-- Desconto 40% -->
                <div class="container">
                    <div class="row">
                        <?php
                        include_once './conectarbd.php';
                        $selecionar = mysqli_query($conn, "SELECT * FROM tb_produto WHERE tipo='desconto40'");
                        $linhas = mysqli_fetch_array($selecionar);
                        while ($linhas) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-0 shadow-sm rounded">
                                    <img src="<?php echo './img/' . $linhas['imagem']; ?>" class="card-img-top rounded-top" style="object-fit: contain; height: 200px;" alt="<?php echo $linhas['nome']; ?>"> <!-- Alterada a propriedade "object-fit" -->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="card-title text-center"><?php echo $linhas["nome"]; ?></h5>
                                            <p class="card-text text-center">Valor: R$ <?php echo $linhas["valor_venda"]; ?></p>
                                            <p class="card-text text-center"><?php echo $linhas["descricao"]; ?></p>
                                        </div>
                                        <div class="text-center">
                                            <form method="get" action="./CarrinhoTatyCrisBiju/produto.php">
                                                <input type="hidden" name="produto" value="<?php echo $linhas['id_produto']; ?>">
                                                <button type="submit" class="btn btn-dark">Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $linhas = mysqli_fetch_array($selecionar);
                        }
                        ?>
                    </div>
                </div>



                <h1 style="color: white;">PROMOÇÕES 30% DE DESCONTO</h1> <!-- Desconto 30% -->
                <div class="container">
                    <div class="row">
                        <?php
                        include_once './conectarbd.php';
                        $selecionar = mysqli_query($conn, "SELECT * FROM tb_produto WHERE tipo='desconto30'");
                        $linhas = mysqli_fetch_array($selecionar);
                        while ($linhas) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-0 shadow-sm rounded">
                                    <img src="<?php echo './img/' . $linhas['imagem']; ?>" class="card-img-top rounded-top" style="object-fit: contain; height: 200px;" alt="<?php echo $linhas['nome']; ?>"> <!-- Alterada a propriedade "object-fit" -->
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="card-title text-center"><?php echo $linhas["nome"]; ?></h5>
                                            <p class="card-text text-center">Valor: R$ <?php echo $linhas["valor_venda"]; ?></p>
                                            <p class="card-text text-center"><?php echo $linhas["descricao"]; ?></p>
                                        </div>
                                        <div class="text-center">
                                            <form method="get" action="./CarrinhoTatyCrisBiju/produto.php">
                                                <input type="hidden" name="produto" value="<?php echo $linhas['id_produto']; ?>">
                                                <button type="submit" class="btn btn-dark">Comprar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $linhas = mysqli_fetch_array($selecionar);
                        }
                        ?>
                    </div>
                </div>







            </section>
        </main>

        <!-- Formulário de Login Admin -->


        <footer class="bg-light-blue text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a
                        target="_blank"
                        data-mdb-ripple-init
                        class="btn text-white btn-floating m-1"
                        style="background-color:"
                        href="https://www.facebook.com"
                        role="button"
                        ><i class="fab fa-facebook-f"></i
                        ><img src="img/facebook.png" width="30px" height="30px"></a>

                    <!-- Instagram -->
                    <a
                        target="_blank"
                        data-mdb-ripple-init
                        class="btn text-white btn-floating m-1"
                        style="background-color:"
                        href="https://www.instagram.com/"
                        role="button"
                        ><i class="fab fa-instagram"></i
                        ><img src="img/instagram.png" width="30px" height="30px"></a>

                    <!-- Whatsapp -->
                    <a
                        target="_blank"
                        data-mdb-ripple-init
                        class="btn text-white btn-floating m-1"
                        style="background-color:"
                        href="https://www.whatsapp.com/"
                        role="button"
                        ><i class="fab fa-instagram"></i
                        ><img src="img/whatsapp.png" width="30px" height="30px"></a>



                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div style="display: flex; justify-content: flex-start;">
                <li class="nav-item">
                    <a class="nav-link text-white" href="loginadm.php"><b>Login Admin</b></a>
                </li>

            </div>

            <div style="display: flex; justify-content: center; margin-top: 12px;">
                <a style="color: white; font-weight: bold; margin-top: -40px;">© 2024 Copyright: Taty CrisBiju</a>
            </div>




            <!-- Copyright -->
        </footer>

        <button
            id="voltar-topo"
            type="button"
            class="btn btn-outline-primary"
            onclick="topo()"
            >
            &uarr; Voltar ao ínicio
        </button>

        <script
            src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI/t1q6Fgi/jtuo8qZyk1hC0XL2XqnBsf2oIQsh0="
            crossorigin="anonymous"
        ></script>
        <script src="./js/script.js"></script>
        <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

