<?php
session_start();
?>
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
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light-blue fixed-top">
                <a class="navbar-brand" href="">
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
                            <a class="nav-link text-white" href="../index.html"> <b>Home</b> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Pedido/FormCadPedidoUsuario.html"><b>Pedido</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../login.html"><b>Login</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Contato/FormCadContatoUsuario.php"><b>Contato</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../ConsultaProdutos/produtos.php"><b>Produtos</b></a>
                        </li>
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
        <main style="margin-top: 10%;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-light-blue text-white">
                                Produtos no Carrinho
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <?php
                                    include_once '../conectarbd.php';
                                    $valorTotal = 0;
                                    foreach ($_SESSION['carrinho'] as $key => $carrinho) {
                                        $sql = "SELECT * FROM tb_produto WHERE id_produto = '$key'";
                                        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        while ($linha = mysqli_fetch_array($query)) {
                                            $valorTotal += (double) $linha['valor_compra'];
                                            ?>
                                            <tr style="background-color: #f8f9fa;">
                                                <td class="text-center align-middle">
                                                    <img  src="../img/<?php echo $linha['imagem']; ?>" class="img-fluid rounded" style="padding: 5px;" width="64" alt="<?php echo $linha["nome"]; ?>">
                                                    <h5 class=""><?php echo $linha["nome"]; ?></h5>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span style="font-size: 2em;"><?php echo "R$ " . $linha["valor_compra"]; ?></span>
                                                    <h5>Valor</h5>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span style="font-size: 2em;"><?php echo $carrinho; ?></span>
                                                    <h5>Quantidade</h5>
                                                </td>
                                            </tr>


                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                                <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Resumo do Carrinho</h5>
                <p class="card-text">Total de produtos: <?php echo $_SESSION['contador']; ?></p>
                <p class="card-text">Valor Total: R$ <?php echo $valorTotal; ?></p>
                <a href="../CarrinhoTatyCrisBiju/finalizarCompra.php" class="btn btn-primary">Finalizar Compra</a>
            </div>
        </div>
    </div>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>



        <footer>
            <p></p>
        </footer>

      

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous">
        </script>
        <script src="js/script.js"></script>

        <!-- Script para aplicar a máscara de CPF -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        

        <!-- Script de validador de cpf -->  
        


    </body>
</html>
