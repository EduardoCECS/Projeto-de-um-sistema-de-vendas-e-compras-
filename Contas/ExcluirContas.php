<?php

include("../conectarbd.php");

$recid = filter_input(INPUT_GET, 'conta');

if(mysqli_query($conn, "DELETE FROM tb_contas WHERE id_conta=$recid")) {
    echo "<script>alert('Dados excluídos com sucesso!'); window.location = 'ConsultarContas.php';</script>";
} else {
    echo "Não foi possível excluir os dados no Banco de Dados" . $recid . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
