//check all toàn bộ
document.getElementsByClassName("checkall")[0].addEventListener('click', checkAllModule);
// check all từng module
var checkCha = document.getElementsByClassName('checkbox-cha');
for (i = 0; i < checkCha.length; i++) {
    checkCha[i].addEventListener('click', checkall);
}
// Các function
function checkall() {
    var checkCon = this.parentNode.parentNode.parentNode.getElementsByClassName('checkbox-con');
    for (i = 0; i < checkCon.length; i++) {
        checkCon[i].checked = this.checked;
    }
}

function checkAllModule() {
    var checkConAll = document.getElementsByClassName('checkbox-con');
    for (i = 0; i < checkConAll.length; i++) {
        checkConAll[i].checked = this.checked;
    }
}