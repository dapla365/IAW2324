document.getElementById("dark_button").onclick = function () {
    document.getElementById("dark_button").classList.add('invisible');
    document.getElementById("light_button").classList.remove('invisible');
    document.getElementById("body").classList.add('dark');
    document.getElementById("valor").classList.add('dark');
    document.getElementById("names").classList.add('dark');
    document.getElementById("pokemon_table").classList.add('dark');
    document.getElementById("pokemon_select").classList.add('dark');
    document.getElementById("gens").classList.add('dark');
}
document.getElementById("light_button").onclick = function () {
    document.getElementById("dark_button").classList.remove('invisible');
    document.getElementById("light_button").classList.add('invisible');
    document.getElementById("body").classList.remove('dark');
    document.getElementById("valor").classList.remove('dark');
    document.getElementById("names").classList.remove('dark');
    document.getElementById("pokemon_table").classList.remove('dark');
    document.getElementById("pokemon_select").classList.remove('dark');
    document.getElementById("gens").classList.remove('dark');
}


$(document).keyup(function (event) {
    if ($("#valor").is(":focus") && event.key == "Enter") {
        busca(document.getElementById("valor").value.toLowerCase());
    }
});

$(function () {
    $("body").click(function (e) {
        if (e.target.id == "valor") {
            //console.log(e.target.value);
            if (e.target.value != "") {
                document.getElementById("pokemon_select").classList.add('playing');
            } else {
                document.getElementById("pokemon_select").classList.remove('playing');
            }
        } else {
            document.getElementById("pokemon_select").classList.remove('playing');
        }
        for (let i = 1; i <= 8; i++) {
            if ($(`#gen${i}:checked`).length > 0) document.getElementById(`gen${i}_label`).classList.add('nogray');
            else document.getElementById(`gen${i}_label`).classList.remove('nogray');
        }
    });

    $("#play").click(function (e) {
        let comprobacion = false;
        gens = [];
        for (let i = 1; i <= 8; i++) {
            if ($(`#gen${i}:checked`).length > 0) {
                comprobacion = true;
                gens[i] = i;
            }
        }
        if (comprobacion) {
            document.getElementById("play").classList.add('playing');
            document.getElementById("retry").classList.add('playing');
            document.getElementById("names").classList.remove('playing');
            document.getElementById("pokemon_table").classList.remove('playing');
            document.getElementById('pokemon_table').innerHTML = "";
            document.getElementById('valor').value = "";
            play();
            $(".inputs").attr("disabled", true);
        } else {
            document.getElementById("play").classList.remove('playing');
            document.getElementById("valor").classList.remove('playing');
            document.getElementById("pokemon_select").classList.remove('playing');
            document.getElementById("names").classList.remove('playing');
            document.getElementById("pokemon_table").classList.remove('playing');
        }
    });

    $("#retry").click(function (e) {
        let comprobacion = false;
        gens = [];
        for (let i = 1; i <= 8; i++) {
            if ($(`#gen${i}:checked`).length > 0) {
                comprobacion = true;

                gens[i] = i;
            }
        }
        if (comprobacion) {
            document.getElementById("play").classList.add('playing');
            document.getElementById("retry").classList.add('playing');
            document.getElementById("names").classList.remove('playing');
            document.getElementById("pokemon_table").classList.remove('playing');
            document.getElementById('pokemon_table').innerHTML = "";
            document.getElementById('valor').value = "";

            play();
            $(".inputs").attr("disabled", true);

        } else {
            document.getElementById("play").classList.remove('playing');
            document.getElementById("valor").classList.remove('playing');
            document.getElementById("pokemon_select").classList.remove('playing');
            document.getElementById("names").classList.remove('playing');
            document.getElementById("pokemon_table").classList.remove('playing');
        }
    });

})
