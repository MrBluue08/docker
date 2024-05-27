
document.getElementById('formEditInsurance').addEventListener('submit', function() {
    var checkbox = document.getElementById('flexSwitchCheckChecked');
    if (!checkbox.checked) {
        // Si el checkbox no está marcado, cambia el valor del campo a "no_marcado"
        checkbox.value = '0';
    } else if(checkbox.checked){
        checkbox.value='1';
    }
});