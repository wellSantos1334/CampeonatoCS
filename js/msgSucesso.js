function emitirMsgSucesso() {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('msgStatus');

    if (myParam == 1) {
        let msgSucesso = document.querySelector('.msgSucesso');
        msgSucesso.innerHTML = "Criado com sucesso!";
        msgSucesso.removeAttribute("hidden");

        setTimeout(function(){ msgSucesso.style.display = 'none';}, 1000);
    }
}
emitirMsgSucesso();