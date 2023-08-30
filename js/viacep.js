function getCEP() {
  const cep = $("#cep").val().replace(/\D/g, "");

  if (/^[0-9]{8}$/.test(cep)) {
    $.getJSON(`https://viacep.com.br/ws/${cep}/json/?callback=?`, (dados) => {
      if (!("erro" in dados)) {
        $("#rua").val(dados.logradouro);
        $("#bairro").val(dados.bairro);
        $("#cidade").val(dados.localidade);
        $("#uf").val(dados.uf);
      } else {
        alert("CEP não encontrado.");
      }
    });
  } else alert("Formato de CEP inválido.");
}

function pesquisar() {
  $.ajax({
    method: "GET",
    url: "control.php",
    data: $("form").serialize(),
  }).done((dados) => {
    console.log(JSON.parse(dados));
    for (const [key, val] of Object.entries(JSON.parse(dados)))
      $(`#${key}`).val(val);

    getCEP();
  });
}
