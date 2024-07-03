<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Importando jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Importando jQuery Mask Plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <title>Carrinho de Compra</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous"
            />
        <link rel="stylesheet" href="../css/estilo_cliente.css" />
        <link rel="icon" type="image/png" href="../img/logo.png">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="../index.php">
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
                    </ul>

                    <!--Usuario logado-->

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
        <main>
            <section style="margin-top: 10%; display: flex; justify-content: center;">
                <div class="row">
                    <div class="col-md-12" >
                        <?php
                        $idproduto = $_GET['produto'];
                        include_once '../conectarbd.php';
                        $sql = "select * from tb_produto where id_produto = '$idproduto' ";
                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $linhas = mysqli_fetch_array($query);
                        if ($linhas) {
                            do {
                                ?>
                                <div class="card" style="width: 18rem; border-radius: 15px;">
                                    <img src="<?php echo '../img/' . $linhas['imagem']; ?>" class="card-img-top" style="padding: 5px; border-radius: 15px;" alt="Imagem do produto">
                                    <div class="card-body">
                                        <h5 class="card-title d-grid gap-2 justify-content-center" style="font-size: 20px; font-weight: bold;"><?php echo $linhas["nome"]; ?></h5>
                                        <p class="card-text d-grid gap-2 justify-content-center" style="font-size: 20px; font-weight: bold;"><?php echo $linhas["valor"]; ?></p>
                                         <p class="card-text d-grid gap-2 justify-content-center" style="font-size: 20px; font-weight: bold;"><?php echo $linhas["descricao"]; ?></p>
                                        <form method="get" action="produto2.php">
                                            <input type="hidden" name="produto2" value="<?php echo $linhas['id_produto']; ?>">
                                            <div class="d-grid gap-2 justify-content-center">
                                                <button type="submit" class="btn btn-success">Adicionar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                                <?php
                            } while ($linhas = mysqli_fetch_array($query));
                            ?>
                            <?php
                        }
                        ?>
                        </tr>
                    </div>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>

        <!-- Script para aplicar a máscara de CPF -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#cpf').mask('000.000.000-00', {reverse: true});
            });
        </script>

        <!-- Script de validador de cpf -->  
        <script>
            $(document).ready(function () {
                $("#bt-login").click(function (event) {
                    // Evita o envio do formulário por padrão
                    event.preventDefault();

                    // Obtém o valor do campo CPF
                    var cpf = $("#cpf").val();

                    // Remove todos os caracteres que não são dígitos
                    cpf = cpf.replace(/\D/g, '');

                    // Verifica se o CPF tem 11 dígitos
                    if (cpf.length != 11) {
                        alert("CPF inválido. Insira os 11 dígitos.");
                        return;
                    }

                    // Verifica se o CPF é válido usando uma expressão regular e um algoritmo de validação de CPF
                    if (!validarCPF(cpf)) {
                        alert("CPF inválido. Verifique o número digitado.");
                        return;
                    }

                    // Se o CPF for válido, permite o envio do formulário
                    $("#login").submit();
                });
            });

// Função para validar CPF
            function validarCPF(cpf) {
                var Soma;
                var Resto;
                Soma = 0;
                if (cpf == "00000000000")
                    return false;

                for (i = 1; i <= 9; i++)
                    Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
                Resto = (Soma * 10) % 11;

                if ((Resto == 10) || (Resto == 11))
                    Resto = 0;
                if (Resto != parseInt(cpf.substring(9, 10)))
                    return false;

                Soma = 0;
                for (i = 1; i <= 10; i++)
                    Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
                Resto = (Soma * 10) % 11;

                if ((Resto == 10) || (Resto == 11))
                    Resto = 0;
                if (Resto != parseInt(cpf.substring(10, 11)))
                    return false;
                return true;
            }
        </script>


    </body>
</html>
