var allPokemons = []; // {1 : { "id" : 1 ,"name" : "bulbsaur", "img" : url, "type1" : "grass", "type2" : "poison" }}

function filtrar() {

    if (tried.length != 0) {
        try {
            for (var i = 1; i <= 1000; i++) {
                for (let a = 0; a < tried.length; a++) {
                    if (tried[a] == allPokemons[i].name) {
                        allPokemons.splice(i, 1);
                    }
                }
            }
        } catch (error) {
            //console.log("Error obteniendo filter");
        }
    }
}

async function change() {
    let valor = document.getElementById("valor").value.toLowerCase();
    if (valor == '') { document.getElementById("pokemon_select").classList.add('invisible'); return; }
    document.getElementById("pokemon_select").classList.remove('invisible');

    select = document.getElementById('pokemon_select');
    select.innerHTML = "";
    filtrar();

    for (var i = 1; i <= 1000; i++) {
        try {
            if (allPokemons[i].name.includes(valor)) {
                var opt = `<div id="${allPokemons[i].id}" onclick="busca('${allPokemons[i].name}')"><img src="${allPokemons[i].img}" alt="${allPokemons[i].name}_image">${allPokemons[i].name}</div>`

                select.innerHTML += opt;
            }
        } catch (error) {
            //console.log("Error obteniendo filter");
        }
    }
}

async function getPokemonName(num) {
    let url;
    let sigue = true;

    try {
        url = "https://pokeapi.co/api/v2/pokemon/" + num.toString();
    } catch (error) {
        sigue = false;
    }
    if (sigue) {
        let res = await fetch(url);
        let pokemon = await res.json();

        let pokemonID = pokemon["id"];
        let pokemonName = pokemon["name"];
        let pokemonType = pokemon["types"];
        let pokemonImg = pokemon["sprites"]["front_default"];

        res = await fetch(pokemon["species"]["url"]);
        let pokemonSpecies = await res.json();
        
        let pokemonGeneration = pokemonSpecies["generation"]["name"]; // Generacion ✓

        let sigue2 = true;
        if (gens.length > 0) {
            gens[gens.indexOf(1)] = 'generation-i';
            gens[gens.indexOf(2)] = 'generation-ii';
            gens[gens.indexOf(3)] = 'generation-iii';
            gens[gens.indexOf(4)] = 'generation-iv';
            gens[gens.indexOf(5)] = 'generation-v';
            gens[gens.indexOf(6)] = 'generation-vi';
            gens[gens.indexOf(7)] = 'generation-vii';
            gens[gens.indexOf(8)] = 'generation-viii';

            if (gens.indexOf(pokemonGeneration) != -1) {
                sigue2 = true;
            } else {
                sigue2 = false;
            }
        }
        if (sigue2) {
            /******************** TIPOS ********************/
            let type1, type2;
            type1 = pokemonType[0]["type"]["name"]; // Tipo 1 ✓
            try {
                type2 = pokemonType[1]["type"]["name"]; // Tipo 2 ✓
            } catch (error) {
                type2 = 'None';
            }

            allPokemons[num] = { "id": pokemonID, "name": pokemonName, "img": pokemonImg, "type1": type1, "type2": type2 };
        }
    }
}