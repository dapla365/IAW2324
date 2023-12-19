document.getElementById("dark_button").onclick = function () {
    document.getElementById("dark_button").classList.add('invisible');
    document.getElementById("light_button").classList.remove('invisible');
    document.getElementById("body").classList.add('dark');
    document.getElementById("valor").classList.add('dark');
    document.getElementById("names").classList.add('dark');
    document.getElementById("pokemon_table").classList.add('dark');
    document.getElementById("pokemon_select").classList.add('dark');
}
document.getElementById("light_button").onclick = function () {
    document.getElementById("dark_button").classList.remove('invisible');
    document.getElementById("light_button").classList.add('invisible');
    document.getElementById("body").classList.remove('dark');
    document.getElementById("valor").classList.remove('dark');
    document.getElementById("names").classList.remove('dark');
    document.getElementById("pokemon_table").classList.remove('dark');
    document.getElementById("pokemon_select").classList.remove('dark');
}

$(document).keyup(function (event) {
    if ($("#valor").is(":focus") && event.key == "Enter") {
        busca(document.getElementById("valor").value.toLowerCase());
    }
});

$(function () {
    $("body").click(function (e) {
        if (e.target.id == "valor") {
            document.getElementById("pokemon_select").classList.remove('invisible');
        } else {
            document.getElementById("pokemon_select").classList.add('invisible');
        }
    });
})
