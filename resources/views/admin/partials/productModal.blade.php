<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('guardarPanal') }}" enctype="multipart/form-data" class="modal-content">
      @csrf
      <input type="hidden" name="id" id="productId" />
      <input type="hidden" name="id_categoria" value="{{ $id_categoria ?? '' }}" />
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Agregar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Campos -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="descripcion_corta" class="form-label">Descripción corta</label>
          <input type="text" id="descripcion_corta" name="descripcion_corta" class="form-control" required />
        </div>
        <div class="mb-3">
          <label for="descripcion_larga" class="form-label">Descripción larga</label>
          <textarea id="descripcion_larga" name="descripcion_larga" class="form-control" rows="3"></textarea>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="edad" class="form-label">Edad</label>
            <select id="edad" name="edad" class="form-select" required>
              @foreach ($edades ?? [] as $edad)
              <option value="{{ $edad->id }}">{{ $edad->edades }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="marca" class="form-label">Marca</label>
            <select id="marca" name="marca" class="form-select" required>
              @foreach ($marcas ?? [] as $marca)
              <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="talle" class="form-label">Talle</label>
            <select id="talle" name="talle" class="form-select" required>
              @foreach ($talles ?? [] as $talle)
              <option value="{{ $talle->id }}">{{ $talle->talle }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" id="precio" name="precio" class="form-control" required />
          </div>
          <div class="col">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" required />
          </div>
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/dataSetProductos.js') }}"></script>
