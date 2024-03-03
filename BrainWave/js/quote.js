document.addEventListener("DOMContentLoaded", function () {
  var citaForm = document.getElementById("quoteForm");

  citaForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar que el formulario se envíe por defecto

    // Obtener los valores del formulario
    var fecha = document.getElementById("fecha").value;
    var hora = document.getElementById("hora").value;

    // Obtener el ID del psicólogo y el nombre de usuario de la URL
    var urlParams = new URLSearchParams(window.location.search);
    var id_psicologo = urlParams.get("psicologo");
    var usuario = localStorage.getItem("user");

    // Crear un objeto con los datos a enviar
    var data = {
      fecha: fecha,
      hora: hora,
      id_psicologo: id_psicologo,
      usuario: usuario,
    };

    // Realizar la solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "programQuote.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status === "ok") {
            alert("Cita programada correctamente.");
            setTimeout(function () {
              window.location.href = `seeDate.php?user=${usuario}`;
            }, 3000); // 3000 milisegundos = 3 segundos
          } else {
            alert("Error al programar la cita. Inténtalo de nuevo.");
          }
          // La solicitud se completó correctamente
          console.log(xhr.responseText);
        } else {
          // Hubo un error en la solicitud
          console.error("Error en la solicitud: " + xhr.statusText);
          alert("Error al programar la cita. Inténtalo de nuevo.");
        }
      }
    };

    // Convertir el objeto de datos a formato JSON y enviarlo
    xhr.send(JSON.stringify(data));
  });
});
