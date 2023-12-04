function validarNIP() {
    // Obtener valores de los campos NIP y Confirmar NIP
    var nip = document.getElementById('nip').value;
    var confirmarNIP = document.getElementById('confirmar_nip').value;

    // Verificar si son iguales
    if (nip !== confirmarNIP) {
        alert('Los campos de NIP no coinciden. Por favor, ingrésalos de nuevo.');
        // Limpiar los campos
        document.getElementById('nip').value = '';
        document.getElementById('confirmar_nip').value = '';
        // Enfocar el campo NIP
        document.getElementById('nip').focus();
        // Evitar que el formulario se envíe
        return false;
    }

    // const ctrl = document.getElementById('numero_control');

    if(nip.length != 4){
        alert('El campo NIP debe tener 4 caracteres');
        document.getElementById('nip').focus();
        return false;
    }

    // if(ctrl.length != 8){
    //     alert('El campo numero de control debe tener 8 caracteres');
    //     document.getElementById('numero_control').focus();
    //     return false;
    // }

    // Continuar con el envío del formulario si los NIP son iguales
    return true;
}

function validarNumeros(input) {
    // Eliminar caracteres no numéricos
    input.value = input.value.replace(/\D/g, '');
}

document.addEventListener('DOMContentLoaded', function () {
    const nip = document.getElementById('nip');
    const icon = document.getElementById('bx');
    const icon2 = document.getElementById('bx2');
    const c_nip = document.getElementById('confirmar_nip');
    
    icon.style.display = 'none';
    icon2.style.display = 'none';

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

    icon2.addEventListener('click', () => {
        if (c_nip.type === 'password') {
            c_nip.type = 'text';
            icon2.classList.remove('bx-hide');
            icon2.classList.add('bx-show');
        } else {
            c_nip.type = 'password';
            icon2.classList.remove('bx-show');
            icon2.classList.add('bx-hide');
        }
    });

    c_nip.addEventListener('input', () => {
        // Verificar si el campo nip está vacío y ocultar/mostrar el icono en consecuencia
        if (c_nip.value.trim() === '') {
            icon2.style.display = 'none'; // Oculta el icono si el campo está vacío
        } else {
            icon2.style.display = 'block'; // Muestra el icono si el campo tiene algún valor
        }
    });
});

function validarCorreoInstitucional(input) {
    // Eliminar espacios en blanco del valor del campo
    input.value = input.value.replace(/\s/g, '');
}
