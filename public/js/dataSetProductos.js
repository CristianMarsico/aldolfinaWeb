document.addEventListener('DOMContentLoaded', () => {
  const productModal = new bootstrap.Modal(document.getElementById('productModal'));
  const form = document.querySelector('form.modal-content');
  const modalTitle = document.getElementById('productModalLabel');

  document.getElementById('btnAddProduct').addEventListener('click', () => {
    modalTitle.textContent = 'Agregar Producto';
    form.reset();
    form.id.value = '';
  });

  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', () => {
      const product = JSON.parse(button.getAttribute('data-product'));
      modalTitle.textContent = 'Editar Producto';

      form.id.value = product.id || '';
      form.nombre.value = product.nombre || '';
      form.descripcion_corta.value = product.descripcion_corta || '';
      form.descripcion_larga.value = product.descripcion_larga || '';
      form.edad.value = product.id_edad || '';
      form.marca.value = product.id_marca || '';
      form.talle.value = product.id_talle || '';
      form.precio.value = product.precio || '';
      form.stock.value = product.stock || '';

      productModal.show();
    });
  });

  document.querySelectorAll('.btn-danger.confirm').forEach(button => {
    button.addEventListener('click', e => {
      e.preventDefault();
      if (confirm('¿Estás seguro que deseas eliminar este producto?')) {
        window.location.href = button.href;
      }
    });
  });
});
