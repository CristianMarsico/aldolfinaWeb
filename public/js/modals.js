 document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('confirmModal');
        const modalMessage = document.getElementById('modalMessage');
        const modalCancel = document.getElementById('modalCancel');
        const modalConfirm = document.getElementById('modalConfirm');
        let onConfirmCallback;

        function openModal(message, onConfirm) {
            modalMessage.textContent = message;
            modal.style.display = 'flex';
            onConfirmCallback = onConfirm;
        }
        modalCancel.onclick = () => {
            modal.style.display = 'none';
            onConfirmCallback = null;
        };
        modalConfirm.onclick = () => {
            modal.style.display = 'none';
            if (onConfirmCallback) onConfirmCallback();
        };
        // Confirmación para enlaces con clase confirm (ejemplo: eliminar)
        document.querySelectorAll('.confirm').forEach(el => {
            el.addEventListener('click', e => {
                e.preventDefault();
                const href = el.href || el.dataset.href;
                openModal('¿Quieres eliminar este producto?', () => {
                    if (href) window.location.href = href;
                });
            });
        });
        // Confirmación para submit con clase confirm-submit
        document.querySelectorAll('button.confirm-submit').forEach(btn => {
            const form = btn.closest('form');
            if (!form) return;
            btn.addEventListener('click', e => {
                e.preventDefault();
                openModal('¿Deseas agregar ?', () => {
                    form.submit();
                });
            });
        });

        document.querySelectorAll('button.confirm-edit').forEach(btn => {
            const form = btn.closest('form');
            if (!form) return;
            btn.addEventListener('click', e => {
                e.preventDefault();
                openModal('¿Estas seguro que deseas editar ?', () => {
                    form.submit();
                });
            });
        });

        // Cerrar modal al hacer clic fuera del contenido
        modal.addEventListener('click', e => {
            if (e.target === modal) {
                modal.style.display = 'none';
                onConfirmCallback = null;
            }
        });
    });