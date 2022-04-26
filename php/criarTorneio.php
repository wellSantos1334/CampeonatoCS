<?php 

include("conexao.php");

$nomeTorneio = $_GET['nomeTorneio'];
$premiacao = $_GET['premiacao'];
$dataInicio = $_GET['dataInicio'];
 
$sql = "INSERT INTO torneio (nome, premiacao, data) VALUES ('$nomeTorneio', '$premiacao', '$dataInicio')";

if(mysqli_query($conexao, $sql)){
    echo "<script> alert('Torneio criado com sucesso!')</script>";
    require_once('../criarTorneio.php');
}else {
    echo "Erro".mysqli_error($conexao);
}

?>

