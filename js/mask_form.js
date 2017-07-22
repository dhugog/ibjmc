function mask(obj, func) {
    obj.value = func(obj.value);
}

function maskDate(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{2})(\d)/, "$1/$2");
    obj = obj.replace(/(\d{2})(\d)/, "$1/$2");
    
    return obj;
}

function maskCep(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{5})(\d)/, "$1-$2");
    return obj;
}

function maskRg(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{2})(\d)/, "$1.$2");
    obj = obj.replace(/(\d{3})(\d)/, "$1.$2");
    obj = obj.replace(/(\d{3})(\d)/, "$1-$2");
    return obj;
}

function maskCpf(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{3})(\d)/, "$1.$2");
    obj = obj.replace(/(\d{3})(\d)/, "$1.$2");
    obj = obj.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return obj;
}

function maskCel(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{1})(\d)/, "($1$2) ");
    obj = obj.replace(/(\d{5})(\d)/, "$1-$2");
    return obj;
}

function maskTel(obj) {
    obj = obj.replace(/\D/g,"");
    obj = obj.replace(/(\d{1})(\d)/, "($1$2) ");
    obj = obj.replace(/(\d{4})(\d)/, "$1-$2");
    return obj;
}

function toggleEnd(obj) {
    var trEnd = document.getElementById("endereco");
    if(obj.value.length == 9) {
        trEnd.innerHTML = "<td><p>Número <input type='number' name='numero' required /></p></td><td><p>Complemento <input name='complemento' required /></p></td>"
    } else {
        trEnd.innerHTML = "";
    }
}