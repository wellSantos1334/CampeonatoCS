<?php
include("conexao.php");
?>

<head>
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
</body>

<?php
    $idTorneio = $_POST['idTorneio'];
    $nomeEquipe = $_POST['nomeEquipe'];

    $sqlEquipe = "SELECT id FROM times WHERE nome = '$nomeEquipe'";

    $result = mysqli_query($conexao, $sqlEquipe);

    while ($row = mysqli_fetch_assoc($result)){
        $idEquipe = $row['id'];
    }
    $sqlEquipe2 = "INSERT INTO torneio_times (codTorneio, codTime) VALUES ('$idTorneio', '$idEquipe')";

    if(mysqli_query($conexao, $sqlEquipe2)){
        header("location: ../view/inserirTorneio.php?torneioID=$idTorneio&msgStatus=1");
    }
    
?>