let juego = document.getElementById('juego');
let resulta = document.getElementById('resultado');
let reloj = document.getElementById('reloj');
let btnstart = document.getElementById('start');
let timerId, comprobacion = false, resultado = '';
let forma = { tipo: 0, x: 0, y: 0, tamaño: 100, color: "blue" };
let horaInicial, horaFinal;
let formas = [];
let i = 10;
let enJuego = false;

function start() {
    if (enJuego) {
        enJuego = false;
        restart();
    } else {
        enJuego = true;
        btnstart.disabled = true;
        temporizador();
        siguienteForma();
    }
}

function getClickForma() {
    setTimeFormaFinal();
    ocultarForma();
    siguienteForma();
    
}

/*****************             TEMPORIZADOR GLOBAL: 10seg             *****************/
function temporizador() {
    timerId = setInterval(() => mostrarTimer(), 1000);
    let timeoutId = setTimeout(function () {
        clearInterval(timerId);
        stop();
    }, 10000);
}
function mostrarTimer() {
    i--;
    reloj.innerHTML = i;
}
/*****************             FORMAS             *****************/
function siguienteForma() {
    let timeoutId = setTimeout(function () {
        if (enJuego) {
            darForma();
            setTimeFormaInicial();
        }
    }, (0.5 + Math.floor(Math.random() * 2.5)) * 1000);
}

function darForma() {
    forma.x = getRandomX();
    forma.y = getRandomY();
    forma.tipo = getRandomForma();
    forma.tamaño = getRandomTamaño();
    forma.color = getRandomColor();

    if (forma.color == 'FFFFFF') {
        forma.color = 'black';
    }

    //COLOCAR TIPO
    if (forma.tipo == 0) {
        //CUADRADO
        forma.tipo = 0;
    }
    if (forma.tipo == 1) {
        //CIRCULO
        forma.tipo = 50;
    }

    //Pone la forma en el div
    document.getElementById("juego").innerHTML = '<div id="forma" onclick="getClickForma()" style="border-radius: '+forma.tipo+'%; display: block; width: '+forma.tamaño+'px; height: '+forma.tamaño+'px; margin-left: '+forma.x+'px; margin-top: '+forma.y+'px; background-color: '+forma.color+';"></div>'
    
}
function ocultarForma() {
    document.getElementById("juego").innerHTML = '';
}

/*****************             COMPROBACION             *****************/
function comprobarClick (e){
    if(enJuego){
        cursorX = e.pageX-250;
        cursorY= e.pageY-155;

        let maxX, minX, maxY,minY;
        if(forma.tipo == 0){
            maxX = forma.x+forma.tamaño;
            minX = forma.x;
            maxY = forma.y+forma.tamaño;
            minY = forma.y;
        }
        if(forma.tipo == 1){
            maxX = forma.x+forma.tamaño;
            minX = forma.x-forma.tamaño;
            maxY = forma.y+forma.tamaño;
            minY = forma.y-forma.tamaño;
        }
        if(cursorX <= maxX && cursorX >= minX && cursorY <= maxY && cursorY >= minY){
            comprobacion = true;
        }else{
            comprobacion = false;
        }
    }
}

function printMousePos(e){
    cursorX = e.pageX-283;
    cursorY= e.pageY-208;
    let respuertass = "x: " + cursorX +"<br>y: " + cursorY;
    document.getElementById('test').innerHTML = respuertass;
}


/*****************             RANDOMS             *****************/
function getRandomX() {
    return (Math.floor(Math.random() * 1200));
}
function getRandomY() {
    return (Math.floor(Math.random() * 500));
}
function getRandomForma() {
    return Math.floor(Math.random() * 2);
}
function getRandomTamaño() {
    return (50 + Math.floor(Math.random() * 150));
}
function getRandomColor() {
    hexadecimal = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
    color_aleatorio = "#";
    for (e = 0; e < 6; e++) {
        posarray = Math.floor(Math.random() * 16);
        color_aleatorio += hexadecimal[posarray];
    }
    return color_aleatorio;
}
function setTimeFormaInicial(){
    horaInicial = new Date().getTime();
}
function setTimeFormaFinal(){
    horaFinal = new Date().getTime()-horaInicial;
    formas.push(horaFinal/1000)
}

function stop(){
    document.removeEventListener('click', comprobarClick, true);
    ocultarForma();

    //GUARDAR RECORD
    guardarMejorTiempo();

    //RESULTADOS
    for(let e=0;e<=formas.length-1;e++){
        resultado += formas[e]+'s <br>';
    }
    if(darMejorTiempo() != false){
        resultado += '<h1>Record: '+darMejorTiempo()+'<h2>';
    }

    resulta.innerHTML = resultado;
    resulta.style.display = 'block';
    juego.style.display = 'none';

    //VOLVER A JUGAR
    botonRestablecer();
}

/*****************             RESTABLECER             *****************/
function restart(){
    ocultarForma();
    botonStart();
    restablecerJuego();
    restablecerReloj();
}
function restablecerReloj(){
    i=10;
    reloj.innerHTML = i;
}
function restablecerJuego(){
    resultado = '';
    formas = [];
    juego.style.display = 'block';
    resulta.style.display = 'none'; 
}

/*****************             BOTONES             *****************/
function botonRestablecer(){
    btnstart.textContent = 'Volver a jugar';
    btnstart.disabled = false;
    btnstart.id = 'restart';
}
function botonStart(){
    btnstart.textContent = 'Empezar';
    btnstart.disabled = false;
    btnstart.id = 'start';
}


/*****************             LOCAL_STORAGE             *****************/
function guardarMejorTiempo() {
    let local = 11;
    let record = localStorage.getItem('Record');
    for (let i = 0; i <= formas.length; i++) {
        if (formas[i] < local) {
            local = formas[i];
        }
    }
    if (local > record && record != null) {
        local = record;
    }
    if (local != 11) {
        localStorage.setItem('Record', local);
    }
}

function darMejorTiempo() {
    let record = localStorage.getItem('Record');
    if (record != null) {
        return record;
    }
    return false;
}

