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
        $sql = "SELECT * FROM partida WHERE codTorneio = '$idTorneio'";
        $query = mysqli_query($conexao, $sql) or die("Erro ao conectar com o banco de dados! " . mysqli_errno($conexao));
        echo $sql;
        while ($dados = $query->fetch_assoc()) {
        ?>
            <table class="table-confronto">
                <tr>
                    <th class="th-categoria" colspan="3"><?php echo $dados['categoria'] ?></th>
                </tr>
                <tr>

                    <th class="th-mapa" colspan="3"><?php echo $dados['mapa'];?></th>
                </tr>
                <tr>
                    <td class="td-times">
                        <?php 
                            $codTime1 = $dados['codTime1'];
                            $sqlTime1 = "SELECT * FROM times WHERE id = '$codTime1'";
                            $queryTime1 = mysqli_query($conexao, $sqlTime1) or die("Erro ao conectar com o banco de dados! " . mysqli_errno($conexao)); 
                            $dadosTime1 = $queryTime1->fetch_assoc();
                            echo $dadosTime1['nome'];
                        ?>
                    </td>
                    
                    <td class="td-reshalf1" id="teste1">
                        <?php echo $dados['half1Time1'];?>
                    </td>
                    <td class="td-reshalf2">
                        <?php echo $dados['half2Time1'];?>
                    </td>
                </tr>
                <tr>
                    <td class="td-times">
                        <?php 
                            $codTime2 = $dados['codTime2'];
                            $sqlTime2 = "SELECT * FROM times WHERE id = '$codTime2'";
                            $queryTime2 = mysqli_query($conexao, $sqlTime2) or die("Erro ao conectar com o banco de dados! " . mysqli_errno($conexao)); 
                            $dadosTime2 = $queryTime2->fetch_assoc();
                            echo $dadosTime2['nome'];
                        ?> 
                    </td>
                    <td class="td-reshalf1" id="teste2">
                        <?php echo $dados['half1Time2'];?>
                    </td>
                    <td class="td-reshalf2">
                        <?php echo $dados['half2Time2'];?>
                    </td>
                </tr>
            </table>
        <?php
        }
        ?>
    </section>
        <!-- <script>
            var teste1 = document.querySelector(".th-categoria");
            var teste2 = document.querySelector("#teste2");

            teste1.style.backgroundColor = "red";

            // console.log(teste1);

            // if(teste1 > teste2){
            //     teste2.backgroundColor = "blue";
            // }

        </script> -->
</body>

</html>