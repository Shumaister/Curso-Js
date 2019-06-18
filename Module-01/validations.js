function validate_fields() {
    // validacion nombre
    if (is_empty_field('name'))
        return false;

    // validacion apellido
    if (is_empty_field('lastname'))
        return false;

    // validacion fecha cumpleanios - FALTA ESTE
    if (!is_date_valid())
        return false;

    // validacion del mail
    if (!is_mail_valid())
        return false;

    // validacion del telfono
    if (!is_phone_valid())
        return false;

    // validacion usuario
    if (!is_user_valid())
        return false;

    // validacion contrasenia
    if (!is_pass_valid())
        return false;

    return true;
}

function is_empty_field(field) {
    var element = document.getElementById(field);

    if (element.value !== '')
        return false;

    alert("El campo " + element.getAttribute("name") + " es obligatorio.");
    return true;
}

function is_date_valid() {
    if (is_empty_field('birthday'))
        return false;

    //to do dacidir como ahcer la fecha basicamente
    return true;
}

function is_mail_valid() {
    var element = document.getElementById("email");

    if (is_empty_field('email'))
        return false;

    var expr = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!isValidExpresion(expr, element.value)) {
        alert("El mail ingresado no es valido.");
        return false;
    }

    return true;
}


function is_phone_valid() {
    var element = document.getElementById("phone");

    if (element.value === '')
        return true;

    if (anyLetter(element.value)) {
        alert("El campo telefono solo debe contener numeros. Ej: 1154249902");
        return false;
    }

    return true;
}

function is_user_valid() {
    var element = document.getElementById("user");

    if (is_empty_field('user'))
        return false;

    if (element.value.length < 8) {
        alert("El campo Usuario debe contener al menos 8 caracteres");
        return false;
    }

    if (!anyNumber(element.value) || !anyLetter(element.value)) {
        alert("El campo Usuario debe contener letras y numeros.");
        return false;
    }

    return true;
}

function is_pass_valid() {
    var element = document.getElementById("pass");

    if (is_empty_field('pass'))
        return false;

    if (element.value.length < 8) {
        alert("El campo Contrasenia debe contener al menos 8 caracteres");
        return false;
    }

    return true;
}


/// ---- Commons ToDo: mover a un archivo particular

function anyNumber(text) {
    for (i = 0; i < text.length; i++) {
        if (isNumber(text[i])) {
            return true;
        }
    }
    return false;
}

function isNumber(number) {
    var numbers = "1234567890";
    for (var i = 0; i <= 10; i++) {
        if (number === numbers[i])
            return true;
    }
    return false;
}

function anyLetter(text) {
    text = text.toLowerCase();
    for (i = 0; i < text.length; i++) {
        if (isLetter(text[i])) {
            return true;
        }
    }
    return false;
}

function isLetter(leter) {
    var leters = "qwertyuiopasdfghjklzxcvbnm";
    for (var i = 0; i <= leters.length; i++) {
        if (leter === leters[i])
            return true;
    }
    return false;
}

function isValidExpresion(reg_exp, text) {
    return reg_exp.test(text);
}