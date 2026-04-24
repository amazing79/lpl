const cookie_sesion = 'sesion';
const login_path = 'login.html';


function getCookieValue(key){
    let cookies = document.cookie;
    let arr_values = cookies.split(';');
    let value = null;
    arr_values.forEach(cookie => {
        let values = cookie.trim().split('=');
        if(values[0] == key) {
            value = values[1];
        }
    });
    return value;
}

function checkIsValidUser() {
    let temp = localStorage.getItem('users');
    let isValid = false;
    if (temp != null){
        //hay almenos un usuario
        let userdb = JSON.parse(temp);
        let user = document.getElementById('usuario').value;
        let password = document.getElementById('password').value;
        userdb.forEach( row => {
            if(row[3] == password.trim() && row[2] == user.trim()){
                isValid = true;
            }
        })
    }

    return isValid;
}

function registerUser() {
    let success = false;
    let existe = false;
    let db = localStorage.getItem('users');
    if (db == null) {
        db = [];
    } else {
        db = JSON.parse(db);
    }
    let row = [];
    let apellido = document.getElementById('apellido').value;
    let nombre = document.getElementById('nombre').value 
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    row[0] = apellido;
    row[1] = nombre;
    row[2] = email;
    row[3] = password;
    db.forEach(user => {
        if (user[2] == email) {
            existe = true;
        }
    })
    if (existe) {
        return success;
    }
    db.push(row);
    localStorage.setItem('users', JSON.stringify(db));
    success = true;
    return success;
}

function isActiveSession(){
    let cookie_value = getCookieValue(cookie_sesion);
    return cookie_value === 'started';
}


function initAppsEvents(){
   
        let login = document.getElementById('frm_login') ?? null;
        let register = document.getElementById('frm_register') ?? null;
        let logout = document.getElementById('logout') ?? null;

        if(login !== null) {
            login.addEventListener('submit', evt => {
                evt.preventDefault();
                if (checkIsValidUser()){
                    document.cookie = `${cookie_sesion}=started;path=/`;
                    let visits = getCookieValue('visitas');
                    if (visits == null){
                        document.cookie = `visitas=1;path=/`;
                    } else {
                        visits = parseInt(visits) + 1;
                        document.cookie = `visitas=${visits};path=/`;
                    }
                    window.location = 'dashboard.html';
                } else {
                    console.error('usuario no encontrado');
                    alert('User not found');
                }
            });
        }

        if(logout !== null) {
            //estoy en dasboard
            if(isActiveSession()) {
                let mensaje = document.getElementById('contador');
                let visitas = getCookieValue('visitas');

                if(parseInt(visitas) == 1) {
                    mensaje.innerText = 'Bienvenido por primera vez';
                } else {
                    mensaje.innerText = 'Bienvenido nuevamente! es un placer tenerte por aqui';
                }
                logout.addEventListener('click', evt => {
                    evt.preventDefault();
                    document.cookie = `${cookie_sesion}=;expires=Thu, 01 jan 1970 00:00:00 UTC;path=/`;
                    window.location = login_path;
                });
            } else {
                console.log('no hay session active');
                window.location = login_path;
            }
           
        }

        if(register !== null) {
            register.addEventListener('submit', evt => {
                evt.preventDefault();
                if (registerUser()) {
                    window.location = login_path;
                } else {
                    alert('Hubo un problema al registrar el usuario, problablemente ya existe otro usuario con ese mail');
                    console.error('hubo un error al dar de alta el usuario');
                }
               
            })
        }
}

document.addEventListener('DOMContentLoaded', initAppsEvents);