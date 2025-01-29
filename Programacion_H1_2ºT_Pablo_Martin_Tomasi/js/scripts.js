function pack(){
    const edad = parseInt(document.getElementById('edad').value);
    const selecionar_pack = document.getElementById('pack');
    const selecionar_duracion = document.getElementById('duracion');

    if (edad < 18) {
        for (let i = 0; i < selecionar_pack.options.length; i++) {
            const option = selecionar_pack.options[i];
            if (option.value !== 'Infantil') {
                option.disabled = true;
            } else {
                option.disabled = false;
                option.selected = true;
            }
        }
    } else {
        for (let i = 0; i < selecionar_pack.options.length; i++) {
            selecionar_pack.options[i].disabled = false;
        }
    }

    if (selecionar_duracion.value === 'Deporte'){
        for (let i = 0; i < selecionar_duracion.options.length; i++) {
            const option = selecionar_duracion.options[i];
            if (option.value=== 'Mensual'){
                option.disabled = true;
            }
        }
        selecionar_duracion.value = 'Anual';
    } else{
        for (let i = 0; i < selecionar_duracion.options.length; i++){
            selecionar_duracion.options[i].disabled = false;
        }
    }
}
