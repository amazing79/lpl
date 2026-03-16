function obtenerCookie(nombre) {
        let cookies = document.cookie.split(';');
        for (let c of cookies) {
            let [key, value] = c.trim().split('=');
            if (key === nombre) {
                return value;
            }
        }
        return null;
    }


document.cookie = "usuario=chester; 01 Jan 2027 00:00:00 UTC: path-/";
document.cookie = "tema=oscuro; 01 Jan 2027 00:00:00 UTC: path-/";
document.cookie ="cookieBorrable='me van a borrar'; expires=Thu, 01 Jan 9999 00:00:00 GMT";


//document.cookie = "usuario=;" //no borra la cookie, solo limpia el valor actual

//document.cookie = "usuario=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
//document.cookie = "usuario=; max-age=0; path=/";
console.log(document.cookie);
console.log(obtenerCookie('tema'));

const resetBtn = document.getElementById("reset");
const clearBtn = document.getElementById("clear");
const output = document.getElementById("output");
const consultarBtn = document.getElementById("consultar");

resetBtn.addEventListener("click", () => {

    document.cookie ="cookieBorrable=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    output.innerHTML += "<p>cookie eliminada!</p>";
    output.innerHTML += `<p>Cookies disponibles ${document.cookie} </p>`;
    console.log(document.cookie);
});

clearBtn.addEventListener("click", () => {
  output.textContent = "";
});

consultarBtn.addEventListener('click', () => {
    let clave = document.getElementById("clave");
    let find = clave.value.trim();
    if (find == ''){
        alert('debe ingresar un valor');
    } else {
        let result = obtenerCookie(find) ?? 'no existe un valor asociado a dicha clave o la misma ha sido eliminada';
        output.innerHTML += `<p>valor para ${find} es ${result}`;
    }
})

window.document.addEventListener('DOMContentLoaded', function(){
     output.innerHTML += `<p>Cookies disponibles ${document.cookie} </p>`;
})

