<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Torneio</title>
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
        <div class="times-incritos">
            <h3>Times inscritos nesse torneio</h3>

            <?php
            $idTorneio = $_GET['idTorneio'];
            $sqlTimesInscritos = "SELECT codTime FROM torneio_times WHERE codTorneio =  '$idTorneio'";
            $query = mysqli_query($conexao, $sqlTimesInscritos) or die("Erro ao conectar com o BD" . mysqli_error($conexao));

            while ($dados = $query->fetch_assoc()) {
                $idTime = $dados['codTime'];

                $sqlNomeTimes = "SELECT * FROM times WHERE id = '$idTime'";
                $query2 = mysqli_query($conexao, $sqlNomeTimes) or die("Erro ao conectar com o BD" . mysqli_error($conexao));
                while ($dados2 = $query2->fetch_assoc()) {
                    echo $dados2['nome'] . ", ";
                }
                // echo $sqlNomeTimes;
            }
            ?>
        </div>

        <div class="times-incritos" style="margin-top: 8%">
            <h3>Criar Confronto</h3>
            <form action="" method="POST">
                <label>Categoria</label><br>
                <input type="text" name="categoria"> <br><br>
                <label>Mapa</label><br>
                <input type="text" name="mapa"> <br><br>
                <input type="text" name="nomeTime1" style="width: 25%; text-align: center;" placeholder="NomeTime">
                VS
                <input type="text" name="nomeTime2" style="width: 25%; text-align: center;" placeholder="NomeTime"><br>
                <input type="text" name="half1Time1" style="width: 8%;">
                VS
                <input type="text" name="half1Time2" style="width: 8%; "><br>
                <input type="text" name="half2Time1" style="width: 8%;">
                VS
                <input type="text" name="half2Time2" style="width: 8%;">
                <input type="submit" value="CRIAR CONFRONTO" class="botaoCriar">



                <?php
                if (isset($_POST['nomeTime1']) && ($_POST['nomeTime2'])) {
                    $nomeTime1 = $_POST['nomeTime1'];
                    $nomeTime2 = $_POST['nomeTime2'];
                    $half1Time1 = $_POST['half1Time1'];
                    $half1Time2 = $_POST['half1Time2'];
                    $half2Time1 = $_POST['half2Time1'];
                    $half2Time2 = $_POST['half2Time2'];
                    $categoria = $_POST['categoria'];
                    $mapa = $_POST['mapa'];

                    $sqlidTime1 = "SELECT id FROM times WHERE nome = '$nomeTime1'";
                    $queryidTime1 = mysqli_query($conexao, $sqlidTime1);
                    while ($dadosidTime1 = $queryidTime1->fetch_assoc()) {
                        $idTime1 = $dadosidTime1['id'];

                        $sqlidTime2 = "SELECT id FROM times WHERE nome = '$nomeTime2'";
                        $queryidTime2 = mysqli_query($conexao, $sqlidTime2);
                        while ($dadosidTime2 = $queryidTime2->fetch_assoc()) {
                            $idTime2 = $dadosidTime2['id'];

                            $sqlPartida = "INSERT INTO partida (codTime1, codTime2, codTorneio, mapa, half1Time1, half1Time2, half2Time1, half2Time2) VALUES ('$idTime1', '$idTime2', '$idTorneio', '$mapa', '$half1Time1', '$half1Time2', '$half2Time1', '$half2Time2')";
                            $queryPartida = mysqli_query($conexao, $sqlPartida);
                            $lastid = mysqli_insert_id($conexao);

                            $sqlSerie = "INSERT INTO serie (codPartida, categoria) VALUES ('$lastid', '$categoria')";
                            $querySerie = mysqli_query($conexao, $sqlSerie);
                        }
                    }
                }
                ?>
            </form>
            <form action="buscarConfrontos.php" method="GET">
                <input type="hidden" name="idTorneio" value="<?php echo $idTorneio;?>">
                <input type="submit" value="BUSCAR CONFRONTO" class="botaoCriar">
            </form>
        </div>

        <div class="ver-confrontos" style="margin-top: 8%">
            <h3>Ver Confrontos</h3>
        </div>
    </section>
</body>