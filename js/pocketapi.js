const start_url = 'https://pokeapi.co/api/v2/pokemon?limit=15'
let nextUrl = null;
let prevUrl = null;

function fetchPokemones(){
    let id = this.id;
    if (id == 'next') {
        getPokemons(nextUrl);
    } else {
        getPokemons(prevUrl);
    }
}

function getPokemons(url = null) {
    let path = url ?? start_url;
    fetch(path)
    .then( response => {
        if(!response.ok) {
            throw new Error('Error al obtener los pokemones!');
        }
        return response.json();
    })
    .then( data => {
        let pokemones = data.results;
        let list = document.getElementById('list');
        let total = document.getElementById('count');
        let html = '';
        pokemones.forEach(pokemon => {
            html += `<li><a href="${pokemon.url}">${pokemon.name}</a></li>`;
        });
        list.innerHTML = html;
        nextUrl = data.next;
        prevUrl = data.previous;
        total.textContent = data.count;
    })
    .catch(error => {
        console.log(error.message);
    })
}

function init() {
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');
    prev.addEventListener('click', fetchPokemones);
    next.addEventListener('click', fetchPokemones);

    getPokemons();
    
}

document.addEventListener('DOMContentLoaded', init);