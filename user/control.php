<?php
include_once '../functions.php';
include_once 'classe.php';

$user = new User();

$id = get("id", FILTER_VALIDATE_INT);
$name = get("name");
$phone = get("phone", FILTER_VALIDATE_INT);
$cpf = get("cpf");
$cep = get("cep");
$number = get("street_number");
$complement = get("complement");

$user->setId($id);
$user->setName($name);
$user->setTel($phone);
$user->setCPF($cpf);
$user->setCEP($cep);
$user->setNumber($number);
$user->setComplement($complement);

if (isset($_GET['submit'])) echo $user->insert();
else if (isset($_GET['delete'])) echo $user->delete();
else if (isset($_GET['search'])) echo $user->search();
else if (isset($_GET['edit'])) echo $user->edit();
