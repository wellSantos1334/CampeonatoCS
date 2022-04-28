<?php

include ("conexao.php");

$nomeEquipe = $_POST['nomeEquipe'];
$j1 = $_POST['j1'];
$j2 = $_POST['j2'];
$j3 = $_POST['j3'];
$j4 = $_POST['j4'];
$j5 = $_POST['j5'];
$j6 = $_POST['j6'];

$sql = "INSERT INTO times (nome, j1, j2, j3, j4, j5, j6) VALUES ('$nomeEquipe', '$j1', '$j2', '$j3', '$j4', '$j5', '$j6')";

if(mysqli_query($conexao, $sql)){
    require_once ('../criarTime.html');
} else {
    echo "<script>alert('Erro ao conectar ao banco de dados!')</script>";
}



?>