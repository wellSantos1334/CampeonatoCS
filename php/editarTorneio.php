<?php

include("../php/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Torneio</title>
    <link rel="stylesheet" href="../estilo/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/criarTime.php">Criar time</a></li>
            <li><a href="../view/criarTorneio.php">Criar torneio</a></li>
            <li><a href="../view/buscarTorneio.php">Buscar torneio</a></li>
        </ul>
    </nav>
    <section>
        <form action="" method="POST" class="formGeral">
            <?php
            $idTorneio = $_GET['idTorneio'];

            $sql = "SELECT * FROM torneio WHERE id = '$idTorneio'";
            $query = mysqli_query($conexao, $sql) or die("Erro ao tentar conectar com o Banco de Dados! " . mysqli_error($conexao));

            while ($dados = $query->fetch_assoc()) {
            ?>
                <label>Nome do Torneio</label><br>
                <input type="text" name="novoNomeTorneio" value="<?php echo $dados['nome']; ?>" style="text-align: center;">
                <br><label>Premiação</label><br>
                <input type="text" name="novaPremiacao" value="<?php echo $dados['premiacao']; ?>" style="text-align: center;">
                <br> <label>Data Início</label><br>
                <input type="date" name="novaData" value="<?php echo $dados['data']; ?>" style="text-align: center;">
                <input type="submit" value="SALVAR ALTERAÇÕES" onclick="window.location.reload()" class="botaoCriar">
            <?php
                if (isset($_POST["novoNomeTorneio"])) {
                    $novoNomeTorneio = $_POST["novoNomeTorneio"];
                    $sqlUpdate = "UPDATE torneio SET nome = '$novoNomeTorneio' WHERE id = $idTorneio";
                    $query = mysqli_query($conexao, $sqlUpdate) or die("Erro ao consultar o BD. " . $conexao->error);
                }
                if (isset($_POST["novaPremiacao"])) {
                    $novaPremiacao = $_POST['novaPremiacao'];
                    $sqlUpdate = "UPDATE torneio SET premiacao = '$novaPremiacao' WHERE id = $idTorneio";
                    $query = mysqli_query($conexao, $sqlUpdate) or die("Erro ao consultar o BD. " . $conexao->error);
                }
                if (isset($_POST["novaData"])) {
                    $novaData = $_POST['novaData'];
                    $sqlUpdate = "UPDATE torneio SET data = '$novaData' WHERE id = $idTorneio";
                    $query = mysqli_query($conexao, $sqlUpdate) or die("Erro ao consultar o BD. " . $conexao->error);
                }
            }
            ?>
        </form>
    </section>
</body>