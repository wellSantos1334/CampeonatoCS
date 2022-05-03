<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Torneio</title>
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

    <?php
        $idTorneio = $_GET['torneioID'];
        echo "<script> console.log($idTorneio) </script>";
    ?>

    <section>
        <label class="msgSucesso" hidden>Validação se criou com sucesso</label>

        <form action="../php/InserirTorneio.php" method="POST" class="formGeral">
        <input type="hidden" name="idTorneio" value="<?php echo $idTorneio;?>" >
        <label>Nome da Equipe</label> <br>
        <input type="text" name="nomeEquipe">
        <input type="submit" value="INSERIR" class="botaoCriar">
        </form>
    </section>

    <script src="../js/msgSucesso.js"></script>
</body>

</html>