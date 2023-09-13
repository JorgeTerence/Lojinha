<!doctype html>
<html lang="pt-br">

<head>
    <?php include "../head.php" ?>
    <title>Cadastrar Produto</title>
    <script defer>
        function pesquisar() {
            $.ajax({
                method: "POST",
                url: "control.php",
                data: $("form").serialize(),
            }).done((dados) => {
                for (const [key, val] of Object.entries(JSON.parse(dados)))
                    $(`#${key}`).val(val);
            });

        }
    </script>
</head>

<body data-bs-theme="dark">
    <?php include "../navbar.php"; ?>

    <main>
        <h1>Formulário de produto</h1>
        <form method="POST" action="control.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="cod">Código</label>
                <input class="form-control" type="number" min="0" name="cod" id="id">
            </div>
            <div class="mb-3">
                <label class="form-label" for="desc">Descrição</label>
                <input class="form-control" type="text" maxlength="150" name="desc" id="descri">
            </div>
            <div class="mb-3">
                <label class="form-label" for="value">Valor</label>
                <input class="form-control" type="number" min="0" max="200" step="0.01" name="value" id="val">
            </div>
            <div class="mb-3">
                <label class="form-label" for="venc">Vencimento</label>
                <input class="form-control" type="date" name="venc" id="expire_date">
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Imagem</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>

            <button type="submit" value="submit" name="submit" class="btn btn-primary">Gravar</button>
            <button type="submit" value="delete" name="delete" class="btn btn-primary">Deletar</button>
            <input value="Alterar" type="submit" name="edit" class="btn btn-primary" />
            <input value="Pesquisar" name="search" class="btn btn-primary" onclick="pesquisar()" />
            <button type="reset" class="btn btn-primary">Limpar</button>
        </form>
    </main>
</body>

</html>