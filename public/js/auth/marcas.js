document.addEventListener('DOMContentLoaded', () => {

    const marcaModal = new bootstrap.Modal(document.getElementById('marcaModal'));

    const form = document.querySelector('#marcaModal form');
    const modalTitle = document.getElementById('marcaModalLabel');
    const btnSubmit = document.getElementById('btn-submit-marca');

    // Modal de confirmación
    const confirmModal = document.getElementById('confirmModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalCancel = document.getElementById('modalCancel');
    const modalConfirm = document.getElementById('modalConfirm');

    let onConfirmCallback = null;

    function openConfirm(message, callback) {
        modalMessage.textContent = message;
        confirmModal.style.display = 'flex';
        onConfirmCallback = callback;
    }

    modalCancel.onclick = () => {
        confirmModal.style.display = 'none';
        onConfirmCallback = null;
    };

    modalConfirm.onclick = () => {
        confirmModal.style.display = 'none';

        if (onConfirmCallback) {
            onConfirmCallback();
        }
    };

    // -------------------------
    // AGREGAR
    // -------------------------

    document.getElementById('btnAddMarca').addEventListener('click', () => {

        btnSubmit.dataset.mode = 'create';

        modalTitle.textContent = 'Agregar Marca';
        btnSubmit.textContent = 'Agregar';

        form.reset();
        form.id.value = '';

        marcaModal.show();

    });

    // -------------------------
    // EDITAR
    // -------------------------

    document.querySelectorAll('.btn-edit-marca').forEach(button => {

        button.addEventListener('click', () => {

            btnSubmit.dataset.mode = 'edit';

            const marca = JSON.parse(button.dataset.marca);

            modalTitle.textContent = 'Editar Marca';
            btnSubmit.textContent = 'Editar';

            form.id.value = marca.id || '';
            form.marca.value = marca.marca || '';

            marcaModal.show();

        });

    });

    // -------------------------
    // GUARDAR
    // -------------------------

    btnSubmit.addEventListener('click', e => {

        e.preventDefault();

        const mensaje = btnSubmit.dataset.mode === 'edit'
            ? '¿Estás seguro que deseas editar esta marca?'
            : '¿Deseas agregar esta marca?';

        openConfirm(mensaje, () => {
            form.submit();
        });

    });

    // -------------------------
    // ELIMINAR
    // -------------------------

    document.querySelectorAll('.confirmDelete').forEach(btn => {

        btn.addEventListener('click', e => {

            e.preventDefault();

            openConfirm('¿Quieres eliminar esta marca?', () => {
                window.location.href = btn.href;
            });

        });

    });

    // Cerrar haciendo clic fuera

    confirmModal.addEventListener('click', e => {

        if (e.target === confirmModal) {
            confirmModal.style.display = 'none';
            onConfirmCallback = null;
        }

    });

});