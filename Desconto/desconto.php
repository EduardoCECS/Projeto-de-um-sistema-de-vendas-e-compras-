<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
    $_SESSION['contador'] = 0;
}
?>
<html lang="pt-br">
    <head>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Produtos</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link 
            rel="stylesheet" href="../css/estilo_funcionario.css" />

    </head>
    <body class="bg-login">
        <!-- header produtos-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logo.png" alt="" />
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
                            <a class="nav-link text-white" href="../Pedido/FormCadPedidoUsuario.html"><b>Pedido</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login.php"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Contato/FormCadContatoUsuario.php"><b>Contato</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                        </li>
                        <div class="dropdown" style=";">
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
                        
                    </ul>
                    <form class="ms-auto me-2 d-flex">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="O que deseja buscar"
                            aria-label="Search"
                            />
                        <button class="btn btn-outline-info" type="submit">
                            Buscar
                        </button>
                    </form>
                </div>
            </nav>
        </header>
        <!--Corpo da página -->
        <!--carrinho-->

        <div class="carrinhoc">
            <a href="../Carrinho/PCarrinho.php">
                <?php
                foreach ($_SESSION['carrinho'] as $key => $carrinho) {
                    echo "Produto: " . $key . " - Qtd: " . $carrinho . "<br>";
                }
                echo "<img src='../img/sacola-de-compras.png' width='76'>";
                echo "<label style='position:relative; top: -5px; left: -38px; font-weight: bold; font-size:24; color:#b12f0a'>" . $_SESSION['contador'] . "</label>";
                ?>
            </a>
        </div>

        <main style="margin-top: 10%;">
            <div class="container">
                <div class="row">
                    <?php
                    include_once '../conectarbd.php';
                    $selecionar = mysqli_query($conn, "SELECT * FROM tb_produto WHERE tipo='desconto'");
                    $linhas = mysqli_fetch_array($selecionar);
                    if ($linhas) {
                        do {
                            ?>
                    <div class="col-md-4">
                                <div class="card" style="width: 100%; margin-top: 5%; border-radius: 20px;">
                                    <img src="<?php echo '../img/' . $linhas['imagem']; ?>" class="card-img-top" style="padding: 5px; border-radius: 20px;" width="419.77" height="300">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <h5 class="card-title text-center"><?php echo "" . $linhas["nome"]; ?></h5>
                                        <p class="card-text text-center"><?php echo "Valor: R$ " . $linhas["valor_venda"]; ?></p>
                                        <p class="card-text text-center"><?php echo "" . $linhas["descricao"]; ?></p>
                                        <form method="get" action="../Carrinho/produto.php" class="text-center">
                                            <input type="hidden" name="produto" value="<?php echo $linhas['id_produto']; ?>">
                                            <input type="submit" value="Comprar" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                </div>
                    </div>
                    


                            <?php
                        } while ($linhas = mysqli_fetch_array($selecionar));
                    }
                    ?>
                </div>
            </div>
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

        <script>

            var tel_fixo = document.getElementById("tel_fixo");

            tel_fixo.addEventListener("input", () => {
                var limparValor = tel_fixo.value.replace(/\D/g, "").substring(0, 11);
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

                tel_fixo.value = numeroformatado;
            });

        </script>

        <!-- Script para aplicar a máscara de CPF -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#cpf').mask('000.000.000-00', {reverse: true});

            });
        </script>

        <script>
            $(document).ready(function () {
                $("#cep").blur(function () {
                    var cep = $(this).val().replace(/\D/g, '');

                    if (cep != "") {
                        var validacep = /^[0-9]{8}$/;

                        if (validacep.test(cep)) {
                            $("#endereco").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");

                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                                if (!("erro" in dados)) {
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                } else {
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } else {
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } else {
                        limpa_formulário_cep();
                    }
                });
            });

            // Definição da função para limpar o formulário de CEP
            function limpa_formulário_cep() {
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"
        ></script>
        <script src="js/script.js"></script>


        <script type="text/javascript" src="js/jquery-script.js"></script>
    </body>
</html>