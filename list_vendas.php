<?php
include 'classes.php';
require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

if (isset($_GET["search_pdf"])) {
    $dompdf = new Dompdf();

    $data = "<h1>Listagem de Produtos</h1><table><thead></thead><tr><th>código</th><th>quant</th><th>data</th><th>pag</th><th>códi_prod</th><th>id_user</th><th>id</th><th>desc</th><th>val</th><th>expire</th><th>imagem</th></tr></thead><tbody>";

    foreach ((new Order())->list() as $vend) {
        $data .= "<tr>";
        foreach ($vend as $key => $value)
            if ($key != "image") $data .= "<td>$value</td>";
        $data .= "</tr>";
    }
    $data .= "</tbody></table>";

    $dompdf->loadHtml($data);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("relatório.pdf", array("Attachment" => false));
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include "../head.php" ?>
    <title>Listar pagamentos x usuários</title>
</head>

<body data-bs-theme="dark">
    <?php include "../navbar.php" ?>

    <main>
        <h1>Listar vendas</h1>

        <form action="list_pagto.php" method="get">
            <button type="submit" value="submit" name="search_pdf" class="btn btn-primary" style="margin-bottom: 10px;">Gerar PDF</button>
        </form>

        <section class="grid">
            <?php
            foreach ((new Order())->list() as $order) {
            ?>
                <p class="listing">
                    <?php foreach ($order as $key => $value) { ?>
                        <?php if ($key == "image") { ?>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($value) ?>" alt="" />
                        <?php continue;
                        } ?>
                        <b><?php echo $key ?>:</b> <?php echo $value ?><br>
                    <?php } ?>
                </p>
            <?php } ?>
        </section>
    </main>
    </form>
</body>

</html>