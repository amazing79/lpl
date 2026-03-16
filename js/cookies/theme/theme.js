function setCookie(nombre, valor, dias) {

    let fecha = new Date();
    fecha.setTime(fecha.getTime() + (dias*24*60*60*1000));

    let expires = "expires=" + fecha.toUTCString();

    document.cookie = nombre + "=" + valor + ";" + expires + ";path=/";
}

function getCookie(nombre) {

    let cookies = document.cookie.split(';');

    for(let c of cookies){

        let [key,value] = c.trim().split('=');

        if(key === nombre){
            return value;
        }

    }

    return null;
}

function aplicarTema(){

    let tema = getCookie("tema");

    if(!tema){
        tema = "light";
    }

    document.body.classList.remove("light","dark");
    document.body.classList.add(tema);
}

function setDark(){

    setCookie("tema","dark",30);
    aplicarTema();
}

function setLight(){

    setCookie("tema","light",30);
    aplicarTema();
}

window.onload = aplicarTema;