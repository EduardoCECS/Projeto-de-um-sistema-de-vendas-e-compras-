<?php include_once "../conectarbd.php"; ?>
<html>
    <body>
        <?php
        $nome = $_POST["nome"];
        $tel_cel = $_POST["tel_cel"];
        $email = $_POST["email"];
        $observacoes = $_POST["observacoes"];
        $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
        mysqli_select_db($conn, 'db_tatycrisbiju');
        $sql = "INSERT INTO tb_contato(nome, tel_cel, email, observacoes) VALUES ('$nome', '$tel_cel', '$email', '$observacoes')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Seus dados foram salvos !'); window.location = '../index.php';</script>";
        } else {
            echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        ?>
    </body>
</html>

