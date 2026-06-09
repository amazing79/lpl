let btn = document.getElementById('tramo');
let hdn_total = document.getElementById('hdn_total');
let total_destinos = 0;

async function getDestinosFromOrigin(origin){
    let url =  `./lib/destinos.php?origin=${origin}`;
    let response = await fetch(url);
    if (response.ok) {
        return await response.json();
    }
    throw {
        status: response.status,
        statusText : response.statusText,
        details: "Error al obtener las ciudades de destino"
    }
}

function listarDestinos(origin){

    getDestinosFromOrigin(origin)
        .then(result => {
            let cbo = document.getElementById('destino_0');
            let destinos = result.data;
            let _html = '<option value="0">Seleccione destino</option>';
            if(destinos.length > 0) {
                btn.disabled = false;
            }
            for(const destino of destinos){
                _html += `<option value="${destino.idDestino}">${destino.nombreDestino}</option>`;
            }
            cbo.innerHTML = _html;
        })
        .catch(error => {
            console.log(error.details);
        })
}

function agregarTramo(){
    let cbo_tramo = document.getElementById(`destino_${total_destinos}`);
    let origin = cbo_tramo.value;
    getDestinosFromOrigin(origin)
        .then(result => {
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

        })
        .catch(error => {
            console.log(error.details);
        })
}

function initEvents(){
    let cbo = document.getElementById('origin');
    btn.addEventListener('click', agregarTramo)
    cbo.addEventListener('change', evt => {
        let value = evt.target.value;
        listarDestinos(value);
    })
}

document.addEventListener('DOMContentLoaded', initEvents);