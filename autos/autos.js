document.querySelectorAll('.card button').forEach(btn => {
    btn.addEventListener('click', () => {
        const detalles = btn.nextElementSibling;
        detalles.classList.toggle('oculto');
    });
});
