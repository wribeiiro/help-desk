<?php
    session_start();
    require_once('conexao.php');

    $id = $_POST['id'];

    $sqlQuant = "SELECT COUNT(*) AS total FROM chamados WHERE id_usuario = '$id' AND status = 1";
    $resultQuant = mysqli_query($con, $sqlQuant);
    $resultadoQuant = mysqli_fetch_assoc($result);

    $total = $resultadoQuant['total'];

    if ($resultadoQuant > 0) {
        echo 1;
    } else {
        echo 0;
    }
?>
