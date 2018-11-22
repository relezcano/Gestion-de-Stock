//Variables que almacenan las diferentes restricciones.
var digitos = /[1234567890]/g;
var precios = /[0-9\.]/g;
var comprobante = /[0-9\-]/g;
var texto = /[A-Za-z]/g;

function restrictCharacters(myfield, e, restrictionType) {
    if (!e) var e = window.event
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    var character = String.fromCharCode(code);
    //Si el usuario apreta esc, saca el focus del input
    if (code==27) { this.blur(); return false; }
    //La funcion ignora cuando el usuario apreta algunas teclas
    if (!e.ctrlKey && code!=9 && code!=8 && code!=36 && code!=37 && code!=38 && (code!=39 || (code==39 && character=="'")) && code!=40) {
        if (character.match(restrictionType)) {
            return true;
        } else {
            return false;
        }
    }
}
