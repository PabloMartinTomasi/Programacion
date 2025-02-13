document.addEventListener("DOMContentLoaded", function () {
    const checkBox = document.getElementById("terminos");
    const btnRegistrar = document.getElementById("btn-registrar");

    if (checkBox && btnRegistrar) {
        // Deshabilitamos el botón de registro si la casilla de términos no está marcada
        checkBox.addEventListener("change", function () {
            btnRegistrar.disabled = !this.checked; //Se habilita el botón solo si el checkbox está marcado
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    //Seleccionamos todos los elementos con la clase "cambiar-estado" (desplegables de estado de tarea)
    document.querySelectorAll(".cambiar-estado").forEach(select => {
        select.addEventListener("change", function () {
            const idTarea = this.dataset.id; //Obtenemos el ID de la tarea desde el atributo "data-id"
            const nuevoEstado = this.value; //Obtenemos el nuevo estado seleccionado

            //Enviamos una solicitud POST a "editar_tarea.php" para actualizar el estado de la tarea
            fetch("editar_tarea.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_tarea=${idTarea}&estado_tarea=${nuevoEstado}`
            })
            .then(response => response.text()) //Procesamos la respuesta como texto
            .then(data => console.log("Estado actualizado:", data)) //Mostramos la respuesta en la consola
            .catch(error => console.error("Error al actualizar la tarea:", error)); //Manejamos errores de la solicitud
        });
    });
});
