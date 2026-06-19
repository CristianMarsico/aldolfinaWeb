<div class="modal fade" id="edadModal" tabindex="-1" aria-labelledby="edadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.edades.guardar') }}" class="modal-content">
  @csrf
  <input type="hidden" name="id" id="edadId" value="" />
  <div class="modal-header">
    <h5 class="modal-title" id="edadModalLabel">Agregar/Editar Edad</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
  </div>
  <div class="modal-body">
    <div class="mb-3">
      <label for="edadNombre" class="form-label">Edad</label>
      <input type="text" name="edades" id="edadNombre" class="form-control" required />
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
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const edadModal = new bootstrap.Modal(document.getElementById('edadModal'));
    const form = document.querySelector('#edadModal form');
    const modalTitle = document.getElementById('edadModalLabel');

    document.getElementById('btnAddEdad').addEventListener('click', () => {
      modalTitle.textContent = 'Agregar Edad';
      form.reset();
      form.id.value = '';
    });

    document.querySelectorAll('.btn-edit-edad').forEach(button => {
      button.addEventListener('click', () => {
        const edad = JSON.parse(button.dataset.edad);
        modalTitle.textContent = 'Editar Edad';
        form.id.value = edad.id || '';
        form.edades.value = edad.edades || '';
        edadModal.show();
      });
    });

    document.querySelectorAll('.btn-danger.confirm').forEach(button => {
      button.addEventListener('click', e => {
        e.preventDefault();
        if (confirm('¿Estás seguro que deseas eliminar este registro?')) {
          window.location.href = button.href;
        }
      });
    });
  });
</script>
