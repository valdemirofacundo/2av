<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        echo "Agradecemos pelo contato!<br>";
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
        echo "Conexão bem-sucedida.<br>";
    }

    // Higienizar dados para inserção via SQL
    $nome = mysqli_real_escape_string($conn, $nome);
    $email = mysqli_real_escape_string($conn, $email);
    $assunto = mysqli_real_escape_string($conn, $assunto);
    $mensagem = mysqli_real_escape_string($conn, $mensagem);

    // Query SQL para inserir dados na tabela
    $sql = "INSERT INTO carimball (nome, email, assunto, mensagem) 
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    // Executar query e buscar erros
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    /* Mostrar dados
    $result = mysqli_query($conn, "SELECT * FROM carimball");
    while($row = mysqli_fetch_assoc($result)){
        echo "{$row['nome']} {$row['email']} {$row['assunto']} {$row['mensagem']}<br>";
    }*/

    mysqli_close($conn);
}
?>
