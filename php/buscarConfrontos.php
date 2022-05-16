<?php
include("conexao.php");
$idTorneio = $_GET['idTorneio'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Confronto</title>
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
        <h3>Confrontos</h3>


        <?php
        $sql = "SELECT * FROM partida p JOIN serie s on p.codTorneio = '$idTorneio'";
        $query = mysqli_query($conexao, $sql) or die("Erro ao conectar com o banco de dados! " . mysqli_errno($conexao));
        while ($dados = $query->fetch_assoc()) {
        ?>
            <table class="table-confronto">
                <tr>
                    <th class="th-categoria" colspan="3">GrandFinal</th>
                </tr>
                <tr>

                    <th class="th-mapa" colspan="3"><?php echo $dados['mapa'];?></th>
                </tr>
                <tr>
                    <td class="td-times">Time1</td>
                    <td class="td-reshalf1">5</td>
                    <td class="td-reshalf2">13</td>
                </tr>
                <tr>
                    <td class="td-times">Time2</td>
                    <td class="td-reshalf1">10</td>
                    <td class="td-reshalf2">16</td>
                </tr>
            </table>
        <?php
        }
        ?>
    </section>

</body>

</html>