<?php

include("../conectarbd.php");

$recid_contato= filter_input(INPUT_GET, 'contato');



  if(mysqli_query($conn, "DELETE FROM tb_contato WHERE id_contato=$recid_contato")) {

    echo "<script>alert('Dados excluidos com sucesso!'); window.location = 'ConsultarContato.php';</script>";

  }else {

    echo "Não foi possível excluir os dados no Banco de Dados" . $recid_contato . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>