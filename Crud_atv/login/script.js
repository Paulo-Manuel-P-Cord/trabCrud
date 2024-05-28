function msenha() {
    let senha = document.getElementById("senha");
    senha.type = senha.type === "password" ? "text" : "password";
}

function fecharAlerta(idAlerta) {
    const alerta = document.getElementById(idAlerta);
    alerta.classList.remove('show');
    window.location.href = removeParam('success', window.location.href);
}

function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = sourceURL.indexOf("?") !== -1 ? sourceURL.split("?")[1] : "";

    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

document.getElementById("formulario").addEventListener("submit", function(event) {
    if (!this.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }
    this.classList.add("was-validated");
}, false);

