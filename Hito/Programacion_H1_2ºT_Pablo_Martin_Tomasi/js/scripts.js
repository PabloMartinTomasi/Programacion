document.addEventListener("DOMContentLoaded", function () {
    pack();
    document.getElementById('edad').addEventListener('input', pack);

    calcular_total(); 
    document.getElementById("plan").addEventListener("change", calcular_total);
    document.getElementById("pack").addEventListener("change", function() {
        calcular_total();
        controlarDuracion();
    });
    document.getElementById("duracion").addEventListener("change", calcular_total);
});

function pack(){
    const edad = document.getElementById('edad').value;
    const selecionar_pack = document.getElementById('pack');


    if (edad < 18) {
        for (let option of selecionar_pack.options){
            if (option.value !== 'Infantil'){
                option.disabled = true;
            } else{
                option.disabled = false;
            }
        }
    } else{
        for (let option of selecionar_pack.options){
            option.disabled = false;
        }
    }
}

function controlarDuracion(){
    const packSelecionado = document.getElementById('pack').value;
    const duracionSelecionado = document.getElementById('duracion');

    if (packSelecionado === 'Deporte'){
        duracionSelecionado.value = 'Anual';
        for (let option of duracionSelecionado.options){
            if (option.value === 'Mensual'){
                option.disabled = true;
            } else{
                option.disabled = false;
            }
        }
    } else{
        for (let option of duracionSelecionado.options){
            option.disabled = false;
        }
    }

    calcular_total();
}

function calcular_total(){
    const selecionarPlan = document.getElementById('plan');
    const selecionarPack = document.getElementById('pack');
    const duracionPago = document.getElementById('duracion');

    const precio_plan = {
        'Basico' : 9.99,
        'Estandar' : 13.99,
        'Premium' : 17.99
    }

    const precio_pack = {
        'Deporte' : 6.99,
        'Cine' : 7.99,
        'Infantil' : 4.99
    }

    const planselecionado = selecionarPlan.value;
    const packselecionado = selecionarPack.value;
    const duracionpago = duracionPago.value;

    let costoMensual = 0;

    if (precio_plan[planselecionado]) {
        costoMensual += precio_plan[planselecionado];
    }

    if (precio_pack[packselecionado]) {
        costoMensual += precio_pack[packselecionado];
    }

    if (duracionpago === 'Anual') {
        costoMensual *= 12;
    }

    const costoTotal = document.getElementById('total');
    costoTotal.textContent = `Costo Total: ${costoMensual.toFixed(2)} €`;
}