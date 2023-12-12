let asunto = document.getElementById("asunto");
let dni = document.getElementById("dni");
let nombre = document.getElementById("nombre");
let p_apellido = document.getElementById("p_apellido");
let s_apellido = document.getElementById("s_apellido");
let nacimiento = document.getElementById("nacimiento");
let telefono = document.getElementById("telefono");
let correo = document.getElementById("correo");
let domicilio = document.getElementById("domicilio");
let codigo_postal = document.getElementById("codigo_postal");
let provincia = document.getElementById("provincia");
let oficina = document.getElementById("oficina");
let info = document.getElementById("info");
let p_fichero = document.getElementById("p_fichero");
let s_fichero = document.getElementById("s_fichero");
let terminos = document.getElementById("terminos");

let ObligaAsunto = document.getElementById("ObligaAsunto");
let ObligaDNI = document.getElementById("ObligaDNI");
let ObligaNombre = document.getElementById("ObligaNombre");
let ObligaPrimerApellido = document.getElementById("ObligaPrimerApellido");
let ObligaNacimiento = document.getElementById("ObligaNacimiento");
let ObligaTelefono = document.getElementById("ObligaTelefono");
let CorreoInvalido = document.getElementById("CorreoInvalido");
let ObligaDomicilio = document.getElementById("ObligaDomicilio");
let ObligaCodigoPostal = document.getElementById("ObligaCodigoPostal");
let ObligaProvincia = document.getElementById("ObligaProvincia");
let ObligaOficina = document.getElementById("ObligaOficina");
let ObligaInfo = document.getElementById("ObligaInfo");
let ObligaTerminos = document.getElementById("ObligaTerminos");

let valorGeneral = 0;

function validar() {
    limpiarComprobaciones();
    //Si alguna comprobación es invalida, resta a valorGeneral para no confirmar;

    if (sinCompletar(dni)) {      
        if(validarDNI()){ valorGeneral++; }
        else { valorGeneral--; ObligaDNI.classList.remove("invisible"); }
        if(dni_invalido == true){ ObligaDNI.innerHTML = 'DNI inválido'; }    
    } else{ ObligaDNI.classList.remove("invisible"); valorGeneral--;}

    if (sinCompletar(correo)) {
        if(!validarCorreo()) { valorGeneral--; CorreoInvalido.classList.remove("invisible"); }
    }
    if (sinCompletar(asunto)) valorGeneral++; else{ ObligaAsunto.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(nombre)) valorGeneral++; else{ ObligaNombre.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(p_apellido)) valorGeneral++; else{ ObligaPrimerApellido.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(nacimiento)) valorGeneral++; else{ ObligaNacimiento.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(telefono)) valorGeneral++; else{ ObligaTelefono.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(domicilio)) valorGeneral++; else{ ObligaDomicilio.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(codigo_postal)) valorGeneral++; else{ ObligaCodigoPostal.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(provincia)) valorGeneral++; else{ ObligaProvincia.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(oficina)) valorGeneral++; else{ ObligaOficina.classList.remove("invisible"); valorGeneral--;}
    if (sinCompletar(info)) valorGeneral++; else{ ObligaInfo.classList.remove("invisible"); valorGeneral--;}
    if (terminos.checked) valorGeneral++; else{ ObligaTerminos.classList.remove("invisible"); valorGeneral--;}

    if(valorGeneral == 12) return true; else return false;
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
function isNumber(numero) {
    const numberPattern = /^[+]?[0-9]*$/;
    return numberPattern.test(numero);
}


function limpiarComprobaciones() {
    valorGeneral = 0;

    dni_invalido = false;
    ObligaDNI.innerHTML = 'Este campo es obligatorio';

    ObligaAsunto.classList.add('invisible');
    ObligaDNI.classList.add('invisible');
    ObligaNombre.classList.add('invisible');
    ObligaPrimerApellido.classList.add('invisible');
    ObligaNacimiento.classList.add('invisible');
    ObligaTelefono.classList.add('invisible');
    CorreoInvalido.classList.add('invisible');
    ObligaDomicilio.classList.add('invisible');
    ObligaCodigoPostal.classList.add('invisible');
    ObligaProvincia.classList.add('invisible');
    ObligaOficina.classList.add('invisible');
    ObligaInfo.classList.add('invisible');
    ObligaTerminos.classList.add('invisible');
}