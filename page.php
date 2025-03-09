<?php
include 'connection.php';

$sql = "SELECT * FROM aluno";
$Alunos = mysqli_query($conn, $sql);
var_dump($Alunos);

?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo("Alô mundo.");
         $nomes = ['João', 'Maria', 'José'];
         for ($i=0; $i<3; $i++) {  ?>
        <p><?=($i+1)." ".$nomes[$i];?></p>
         <?php }
        ?>
                <?php 
    $i =0;
    while($row= mysqli_fetch_assoc($Alunos)) {
        echo ("<p>".($i+1).".matricula: ".$row["cod_matricula"]." "."Nome: ".$row["dsc_nome"]."</p>");
    }
    ?>
    </body>
</html>
