<?php

$servername = "localhost";
$username="root";
$password="";
$dbname = "db_bes_pw";

$conn = mysqli_connect($servername, $username, $password, $dbname);
var_dump($conn);