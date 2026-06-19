<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST"
              action="{{ route('admin.imagenes.guardar') }}"
              class="modal-content"
              enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" id="imagenId">

            <div class="modal-header">
                <h5 class="modal-title" id="imgModalLabel">
                    Agregar Imagen
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Producto</label>

                    <select name="id_producto"
                            id="id_producto"
                            class="form-select"
                            required>

                        <option value="">Seleccionar producto</option>

                        @foreach ($imagenes as $producto)
                            <option value="{{ $producto->id }}">
                                {{ $producto->producto->nombre }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen</label>

                    <input type="file"
                           name="imagen"
                           id="imagenInput"
                           class="form-control">
                </div>

                <div id="previewActual" class="mb-3"></div>

                <div class="form-check">
                    <input type="checkbox"
                           name="principal"
                           id="principal"
                           class="form-check-input">

                    <label class="form-check-label">
                        Imagen principal
                    </label>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancelar
                </button>

                <button type="submit"
                        class="btn btn-primary">
                    Guardar
                </button>

            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const modalEl = document.getElementById('imgModal');

    if (!modalEl) return;

    const modal = new bootstrap.Modal(modalEl);

    const form = modalEl.querySelector('form');

    document.getElementById('btnAddImagen')
        .addEventListener('click', () => {

            form.reset();

            document.getElementById('imagenId').value = '';

            document.getElementById('previewActual').innerHTML = '';

            document.getElementById('imgModalLabel').textContent =
                'Agregar Imagen';
        });

    document.querySelectorAll('.btn-edit-imagen')
        .forEach(btn => {

            btn.addEventListener('click', () => {

                const img = JSON.parse(btn.dataset.imagen);

                document.getElementById('imgModalLabel').textContent =
                    'Editar Imagen';

                document.getElementById('imagenId').value = img.id;

                document.getElementById('id_producto').value =
                    img.id_producto;

                document.getElementById('principal').checked =
                    img.principal == 1;

                document.getElementById('previewActual').innerHTML =
                    img.imagen
                    ? `<img src="/img/productos/${img.imagen}"
                            width="120"
                            class="img-thumbnail">`
                    : '';

                modal.show();
            });

        });

});
</script>