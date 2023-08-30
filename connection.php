<?php
$banc = 'lojinha-flores';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=localhost; dbname=$banc", "$user", "$pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão" . $erro->getMessage();
}
