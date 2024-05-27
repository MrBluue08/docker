document.addEventListener('DOMContentLoaded', function(){
    let imgInput = document.getElementById('logo');
    let img = document.getElementById('img');
    imgInput.addEventListener('change', function(){
        let file = imgInput.files[0];
        let reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    })
})