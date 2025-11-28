function validarFormulario() {
    let nome = document.querySelector("input[name='nome']").value;

    if (nome.length < 3) {
        alert("O nome deve ter pelo menos 3 caracteres!");
        return false;
    }
    return true;
}