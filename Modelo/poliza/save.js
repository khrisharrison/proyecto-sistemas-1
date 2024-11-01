desactivarform2();
document.getElementById("my-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita que se envíe el formulario automáticamente

  var formData = new FormData(document.getElementById("my-form")); // Obtiene los datos del formulario
  var xhr = new XMLHttpRequest(); // Crea una nueva solicitud AJAX
  xhr.open("POST", "guardar.php"); // Especifica la dirección del servidor

  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = xhr.responseText; // Obtiene la respuesta del servidor
      if (xhr.status >= 200 && xhr.status < 300) {
        alert("Los datos se guardaron correctamente"); // Muestra un mensaje de éxito si el código de estado es válido
        disableFormFields(); // Deshabilita los campos del formulario
        activarform2(); // Activa el formulario 2
      } else {
        alert("Error al guardar los datos"); // Muestra un mensaje de error si el código de estado no es válido
      }
    } else {
      alert("Error al guardar los datos"); // Muestra un mensaje de error si la solicitud AJAX no se completó correctamente
    }
  };

  xhr.send(formData); // Envía los datos del formulario al servidor
});

function disableFormFields() {
  var formFields = document.getElementById("my-form").elements; // Obtiene los elementos del formulario
  for (var i = 0; i < formFields.length; i++) {
    formFields[i].disabled = true; // Establece el atributo "disabled" en "true" para cada elemento del formulario
  }
}
function activarform2() {
  var formFields = document.getElementById("form2").elements; // Obtiene los elementos del formulario
  for (var i = 0; i < formFields.length; i++) {
    formFields[i].disabled = false; // Establece el atributo "disabled" en "true" para cada elemento del formulario
  }
}

function desactivarform2() {
  var formFields = document.getElementById("form2").elements; // Obtiene los elementos del formulario
  for (var i = 0; i < formFields.length; i++) {
    formFields[i].disabled = true; // Establece el atributo "disabled" en "true" para cada elemento del formulario
  }
}