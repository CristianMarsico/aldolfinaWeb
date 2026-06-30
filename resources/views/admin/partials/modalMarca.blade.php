<div class="modal fade" id="marcaModal" tabindex="-1" aria-labelledby="marcaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.marcas.guardar') }}" enctype="multipart/form-data" class="modal-content">
      @csrf
      <input type="hidden" name="id" id="marcaId" value="" />
      <div class="modal-header">
        <h5 class="modal-title" id="marcaModalLabel">Agregar/Editar Marca</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="marcaNombre" class="form-label">Nombre de la Marca</label>
          <input type="text" name="marca" id="marcaNombre" class="form-control" required />
        </div>

         <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btn-submit-marca" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{ asset('js/auth/marcas.js') }}"></script>