var randomPoke, pokedex, tried = [];
var pokemonCount = 1000;

window.onload = async function () {
    randomPoke = Math.floor(Math.random() * 400);
    randomPoke = await getPokemon(randomPoke);
    console.log(randomPoke);

    for (let i = 1; i <= pokemonCount; i++) {
        await getPokemonName(i);
    }
}

async function busca(valor) {

    let pok = valor;
    pokedex = await getPokemon(pok);

    let contiene = false;
    for (let i = 0; i < tried.length; i++) {
        if (tried[i] == pokedex.name) {
            contiene = true;
        }
    }
    if (!contiene) {
        load();
    }
}

async function getPokemon(num) {
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

        let pokemonID = pokemon["id"]; // ID ✓
        let pokemonName = pokemon["name"]; // Nombre ✓
        let pokemonImg = pokemon["sprites"]["front_default"]; // Imagen ✓
        let pokemonType = pokemon["types"]; // Tipos ✓

        res = await fetch(pokemon["species"]["url"]);
        let pokemonSpecies = await res.json();

        let pokemonDesc = pokemonSpecies["flavor_text_entries"][9]["flavor_text"]; // Descripcion  ✓
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
            pokemonHabitat = null;
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
        
        let cadena = { "id": pokemonID, "name": pokemonName, "img": pokemonImg, "type1": type1, "type2": type2, "desc": pokemonDesc, "evolution": pokemonEvolution, "evolved": pokemonEvolved, "color": pokemonColor, "habitat": pokemonHabitat, "generation": pokemonGeneration }
        return cadena;
    }else{
        console.log("No llega");
    }
}



async function load() {
    
    var text_img = document.createElement('div');
    var text_type1 = document.createElement('div');
    var text_type2 = document.createElement('div');
    var text_evolution = document.createElement('div');
    var text_evolved = document.createElement('div');
    var text_color = document.createElement('div');
    var text_habitat = document.createElement('div');
    var text_generation = document.createElement('div');
    

    text_img.innerHTML = `<img src="${pokedex.img}" alt='pokemon_img'>`;
    text_type1.id = `${pokedex.name}_${pokedex.type1}`;
    text_type2.id = `${pokedex.name}_${pokedex.type2}`;
    text_evolution.id = `${pokedex.name}_${pokedex.evolution}`;
    text_evolved.id = `${pokedex.name}_${pokedex.evolved}`;
    text_color.id = `${pokedex.name}_${pokedex.color}`;
    text_habitat.id = `${pokedex.name}_${pokedex.habitat}`;
    text_generation.id = `${pokedex.name}_${pokedex.generation}`;

    if(document.getElementById("pokemon_table").hasChildNodes()){
        document.getElementById("pokemon_table").insertBefore(text_generation,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_habitat,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_color,   document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_evolved,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_evolution,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_type2,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_type1,  document.getElementById("pokemon_table").firstChild);
        document.getElementById("pokemon_table").insertBefore(text_img,  document.getElementById("pokemon_table").firstChild);
    }else{
        document.getElementById("pokemon_table").appendChild(text_img);
        document.getElementById("pokemon_table").appendChild(text_type1);
        document.getElementById("pokemon_table").appendChild(text_type2);
        document.getElementById("pokemon_table").appendChild(text_evolution);
        document.getElementById("pokemon_table").appendChild(text_evolved);
        document.getElementById("pokemon_table").appendChild(text_color);
        document.getElementById("pokemon_table").appendChild(text_habitat);
        document.getElementById("pokemon_table").appendChild(text_generation);
    }

    tried.push(pokedex.name);
    document.getElementById('pokemon_select').replaceChildren(); //Limpiamos lista

    let type1 = document.getElementById(`${pokedex.name}_${pokedex.type1}`);
    let type2 = document.getElementById(`${pokedex.name}_${pokedex.type2}`);
    let evolution = document.getElementById(`${pokedex.name}_${pokedex.evolution}`);
    let evolved = document.getElementById(`${pokedex.name}_${pokedex.evolved}`);
    let color = document.getElementById(`${pokedex.name}_${pokedex.color}`);
    let habitat = document.getElementById(`${pokedex.name}_${pokedex.habitat}`);
    let generacion = document.getElementById(`${pokedex.name}_${pokedex.generation}`);

    type1.innerHTML += pokedex.type1;
    type2.innerHTML += pokedex.type2;
    evolution.innerHTML += pokedex.evolution;
    evolved.innerHTML += pokedex.evolved;
    color.innerHTML += pokedex.color;
    habitat.innerHTML += pokedex.habitat;
    generacion.innerHTML += pokedex.generation;


    /* COMPROBACIONES */
    if (randomPoke.type1 == pokedex.type1) {
        type1.classList.remove('red');
        type1.classList.add('green');
    } else {
        type1.classList.add('red');
        type1.classList.remove('green');
    }
    if (randomPoke.type2 == pokedex.type2) {
        type2.classList.remove('red');
        type2.classList.add('green');
    } else {
        type2.classList.add('red');
        type2.classList.remove('green');
    }
    if (randomPoke.evolution == pokedex.evolution) {
        evolution.classList.remove('red');
        evolution.classList.add('green');
    } else {
        evolution.classList.add('red');
        evolution.classList.remove('green');
    }
    if (randomPoke.evolved == pokedex.evolved) {
        evolved.classList.remove('red');
        evolved.classList.add('green');
    } else {
        evolved.classList.add('red');
        evolved.classList.remove('green');
    }
    if (randomPoke.color == pokedex.color) {
        color.classList.remove('red');
        color.classList.add('green');
    } else {
        color.classList.add('red');
        color.classList.remove('green');
    }
    if (randomPoke.habitat == pokedex.habitat) {
        habitat.classList.remove('red');
        habitat.classList.add('green');
    } else {
        habitat.classList.add('red');
        habitat.classList.remove('green');
    }
    if (randomPoke.generation == pokedex.generation) {
        generacion.classList.remove('red');
        generacion.classList.add('green');
    } else {
        generacion.classList.add('red');
        generacion.classList.remove('green');
    }
}
