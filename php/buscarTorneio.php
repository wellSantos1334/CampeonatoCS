<?php
include("conexao.php");
?>

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
</body>

<?php
$nomeTorneio = $_GET['nomeTorneio'];

$sql = "SELECT * FROM torneio WHERE nome = '$nomeTorneio'";

?>
<div class="selectBD">
    <?php
    if ($result = mysqli_query($conexao, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome Torneio</th>";
            echo "<th>Premiação</th>";
            echo "<th>Data</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['premiacao'] . "</td>";
                echo "<td id='LID'>" . $row['data'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        }
    }

    ?>
    <style>
        .selectBD {
            display: flex;
            margin: auto;
            justify-content: center;
            width: 40%;
            border: solid 2px;
            border-radius: 20px;
            border-color: #283652;
            text-align: center;
            height: 20%;
            margin-top: 80px;
            padding: 30px;
        }
        div th {
            height: 10%;
            width: 12%;
            color: yellow;
            border: solid 2px;
            border-color: #283652;
        }
        div td {
            text-align: center;
            height: 10%;
            width: 12%;
            color: yellow;
            border: solid 2px;
            border-color: #283652;
        }
        #LID{
            width: 100%;
        }

    </style>
</div>