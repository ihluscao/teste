
document.addEventListener('DOMContentLoaded', function () {
    var radioOutros = document.querySelector('input[name="candidato"][value="Outros"]');
    var inputSugestao = document.getElementById('sugestao');

    radioOutros.addEventListener('change', function () {
        inputSugestao.disabled = !radioOutros.checked;
        inputSugestao.required = radioOutros.checked;
    });
});
