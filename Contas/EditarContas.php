<?php

include("../conectarbd.php");

$recid = filter_input(INPUT_POST, 'id_conta');
$tipo_conta = filter_input(INPUT_POST, 'tipo_conta');
$descricao = filter_input(INPUT_POST, 'descricao');
$valor = filter_input(INPUT_POST, 'valor');
$data_vencimento = filter_input(INPUT_POST, 'data_vencimento');
$status_conta = filter_input(INPUT_POST, 'status_conta');
$observacoes = filter_input(INPUT_POST, 'observacoes');

if (mysqli_query($conn, "UPDATE tb_contas SET tipo_conta='$tipo_conta', descricao='$descricao', valor=$valor, data_vencimento='$data_vencimento', status_conta='$status_conta', observacoes='$observacoes' WHERE id_conta=$recid")) {
    echo "<script>alert('Dados alterados com sucesso!'); window.location = 'ConsultarContas.php';</script>";
} else {
    echo "Não foi possível alterar os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
