<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

// Incluir conexão ao banco de dados
include('connection.php');

// Query SQL para apanhar dados da tabela 'formularioContato'
$sql = "SELECT * FROM formularioContato";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[CARIMBALL] Admin: Dados 'Fale Conosco'</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Dados do formulário 'Fale Conosco'</h1>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Nome: <?php echo htmlspecialchars($row['nome']); ?></h5>
                    <p class="card-text"><strong><em>E-mail:</em></strong> <?php echo htmlspecialchars($row['email']); ?></p>
                    <p class="card-text"><strong>Assunto:</strong> <?php echo htmlspecialchars($row['assunto']); ?></p>
                    <p class="card-text"><strong>Mensagem:</strong> <?php echo nl2br(htmlspecialchars($row['mensagem'])); ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='alert alert-warning text-center'>Não há nenhum dado a ser mostrado.</div>";
    }

    mysqli_close($conn);
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-J8whBkcPuhjZ/qR2qltmh9ae4QIbLr7hb7ho0WmV1zX3l+KJ6jmFqg1jT4+7VJjS" crossorigin="anonymous"></script>

</body>
</html>
