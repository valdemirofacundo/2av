<?php
// Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carimball";

// Criar conexãp
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão malsucedida. Erro: " . mysqli_connect_error());
}

// Query SQL para apanhar dados
$sql = "SELECT * FROM carimball";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Dados do formulário 'Fale Conosco'</h1>";
    // Mostrar dados de cada row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>Nome:</strong> " . $row['nome'] . "<br>";
        echo "<strong><em>E-mail</em>:</strong> " . $row['email'] . "<br>";
        echo "<strong>Assunto:</strong> " . $row['assunto'] . "<br>";
        echo "<strong>Mensagem:</strong> " . $row['mensagem'] . "</p>";
    }
} else {
    echo "Não há nenhum dado a ser mostrado.";
}

mysqli_close($conn);
?>
