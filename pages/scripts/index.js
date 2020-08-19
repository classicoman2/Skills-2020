let cuerpoTabla = document.querySelector("table.campos > tbody");
let formularioInsertar = document.getElementById("insertar");

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
                        + "</td><td><button onclick='abrirEditar(\"" + persona.dni
                        + "\");'><img src='/img/editar.png' alt='editar' height='100%' width='100%'></button></td>";
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
                    + "</td><td><button onclick='abrirEditar(\"" + persona.dni
                    + "\");'><img src='/img/editar.png' alt='editar' height='100%' width='100%'></button></td>";
    cuerpoTabla.innerHTML = fila.innerHTML + cuerpoTabla.innerHTML;
}

function buscarPersona(formulario) {
    let inputDni = formulario.querySelector("input[name=dni]");
    fetch("/crud/persona/" + inputDni.value, {method: "GET"})
        .then(respuesta => respuesta.json())
        .then(json => ponerPersonaEnTabla(json))
        .catch(error => console.log(error));
    inputDni.value = "";
}

function anadirPersona() {
    let fila = document.querySelector("tr#filaFormulario");
    let datosFormulario = {
        "dni": fila.querySelector("input[name=dni]").value,
        "nombre": fila.querySelector("input[name=nombre]").value,
        "papellido": fila.querySelector("input[name=papellido]").value,
        "sapellido": fila.querySelector("input[name=sapellido]").value,
        "fechanac": fila.querySelector("input[name=fechanac]").value,
        "genero": fila.querySelector("select[name=genero]").value,
        "vivo": fila.querySelector("input[name=vivo]").value,
        "descripcion": fila.querySelector("textarea[name=descripcion]").value
    };

    fetch("/crud/anadir", {
        method: 'POST',
        body: JSON.stringify(datosFormulario),
        headers:{
          'Content-Type': 'application/json'
        }})
        .then(respuesta => respuesta.json())
        .then(function(json) {
            if (json.anadido != true) { alert("No se ha añadido la persona"); }
            else { alert("Añadido"); getPersonas(); }
        });
}

function abrirEditar(dni) {
    let divFormulario = document.querySelector("div#editarFormulario");
    divFormulario.style.display = "block";
    document.querySelector("div#tapar").style.display = "block";
    divFormulario.querySelector("div#eliminarPersona").onclick = () => eliminarPersona(dni);
}

function cerrarEditar(divFormulario) {
    divFormulario.style.display = "none";
    document.querySelector("div#tapar").style.display = "none";
}

function eliminarPersona(dni) {
    if (!confirm("¿Estas seguro que quieres eliminar esta persona?")) {return}

    let divFormulario = document.querySelector("div#editarFormulario");

    fetch("/crud/delete/" + dni, {method: "DELETE"})
        .then(respuesta => respuesta.json())
        .then(json => {
            if (json.eliminado) {
                alert("Se ha eliminado correctamente");
                cerrarEditar(divFormulario);
            } else {
                alert("No se ha eliminado la persona con DNI: " + dni);
            }
        });
}

getPersonas();