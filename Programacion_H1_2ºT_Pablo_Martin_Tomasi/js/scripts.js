document.addEventListener('DOMContentLoaded', function () { 
    const edadInput = document.getElementById('edad');
    const packs = document.querySelectorAll('#pack option');
    const packSelect = document.getElementById('pack');
    const planSelect = document.getElementById('plan');
    const duracionSelect = document.getElementById('duracion');
    const totalCost = document.getElementById('total');
    const PacksExtraContainer = document.getElementById('pack_extra_container');
    const packExtraSelect = document.getElementById('pack_adicional'); 
    const form = document.getElementById('formCliente'); 

    // Precios de los planes que se puedan escojer
    const preciosPlanes = {
        'Basico': 9.99,
        'Estandar': 13.99,
        'Premium': 17.99
    };

    // Precios de los packs que se puedan escojer
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

    // Función para calcular el costo total cuando ya se haya selecionado el plan y el pack
    function calcularTotal() {
        const planSeleccionado = planSelect.value;
        const packSeleccionado = packSelect.value;
        const duracionSeleccionada = duracionSelect.value;
        const packExtraSeleccionado = packExtraSelect.value;

        if (!planSeleccionado || !packSeleccionado) return;

        const precioPlan = preciosPlanes[planSeleccionado] || 0;
        const precioPack = preciosPacks[packSeleccionado] || 0;
        const precioPackExtra = preciosPacksExtra[packExtraSeleccionado] || 0;

        //Calculo del total base
        let total = precioPlan + precioPack + precioPackExtra;

        //Si la duracion seleccionada es Anual, multiplicamos por 12
        if (duracionSeleccionada === 'Anual') {
            total *= 12;
        }

        // Mostrar el costo total
        totalCost.textContent = `Costo Total: ${total.toFixed(2)} €`;
    }

    // Función para manejar la selección del plan
    function manejarSeleccionDePlan() {
        const planSeleccionado = planSelect.value;

        // Si el plan seleccionado es Estandar o Premium, mostrar el pack extra
        if (planSeleccionado === 'Estandar' || planSeleccionado === 'Premium') {
            PacksExtraContainer.style.display = 'block';
        } else {
            PacksExtraContainer.style.display = 'none';
        }

        calcularTotal();
    }

    // Función para manejar la selección del pack
    function manejarSeleccionDePack() {
        const packSeleccionado = packSelect.value;

        // Ocultar las opciones de pack extra que no sean el seleccionado
        packExtraSelect.querySelectorAll('option').forEach(option => {
            option.hidden = option.value === packSeleccionado;
        });

        // Si el pack seleccionado es 'Deporte', forzamos la duración a 'Anual' y lo deshabilitamos
        if (packSeleccionado === 'Deporte') {
            duracionSelect.value = 'Anual';
            duracionSelect.disabled = true;
        } else {
            duracionSelect.disabled = false;
        }

        calcularTotal();
    }

    // Función para manejar la selección del pack extra
    function manejarSeleccionDePackExtra() {
        const packExtraSeleccionado = packExtraSelect.value;

        if (packExtraSeleccionado === 'Deporte') {
            duracionSelect.value = 'Anual'; 
            duracionSelect.disabled = true; 
        } else {
            duracionSelect.disabled = false; 
        }

        calcularTotal();
    }

    // Asignamos los eventos para poder ejecutar las funciones correspondientes
    packExtraSelect.addEventListener('change', manejarSeleccionDePackExtra);
    planSelect.addEventListener('change', manejarSeleccionDePlan);
    packSelect.addEventListener('change', manejarSeleccionDePack);
    duracionSelect.addEventListener('change', calcularTotal);

    // Restricción de planes y packs según la edad que tiene el cliente
    edadInput.addEventListener('input', () => {
        const edad = parseInt(edadInput.value, 10);

        // Reseteamos selección de los packs
        packSelect.selectedIndex = -1;

        if (edad < 18) {
            // Solo permitir el plan "Basico"
            planSelect.value = 'Basico';
            planSelect.querySelectorAll('option').forEach(option => {
                option.disabled = option.value !== 'Basico';
            });

            //Solo poder ver el pack "Infantil"
            let infantilSeleccionado = false;
            packs.forEach(pack => {
                if (pack.value === 'Infantil') {
                    pack.hidden = false;
                    if (!infantilSeleccionado) {
                        pack.selected = true;
                        infantilSeleccionado = true;
                    }
                } else {
                    pack.hidden = true;
                    pack.selected = false;
                }
            });

        } else {
            planSelect.querySelectorAll('option').forEach(option => {
                option.disabled = false;
            });

            // Mostrar todos los packs
            packs.forEach(pack => {
                pack.hidden = false;
            });
        }

        calcularTotal();
    });

    // Agregamos validación para que los menores de 18 años no puedan seleccionar planes o packs incorrectos
    planSelect.addEventListener('change', () => {
        const planSeleccionado = planSelect.value;
        const edad = parseInt(edadInput.value, 10);

        if (edad < 18) {
            if (planSeleccionado !== 'Basico') {
                alert('Solo el plan Basico está disponible para menores de 18 años.');
                planSelect.value = 'Basico';  // Restablece a Basico
            }

            if (packSelect.value !== 'Infantil') {
                alert('Solo el pack Infantil está disponible para menores de 18 años.');
                packSelect.value = 'Infantil'; // Restablece a Infantil
            }
        }
        calcularTotal();
    });

    form.addEventListener('submit', function (event) {
        const edad = parseInt(edadInput.value, 10);

        if (edad < 18) {
            // Si el cliente es menor de 18 años, se asegura que el plan y pack sean los correctos
            if (planSelect.value !== 'Basico' || packSelect.value !== 'Infantil') {
                alert('Solo el plan "Basico" y el pack "Infantil" están disponibles para menores de 18 años.');
                event.preventDefault();
            }
        }
    });

    calcularTotal();
});
