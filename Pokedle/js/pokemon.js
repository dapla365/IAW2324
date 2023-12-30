let totalPokemons = 0;
let URL_POKEMON = 'https://pokeapi.co/api/v2/pokemon/';
let URL_GENERACION = 'https://pokeapi.co/api/v2/generation/';
let URL_POKEMON_SPECIES = 'https://pokeapi.co/api/v2/pokemon-species/';
let URL_EVOLUTION_CHAIN = 'https://pokeapi.co/api/v2/evolution-chain/';
let gens = [], pokedex = [], pokemonRandom = [];
let minimo, maximo;

async function play() {
    //await obtenerTotalPokemon();
    displayAnimation();

    await guardarPokedex();
    setTimeout(() => {
        guardarPokemonRandom();
    }, 1000);
}

function obtenerPokedex() {
    console.log(minimo);
    console.log(maximo);

    for (let i = minimo; i <= maximo; i++) {
        console.log(pokedex[i]);
    }
}

/************************* TOTAL POKEMONS *************************/
function obtenerTotalPokemon() {
    for (let a = 0; a < gens.length; a++) {
        fetch(URL_GENERACION + gens[a])
            .then((response) => response.json())
            .then((data) => {
                totalPokemons += data["pokemon_species"].length;
            })
    }
}

/************************* POKEDEX *************************/
async function guardarPokedex() {
    for (let a = 1; a <= 8; a++) {
        if (gens[a] != undefined) {
            await fetch(URL_GENERACION + gens[a])
                .then((response) => response.json())
                .then(async (data) => {

                    let p = data["pokemon_species"][0]["url"];
                    let f = data["pokemon_species"][(data["pokemon_species"].length) - 1]["url"];
                    p = p.replace(URL_POKEMON_SPECIES, "").replace("/", "");
                    f = f.replace(URL_POKEMON_SPECIES, "").replace("/", "");
                    f = parseInt(f) + 2;

                    if (minimo > p || minimo == undefined) minimo = p;
                    if (maximo < f || maximo == undefined) maximo = f;

                    for (let i = p; i <= f; i++) {
                        guardarPokemonPokedex(i);
                    }
                })
        }
    }
}
async function guardarPokemonPokedex(id) {

    let url;
    let sigue = true;

    try {
        url = URL_POKEMON + id.toString();
    } catch (error) {
        sigue = false;
    }
    if (sigue) {
        let res = await fetch(url);
        let pokemon = await res.json();

        let pokemonID = pokemon["id"]; // ID ✓
        let pokemonName = pokemon["species"]["name"]; // Nombre ✓
        let pokemonImg = pokemon["sprites"]["front_default"]; // Imagen ✓
        let pokemonType = pokemon["types"]; // Tipos ✓

        res = await fetch(pokemon["species"]["url"]);
        let pokemonSpecies = await res.json();

        let pokemonColor = pokemonSpecies["color"]["name"]; // Color ✓
        let pokemonGeneration = pokemonSpecies["generation"]["name"]; // Generacion ✓

        res = await fetch(pokemonSpecies["evolution_chain"]["url"]);
        let pokemonEvo = await res.json();

        /******************** GENERACION ********************/
        pokemonGeneration = pokemonGeneration.replace("generation-", '');
        pokemonGeneration = pokemonGeneration.replaceAll("i", 'I');
        pokemonGeneration = pokemonGeneration.replaceAll("v", 'V');

        /******************** HABITAT ********************/
        let pokemonHabitat;
        try {
            pokemonHabitat = pokemonSpecies["habitat"]["name"]; // Habitat ✓
        } catch (error) {
            pokemonHabitat = 'None';
        }

        /******************** TIPOS ********************/
        let type1, type2;
        type1 = pokemonType[0]["type"]["name"]; // Tipo 1 ✓
        try {
            type2 = pokemonType[1]["type"]["name"]; // Tipo 2 ✓
        } catch (error) {
            type2 = 'None';
        }

        /******************** EVOLUCIONES ********************/
        let poke1 = pokemonEvo["chain"]["species"]["name"]; // Primera evolucion ✓ 
        let poke2, poke3;
        try {
            poke2 = pokemonEvo["chain"]["evolves_to"][0]["species"]["name"]; // Segunda evolucion ✓
        } catch (error) {
            poke2 = null;
        }
        try {
            poke3 = pokemonEvo["chain"]["evolves_to"][0]["evolves_to"][0]["species"]["name"]; // Tercera evolucion ✓
        } catch (error) {
            poke3 = null;
        }
        let pokemonEvolved, pokemonEvolution;

        if (poke2 == null) {
            //No tiene evolucion 2
            pokemonEvolved = true;
            pokemonEvolution = 1;
        } else {
            //Tiene evolucion 2
            if (poke3 == null) {
                //No tiene evolucion 3
                if (pokemonName == poke1) {
                    pokemonEvolution = 1;
                    pokemonEvolved = false;
                }
                if (pokemonName == poke2) {
                    pokemonEvolution = 2;
                    pokemonEvolved = true;
                }
            } else {
                //Tiene evolucion 3
                if (pokemonName == poke1) {
                    pokemonEvolved = false;
                    pokemonEvolution = 1;
                }
                if (pokemonName == poke2) {
                    pokemonEvolved = false;
                    pokemonEvolution = 2;
                }
                if (pokemonName == poke3) {
                    pokemonEvolution = 3;
                    pokemonEvolved = true;
                }
            }
        }

        pokedex[id] = { "id": pokemonID, "name": pokemonName, "img": pokemonImg, "type1": type1, "type2": type2, "evolution": pokemonEvolution, "evolved": pokemonEvolved, "color": pokemonColor, "habitat": pokemonHabitat, "generation": pokemonGeneration }
    } else {
        console.log("No tiene generacion igual");
    }
}

function obtenerPokemon(id) {
    for (let i = minimo; i <= maximo; i++) {
        if(pokedex[i] == undefined) continue;
        if (pokedex[i].id == id || pokedex[i].name == id) {
            return pokedex[i];
        }
    }
    return undefined;
}

/************************* POKEMON RANDOM *************************/
function guardarPokemonRandom() {
    let random = Math.floor(Math.random() * (parseInt(maximo) - parseInt(minimo))) + parseInt(minimo);

    if (pokedex[random] == undefined) {
        guardarPokemonRandom();
    } else {
        pokemonRandom = pokedex[random];
        console.log(pokemonRandom);
        displayOn();
    }
}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * max) + min;
}

/************************* SELECT *************************/

function change() {
    let valor = document.getElementById("valor").value.toLowerCase();
    if (valor == '') { document.getElementById("pokemon_select").classList.remove('playing'); return; }
    document.getElementById("pokemon_select").classList.add('playing');

    select = document.getElementById('pokemon_select');
    select.innerHTML = "";

    for (var i = minimo; i <= maximo; i++) {
        try {
            if (pokedex[i].name.includes(valor)) {
                var opt = `<div id="${pokedex[i].id}" onclick="busca('${pokedex[i].name}')"><img src="${pokedex[i].img}" alt="${pokedex[i].name}_image">${pokedex[i].name}</div>`

                select.innerHTML += opt;
            }
        } catch (error) {
            //console.log("Error obteniendo filter");
        }
    }
}


/************************* CARGAR *************************/
async function busca(valor) {
    let pok = await obtenerPokemon(valor);

    if (pok != undefined) {
        document.getElementById('valor').value = "";
        load(pok.id);
    }
}

function load(id) {
    var text_img = document.createElement('div');
    var text_type1 = document.createElement('div');
    var text_type2 = document.createElement('div');
    var text_evolution = document.createElement('div');
    var text_evolved = document.createElement('div');
    var text_color = document.createElement('div');
    var text_habitat = document.createElement('div');
    var text_generation = document.createElement('div');
    try {

        text_img.innerHTML = `<img src="${pokedex[id].img}" alt='pokemon_img'>`;
        text_type1.id = `${pokedex[id].name}_${pokedex[id].type1}`;
        text_type2.id = `${pokedex[id].name}_${pokedex[id].type2}`;
        text_evolution.id = `${pokedex[id].name}_${pokedex[id].evolution}`;
        text_evolved.id = `${pokedex[id].name}_${pokedex[id].evolved}`;
        text_color.id = `${pokedex[id].name}_${pokedex[id].color}`;
        text_habitat.id = `${pokedex[id].name}_${pokedex[id].habitat}`;
        text_generation.id = `${pokedex[id].name}_${pokedex[id].generation}`;

        if (document.getElementById("pokemon_table").hasChildNodes()) {
            document.getElementById("pokemon_table").insertBefore(text_generation, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_habitat, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_color, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_evolved, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_evolution, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_type2, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_type1, document.getElementById("pokemon_table").firstChild);
            document.getElementById("pokemon_table").insertBefore(text_img, document.getElementById("pokemon_table").firstChild);
        } else {
            document.getElementById("pokemon_table").appendChild(text_img);
            document.getElementById("pokemon_table").appendChild(text_type1);
            document.getElementById("pokemon_table").appendChild(text_type2);
            document.getElementById("pokemon_table").appendChild(text_evolution);
            document.getElementById("pokemon_table").appendChild(text_evolved);
            document.getElementById("pokemon_table").appendChild(text_color);
            document.getElementById("pokemon_table").appendChild(text_habitat);
            document.getElementById("pokemon_table").appendChild(text_generation);
        }

        let type1 = document.getElementById(`${pokedex[id].name}_${pokedex[id].type1}`);
        let type2 = document.getElementById(`${pokedex[id].name}_${pokedex[id].type2}`);
        let evolution = document.getElementById(`${pokedex[id].name}_${pokedex[id].evolution}`);
        let evolved = document.getElementById(`${pokedex[id].name}_${pokedex[id].evolved}`);
        let color = document.getElementById(`${pokedex[id].name}_${pokedex[id].color}`);
        let habitat = document.getElementById(`${pokedex[id].name}_${pokedex[id].habitat}`);
        let generacion = document.getElementById(`${pokedex[id].name}_${pokedex[id].generation}`);

        type1.innerHTML = pokedex[id].type1;
        type2.innerHTML = pokedex[id].type2;
        evolution.innerHTML = pokedex[id].evolution;
        evolved.innerHTML = pokedex[id].evolved;
        color.innerHTML = pokedex[id].color;
        habitat.innerHTML = pokedex[id].habitat;
        generacion.innerHTML = pokedex[id].generation;


        /* COMPROBACIONES */
        if (pokemonRandom.type1 == pokedex[id].type1) {
            type1.classList.remove('red');
            type1.classList.add('green');
        } else {
            type1.classList.add('red');
            type1.classList.remove('green');
        }
        if (pokemonRandom.type2 == pokedex[id].type2) {
            type2.classList.remove('red');
            type2.classList.add('green');
        } else {
            type2.classList.add('red');
            type2.classList.remove('green');
        }
        if (pokemonRandom.evolution == pokedex[id].evolution) {
            evolution.classList.remove('red');
            evolution.classList.add('green');
        } else {
            evolution.classList.add('red');
            evolution.classList.remove('green');
        }
        if (pokemonRandom.evolved == pokedex[id].evolved) {
            evolved.classList.remove('red');
            evolved.classList.add('green');
        } else {
            evolved.classList.add('red');
            evolved.classList.remove('green');
        }
        if (pokemonRandom.color == pokedex[id].color) {
            color.classList.remove('red');
            color.classList.add('green');
        } else {
            color.classList.add('red');
            color.classList.remove('green');
        }
        if (pokemonRandom.habitat == pokedex[id].habitat) {
            habitat.classList.remove('red');
            habitat.classList.add('green');
        } else {
            habitat.classList.add('red');
            habitat.classList.remove('green');
        }
        if (pokemonRandom.generation == pokedex[id].generation) {
            generacion.classList.remove('red');
            generacion.classList.add('green');
        } else {
            generacion.classList.add('red');
            generacion.classList.remove('green');
        }
        if(pokedex[id].name == pokemonRandom.name){
            displayRetry();
            $(".inputs").removeAttr("disabled");
        }

        pokedex[id] = undefined;
    } catch (error) {
        console.log(error);
    }
}



/************************* DISPLAY *************************/
function displayAnimation(){
    document.getElementById("pokeball-img").classList.remove('invisible');
}
function displayOn(){
    document.getElementById("pokeball-img").classList.add('invisible');
    document.getElementById("valor").classList.add('playing');
    document.getElementById("names").classList.add('playing');
    document.getElementById("pokemon_table").classList.add('playing');  
    document.getElementById("retry").classList.add('playing'); 
}

/************************* RETRY *************************/
function displayRetry(){
    document.getElementById("pokeball-img").classList.add('invisible');
    document.getElementById("valor").classList.remove('playing');
    document.getElementById("pokemon_select").classList.remove('playing');
    document.getElementById("names").classList.add('playing');
    document.getElementById("pokemon_table").classList.add('playing');  
    document.getElementById("retry").classList.remove('playing'); 
}
