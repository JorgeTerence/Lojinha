<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "../navbar.php"; ?>

    <h1>Formulário de usuário</h1> 
    <form method="GET" action="control.php">
        <div class="mb-3">
            <label class="form-label" for="cod">Código</label>
            <input class="form-control" type="number" min="0" name="id" id="id">
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control" type="text" maxlength="50" name="name" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="phone">Celular</label>
            <input class="form-control" type="tel" name="phone" id="phone">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cpf">CPF</label>
            <input class="form-control" type="number" name="cpf" id="cpf" max="99999999999">
        </div>

        <button type="submit" value="submit" name="submit" class="btn btn-primary">Gravar </button>
        <button type="submit" value="delete" name="delete" class="btn btn-primary">Deletar</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
    </form>
</body>

</html>