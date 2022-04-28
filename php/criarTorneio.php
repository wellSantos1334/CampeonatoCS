<?php
function criarTorneio()
{
    
    include("conexao.php");

    $nomeTorneio = $_POST['nomeTorneio'];
    $premiacao = $_POST['premiacao'];
    $dataInicio = $_POST['dataInicio'];
 
    $sql = "INSERT INTO torneio (nome, premiacao, data) VALUES ('$nomeTorneio', '$premiacao', '$dataInicio')";

    if (mysqli_query($conexao, $sql)) {
        // echo "<script> alert('Torneio criado com sucesso!')</script>";
        $lastid = mysqli_insert_id($conexao);
        header("location: ../inserirTorneio.html?torneioID=$lastid");
        // echo "<script> alert($lastid)</script>";

    } else {
        echo "Erro" . mysqli_error($conexao);
    }
}

criarTorneio();