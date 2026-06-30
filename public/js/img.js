document.addEventListener('DOMContentLoaded', () => {

    // ==========================
    // AGREGAR IMAGEN
    // ==========================
    document
        .querySelectorAll('.btn-add-imagen')
        .forEach(btn => {

            btn.addEventListener('click', () => {

                const fila =
                    btn.closest('tr');

                const nombre =
                    fila.querySelector(
                        'td:first-child'
                    ).innerText.trim();

                document
                    .getElementById(
                        'id_producto'
                    ).value =
                    btn.dataset.producto;

                document
                    .getElementById(
                        'nombre_producto'
                    ).value =
                    nombre;

                document
                    .getElementById(
                        'principal'
                    ).checked = false;

            });

        });


    // ==========================
    // IMAGEN PRINCIPAL
    // ==========================
    document
        .querySelectorAll('.btn-principal')
        .forEach(btn => {

            btn.addEventListener(
                'click',
                async () => {

                    await fetch(
                        `/imagenes/principal/${btn.dataset.id}`,
                        {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN':
                                    document.querySelector(
                                        'meta[name="csrf-token"]'
                                    ).content
                            }
                        }
                    );

                    location.reload();

                }
            );

        });


    // ==========================
    // ELIMINAR UNA
    // ==========================
    document
        .querySelectorAll(
            '.btn-eliminar-imagen'
        )
        .forEach(btn => {

            btn.addEventListener(
                'click',
                async () => {

                    if (
                        !confirm(
                            '¿Eliminar imagen?'
                        )
                    ) return;

                    await fetch(
                        `/imagenes/${btn.dataset.id}`,
                        {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN':
                                    document.querySelector(
                                        'meta[name="csrf-token"]'
                                    ).content
                            }
                        }
                    );

                    location.reload();

                }
            );

        });


    // ==========================
    // ELIMINAR TODAS
    // ==========================
    document
        .querySelectorAll(
            '.btn-eliminar-todas'
        )
        .forEach(btn => {

            btn.addEventListener(
                'click',
                async () => {

                    if (
                        !confirm(
                            '¿Eliminar todas las imágenes?'
                        )
                    ) return;

                    await fetch(
                        `/imagenes/producto/${btn.dataset.producto}`,
                        {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN':
                                    document.querySelector(
                                        'meta[name="csrf-token"]'
                                    ).content
                            }
                        }
                    );

                    location.reload();

                }
            );

        });

});