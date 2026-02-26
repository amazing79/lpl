let personaje = document.getElementById("ninja");
let fotograma = 0;
let flechaDerecha = false;
let flechaIzquierda = false;
let sinPresionar = true;
let positionX = 0;

const animar = () => {
    if(sinPresionar){
        personaje.src = `assets/sprites/ninja/idle/Idle__00${fotograma}.png`;
    } else if (flechaDerecha || flechaIzquierda) {
        personaje.src = `assets/sprites/ninja/run/Run__00${fotograma}.png`;
        let dir = flechaDerecha ? 1 : -1;
        mover(personaje, 10, dir)
    }
    fotograma++;
    if(fotograma == 10) {
        fotograma = 0;
    }
}

document.addEventListener("keydown", (event) => {
    switch (event.key){
        case "ArrowRight":
            flechaDerecha = true;
            break
        case "ArrowLeft":
            flechaIzquierda = true;
    }
    sinPresionar = false;
})
document.addEventListener("keyup", (event) => {
    flechaDerecha = false;
    flechaIzquierda = false;
    sinPresionar = true;
})

const mover = (pic, step, direction) => {
    positionX += (step * direction);
    pic.style.left = `${positionX}px`;
    pic.style.transform = `scaleX(${direction})`;
}

setInterval(animar, 40);
