<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "../navbar.php"; ?>

    <h1>Listar produtos</h1>
    <form method="GET" action="control.php">
    <div class="form-check">
        <label class="form-label" for="dt-start">Data de inicio</label>
      <input class="form-input" type="date" name="dt_start" id="dt-start">
    </div>
    <div class="form-check">
        <label class="form-label" for="dt-final">Data final</label>
      <input class="form-input" type="date" name="dt_final" id="dt-final">
    </div>

        <button type="submit" value="submit" name="search_date" class="btn btn-primary">Pesquisar</button>
    </form>
</body>

</html>