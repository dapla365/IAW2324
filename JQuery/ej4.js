/* Rellena este fichero */

$("#btn-aumentar").click(function(){
    var size = parseInt($(".pares").css("fontSize"));
    var sizeh1 = parseInt($("h1").css("fontSize"));
    $(".pares").css("fontSize",size+5+"px");
    $("h1").css("fontSize",sizeh1+5+"px");
});
$("#btn-disminuir").click(function(){
    var size = parseInt($(".pares").css("fontSize"));
    var sizeh1 = parseInt($("h1").css("fontSize"));
    $(".pares").css("fontSize",size-5+"px");
    $("h1").css("fontSize",sizeh1-5+"px");
});
$("#btn-color").click(function(){
    $(".pares").css("color", getRandomColor());
    $("h1").css("color", getRandomColor());
});

function getRandomColor() {
    hexadecimal = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
    color_aleatorio = "#";
    for (e = 0; e < 6; e++) {
        posarray = Math.floor(Math.random() * 16);
        color_aleatorio += hexadecimal[posarray];
    }
    return color_aleatorio;
}