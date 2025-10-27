document.querySelectorAll('.card button').forEach(btn => {
    btn.addEventListener('click', () => {
        const detalles = btn.nextElementSibling;
        if (detalles) {
            detalles.classList.toggle('oculto');
        }
    });
});