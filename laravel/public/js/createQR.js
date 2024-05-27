document.addEventListener("DOMContentLoaded", function() {
    let tds = document.getElementsByClassName('qrCode');
    let roomId = document.getElementById('roomID').value;
    qrList = Array.from(tds);
    qrList.forEach((element) => {
        console.log(tds);
        element.innerHTML = generateQRCode(element.id);
    });
    
    function generateQRCode(text) {
        var qr = qrcode(0, 'M');
        qr.addData('localhost:8000/admin/saveTime/'+text+'/'+roomId);
        qr.make();
        return qr.createImgTag(4, 8);
    }
});



// // Function to generate QR code
// function generateQRCode(text) {
//     var qr = qrcode(0, 'M');
//     qr.addData(text);
//     qr.make();
//     return qr.createImgTag(4, 8); // Adjust size as needed
// }

// // Example: Generate QR code for a sample text
// var qrText = "";
// var qrCodeImage = generateQRCode(qrText);

// // Display the generated QR code
// document.getElementById("qrcode").innerHTML = qrCodeImage;