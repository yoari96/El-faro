// Controlador (JavaScript - script.js):
function registrarCuenta(event) {
    event.preventDefault(); // Evitar que el formulario se envíe automáticamente
    
    // Obtener los datos del formulario
    const nombreUsuario = document.getElementById("nombreUsuario").value;
    const correoRegistro = document.getElementById("correoRegistro").value;
    const contrasena = document.getElementById("contrasena").value;

    // Crear objeto con los datos del formulario
    const datosRegistro = {
        nombreUsuario: nombreUsuario,
        correoRegistro: correoRegistro,
        contrasena: contrasena
    };

    // Llamar a la función del modelo para registrar la cuenta
    registrarCuentaUsuario(datosRegistro);
}

// Modelo: registrar la cuenta de usuario
function registrarCuentaUsuario(datosRegistro) {
    // Aquí iría la lógica para enviar los datos a un servidor para el registro de la cuenta
    // Por ahora, solo simulamos una respuesta exitosa y mostramos un mensaje en la vista

    // Mostrar mensaje de confirmación en la vista
    const mensajeRespuesta = document.getElementById("mensajeRespuesta");
    mensajeRespuesta.textContent = "¡Cuenta registrada exitosamente!";
    mensajeRespuesta.style.color = "green";
}
