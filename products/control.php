<?php

include_once '../functions.php';
include_once 'classes.php';

$cad = new Produto();

$cod = filter_input(INPUT_POST, "cod", FILTER_VALIDATE_INT);
$desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_SPECIAL_CHARS);
$value = filter_input(INPUT_POST, "value", FILTER_VALIDATE_FLOAT);
$image_name = $_FILES['image']['name'];
$image_path = $_FILES['image']['tmp_name'];
$venc = filter_input(INPUT_POST, "venc");

$cad->setCode($cod);
$cad->setDescription($desc);
$cad->setValue($value);
$cad->setImage($image_name);
$cad->setImagePath($image_path);
$cad->setExpire($venc);

if (isset($_POST['submit'])) echo $cad->insert();
else if (isset($_POST['delete'])) echo $cad->delete();
else if (isset($_POST['edit'])) echo $cad->alter();
else if (isset($_POST['search'])) echo $cad->search();