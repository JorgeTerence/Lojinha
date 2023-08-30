<!doctype html>
<html lang="pt-br">

<head>
    <?php include "../head.php" ?>
    <title>Cadastrar usuário</title>
    <script defer src="../js/viacep.js"></script>
</head>

<body data-bs-theme="dark">
    <?php include "../navbar.php"; ?>
    <main>
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
                <input class="form-control" type="tel" name="phone" id="phone" maxlength="11">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cpf">CPF</label>
                <input class="form-control" type="number" name="cpf" id="cpf" max="99999999999">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cep">CEP</label>
                <input class="form-control" type="text" name="cep" id="cep" max="99999999999" onblur="getCEP()">
            </div>
            <div class="mb-3">
                <label class="form-label" for="rua">Rua</label>
                <input class="form-control" type="text" name="rua" id="rua" max="99999999999">
            </div>
            <div class="mb-3">
                <label class="form-label" for="number">Número</label>
                <input class="form-control" type="text" name="street_number" id="street_number" maxlength="5">
            </div>
            <div class="mb-3">
                <label class="form-label" for="bairro">Bairro</label>
                <input class="form-control" type="text" name="bairro" id="bairro" maxlength="40">
            </div>
            <div class="mb-3">
                <label class="form-label" for="complement">Complemento</label>
                <input class="form-control" type="text" name="complement" id="complement" maxlength="40">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cidade">Cidade:</label>
                <input class="form-control" type="text" name="cidade" id="cidade" maxlength="40">
            </div>
            <div class="mb-3">
                <label class="form-label" for="uf">Estado:</label>
                <input class="form-control" type="text" name="uf" id="uf" maxlength="20">
            </div>

            <button type="submit" value="submit" name="submit" class="btn btn-primary">Gravar</button>
            <button type="submit" value="delete" name="delete" class="btn btn-primary">Deletar</button>
            <input value="Alterar" type="submit" name="edit" class="btn btn-primary" />
            <input value="Pesquisar" name="search" class="btn btn-primary" onclick="pesquisar()" />
            <button type="reset" class="btn btn-primary">Limpar</button>
        </form>
        <div id="results"></div>
    </main>
</body>

</html>