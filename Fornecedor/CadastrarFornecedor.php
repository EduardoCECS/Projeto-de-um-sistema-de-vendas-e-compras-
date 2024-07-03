<?php include_once "../conectarbd.php"; ?>
<html>
    <body>
        <?php
        $cnpj = $_POST["cnpj"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel_cel = $_POST["tel_cel"];
        $tel_fixo = $_POST["tel_fixo"];
        $descricao = $_POST["descricao"];
        $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
        mysqli_select_db($conn, 'db_tatycrisbiju');
        $sql = "INSERT INTO tb_fornecedor(cnpj, nome, email, tel_cel, tel_fixo, descricao) VALUES ('$cnpj', '$nome', '$email', '$tel_cel', '$tel_fixo', '$descricao')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Seus dados foram salvos !'); window.location = '../index.php';</script>";
        } else {
            echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </body>
</html>
