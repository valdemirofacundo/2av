<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    echo "Form submitted successfully!<br>";
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = htmlspecialchars($_POST['assunto'], ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($_POST['mensagem'], ENT_QUOTES, 'UTF-8');


    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)){
        die("Solicitação de contato incompleta.");
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("O endereço de e-mail inserido é inválido.");
    }else{

    }

    /*
    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
    echo "Assunto: $assunto<br>";
    echo "Mensagem: $mensagem<br>";*/

    $host = "localhost";
    $dbname = "db_pw";
    $username = "root";
    $password = "";

    $conn = mysqli_connect(hostname: $host, 
                           username: $username, 
                           password: $password, 
                           database: $dbname);

    if(mysqli_connect_errno()){
        die("Erro de conexão: " . mysqli_connect_error());
    }else{
        echo "Conexão bem-sucedida.";
    }
}

while($row = mysqli_fetch_assoc($result)){
    echo("$row["nome"]." ".$row["email"]." ".$row["assunto"]." ".$row["mensagem"]." "<br>");
}
    

//$mensagem = html_entity_decode($mensagem, ENT_QUOTES, 'UTF-8');
?>

