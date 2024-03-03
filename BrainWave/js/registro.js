document.addEventListener("DOMContentLoaded", function () {
    // Captura el formulario
    var form = document.getElementById("myForm");
  
    // Agrega un evento de escucha para el envío del formulario
    form.addEventListener("submit", function (event) {
      // Previene el envío del formulario predeterminado
      event.preventDefault();
  
      // Captura los datos del formulario
      var formData = new FormData(form);
  
      // Crea una nueva solicitud XMLHttpRequest
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "processReg.php", true);
  
      // Maneja la carga de la solicitud
      xhr.addEventListener("load", function () {
        console.log('aaaa')
        if (xhr.status === 200) {
          // Respuesta del servidor recibida correctamente
          console.log("Respuesta del servidor: ", xhr.responseText);
          var response = JSON.parse(xhr.responseText);
          if (response.status === "error") {
            showNotification("error", response.message);
          } else {
            showNotification("success", response.message);
            // Redirige al usuario a la página de inicio de sesión después de 3 segundos
            setTimeout(function () {
              window.location.href = 'login.php';
            }, 3000); // 3000 milisegundos = 3 segundos
          }
        } else {
          // Error al enviar la solicitud
          console.error("Error al enviar la solicitud: ", xhr.status);
        }
      });
  
      // Maneja los errores de red o de la solicitud
      xhr.addEventListener("error", function () {
        console.error("Error de red o de la solicitud al enviar datos.");
      });
  
      // Envía los datos del formulario
      xhr.send(formData);
    });
  
    // Muestra la notificación
    function showNotification(type, message) {
      var notificationDiv = document.getElementById("notification");
      notificationDiv.innerHTML =
        '<div class="' + type + '">' + message + "</div>";
  
      // Limpia la notificación después de un cierto tiempo (por ejemplo, 5 segundos)
      setTimeout(function () {
        notificationDiv.innerHTML = "";
      }, 5000);
    }
  });
  