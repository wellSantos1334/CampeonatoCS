<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar time</title>
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
        <form action="../php/criarTime.php" method="POST" class="formGeral">
            <label>Nome da equipe</label> <br>
            <input type="text" name="nomeEquipe" required> <br>
            <label>Jogador 1</label> <br>
            <input type="text" name="j1" required> <br>
            <label>Jogador 2</label> <br>
            <input type="text" name="j2" required> <br>
            <label>Jogador 3</label> <br>
            <input type="text" name="j3" required> <br>
            <label>Jogador 4</label> <br>
            <input type="text" name="j4" required> <br>
            <label>Jogador 5</label> <br>
            <input type="text" name="j5" required> <br>
            <label>Jogador 6</label> <br>
            <input type="text" name="j6"> <br>
            <input type="submit" value="CRIAR TIME" class="botaoCriar"> <br><br>
            <label class="msgSucesso" hidden>Validação se criou com sucesso</label>
        </form>
    </section>
    <script src="../js/msgSucesso.js"></script>
</body>

</html>