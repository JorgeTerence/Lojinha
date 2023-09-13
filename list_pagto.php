<?php
include 'classes.php';
require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$pagto = filter_input(INPUT_GET, "pag");

if (isset($_GET["search_pdf"])) {
    $dompdf = new Dompdf();

    $data = "<h1>Listagem de Produtos</h1><table><thead></thead><tr><th>código</th><th>quant</th><th>data</th><th>pag</th><th>códi_prod</th><th>id_user</th><th>id</th><th>desc</th><th>val</th><th>expire</th><th>imagem</th></tr></thead><tbody>";

    foreach ((new Order())->listPagto($pagto) as $vend) {
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

</html>

<head>
    <meta charset="utf-8">
    <?php include "../head.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar pagamentos</title>

</head>

<body data-bs-theme="dark">
    <?php include "../navbar.php" ?>

    <main>
        <h1>Listar pagamentos</h1>

        <form action="list_pagto.php" method="get">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pag" id="rd-v" value="V">
                <label class="form-check-label" for="rd-v">
                    À vista
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pag" id="rd-p" value="P">
                <label class="form-check-label" for="rd-p">
                    A prazo
                </label>
            </div>
            <button type="submit" value="submit" name="search_pagto" class="btn btn-primary">Pesquisar</button>
            <button type="submit" value="submit" name="search_pdf" class="btn btn-primary">Gerar PDF</button>
        </form>

        <section class="grid">
            <?php foreach ((new Order())->listPagto($pagto) as $order) { ?>
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

    </html>