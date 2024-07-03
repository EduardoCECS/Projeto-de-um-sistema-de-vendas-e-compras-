<?php

include("../conectarbd.php");

$recid_funcionario= filter_input(INPUT_GET, 'funcionario');



  if(mysqli_query($conn, "DELETE FROM tb_funcionario WHERE id_funcionario=$recid_funcionario")) {

    echo "<script>alert('Dados excluidos com sucesso!'); window.location = 'ConsultarFuncionario.php';</script>";

  }else {

    echo "Não foi possível excluir os dados no Banco de Dados" . $recid_funcionario . "<br>" . mysqli_error($conn);

  }

  mysqli_close($conn);



?>