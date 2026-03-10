function confirmarCancelacion() {
    const respuesta = confirm("¿De verdad quieres cancelar la membresía? \n(Recuerda que mantendrás el acceso hasta que termine tu mes pagado)");

    if (respuesta) {
        alert("SE CANCELÓ TU MEMBRESÍA EXITOSAMENTE");
        // Al enviar el formulario, se recarga la página y se ejecuta el UPDATE de PHP
        document.getElementById('formCancelacion').submit();
    }
}