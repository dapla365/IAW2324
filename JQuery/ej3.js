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
