document.getElementById("dark_button").onclick = function () {
    document.getElementById("dark_button").classList.add('invisible');
    document.getElementById("light_button").classList.remove('invisible');
    document.getElementById("body").classList.add('dark');
    document.getElementById("valor").classList.add('dark');
    document.getElementById("names").classList.add('dark');
    document.getElementById("pokemon_table").classList.add('dark');
}
document.getElementById("light_button").onclick = function () {
    document.getElementById("dark_button").classList.remove('invisible');
    document.getElementById("light_button").classList.add('invisible');
    document.getElementById("body").classList.remove('dark');
    document.getElementById("valor").classList.remove('dark');
    document.getElementById("names").classList.remove('dark');
    document.getElementById("pokemon_table").classList.remove('dark');
}

$(document).keyup(function (event) {
    if ($("#valor").is(":focus") && event.key == "Enter") {
        busca();
        //fetchKantoPokemon();
    }
});
let know_type1, know_type2, know_evolution, know_evolved, know_color, know_habitat, know_generation;

function buscado() {


    let pok = document.getElementById('valor').value;

    let type1 = document.getElementById("pokemon_type1");
    let type2 = document.getElementById("pokemon_type2");
    let evolution = document.getElementById("pokemon_evolution");
    let evolved = document.getElementById("pokemon_evolved");
    let color = document.getElementById("pokemon_color");
    let habitat = document.getElementById("pokemon_habitat");
    let generacion = document.getElementById("pokemon_generation");


    let try_type1, try_type2, try_evolution, try_evolved, try_color, try_habitat, try_generation;

    $.ajax({
        method: "GET",
        // data.sprites.front_default   data.forms[0].name      data.types[0].type.name     data.id
        url: `https://pokeapi.co/api/v2/pokemon/${pok}`
    }).done(function (data) {
        try {
            $("#pokemon_img").html("<img src=" + JSON.stringify(data.sprites.front_default) + " alt='pokemon_img'>");
        } catch (error) {
            $("#pokemon_img").text('None');
        }
        try {
            try_type1 = JSON.stringify(data.types[0].type.name);
        } catch (error) {
            try_type1 = 'None';
        }
        try {
            try_type2 = JSON.stringify(data.types[1].type.name);
        } catch (error) {
            try_type2 = 'None';
        }
        try {
            try_evolution = JSON.stringify(data.types[1].type.name);
        } catch (error) {
            try_evolution = 'None';
        }
        try {
            try_evolved = JSON.stringify(data.types[1].type.name);
        } catch (error) {
            try_evolved = 'None';
        }
        try {
            try_color = JSON.stringify(data.types[1].type.name);
        } catch (error) {
            try_color = 'None';
        }
        try {
            try_habitat = JSON.stringify(data.types[1].type.name);
        } catch (error) {
            try_habitat = 'None';
        }
        try {
            //try_generation = JSON.stringify(data.sprites.versions.generation-i);
        } catch (error) {
            try_generation = 'None';
        }

        type1.innerHTML = try_type1;
        type2.innerHTML = try_type2;
        evolution.innerHTML = try_evolution;
        evolved.innerHTML = try_evolved;
        color.innerHTML = try_color;
        habitat.innerHTML = try_habitat;
        generacion.innerHTML = try_generation;

        /* COMPROBACIONES */
        if (know_type1 == try_type1) {
            type1.classList.remove('red');
            type1.classList.add('green');
        } else {
            type1.classList.add('red');
            type1.classList.remove('green');
        }
        if (know_type2 == try_type2) {
            type2.classList.remove('red');
            type2.classList.add('green');
        } else {
            type2.classList.add('red');
            type2.classList.remove('green');
        }
        if (know_evolution == try_evolution) {
            evolution.classList.remove('red');
            typevolutione1.classList.add('green');
        } else {
            evolution.classList.add('red');
            evolution.classList.remove('green');
        }
        if (know_evolved == try_evolved) {
            evolved.classList.remove('red');
            evolved.classList.add('green');
        } else {
            evolved.classList.add('red');
            evolved.classList.remove('green');
        }
        if (know_color == try_color) {
            color.classList.remove('red');
            color.classList.add('green');
        } else {
            color.classList.add('red');
            color.classList.remove('green');
        }
        if (know_habitat == try_habitat) {
            habitat.classList.remove('red');
            habitat.classList.add('green');
        } else {
            habitat.classList.add('red');
            habitat.classList.remove('green');
        }
        if (know_generation == try_generation) {
            generacion.classList.remove('red');
            generacion.classList.add('green');
        } else {
            generacion.classList.add('red');
            generacion.classList.remove('green');
        }

    }).fail(function () {
        $("#sinrespuesta").text("No se pudo obtener pokemon");
    });
}















/* API Select */
/*
var url = "http://api.hungama.com/metroapp/categories.php?format=json";
    var id, name;
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var res = JSON.parse(xhr.responseText),
                data = res.category;
            for(var i = 0; i < data.length; i++) {
                var ele = document.createElement("option");
                ele.value = data[i].id;
                ele.innerHTML = data[i].name;
                document.getElementById("valor").appendChild(ele);
            }
        }
    }
    xhr.open("GET", url, true);
    xhr.send();
*/