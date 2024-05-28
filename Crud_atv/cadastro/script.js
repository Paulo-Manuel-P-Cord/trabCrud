// Adiciona evento de validação ao formulário
document.getElementById("formulario").addEventListener("submit", function(event) {
    // Verifica se o formulário é válido
    if (!this.checkValidity()) {
        event.preventDefault(); // Impede o envio do formulário
        event.stopPropagation(); // Evita a propagação do evento
    }
    
    // Adiciona a classe "was-validated" para habilitar o estilo de validação do Bootstrap
    this.classList.add("was-validated");
});