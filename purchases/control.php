<?php
include "../functions.php";
include "classes.php";

$cod = get('cod', FILTER_VALIDATE_INT);
$id_user = get('id_user', FILTER_VALIDATE_INT);
$cod_prod = get('cod_prod', FILTER_VALIDATE_INT);
$qtd = get('qtd', FILTER_VALIDATE_INT);
$date = get('date');
$pag = get('pag');

$order = new Order();

$order->setCod($cod);
$order->setIdUser($id_user);
$order->setCodProd($cod_prod);
$order->setQtd($qtd);
$order->setData($date);
$order->setPag($pag);

if (isset($_GET['submit'])) echo $order->insert();
else if (isset($_GET['delete'])) echo $order->delete();
else if (isset($_GET['edit'])) echo $order->edit();
else if (isset($_GET['search'])) echo $order->search();
else if (isset($_GET['list'])) {
    foreach ($order->listPagto() as $order) {
        echo "<ul>";
        foreach ($order as $key => $value) 
            echo "<li><b>$key</b>: $value</li>";
        echo "</ul>";
    };
}
else if (isset($_GET['list_vendas'])) {
    foreach ($order->list() as $order) {
        echo "<ul>";
        foreach ($order as $key => $value) 
            echo "<li><b>$key</b>: $value</li>";
        echo "</ul>";
    };
}
?>