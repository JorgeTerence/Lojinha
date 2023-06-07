<?php

include_once '../functions.php';
include_once 'classes.php';

$cad = new Produto();

$cod = get("cod", FILTER_VALIDATE_INT);
$desc = get("desc", FILTER_SANITIZE_SPECIAL_CHARS);
$value = get("value", FILTER_VALIDATE_FLOAT);
$venc = get("venc");
$order = get("order_by");
$dt_final = get("dt_final");
$dt_start = get("dt_start");


$cad->setCode($cod);
$cad->setDescription($desc);
$cad->setValue($value);
$cad->setExpire($venc);
$cad->setOrder($order);
$cad->setExpireStart($dt_start);
$cad->setExpireEnd($dt_final);

if (isset($_GET['submit'])) {
    echo $cad->insert();
} else if (isset($_GET['delete'])) {
    echo $cad->delete();
} else if (isset($_GET['search_order'])){
    foreach ($cad->consultarOrder() as $order) {
        echo "<ul>";
        foreach ($order as $key => $value) 
            echo "<li><b>$key</b>: $value</li>";
        echo "</ul>";
    }
} else if (isset($_GET['search_date'])){
    foreach ($cad->consultarDate() as $order) {
        echo "<ul>";
        foreach ($order as $key => $value) 
            echo "<li><b>$key</b>: $value</li>";
        echo "</ul>";
    }
}
