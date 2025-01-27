const preciosPlanes = {
    Basico: 9.99,
    Estandar: 13.99,
    Premium: 17.99
};
  
  const preciosPacks = {
    Deporte: 6.99,
    Cine: 7.99,
    Infantil: 4.99
};

function validarYCalcular() {
    const plan = document.getElementById("plan").value;
    const edad = parseInt(document.getElementById("edad").value);
    const duracion = document.getElementById("duracion").value;
    const pack = Array.from(document.getElementById("packs").selectedOptions).map(option => option.value);
  
    let mensajeError = '';
    let costoTotal = preciosPlanes[plan];

    if (edad < 18 && !pack.includes("Infantil")) {
      mensajeError = "Los usuarios menores de 18 años solo pueden contratar el pack Infantil.";
    }

    if (plan === "Basico" && pack.length > 1) {
      mensajeError = "El Plan Básico solo puede tener un paquete adicional.";
    }

    if (pack.includes("Deporte") && duracion === "Mensual") {
      mensajeError = "El paquete Deporte solo puede ser contratado con una suscripción Anual.";
    }

    let costoPacks = 0;
    pack.forEach(pack => {
      costoPacks += preciosPacks[pack];
    });
  
    costoTotal += costoPacks;

    document.getElementById("costo-total").textContent = `Costo Total: ${costoTotal.toFixed(2)} €`;

    if (mensajeError) {
      alert(mensajeError);
    }
}

document.getElementById("plan").addEventListener("change", validarYCalcular);
document.getElementById("edad").addEventListener("input", validarYCalcular);
document.getElementById("packs").addEventListener("change", validarYCalcular);
document.getElementById("duracion").addEventListener("change", validarYCalcular);

window.onload = validarYCalcular;
  