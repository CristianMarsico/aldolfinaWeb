async function filtrarProductos() {
    let marcas = [];

    document
        .querySelectorAll(".filtro-marca:checked")
        .forEach(cb => {
            marcas.push(cb.value);
        });

    let precio = document.querySelector(
        ".filtro-precio:checked"
    );

    precio = precio ? precio.value : null;

    let formData = new FormData();

    marcas.forEach(m => {
        formData.append("marcas[]", m);
    });

    if (precio) {
        formData.append("precio", precio);
    }

    let response =
        await fetch(`/filtrarHigiene/${id}`, {

            method: "POST",

            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content
            },

            body: formData
        });

    let html = await response.text();

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