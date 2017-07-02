var obj, func;

function mask(o, f) {
    obj = o;
    func = f;
    setTimeout("execMask()", 1);
}

function execMask() {
    obj.value = func(obj.value);
}

function maskDate(obj) {
    obj = obj.replace(/\D/g, "");
    obj = obj.replace(/(\d{2})(\d)/, "$1/$2");
    obj = obj.replace(/(\d{2})(\d)/, "$1/$2");
    obj = obj.replace(/(\d{4})(\d)/, "$1/$2");
    return obj;
}