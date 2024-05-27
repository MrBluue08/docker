document.addEventListener('DOMContentLoaded', function(){
  // ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('highlight')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  console.debug('update', fileNumber, percent, total)
  progressBar.value = total
}
function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
	let img = document.createElement('img')
	img.src = reader.result
	document.getElementById('gallery').appendChild(img)
  }
}

// Dentro de la función handleFiles
function handleFiles(files) {
    files = [...files]
    initializeProgress(files.length)
    files.forEach((file, index) => uploadFile(file, index, document.getElementById('roomId').value))
    files.forEach(previewFile)
}

// Modifica la función uploadFile para aceptar el parámetro roomId
function uploadFile(file, i, roomId) {
    var url = '/admin/uploadRoomImages';
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    xhr.open('POST', url, true);

    // Agregar el token CSRF
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    // Update progress
    xhr.upload.addEventListener("progress", function (e) {
        updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
    })

    xhr.addEventListener('readystatechange', function (e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            updateProgress(i, 100)
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            // Manejar errores aquí
        }
    })

    xhr.addEventListener('load', function() {
      if (xhr.status === 200) {
          // Si la respuesta es exitosa, mostrar un alert
          alert('Todas las imágenes han sido subidas exitosamente.');
      } else {
          // Si hay algún error en la respuesta, informar al usuario
          alert('Ha ocurrido un error al subir las imágenes.');
      }
  });

    formData.append('upload_preset', 'ujpu6gyk');
    formData.append('file', file);
    formData.append('roomId', roomId); // Agrega el roomId al FormData
    xhr.send(formData);
}
  function showMessage(message) {
    // Crear un elemento div para mostrar el mensaje
    var messageDiv = document.createElement('div');
    messageDiv.textContent = message;
    messageDiv.classList.add('success-message');

    // Agregar el mensaje al cuerpo del documento
    document.body.appendChild(messageDiv);

    // Desvanecer el mensaje después de un cierto tiempo
    // setTimeout(function() {
    //     messageDiv.style.display = 'none';
    // }, 3000); // 3 segundos
  } 

})