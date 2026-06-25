//let btn = document.getElementById('tramo');
let hdn_total = document.getElementById('hdn_total');
let total_destinos = 0;
let btn_search = document.getElementById('search');
let bnt_details = document.getElementById('details');

function callAjaxGetRequest(parameter, callback){
    let url =  `./lib/destinos.php?origin=${parameter}`;
    let ajax = new XMLHttpRequest();
    ajax.open('GET', url, true);
    ajax.onreadystatechange = callback;
    ajax.send(null);
}

function callAjaxRequest(url, callback, options = {}){
    let config = Object.assign({method:'GET', async:true, body:null}, options);
    let ajax = new XMLHttpRequest();
    ajax.open(config.method, url, config.async);
    ajax.onreadystatechange = callback;
    ajax.send(config.body);
}


function listarDestinos(){
    //this referencia al objeto ajax
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
        let cbo = document.getElementById('destino_0');
        let destinos = JSON.parse(this.responseText);
        let _html = '<option value="0">Seleccione destino</option>';
        /*
        if(destinos.data.length > 0) {
            btn.disabled = false;
        }
        */
        for(const destino of destinos.data){
            _html += `<option value="${destino.idDestino}">${destino.nombreDestino}</option>`;
        }
        cbo.innerHTML = _html;
    }
}

function agregarTramo(){
    //this referencia al objeto ajax
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
        let result = JSON.parse(this.responseText);
        let destinos = result.data;
        if(destinos.length > 0) {
            total_destinos++;
            let key = `destino_${total_destinos}`;
            let panel = document.getElementById('panel');
            let fieldset = document.createElement('fieldset');
            let lbl = document.createElement('label');
            lbl.setAttribute('for',key );
            lbl.innerText = 'Destino/parada:';
            let cbo = document.createElement('select');
            cbo.setAttribute("name", key )
            cbo.setAttribute('id', key);
            let _html = '<option value="0">Seleccione destino</option>';

            for(const destino of destinos){
                _html += `<option value="${destino.idDestino}">${destino.nombreDestino}</option>`;
            }
            cbo.innerHTML = _html;
            fieldset.appendChild(lbl);
            fieldset.appendChild(cbo);
            panel.appendChild(fieldset);
            hdn_total.value = total_destinos;

        } else {
            alert('No hay otros destinos desde la ciudad seleccionada');
        }
    }
}

function showClientInfo(){
    //this referencia al objeto ajax
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
        let result = JSON.parse(this.responseText);
        let cliente = result.data;
        if(cliente.length !== 0) {
            let apellido = document.getElementById('apellido');
            let nombre = document.getElementById('nombre');
            let fecha_nacimiento = document.getElementById('fecha_nacimiento');
            let email = document.getElementById('email');

            apellido.innerText = cliente.apellido;
            nombre.innerText = cliente.nombre;
            fecha_nacimiento.innerText = cliente.fecha_nacimiento;
            email.innerText = cliente.email;

        } else {
            alert('Cliente no encontrado! verifique los datos ingresados');
        }
    }
}

function printDetails(){
    //this referencia al objeto ajax
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
        let result = JSON.parse(this.responseText);
        let details = result.data;
        if(details.length !== 0) {
            let display = document.getElementById('display_details');
            let city_origin = document.getElementById('city_origin');
            let city_destination = document.getElementById('city_destination');
            let hora_salida = document.getElementById('hora_salida');
            let hora_llegad = document.getElementById('hora_llegad');
            let duracion = document.getElementById('duracion');

            city_origin.innerText = details.origen;
            city_destination.innerText = details.destino;
            hora_salida.innerText = details.hora_partida;
            hora_llegad.innerText = details.hora_llegada;
            duracion.innerText = details.duracion;
            display.classList.toggle('hide');

        }
    }
}

function searchClients(){
    let filter = document.getElementById('documento').value ?? 0;
    let url = `./lib/clientes.php?dni=${filter}`;
    // getCliente(filter, showClientInfo);
    callAjaxRequest(url, showClientInfo);
}

function showDetails(){
    let origin = document.getElementById('origin').value;
    let destination = document.getElementById('destino_0').value;
    if(origin !== 0 &&  destination !== 0 ){
        //getDetails(origin, destination, printDetails);
        let url = `./lib/details.php?origin=${origin}&destination=${destination}`;
        callAjaxRequest(url, printDetails);
    } else {
        alert('Debe seleccionar origen y destino para mostrar el detalle');
    }

}

function agregarTramoAjax(){
    let cbo_tramo = document.getElementById(`destino_${total_destinos}`);
    let origin = cbo_tramo.value;
    //callAjaxGetRequest(origin, agregarTramo);
    let url =  `./lib/destinos.php?origin=${origin}`;
    callAjaxRequest(url, agregarTramo);
}

function initEvents(){
    let cbo = document.getElementById('origin');
    //btn.addEventListener('click', agregarTramoAjax)
    bnt_details.addEventListener('click', showDetails);
    btn_search.addEventListener('click', searchClients);
    cbo.addEventListener('change', evt => {
        let value = evt.target.value;
        let url = `/lib/destinos.php?origin=${value}`;
        //callAjaxGetRequest(value, listarDestinos);
        callAjaxRequest(url, listarDestinos);
    })
}

document.addEventListener('DOMContentLoaded', initEvents);