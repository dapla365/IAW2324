var pokedex = {};
window.onload = async function() {
    getPokemon(6);
    console.log(pokedex);
}

async function busca() {
    let pok = $('#valor').value;
    //await getPokemon(pok);
}

async function getPokemon(num) {
    let url = "https://pokeapi.co/api/v2/pokemon/" + num.toString();

    let res = await fetch(url);
    let pokemon = await res.json();
    //console.log(pokemon);

    let pokemonName = pokemon["name"]; // Nombre
    let pokemonImg = pokemon["sprites"]["front_default"]; // Imagen
    let pokemonType = pokemon["types"]; // Tipos

    res = await fetch(pokemon["species"]["url"]);
    let pokemonSpecies = await res.json();

    let pokemonDesc = pokemonSpecies["flavor_text_entries"][9]["flavor_text"]; // Descripcion
    let pokemonColor = pokemonSpecies["color"]["name"]; // Color
    let pokemonHabitat = pokemonSpecies["habitat"]["name"]; // Habitat
    let pokemonGeneration = pokemonSpecies["generation"]["name"]; // Generacion

    res = await fetch(pokemonSpecies["evolution_chain"]["url"]);
    let pokemonEvo = await res.json();

    let pokemonEvolved = pokemonEvo["chain"]["evolution_details"]; // Evolved
    let pokemonEvolution = pokemonEvo["evolves_to"]; // Evolucion
    //console.log(pokemonColor);

    pokedex[num] = { "name": pokemonName, "img": pokemonImg, "types": pokemonType, "desc": pokemonDesc, "evolution": pokemonEvolution, "evolved": pokemonEvolved, "color": pokemonColor, "habitat": pokemonHabitat , "generation": pokemonGeneration};

}