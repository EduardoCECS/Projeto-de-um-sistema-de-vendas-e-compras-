<?php
include("../conectarbd.php");

// Recupera os dados do formulário
$recid = filter_input(INPUT_POST, 'id');
$recnome = filter_input(INPUT_POST, 'nome');
$recendereco = filter_input(INPUT_POST, 'endereco');
$rectel_cel = filter_input(INPUT_POST, 'tel_cel');
$recproduto = filter_input(INPUT_POST, 'produto');
$recqtde = filter_input(INPUT_POST, 'qtde');
$recforma_pg = filter_input(INPUT_POST, 'forma_pg');
$recobservacoes = filter_input(INPUT_POST, 'observacoes');

// Atualiza os dados no banco de dados usando prepared statements
$stmt = $conn->prepare("UPDATE tb_pedido SET nome=?, endereco=?, tel_cel=?, produto=?, qtde=?, forma_pg=?, observacoes=? WHERE id_pedido=?");
$stmt->bind_param("ssssisss", $recnome, $recendereco, $rectel_cel, $recproduto, $recqtde, $recforma_pg, $recobservacoes, $recid);

if ($stmt->execute()) {
    echo "<script>alert('Dados alterados com sucesso!'); window.location = 'ConsultarPedido.php';</script>";
} else {
    echo "Não foi possível alterar os dados no Banco de Dados: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
