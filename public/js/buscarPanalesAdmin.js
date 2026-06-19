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
                  <td>
                      <img src="/img/69f8e7dd1aced4.80817744.jpg" class="img-thumbnail" width="60">
                  </td>
                  <td>${p.nombre}</td>
                  <td>${p.descripcion_corta}</td>
                  <td>$${p.precio}</td>
                  <td>${p.stock}</td>
                  <td>
                      <a href="/editarPanal/${p.id}" class="btn btn-warning btn-sm">Editar</a>
                      <a href="/eliminarPanal/${p.id}" class="btn btn-danger btn-sm">Eliminar</a>
                  </td>
              </tr>`;
                });
                $('#tbodyProductos').html(html);
            }
        });
    }, 300);
});
