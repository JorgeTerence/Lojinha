<?php

include_once '../functions.php';
include_once 'classe.php';

$user = new User();

$id = get("id", FILTER_VALIDATE_INT);
$name = get("name");
$phone = get("phone", FILTER_VALIDATE_INT);
$cpf = get("cpf");

$user->setId($id);
$user->setName($name);
$user->setTel($phone);
$user->setCPF($cpf);

if (isset($_GET['submit'])) {
    echo $user->insert();
} else if (isset($_GET['delete'])) {
    echo $user->delete();
} else if (isset($_GET['list'])){
    foreach ($user->consultar() as $user) {
        echo "<ul>";
        foreach ($user as $key => $value) 
            echo "<li><b>$key</b>: $value</li>";
        echo "</ul>";
    }
}
