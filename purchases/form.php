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

    <h1>Fazer compra</h1> 
    <form method="get" action="control.php">
        <div class="mb-3">
            <label class="form-label" for="cod">Código da compra</label>
            <input class="form-control" type="number" min="0" name="cod" id="cod">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cod_prod">Código do produto</label>
            <input class="form-control" type="number" min="0" name="cod_prod" id="cod_prod">
        </div>
        <div class="mb-3">
            <label class="form-label" for="qtd">Quantidade</label>
            <input class="form-control" type="text" maxlength="150" name="qtd" id="qtd">
        </div>
        <div class="mb-3">
            <label class="form-label" for="data">Data</label>
            <input class="form-control" type="date" min="0" max="200" step="0.01" name="date" id="date">
        </div>

        <div class="mb-3">
            <label class="form-label" for="pag">Forma de pagamento</label>
            <br>
            <input type="radio" name="pag" id="pagVista" value="V">
            <label class="form-label" for="pag">A vista</label>
            <input type="radio" name="pag" id="pagPrazo" value="P">
            <label class="form-label" for="pag">A prazo</label>
        </div>

        <button type="submit" value="submit" name="submit" class="btn btn-primary">Gravar </button>
        <button type="submit" value="delete" name="delete" class="btn btn-primary">Deletar</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
    </form>
</body>

</html>