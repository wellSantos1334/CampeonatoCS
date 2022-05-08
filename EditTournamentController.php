<?php

include("conexao.php");
//Verifica se dadosNome existe na variável POST
if (isset($_POST["dadosNome"])) {
    $dadosNome = $_POST["dadosNome"];
    $dadosPremiacao = $_POST["dadosPremiacao"];
    $dadosData = $_POST["dadosData"];
    $dadosId = $_POST["dadosId"];
} else {
    $dadosNome = $_POST["novoDadosNome"];
    $dadosPremiacao = $_POST["novoDadosPremiacao"];
    $dadosData = $_POST["novoDadosData"];
    $dadosId = $_POST["dadosId"];
}
?>
<form method="POST" action="">
    <input type="text" name="novoDadosNome" value="<?php echo $dadosNome ?? ''; ?>">
    <input type="text" name="novoDadosPremiacao" value="<?php echo $dadosPremiacao ?? ''; ?>">
    <input type="text" name="novoDadosData" value="<?php echo $dadosData ?? ''; ?>">
    <input type="hidden" name="dadosId" value="<?php echo $dadosId; ?>">
    <input type="submit" value="Enviar">
</form>

<?php
if (isset($_POST["novoDadosNome"])) {
    $dadosId = $_POST["dadosId"];
    $novoDadosNome = $_POST["novoDadosNome"];
    $sql = "UPDATE torneio SET nome = '$novoDadosNome' WHERE id = $dadosId";
    $query = $conexao->query($sql) or die("Erro ao consultar o BD. " . $conexao->error);
}

if (isset($_POST["novoDadosPremiacao"])) {
    $dadosId = $_POST["dadosId"];
    $novoDadosPremiacao = $_POST["novoDadosPremiacao"];
    $sql = "UPDATE torneio SET premiacao = '$novoDadosPremiacao' WHERE id = $dadosId";
    $query = $conexao->query($sql) or die("Erro ao consultar o BD. " . $conexao->error);
}
if (isset($_POST["novoDadosData"])) {
    $dadosId = $_POST["dadosId"];
    $novoDadosData = $_POST["novoDadosData"];
    $sql = "UPDATE torneio SET data_inicio = '$novoDadosData' WHERE id = $dadosId";
    $query = $conexao->query($sql) or die("Erro ao consultar o BD. " . $conexao->error);
}

?>