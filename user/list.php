<?php
include 'classe.php';
require_once "../dompdf/autoload.inc.php";

use Dompdf\Dompdf;

if (isset($_GET["search_pdf"])) {
    $dompdf = new Dompdf();

    $data = "<h1>Listagem de Usuários</h1><table><thead></thead><tr><th>id</th><th>name</th><th>fone</th><th>cpf</th><th>cep</th><th>número</th><th>complemento</th></tr></thead><tbody>";

    foreach ((new User())->list() as $vend) {
        $data .= "<tr>";
        foreach ($vend as $key => $value) $data .= "<td>$value</td>";
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
    <?php include "../head.php" ?>
    <title>Listar clientes</title>
</head>

<body data-bs-theme="dark"></body>
<?php include "../navbar.php" ?>

<main>
    <h1>Listar clientes</h1>

    <form action="list.php" method="get">
        <button type="submit" value="submit" name="search_pdf" class="btn btn-primary" style="margin-bottom: 10px;">Gerar PDF</button>
    </form>

    <section class="grid">
        <?php
        foreach ((new User())->list() as $user) {
        ?>
            <p class="listing">
                <?php foreach ($user as $key => $value) { ?>
                    <b><?php echo $key ?>:</b> <?php echo $value ?><br>
                <?php } ?>
            </p>
        <?php } ?>
    </section>
</main>
</body>

</html>