<!doctype html>
<html lang="pt-br">

<head>
    <?php include "../head.php" ?>
    <title>Cadastrar venda</title>
    <script defer>
        function fillUsername() {
            $.ajax({
                method: "GET",
                url: "control.php",
                data: $("form").serialize() + "&user_description="
            })
            .done((dados) => $("#txt-username").html(dados));
        }

        function fillDescription() {
            $.ajax({
                method: "GET",
                url: "control.php",
                data: $("form").serialize() + "&product_description="
            })
            .done((dados) => $("#txt-desc").html(dados));
        }

        function pesquisar() {
            $.ajax({
                method: "GET",
                url: "control.php",
                data: $("form").serialize(),
            }).done((dados) => {
                const data = JSON.parse(dados);
                for (const [key, val] of Object.entries(data))
                    $(`#${key}`).val(val);

                document.getElementById(data.pag == "V" ? "pagVista" : "pagPrazo").checked = true;
                fillDescription();
                fillUsername();
            });
        }

    </script>
</head>

<body data-bs-theme="dark">
    <?php include "../navbar.php"; ?>

    <main>
        <h1>Fazer compra</h1>
        <form method="get" action="control.php">
            <div class="mb-3">
                <label class="form-label" for="cod">Código da compra</label>
                <input class="form-control" type="number" min="0" name="cod" id="cod">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cod">Id do cliente</label>
                <input class="form-control" type="number" min="0" name="id_user" id="id_user" onblur="fillUsername()">
                <span id="txt-username"></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cod_prod">Código do produto</label>
                <input class="form-control" type="number" min="0" name="cod_prod" id="cod_prod" onblur="fillDescription()">
                <span id="txt-desc"></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="qtd">Quantidade</label>
                <input class="form-control" type="text" maxlength="150" name="qtd" id="qtd">
            </div>
            <div class="mb-3">
                <label class="form-label" for="data">Data</label>
                <input class="form-control" type="date" min="0" max="200" step="0.01" name="date" id="dt">
            </div>

            <div class="mb-3">
                <label class="form-label" for="pag">Forma de pagamento</label>
                <br>
                <input type="radio" name="pag" id="pagVista" value="V">
                <label class="form-label" for="pag">A vista</label>
                <input type="radio" name="pag" id="pagPrazo" value="P">
                <label class="form-label" for="pag">A prazo</label>
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