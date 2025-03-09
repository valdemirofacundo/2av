<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username="root";
$password="";
$dbname = "carimball";

$conn = mysqli_connect($servername, $username, $password, $dbname);
var_dump($conn);

if(!conn || mysqli_connect_errno()){
        die("Conexão malsucedida. Erro: " . mysqli_connect_error());
    }else{
        echo "Conexão bem-sucedida.";
    }

?>
