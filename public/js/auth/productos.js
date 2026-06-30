document.addEventListener('DOMContentLoaded', () => {

    // Modal Bootstrap
    const productModal = new bootstrap.Modal(document.getElementById('productModal'));

    // Modal Confirmación
    const confirmModal = document.getElementById('confirmModal');
    const modalMessage = document.getElementById('modalMessage');
    const modalCancel = document.getElementById('modalCancel');
    const modalConfirm = document.getElementById('modalConfirm');

    // Formulario
    const form = document.querySelector('#productModal form');
    const modalTitle = document.getElementById('productModalLabel');
    const btnSubmit = document.getElementById('btn-submit');

    let onConfirmCallback = null;

    function openConfirm(message, callback) {
        modalMessage.textContent = message;
        confirmModal.style.display = "flex";
        onConfirmCallback = callback;
    }

    modalCancel.onclick = () => {
        confirmModal.style.display = "none";
        onConfirmCallback = null;
    };

    modalConfirm.onclick = () => {
        confirmModal.style.display = "none";

        if (onConfirmCallback) {
            onConfirmCallback();
        }
    };

    // ----------------------
    // NUEVO
    // ----------------------

    document.getElementById('btnAddProduct').addEventListener('click', () => {

        btnSubmit.dataset.mode = "create";

        modalTitle.textContent = "Agregar Producto";
        btnSubmit.textContent = "Agregar";

        form.reset();
        form.id.value = "";

        productModal.show();

    });

    // ----------------------
    // EDITAR
    // ----------------------

    document.querySelectorAll('.btn-edit').forEach(button => {

        button.addEventListener('click', () => {

            btnSubmit.dataset.mode = "edit";

            const product = JSON.parse(button.dataset.product);

            modalTitle.textContent = "Editar Producto";
            btnSubmit.textContent = "Editar";

            form.id.value = product.id || "";
            form.nombre.value = product.nombre || "";
            form.descripcion_corta.value = product.descripcion_corta || "";
            form.descripcion_larga.value = product.descripcion_larga || "";
            form.edad.value = product.id_edad || "";
            form.marca.value = product.id_marca || "";

            if (form.talle) {
                form.talle.value = product.id_talle || "";
            }

            form.precio.value = product.precio || "";
            form.stock.value = product.stock || "";

            productModal.show();

        });

    });

    // ----------------------
    // GUARDAR
    // ----------------------

    btnSubmit.addEventListener('click', e => {

        e.preventDefault();

        const mensaje = btnSubmit.dataset.mode === "edit"
            ? "¿Estás seguro que deseas editar este producto?"
            : "¿Deseas agregar este producto?";

        openConfirm(mensaje, () => {
            form.submit();
        });

    });

    // ----------------------
    // ELIMINAR
    // ----------------------

    document.querySelectorAll('.confirmDelete').forEach(btn => {

        btn.addEventListener('click', e => {

            e.preventDefault();

            openConfirm("¿Quieres eliminar este producto?", () => {
                window.location.href = btn.href;
            });

        });

    });

    // Cerrar al hacer clic fuera

    confirmModal.addEventListener('click', e => {

        if (e.target === confirmModal) {
            confirmModal.style.display = "none";
            onConfirmCallback = null;
        }

    });

});