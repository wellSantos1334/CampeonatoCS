<?php 
$conexao = mysqli_connect('localhost', 'root', '', 'campeonatocs');

if(!$conexao){
    die("Connection Failed: " . mysqli_connect_error());
} else {
    // echo "Database connected.";
}

?>