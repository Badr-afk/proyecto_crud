// js/validaciones.js

document.addEventListener("DOMContentLoaded", function() {

    // --- FUNCIÓN GENERAL PARA MOSTRAR ERROR ---
    // Esta función pone el borde rojo y hace temblar el input
    function mostrarError(input, mensaje) {
        // 1. Añadimos la clase de error de Bootstrap (borde rojo)
        input.classList.add('is-invalid');
        
        // 2. Aplicamos la animación de temblor manualmente
        // (Reutilizamos la lógica del CSS que te di antes)
        input.style.animation = "shake 0.5s";
        
        // 3. Quitamos la animación después de 0.5s para poder repetirla si se equivoca de nuevo
        setTimeout(() => {
            input.style.animation = "";
        }, 500);

        // 4. (Opcional) Enfocamos el primer input con error
        input.focus();
    }

    // --- FUNCIÓN PARA LIMPIAR ERROR ---
    // Quita el rojo cuando el usuario empieza a escribir
    function limpiarError(input) {
        input.classList.remove('is-invalid');
    }

    // =======================================================
    // 1. VALIDACIÓN DEL LOGIN
    // Buscamos el formulario que tenga "authenticate" en su acción
    // =======================================================
    const formLogin = document.querySelector('form[action*="authenticate"]');

    if (formLogin) {
        formLogin.addEventListener('submit', function(evento) {
            let usuario = formLogin.querySelector('input[name="usuario"]');
            let password = formLogin.querySelector('input[name="password"]');
            let hayError = false;

            // Limpiamos errores previos
            limpiarError(usuario);
            limpiarError(password);

            // Validar Usuario
            if (usuario.value.trim() === "") {
                mostrarError(usuario, "El usuario es obligatorio");
                hayError = true;
            }

            // Validar Contraseña (si no hay error previo para no marear)
            if (!hayError && password.value.trim() === "") {
                mostrarError(password, "La contraseña es obligatoria");
                hayError = true;
            }

            // Si hubo algún error, EVITAMOS que el formulario se envíe
            if (hayError) {
                evento.preventDefault();
            }
        });

        // Eventos para limpiar el rojo al escribir
        const inputs = formLogin.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', () => limpiarError(input));
        });
    }

    // =======================================================
    // 2. VALIDACIÓN DE CREAR / EDITAR JUEGO
    // Buscamos formularios que vayan a "store" o "update"
    // =======================================================
    const formJuego = document.querySelector('form[action*="store"], form[action*="update"]');

    if (formJuego) {
        formJuego.addEventListener('submit', function(evento) {
            let titulo = formJuego.querySelector('input[name="titulo"]');
            let precio = formJuego.querySelector('input[name="precio"]');
            let hayError = false;

            // Limpiar errores previos
            limpiarError(titulo);
            limpiarError(precio);

            // 1. Validar Título
            if (titulo.value.trim() === "") {
                mostrarError(titulo);
                // Podemos usar alert o inyectar texto, pero el borde rojo y temblor suele bastar
                hayError = true;
            }

            // 2. Validar Precio (No vacío y No negativo)
            if (!hayError) {
                if (precio.value === "" || parseFloat(precio.value) < 0) {
                    mostrarError(precio);
                    hayError = true;
                }
            }

            // Si hay error, paramos el envío
            if (hayError) {
                evento.preventDefault();
            }
        });

        // Eventos para limpiar el rojo al escribir
        const inputs = formJuego.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', () => limpiarError(input));
        });
    }
});