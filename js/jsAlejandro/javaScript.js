/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/JavaScript.js to edit this template
 */


function confirmarCancelacion() {
    // Mostramos la ventana de confirmación nativa del navegador
    const respuesta = confirm("¿De verdad quieres cancelar la membresía? \n(Recuerda que mantendrás el acceso hasta que termine tu mes pagado)");

    if (respuesta) {
        // Si el usuario presiona "Aceptar" (Sí)
        alert("SE CANCELO TU MEMBRESIA EXITOSAMENTE");
        
        // Aquí enviamos el formulario programáticamente al Servlet
        document.querySelector('form').submit();
    } else {
        // Si el usuario presiona "Cancelar" (No), no pasa nada
        console.log("Cancelación abortada por el usuario");
    }
}