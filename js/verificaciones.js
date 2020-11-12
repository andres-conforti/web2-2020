function verificarMail(mail) {
    if (!emailValido(mail.value)) {
        alert('Debe ingresar un email válido');
        mail.focus();
        return;
    }
}

function emailValido(mail) {
    let re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return re.test(mail);
}

let nodoInputMail = document.querySelector(".inputLogin");
nodoInputMail.addEventListener("change", function (e) { verificarMail(nodoInputMail) });