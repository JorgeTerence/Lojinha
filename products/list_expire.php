<?php
include 'classes.php';
require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dt_final = filter_input(INPUT_GET, "dt_final");
$dt_start = filter_input(INPUT_GET, "dt_start");

if (isset($_GET["search_pdf"])) {
  $dompdf = new Dompdf();

  $data = "<h1>Listagem de Produtos</h1><table><thead></thead><tr><th>id</th><th>descrição</th><th>valor</th><th>validade</th><th>imagem</th></tr></thead><tbody>";

  foreach ((new Produto())->consultarDate($dt_start, $dt_final) as $prod) {
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
  <title>Listar por vencimento</title>
</head>

<body data-bs-theme="dark">
  <?php include "../navbar.php"; ?>

  <main>
    <h1>Listar produtos</h1>
    <form method="GET" action="list_expire.php">
      <div class="form-check">
        <label class="form-label" for="dt-start">Data de inicio</label>
        <input class="form-input" type="date" name="dt_start" id="dt-start">
      </div>
      <div class="form-check">
        <label class="form-label" for="dt-final">Data final</label>
        <input class="form-input" type="date" name="dt_final" id="dt-final">
      </div>
      <button type="submit" value="submit" name="search_date" class="btn btn-primary">Listar</button>
      <button type="submit" value="submit" name="search_pdf" class="btn btn-primary">Gerar PDF</button>
    </form>
    <section class="grid">
      <?php foreach ((new Produto())->consultarDate($dt_start, $dt_final) as $prod) { ?>
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