<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <base href="/CampeonatoCS/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Torneio</title>
    <link rel="stylesheet" href="estilo/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="criarTorneio.html">Criar torneio</a></li>
            <li><a href="buscarTorneio.html">Buscar torneio</a></li>
        </ul>
    </nav>

    <section>
        <form action="php/criarTorneio.php" method="GET" id="formCriarTorneio">
            <label>Nome do Torneio:</label><br>
            <input type="text" name="nomeTorneio" required> <br>
            <label>Premiação:</label><br>
            <input type="text" name="premiacao" required> <br>
            <label>Data de ínicio:</label><br>
            <input type="date" name="dataInicio" required> <br>
            <input type="submit" value="CRIAR TORNEIO" id="botaoCriar">
        </form>
    </section>
</body>

</html>