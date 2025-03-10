<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = htmlspecialchars($_POST['assunto'], ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');
    
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
        die("Solicitação de contato incompleta.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("O endereço de e-mail inserido é inválido.");
    }

    $stmt = $conn->prepare("INSERT INTO formulariocontato (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $assunto, $mensagem);

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
