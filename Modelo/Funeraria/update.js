document.getElementById("formulario1").addEventListener("submit", function(event) {
  event.preventDefault(); // evita que se envíe el formulario automáticamente

  var formData = new FormData(document.getElementById("formulario1")); // obtiene los datos del formulario
  console.log(formData); // muestra los datos del formulario en la consola del navegador
  var xhr = new XMLHttpRequest(); // crea una nueva solicitud AJAX
  xhr.open("POST", "update.php"); // especifica la dirección del servidor

  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = xhr.responseText; // obtiene la respuesta del servidor
      if (xhr.status >= 200 && xhr.status < 300) {
        alert("Los datos se guardaron correctamente"); // muestra un mensaje de éxito si el código de estado es válido
      } else {
        alert("Error al guardar los datos"); // muestra un mensaje de error si el código de estado no es válido
      }
    } else {
      alert("Error al guardar los datos"); // muestra un mensaje de error si la solicitud AJAX no se completó correctamente
    }
  };

  xhr.send(formData); // envía los datos del formulario al servidor
});