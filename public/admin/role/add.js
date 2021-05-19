var checkCha = document.getElementsByClassName('checkbox-cha');
for (i = 0; i < checkCha.length; i++) {
    checkCha[i].addEventListener("click", checkall);
}

function checkall() {
    var checkCon = this.parentNode.parentNode.getElementsByClassName('checkbox-con');
    for (i = 0; i < checkCon.length; i++) {
        checkCon[i].checked = this.checked;
    }
}