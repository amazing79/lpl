let btn = document.getElementById('tramo');
let hdn_total = document.getElementById('hdn_total');
let total_destinos = 0;

function callAjaxGetRequest(parameter, callback){
    let url =  `./lib/destinos.php?origin=${parameter}`;
    let ajax = new XMLHttpRequest();
    ajax.open('GET', url, true);
    ajax.onreadystatechange = callback;
    ajax.send(null);
}

function listarDestinos(){
    //this referencia al objeto ajax
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
        let cbo = document.getElementById('destino_0');
        let destinos = JSON.parse(this.responseText);
        let _html = '<option value="0">Seleccione destino</option>';
        if(destinos.data.length > 0) {
            btn.disabled = false;
        }
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

function agregarTramoAjax(){
    let cbo_tramo = document.getElementById(`destino_${total_destinos}`);
    let origin = cbo_tramo.value;
    callAjaxGetRequest(origin, agregarTramo);
}

function initEvents(){
    let cbo = document.getElementById('origin');
    btn.addEventListener('click', agregarTramoAjax)
    cbo.addEventListener('change', evt => {
        let value = evt.target.value;
        callAjaxGetRequest(value, listarDestinos);
    })
}

document.addEventListener('DOMContentLoaded', initEvents);