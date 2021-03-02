const cajaPokemons = document.querySelector(".caja-pokemons");
let documentFragment = document.createDocumentFragment();

const getRandomInt = (min, max) => {
    return Math.floor(Math.random() * (max - min)) + min;
}

const getInfoPokemons = async (id) =>{
	try{
		const info = await axios(`https://pokeapi.co/api/v2/pokemon/${id}`);
		return info.data;
	}catch(e){
		console.log(e)
	}
}




for (let i = 0; i < 8; i++) {
	const ramdom = getRandomInt(1, 152);
	let pokemon = document.createElement("DIV");
	let imgPokemonDiv =document.createElement("DIV");
	let imgPokemonDivDiv =document.createElement("DIV");
	let imgPokemon = document.createElement("IMG");
	let pokemonInfo = document.createElement("DIV");
	let nombre = document.createElement("H2");
	let hp = document.createElement("P");
	let exp = document.createElement("P");
	let pokemonHabilidades = document.createElement("DIV");
	let ataque = document.createElement("P");
	let especial = document.createElement("P");
	let defensa = document.createElement("P");
	let ataqueNombre = document.createElement("P");
	let especialNombre = document.createElement("P");
	let defensaNombre = document.createElement("P");

	getInfoPokemons(ramdom)
		.then(info=>{

/***************************creacion de la imagen del pokemon***********************************/
			imgPokemonDiv.classList.add("pokemon__img");
			imgPokemonDivDiv.classList.add("img-div-pokemon");
			imgPokemon.classList.add("img-pokemon");

			imgPokemon.src = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${info.id}.png`;
			imgPokemonDivDiv.appendChild(imgPokemon);
			imgPokemonDiv.appendChild(imgPokemonDivDiv);


/************************creacion de la info del pokemon****************************************/
			pokemonInfo.classList.add("pokemon__info");
			nombre.classList.add("pokemon__nombre");
			hp.classList.add("pokemon__hp");
			exp.classList.add("pokemon__exp");

			nombre.innerText = info.name;
			hp.innerText = info.stats[0].base_stat+"hp";
			exp.innerText = info.base_experience+"exp";

			pokemonInfo.appendChild(nombre);
			pokemonInfo.appendChild(hp);
			pokemonInfo.appendChild(exp);

/************************creacion de las habilidades del pokemon*****************************/

			pokemonHabilidades.classList.add("pokemon__habilidades")
			ataque.classList.add("pokemon__ataque");
			especial.classList.add("pokemon__especial");
			defensa.classList.add("pokemon__defensa");

			ataque.innerText = info.stats[1].base_stat+"K";
			especial.innerText = info.stats[3].base_stat+"K";
			defensa.innerText = info.stats[2].base_stat+"K";
			ataqueNombre.innerText = "Ataque";
			especialNombre.innerText = "Ataque especial";
			defensaNombre.innerText = "Defensa";

			pokemonHabilidades.appendChild(ataque);
			pokemonHabilidades.appendChild(especial);
			pokemonHabilidades.appendChild(defensa);
			pokemonHabilidades.appendChild(ataqueNombre);
			pokemonHabilidades.appendChild(especialNombre);
			pokemonHabilidades.appendChild(defensaNombre);

/******************agregar todo a caja pokemon**************************************************/
			pokemon.classList.add("pokemon");

			pokemon.appendChild(imgPokemonDiv);
			pokemon.appendChild(pokemonInfo);
			pokemon.appendChild(pokemonHabilidades);
		});
	documentFragment.appendChild(pokemon);
}
cajaPokemons.appendChild(documentFragment);