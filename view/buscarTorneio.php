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
            <li><a href="index.php">Home</a></li>
            <li><a href="criarTime.php">Criar time</a></li>
            <li><a href="criarTorneio.php">Criar torneio</a></li>
            <li><a href="buscarTorneio.php">Buscar torneio</a></li>
        </ul>
    </nav>

    <section>

        <form action="" method="GET" class="formGeral">
            <label>Digite o nome do torneio:</label><br>
            <input type="text" name="nomeTorneio" required> <br>
            <input type="submit" value="BUSCAR" class="botaoCriar">

            <table border="1" width="100%">
                <tr>
                    <th>ID</th>
                    <th>Nome Torneio</th>
                    <th>Premiação</th>
                    <th>Data</th>
                </tr>
                <?php
                if (!isset($_GET['nomeTorneio'])) {

                ?>
                    <br>
                    <tr>
                        <td colspan="4">Digite algo para pesquisar...</td>
                    </tr>
                <?php
                } else {
                    $pesquisa = $_GET['nomeTorneio'];
                    $sql = "SELECT * FROM torneio WHERE nome LIKE '%$pesquisa%'";

                    $query = mysqli_query($conexao, $sql) or die("Erro ao tentar conectar com o Banco de Dados! " . mysqli_error($conexao));
                    
                    if($query->num_rows == 0){
                        ?>
                        <tr>
                            <td colspan="4">Nenhum resultado encontrado..</td>
                        </tr>
                        <?php
                    } else {
                        while($dados = $query->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $dados['id']?></td>
                                    <td><?php echo $dados['nome']?></td>
                                    <td><?php echo $dados['premiacao']?></td>
                                    <td><?php echo $dados['data']?></td>
                                </tr>
                            <?php
                        }
                    }
                }
                ?>
            </table>
        </form>
    </section>
</body>

</html>