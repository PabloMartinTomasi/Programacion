document.addEventListener('DOMContentLoaded', function () {
    const edadInput = document.getElementById('edad');
    const packs = document.querySelectorAll('#pack option');
    const packSelect = document.getElementById('pack');
    const planSelect = document.getElementById('plan');
    const duracionSelect = document.getElementById('duracion');
    const totalCost = document.getElementById('total');
    const PacksExtraContainer = document.getElementById('pack_extra_container');
    const packExtraSelect = document.getElementById('pack_adicional'); // Aquí tienes el select de pack extra

    // Precios de los planes
    const preciosPlanes = {
        'Basico': 9.99,
        'Estandar': 13.99,
        'Premium': 17.99
    };

    // Precios de los packs
    const preciosPacks = {
        'Deporte': 6.99,
        'Cine': 7.99,
        'Infantil': 4.99
    };

    // Precios de los packs extra
    const preciosPacksExtra = {
        'Deporte': 6.99,
        'Cine': 7.99
    };

    // Función para calcular el costo total
    function calcularTotal() {
        const planSeleccionado = planSelect.value;
        const packSeleccionado = packSelect.value;
        const duracionSeleccionada = duracionSelect.value;
        const packExtraSeleccionado = packExtraSelect.value; // Obtenemos el pack extra seleccionado

        // Prevenir cálculo si no hay plan o pack principal seleccionado
        if (!planSeleccionado || !packSeleccionado) return;

        // Obtener los precios según la selección
        const precioPlan = preciosPlanes[planSeleccionado] || 0;
        const precioPack = preciosPacks[packSeleccionado] || 0;
        const precioPackExtra = preciosPacksExtra[packExtraSeleccionado] || 0; // Precio del pack extra

        // Calcular el total (plan + pack principal + pack extra)
        let total = precioPlan + precioPack + precioPackExtra;

        // Si la duración es anual, multiplicamos por 12
        if (duracionSeleccionada === 'Anual') {
            total *= 12;
        }

        // Mostrar el total en el formato adecuado
        totalCost.textContent = `Costo Total: ${total.toFixed(2)} €`;
    }

    // Función para manejar la selección de plan
    function manejarSeleccionDePlan() {
        const planSeleccionado = planSelect.value;

        // Mostrar u ocultar el pack extra dependiendo del plan
        if (planSeleccionado === 'Estandar' || planSeleccionado === 'Premium') {
            PacksExtraContainer.style.display = 'block';  // Mostrar el pack extra
        } else {
            PacksExtraContainer.style.display = 'none';   // Ocultar el pack extra
        }

        // Recalcular el total después de cambiar el plan
        calcularTotal();
    }

    // Función para manejar la selección de pack
    function manejarSeleccionDePack() {
        const packSeleccionado = packSelect.value;

        // Ocultar el pack seleccionado en el selector de pack extra
        packExtraSelect.querySelectorAll('option').forEach(option => {
            option.hidden = option.value === packSeleccionado;
        });

        if (packSeleccionado === 'Deporte') {
            // Si selecciona el pack "Deporte", forzamos la duración a "Anual"
            duracionSelect.value = 'Anual';  // Cambiamos la opción de duración a "Anual"
            duracionSelect.disabled = true; // Deshabilitamos la opción de "Mensual"
        } else {
            // Si no es el pack "Deporte", habilitamos ambas opciones de duración
            duracionSelect.disabled = false;
        }

        // Recalcular el total después de cambiar el pack
        calcularTotal();
    }

    // Función para manejar la selección de pack extra
    function manejarSeleccionDePackExtra() {
        const packExtraSeleccionado = packExtraSelect.value;

        // Si se ha seleccionado un pack extra, ocultamos ese pack en el selector principal
        packs.forEach(pack => {
            if (packExtraSeleccionado && pack.value === packExtraSeleccionado) {
                pack.hidden = true;  // Ocultamos el pack ya seleccionado como pack extra
            } else {
                pack.hidden = false;  // Mostramos los demás packs
            }
        });

        // Si el pack extra seleccionado es "Deporte", forzamos la duración a "Anual"
        if (packExtraSeleccionado === 'Deporte') {
            duracionSelect.value = 'Anual'; // Cambiamos la duración a "Anual"
            duracionSelect.disabled = true; // Deshabilitamos la opción "Mensual"
        } else {
            duracionSelect.disabled = false; // Si no es "Deporte", habilitamos ambas opciones de duración
        }

        // Recalcular el total después de cambiar el pack extra
        calcularTotal();
    }

    // Escuchar los cambios en el pack extra
    packExtraSelect.addEventListener('change', manejarSeleccionDePackExtra);

    // Escuchar los cambios en el plan
    planSelect.addEventListener('change', manejarSeleccionDePlan);

    // Escuchar los cambios en el pack principal
    packSelect.addEventListener('change', manejarSeleccionDePack);

    // Escuchar los cambios en la duración
    duracionSelect.addEventListener('change', calcularTotal);

    // Escuchar el evento de entrada en el campo de edad
    edadInput.addEventListener('input', () => {
        const edad = parseInt(edadInput.value, 10);
        
        // Resetea la selección para prevenir comportamientos indeseados
        packSelect.selectedIndex = -1;

        if (edad < 18) {
            // Si la edad es menor a 18, solo mostramos el pack "Infantil"
            let infantilSeleccionado = false;
            packs.forEach(pack => {
                if (pack.value === 'Infantil') {
                    pack.hidden = false;  // Mostrar el pack Infantil
                    if (!infantilSeleccionado) {
                        pack.selected = true;  // Seleccionar el pack Infantil por defecto
                        infantilSeleccionado = true;
                    }
                } else {
                    pack.hidden = true;  // Ocultar otros packs
                    pack.selected = false;
                }
            });
        } else {
            // Si la edad es 18 o más, mostramos todos los packs
            packs.forEach(pack => {
                pack.hidden = false;  // Mostrar todos los packs
            });
        }

        // Llamar a la función de cálculo del total cuando cambie la edad
        calcularTotal();
    });
    
    // Llamamos a la función de cálculo para inicializar el total
    calcularTotal();
});
