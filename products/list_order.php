<?php
//error_reporting(E_ERROR | E_PARSE);
include 'classes.php';
require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$order = filter_input(INPUT_GET, "order_by");

if (isset($_GET["search_order_pdf"])) {
  $dompdf = new Dompdf();

  $data = "<h1>Listagem de Produtos</h1><table><thead></thead><tr><th>id</th><th>descrição</th><th>valor</th><th>validade</th><th>imagem</th></tr></thead><tbody>";

  foreach ((new Produto())->consultarOrder($order == null ? "id" : $order) as $prod) {
    $data .= "<tr>";
    foreach ($prod as $key => $value)
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

<!doctype html>
<html lang="pt-br">

<head>
  <?php include "../head.php" ?>
  <title>Listar por ordem</title>
</head>

<body data-bs-theme="dark">
  <?php include "../navbar.php"; ?>

  <main>
    <h1>Listar produtos</h1>

    <form action="list_order.php" method="get">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="order_by" id="rd-order_by" value="id" checked>
        <label class="form-check-label" for="order_by">
          Código
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="order_by" id="rd-descri" value="descri">
        <label class="form-check-label" for="order_by2">
          Descrição
        </label>
      </div>

      <button type="submit" value="submit" name="search_order" class="btn btn-primary">Pesquisar</button>
      <button type="submit" value="submit" name="search_order_pdf" class="btn btn-primary">Gerar PDF</button>
    </form>

    <section class="grid">
      <?php


      foreach ((new Produto())->consultarOrder($order == null ? "id" : $order) as $prod) {
      ?>
        <p class="listing">
          <?php foreach ($prod as $key => $value) { ?>
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
</body>

</html>