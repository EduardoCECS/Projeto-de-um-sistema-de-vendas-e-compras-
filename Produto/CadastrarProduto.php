<?php include_once "../conectarbd.php"; ?>
<html>
    <body>
        <?php
        $nome = $_POST["nome"];
        $tipo = $_POST["tipo"];
        $qtde = $_POST["qtde"];
        $valor = $_POST["valor"];
        $valor_compra = $_POST["valor_compra"];
        $valor_venda = $_POST["valor_venda"];
        $imagem = $_POST["imagem"];
        $descricao = $_POST["descricao"];
        $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
        mysqli_select_db($conn, 'db_tatycrisbiju');
        $sql = "INSERT INTO tb_produto(nome, tipo, qtde, valor, valor_compra, valor_venda, imagem, descricao) VALUES ('$nome', '$tipo', '$qtde', '$valor', '$valor_compra', '$valor_venda','$imagem', '$descricao')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Seus dados foram salvos !'); window.location = '../index.php';</script>";
        } else {
            echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
