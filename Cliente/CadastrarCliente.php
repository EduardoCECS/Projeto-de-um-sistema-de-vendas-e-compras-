<?php include_once "../conectarbd.php"; ?>
<html>
    <body>
        <?php
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $num = $_POST["num"];
        $complemento = $_POST["complemento"];
        $tel_cel = $_POST["tel_cel"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $data_nascimento = $_POST["data_nascimento"];
        $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
        mysqli_select_db($conn, 'db_tatycrisbiju');
        $sql = "INSERT INTO tb_cliente(nome, endereco, num, complemento, tel_cel, cpf, email, senha, data_nascimento) VALUES ('$nome', '$endereco', '$num', '$complemento', '$tel_cel', '$cpf', '$email', '$senha', '$data_nascimento')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Seus dados foram salvos !'); window.location = '../index.php';</script>";
        } else {
            echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </body>
</html>

/