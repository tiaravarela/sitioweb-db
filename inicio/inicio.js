function showDetails(carId) {
    const detailsElement = document.getElementById(`${carId}-details`);
    const button = document.querySelector(`button[aria-controls="${carId}-details"]`);

    if (!detailsElement || !button) return;

    const isHidden = detailsElement.classList.contains('oculto');

    // Ocultar todos los detalles
    document.querySelectorAll('.detalles').forEach(div => div.classList.add('oculto'));
    document.querySelectorAll('button[aria-controls$="-details"]').forEach(btn => btn.setAttribute('aria-expanded', 'false'));

    if (isHidden) {
        detailsElement.classList.remove('oculto');
        button.setAttribute('aria-expanded', 'true');
    }
}
