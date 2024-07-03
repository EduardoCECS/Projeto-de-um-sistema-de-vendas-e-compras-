<?php
session_start();
include_once '../conectarbd.php';
foreach ($_SESSION['carrinho'] as $key => $carrinho) {
    $sql = "update tb_produto set qtde = (qtde - '$carrinho') where id_produto = '$key'";
    mysqli_query($conn, $sql)or die(mysqli_error($conn));        
}
echo "<script>alert('Compra realizada com sucesso!');</script>";
echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
        URL='derruba_session.php'\">"; 