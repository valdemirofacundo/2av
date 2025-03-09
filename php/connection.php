<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    // Receber dados + higienização
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = htmlspecialchars($_POST['assunto'], ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');

    // Validação de dados
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)){
        die("Solicitação de contato incompleta.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("O endereço de e-mail inserido é inválido.");
    } else {
        echo "A CARIMBALL agradece pelo seu contato.<br>";
    }

    // Conexão
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carimball";

    // Criar conexão
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar conexão
    if (!$conn) {
        die("Conexão malsucedida. Erro: " . mysqli_connect_error());
    } else {
        
    }

    // Higienizar dados para inserção via SQL com statements preparados
    $stmt = $conn->prepare("INSERT INTO formularioContato (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $assunto, $mensagem);

    // Executar a query + redirecionar
    if ($stmt->execute()) {
        header("Location: ../contato.html");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
