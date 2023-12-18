document.getElementById("dark_button").onclick = function(){
    document.getElementById("dark_button").classList.add('invisible');
    document.getElementById("light_button").classList.remove('invisible');
    document.getElementById("body").classList.add('dark');
}
document.getElementById("light_button").onclick = function(){
    document.getElementById("dark_button").classList.remove('invisible');
    document.getElementById("light_button").classList.add('invisible');
    document.getElementById("body").classList.remove('dark');
}


function busca() {

    document.getElementsById.ajax({
        url: ``,
        success: function (data) {
            let a = data;
            document.getElementsById("#sinrespuesta").text(a);

        },
        error: function () {
            document.getElementsById("#sinrespuesta").text("No se pudo obtener pokemon");
        }
    });
}
