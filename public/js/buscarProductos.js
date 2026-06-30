let timer;

$('#buscarProducto').on('keyup', function () {
    clearTimeout(timer);
    let buscar = $(this).val();
    timer = setTimeout(function () {
        $.ajax({
            url: '/buscar-productos/' + idCategoria,
            type: 'GET',
            data: {
                buscar: buscar
            },
            success: function (productos) {
                let html = '';
                productos.forEach(function (p) {
                    html += `
                            <tr>
                                <td>${p.nombre}</td>
                                <td>${p.descripcion_corta}</td>
                                <td>$${Number(p.precio).toLocaleString('es-AR', {
                                                    minimumFractionDigits: 2,
                                                    maximumFractionDigits: 2
                                                })}</td>

                                <td>
                                    <span class="badge success">
                                        ${p.stock}
                                    </span>
                                </td>

                                <td>
                                    <div class="acciones">

                                        <button
                                            class="btn-table btn-edit"
                                            data-product='${JSON.stringify(p)}'
                                            data-bs-toggle="modal"
                                            data-bs-target="#productModal">
                                            Editar
                                        </button>

                                        <a href="/admin/producto/eliminar/${p.id}"
                                            class="btn-table btn-delete confirmDelete">
                                            Eliminar
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            `;
                });
                $('#tbodyProductos').html(html);
            }
        });
    }, 300);
});
