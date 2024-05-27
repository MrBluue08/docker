document.addEventListener('DOMContentLoaded', function(){
    const inputPromoCost = document.getElementById('inputPromoCost');
    const inputBaseCost = document.getElementById('inputBaseCost');
    const inputInsuranceCost = document.getElementById('inputInsuranceCost');
    const inputTotalCost = document.getElementById('inputTotalCost');

    // Function to update total cost
    function updateTotalCost() {
        const promoCost = parseFloat(inputPromoCost.value) || 0;
        const baseCost = parseFloat(inputBaseCost.value) || 0;
        const insuranceCost = parseFloat(inputInsuranceCost.value) || 0;
        const totalCost =  baseCost - promoCost + insuranceCost;
        // Limiting decimal places to 2
        inputTotalCost.value = totalCost.toFixed(2); 
    }

    // Event listeners for input fields
    inputPromoCost.addEventListener('input', updateTotalCost);
    inputBaseCost.addEventListener('input', updateTotalCost);
    inputInsuranceCost.addEventListener('input', updateTotalCost);

    let imgInput = document.getElementById('inputPromotionalImage');
    let img = document.getElementById('imgPreProm');
    imgInput.addEventListener('change', function(){
        let file = imgInput.files[0];
        let reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    })

    let imgInputSt = document.getElementById('inputStrcutureImage');
    let imgSt = document.getElementById('imgPreSt');
    imgInputSt.addEventListener('change', function(){
        let file = imgInputSt.files[0];
        let reader = new FileReader();
        reader.onload = function(e) {
            imgSt.src = e.target.result;
        }
        reader.readAsDataURL(file);
    })


})