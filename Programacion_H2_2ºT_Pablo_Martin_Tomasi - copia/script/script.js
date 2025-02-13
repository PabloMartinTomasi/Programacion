document.addEventListener("DOMContentLoaded", function () {
    const checkBox = document.getElementById("terminos");
    const btnRegistrar = document.getElementById("btn-registrar");

    if (checkBox && btnRegistrar) {//Nos sirve, que cuando el cliente no haga clic en la check box de aceptar las normas y condiciones, no se pueda registrar. Y cuando haga clic si se puede registrar
        checkBox.addEventListener("change", function () {
            btnRegistrar.disabled = !this.checked;
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {//Nos sirve para poder actulizar el estado de una tarea desde la lista de las tareas
    document.querySelectorAll(".cambiar-estado").forEach(select => {
        select.addEventListener("change", function () {
            const idTarea = this.dataset.id;
            const nuevoEstado = this.value;

            fetch("editar_tarea.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_tarea=${idTarea}&estado_tarea=${nuevoEstado}`
            })
        });
    });
});
