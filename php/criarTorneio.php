<?php
include("conexao.php");

$nomeTorneio = $_POST['nomeTorneio'];
$premiacao = $_POST['premiacao'];
$dataInicio = $_POST['dataInicio'];

$sql = "INSERT INTO torneio (nome, premiacao, data) VALUES ('$nomeTorneio', '$premiacao', '$dataInicio')";

if (mysqli_query($conexao, $sql)) {
    // echo "<script> alert('Torneio criado com sucesso!')</script>";
} else {
    echo "Erro" . mysqli_error($conexao);
}
?>

<head>
    <link rel="stylesheet" href="../estilo/style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="criarTime.html">Criar time</a></li>
            <li><a href="criarTorneio.html">Criar torneio</a></li>
            <li><a href="buscarTorneio.html">Buscar torneio</a></li>
        </ul>
    </nav>

    <section>
        <form action="" method="POST" id="formEquipes"></form>

    </section>
</body>