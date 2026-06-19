async function filtrarProductos() {

    let marcas = [];

    // EDAD SELECCIONADA
    let edad = document.querySelector(
        ".filtro-edad:checked"
    );

    edad = edad ? edad.value : null;

    // MARCAS
    document
        .querySelectorAll(".filtro-marca:checked")
        .forEach(cb => {

            marcas.push(cb.value);

        });

    // PRECIO
    let precio = document.querySelector(
        ".filtro-precio:checked"
    );

    precio = precio ? precio.value : null;

    // FORM DATA
    let formData = new FormData();

    marcas.forEach(m => {

        formData.append("marcas[]", m);

    });

    // EDAD
    if (edad) {

        formData.append("edad", edad);

    }

    // PRECIO
    if (precio) {

        formData.append("precio", precio);

    }

    // FETCH
    let response =
        await fetch(`/filtrarPanales/${id}`, {

            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData

        });

    let html = await response.text();

    // REEMPLAZAR PRODUCTOS
    document
        .getElementById("contenedor-productos")
        .innerHTML = html;
}


// =======================
// EVENTOS MARCAS
// =======================

document
    .querySelectorAll(".filtro-marca")
    .forEach(cb => {

        cb.addEventListener(
            "change",
            filtrarProductos
        );

    });


// =======================
// EVENTOS EDADES
// =======================

document
    .querySelectorAll(".filtro-edad")
    .forEach(radio => {

        radio.addEventListener(
            "change",
            filtrarProductos
        );

    });


// =======================
// EVENTOS PRECIOS
// =======================

document
    .querySelectorAll(".filtro-precio")
    .forEach(radio => {

        radio.addEventListener(
            "change",
            filtrarProductos
        );

    });


// =======================
// LIMPIAR FILTROS
// =======================

document
    .getElementById("btn-limpiar-filtros")
    .addEventListener("click", () => {

        // MARCAS
        document
            .querySelectorAll(".filtro-marca")
            .forEach(cb => {

                cb.checked = false;

            });

        // EDADES
        document
            .querySelectorAll(".filtro-edad")
            .forEach(radio => {

                radio.checked = false;

            });

        // PRECIOS
        document
            .querySelectorAll(".filtro-precio")
            .forEach(radio => {

                radio.checked = false;

            });

        // RECARGAR
        filtrarProductos();

    });
