document.addEventListener('DOMContentLoaded', function () { 
    const edadInput = document.getElementById('edad');
    const packs = document.querySelectorAll('#pack option');
    const packSelect = document.getElementById('pack');
    const planSelect = document.getElementById('plan');
    const duracionSelect = document.getElementById('duracion');
    const totalCost = document.getElementById('total');
    const PacksExtraContainer = document.getElementById('pack_extra_container');
    const packExtraSelect = document.getElementById('pack_adicional'); 

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
        const packExtraSeleccionado = packExtraSelect.value;

        if (!planSeleccionado || !packSeleccionado) return;

        const precioPlan = preciosPlanes[planSeleccionado] || 0;
        const precioPack = preciosPacks[packSeleccionado] || 0;
        const precioPackExtra = preciosPacksExtra[packExtraSeleccionado] || 0;

        let total = precioPlan + precioPack + precioPackExtra;

        if (duracionSeleccionada === 'Anual') {
            total *= 12;
        }

        totalCost.textContent = `Costo Total: ${total.toFixed(2)} €`;
    }

    function manejarSeleccionDePlan() {
        const planSeleccionado = planSelect.value;

        if (planSeleccionado === 'Estandar' || planSeleccionado === 'Premium') {
            PacksExtraContainer.style.display = 'block';
        } else {
            PacksExtraContainer.style.display = 'none';
        }

        calcularTotal();
    }

    function manejarSeleccionDePack() {
        const packSeleccionado = packSelect.value;

        packExtraSelect.querySelectorAll('option').forEach(option => {
            option.hidden = option.value === packSeleccionado;
        });

        if (packSeleccionado === 'Deporte') {
            duracionSelect.value = 'Anual';
            duracionSelect.disabled = true;
        } else {
            duracionSelect.disabled = false;
        }

        calcularTotal();
    }

    function manejarSeleccionDePackExtra() {
        const packExtraSeleccionado = packExtraSelect.value;

        packs.forEach(pack => {
            if (packExtraSeleccionado && pack.value === packExtraSeleccionado) {
                pack.hidden = true;
            } else {
                pack.hidden = false;
            }
        });

        if (packExtraSeleccionado === 'Deporte') {
            duracionSelect.value = 'Anual';
            duracionSelect.disabled = true;
        } else {
            duracionSelect.disabled = false;
        }

        calcularTotal();
    }

    packExtraSelect.addEventListener('change', manejarSeleccionDePackExtra);
    planSelect.addEventListener('change', manejarSeleccionDePlan);
    packSelect.addEventListener('change', manejarSeleccionDePack);
    duracionSelect.addEventListener('change', calcularTotal);

    // Restricción de planes y packs según edad
    edadInput.addEventListener('input', () => {
        const edad = parseInt(edadInput.value, 10);

        // Reseteamos selección de packs
        packSelect.selectedIndex = -1;

        if (edad < 18) {
            // Solo permitir el plan "Basico"
            planSelect.value = 'Basico';
            planSelect.querySelectorAll('option').forEach(option => {
                option.disabled = option.value !== 'Basico';
            });

            // Solo permitir el pack "Infantil"
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
            // Habilitar todos los planes nuevamente
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
                planSelect.value = 'Basico';  // Restablecer a 'Basico'
            }

            if (packSelect.value !== 'Infantil') {
                alert('Solo el pack Infantil está disponible para menores de 18 años.');
                packSelect.value = 'Infantil';  // Restablecer a 'Infantil'
            }
        }
        calcularTotal();
    });

    // Inicializamos el cálculo total al cargar la página
    calcularTotal();
});
