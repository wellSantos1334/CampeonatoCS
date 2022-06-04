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
            }
            ?>
        </div>

        <div class="times-incritos" style="margin-top: 8%">
            <h3>Criar Confronto</h3>
            <form action="" method="POST">
                <label>Categorias</label><br>
                <select  name="categoria" id="selectCategoria">
                    <option value="<?php echo "Upper Bracket 1" ?>">Upper Bracket 1</option>
                    <option value="<?php echo "Upper Bracket 2" ?>">Upper Bracket 2</option>
                    <option value="<?php echo "Upper Bracket 3" ?>">Upper Bracket 3</option>
                    <option value="<?php echo "Lower Bracket 1" ?>">Lower Bracket 1</option>
                    <option value="<?php echo "Lower Bracket 2" ?>">Lower Bracket 2</option>
                    <option value="<?php echo "Lower Bracket 3" ?>">Lower Bracket 3</option>
                    <option value="<?php echo "Quarterfinals" ?>">Quarterfinals</option>
                    <option value="<?php echo "Semifinals" ?>">Semifinals</option>
                    <option value="<?php echo "Grand Final" ?>">Grand Final</option>
                </select> <br><br>
                <!-- <input type="text" name="nomeTime1" style="width: 25%; text-align: center;" placeholder="NomeTime""> -->

                <br><br>

                <?php 
                $idTorneio = $_GET['idTorneio'];
                $sqlTimesInscritos = "SELECT codTime FROM torneio_times WHERE codTorneio =  '$idTorneio'";
                $query = mysqli_query($conexao, $sqlTimesInscritos) or die("Erro ao conectar com o BD" . mysqli_error($conexao));
                echo "<input type='radio' name='pickTime1' style='width: 20px; height: 20px;'>";
                    echo "<select  name='nomeTime1' id='selectTime1'>";
                        while ($dados = $query->fetch_assoc()) {
                            $idTime = $dados['codTime'];
                            $sqlNomeTimes = "SELECT * FROM times WHERE id = '$idTime'";
                            $query2 = mysqli_query($conexao, $sqlNomeTimes) or die("Erro ao conectar com o BD" . mysqli_error($conexao));
                            while($dados2 = $query2->fetch_array()) {
                                echo "<option value='".$dados2['nome']."'>".$dados2['nome']."</option>";
                            }  
                        }
                    echo "</select>";
                ?>
                VS
                <?php
                $idTorneio = $_GET['idTorneio'];
                $sqlTimesInscritos = "SELECT codTime FROM torneio_times WHERE codTorneio =  '$idTorneio'";
                $query = mysqli_query($conexao, $sqlTimesInscritos) or die("Erro ao conectar com o BD" . mysqli_error($conexao));
                    echo "<select  name='nomeTime2' id='selectTime2'>";
                        while ($dados = $query->fetch_assoc()) {
                        $idTime = $dados['codTime'];
                        $sqlNomeTimes = "SELECT * FROM times WHERE id = '$idTime'";
                        $query2 = mysqli_query($conexao, $sqlNomeTimes) or die("Erro ao conectar com o BD" . mysqli_error($conexao));
                            while($dados2 = $query2->fetch_array()) {
                            echo "<option value='".$dados2['nome']."'>".$dados2['nome']."</option>";
                            }  
                        }
                    echo "</select>";
                    echo "<input type='radio' name='pickTime2' style='width: 20px; height: 20px;'>";
                    
                ?>

                <br><br>
               
                <!-- <input type="text" name="nomeTime2" style="width: 25%; text-align: center;" placeholder="NomeTime"><br><br> -->
       <hr>
                <label>Mapa </label><br>
                <input type="text" name="mapa"> <br>
                <input type="text" name="half1Time1" style="width: 8%;">
                VS
                <input type="text" name="half1Time2" style="width: 8%; "><br>
                <input type="text" name="half2Time1" style="width: 8%;">
                VS
                <input type="text" name="half2Time2" style="width: 8%;">
                <hr>
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

                    if(isset($_POST['pickTime1'])){
                    while ($dadosidTime1 = $queryidTime1->fetch_assoc()) {
                        $idTime1 = $dadosidTime1['id'];

                        $sqlidTime2 = "SELECT id FROM times WHERE nome = '$nomeTime2'";
                        $queryidTime2 = mysqli_query($conexao, $sqlidTime2);
                        while ($dadosidTime2 = $queryidTime2->fetch_assoc()) {
                            $idTime2 = $dadosidTime2['id'];
                            
                            $sqlPartida = "INSERT INTO partida (codTime1, codTime2, codTorneio, mapa, pick, categoria, half1Time1, half1Time2, half2Time1, half2Time2) VALUES ('$idTime1', '$idTime2', '$idTorneio', '$mapa', '$nomeTime1', '$categoria', '$half1Time1', '$half1Time2', '$half2Time1', '$half2Time2')";
                            $queryPartida = mysqli_query($conexao, $sqlPartida);
                        }
                    }
                } 

                if(isset($_POST['pickTime2'])){
                    while ($dadosidTime1 = $queryidTime1->fetch_assoc()) {
                        $idTime1 = $dadosidTime1['id'];

                        $sqlidTime2 = "SELECT id FROM times WHERE nome = '$nomeTime2'";
                        $queryidTime2 = mysqli_query($conexao, $sqlidTime2);
                        while ($dadosidTime2 = $queryidTime2->fetch_assoc()) {
                            $idTime2 = $dadosidTime2['id'];
                            
                            $sqlPartida = "INSERT INTO partida (codTime1, codTime2, codTorneio, mapa, pick, categoria, half1Time1, half1Time2, half2Time1, half2Time2) VALUES ('$idTime1', '$idTime2', '$idTorneio', '$mapa', '$nomeTime2', '$categoria', '$half1Time1', '$half1Time2', '$half2Time1', '$half2Time2')";
                            $queryPartida = mysqli_query($conexao, $sqlPartida);
                        }
                    }
                } else {
                    while ($dadosidTime1 = $queryidTime1->fetch_assoc()) {
                        $idTime1 = $dadosidTime1['id'];
                        $decider = "DECIDER";

                        $sqlidTime2 = "SELECT id FROM times WHERE nome = '$nomeTime2'";
                        $queryidTime2 = mysqli_query($conexao, $sqlidTime2);
                        while ($dadosidTime2 = $queryidTime2->fetch_assoc()) {
                            $idTime2 = $dadosidTime2['id'];
                            
                            $sqlPartida = "INSERT INTO partida (codTime1, codTime2, codTorneio, mapa, pick, categoria, half1Time1, half1Time2, half2Time1, half2Time2) VALUES ('$idTime1', '$idTime2', '$idTorneio', '$mapa', '$decider', '$categoria', '$half1Time1', '$half1Time2', '$half2Time1', '$half2Time2')";
                            $queryPartida = mysqli_query($conexao, $sqlPartida);
                        }
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
    </section>
</body>