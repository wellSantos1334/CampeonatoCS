<?php 

include_once("conexao.php");

$idTorneio = $_GET['idTorneio'];
$nomeTorneio = $_GET['nomeTorneio'];
echo $idTorneio;

$sql = "DELETE from torneio WHERE id = '$idTorneio'";

$query = mysqli_query($conexao, $sql);
header("location: ../view/buscarTorneio.php?nomeTorneio=$nomeTorneio");
?>