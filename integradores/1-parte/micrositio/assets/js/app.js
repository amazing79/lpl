const cookie_sesion = 'sesion';
const login_path = 'login.html';


function getCookieValue(key){
    let cookies = document.cookie;
    let arr_values = cookies.split(';');
    let value = null;
    arr_values.forEach(cookie => {
        let values = cookie.split('=');
        if(values[0] == key) {
            value = values[1];
        }
    });
    return value;
}


function initAppsEvents(){
   
        let login = document.getElementById('frm_login') ?? null;
        let register = document.getElementById('frm_register') ?? null;
        let logout = document.getElementById('logout') ?? null;

        if(login !== null) {
            login.addEventListener('submit', evt => {
                evt.preventDefault();
                document.cookie = `${cookie_sesion}=started;path=/`;
                window.location = 'dashboard.html';
            });
        }

        if(logout !== null) {
            logout.addEventListener('click', evt => {
                evt.preventDefault();
                document.cookie = `${cookie_sesion}=;expires=Thu, 01 jan 1970 00:00:00 UTC;path=/`;
                window.location = login_path;
            });
        }

        if(register !== null) {
            register.addEventListener('submit', evt => {
                evt.preventDefault();
                window.location = login_path;
            })
        }
}

document.addEventListener('DOMContentLoaded', initAppsEvents);