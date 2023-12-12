let nombre = document.getElementById("nombre");
let dni = document.getElementById("dni");
let apellidos = document.getElementById("apellidos");
let correo = document.getElementById("correo");

let ObligaNombre = document.getElementById("ObligaNombre");
let ObligaDNI = document.getElementById("ObligaDNI");
let ObligaApellidos = document.getElementById("ObligaApellidos");
let ObligaCorreo = document.getElementById("ObligaCorreo");

let valorGeneral = 0;

function validar() {
    limpiarComprobaciones();
    //Si alguna comprobación es invalida, resta a valorGeneral para no confirmar;

    if (sinCompletar(dni)) {      
        if(validarDNI()) valorGeneral++; 
        else { valorGeneral--; ObligaDNI.classList.remove("invisible"); }
        if(dni_invalido == true) ObligaDNI.innerHTML = 'DNI inválido';    
    } else{ ObligaDNI.classList.remove("invisible"); valorGeneral--;}

    if (sinCompletar(correo)) {
        if(validarCorreo()) valorGeneral++; else{ ObligaCorreo.classList.remove("invisible"); valorGeneral--;}
    } else{ ObligaCorreo.classList.remove("invisible"); valorGeneral--;}
    
    if (sinCompletar(nombre)) valorGeneral++; else{ ObligaNombre.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(apellidos)) valorGeneral++; else{ ObligaApellidos.classList.remove("invisible"); valorGeneral--;}



    if(valorGeneral == 4) return true; else return false;
}

function sinCompletar(valor) {
    let valido = false;
    if (valor.value != "" && valor.value != null) {
        valido = true;
    }
    return valido;
}

function validarCorreo() {
    var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    return validEmail.test(correo.value);
}
function validarDNI() {
    let dnia = dni.value.toUpperCase();
    var validar_dni = /^[XYZ]?\d{8}[A-Z]$/;
    let valida = false;
    if (validar_dni.test(dnia)) {
        let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

        let numero = dnia.charAt(0) + dnia.charAt(1) + dnia.charAt(2) + dnia.charAt(3) + dnia.charAt(4) + dnia.charAt(5) + dnia.charAt(6) + dnia.charAt(7);
        let resto = numero % 23;
        let dni_correspondiente = numero + letras[resto];

        if (dni_correspondiente == dnia) {
            dni_invalido = false;
            valida = true;
        } else {
            dni_invalido = true;
        }
    }
    return valida;

}

function limpiarComprobaciones() {
    valorGeneral = 0;

    dni_invalido = false;
    ObligaDNI.innerHTML = 'Este campo es obligatorio';

    ObligaDNI.classList.add('invisible');
    ObligaNombre.classList.add('invisible');
    ObligaApellidos.classList.add('invisible');
    ObligaCorreo.classList.add('invisible');
   
}