let cuerpoTabla = document.querySelector("table.campos > tbody");

function vaciarTabla() {
    let filasTabla = document.querySelectorAll("table.campos > tbody tr");
    for (let fila of filasTabla) {
        if (fila.id != "filaFormulario") {
            fila.remove();
        }
    }
}

function llenarTabla(json) {
    vaciarTabla();
    for (let persona of json.personas) {
        let fila = document.createElement("tr");
        fila.innerHTML = "<td>" + persona.dni
                        + "</td><td>" + persona.nombre
                        + "</td><td>" + persona.apellido_1
                        + "</td><td>" + persona.apellido_2
                        + "</td><td>" + persona.fecha_de_nac
                        + "</td><td>" + persona.genero
                        + "</td><td>" + persona.vivo
                        + "</td><td>" + persona.descripcion
                        + "</td><td><button><img src='/img/editar.png' alt='editar' height='100%' width='100%'></button></td>";
        cuerpoTabla.innerHTML = fila.innerHTML + cuerpoTabla.innerHTML;
    }
}

function getPersonas() {
    fetch("/crud/personas", {method: "GET"})
        .then(respuesta => respuesta.json())
        .then(json => llenarTabla(json));
}

function ponerPersonaEnTabla(persona) {
    if (persona.encontrado == 0) { alert("No se ha encontrado ningún resultado"); return null; }
    vaciarTabla();
    let fila = document.createElement("tr");
    fila.innerHTML = "<td>" + persona.dni
                    + "</td><td>" + persona.nombre
                    + "</td><td>" + persona.apellido_1
                    + "</td><td>" + persona.apellido_2
                    + "</td><td>" + persona.fecha_de_nac
                    + "</td><td>" + persona.genero
                    + "</td><td>" + persona.vivo
                    + "</td><td>" + persona.descripcion
                    + "</td><td><button><img src='/img/editar.png' alt='editar' height='100%' width='100%'></button></td>";
    cuerpoTabla.innerHTML = fila.innerHTML + cuerpoTabla.innerHTML;
}

function buscarPersona(formulario) {
    let inputDni = formulario.querySelector("input[name=dni]");
    fetch("/crud/persona/" + inputDni.value, {method: "GET"})
        .then(respuesta => respuesta.json())
        .then(json => ponerPersonaEnTabla(json));
    inputDni.value = "";
}

getPersonas();