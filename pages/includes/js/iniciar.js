function validarNumeros(input) {
    // Eliminar caracteres no numéricos
    input.value = input.value.replace(/\D/g, '');
}

document.addEventListener('DOMContentLoaded', function () {
    const nip = document.getElementById('nip_iniciar');
    const icon = document.getElementById('bx3');
    icon.style.display = 'none';

    icon.addEventListener('click', () => {
        if (nip.type === 'password') {
            nip.type = 'text';
            icon.classList.remove('bx-hide');
            icon.classList.add('bx-show');
        } else {
            nip.type = 'password';
            icon.classList.remove('bx-show');
            icon.classList.add('bx-hide');
        }
    });

    nip.addEventListener('input', () => {
        // Verificar si el campo nip está vacío y ocultar/mostrar el icono en consecuencia
        if (nip.value.trim() === '') {
            icon.style.display = 'none'; // Oculta el icono si el campo está vacío
        } else {
            icon.style.display = 'block'; // Muestra el icono si el campo tiene algún valor
        }
    });
});