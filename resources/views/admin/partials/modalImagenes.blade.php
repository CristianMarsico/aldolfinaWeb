<div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <form
            method="POST"
            action="{{ route('admin.imagenes.guardar') }}"
            class="modal-content"
            enctype="multipart/form-data">

            @csrf

            <input
                type="hidden"
                name="id_producto"
                id="id_producto">

            <div class="modal-header">

                <h5 class="modal-title">
                    Agregar Imagen
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label class="form-label">
                        Producto
                    </label>

                    <input
                        type="text"
                        id="nombre_producto"
                        class="form-control"
                        readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Imagen
                    </label>

                    <input
                        type="file"
                        name="imagen"
                        class="form-control"
                        required>

                </div>

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="principal"
                        id="principal"
                        class="form-check-input">

                    <label
                        class="form-check-label">

                        Imagen principal

                    </label>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Guardar

                </button>

            </div>

        </form>

    </div>

</div>