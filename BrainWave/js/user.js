document.addEventListener("DOMContentLoaded", function () {
    // Captura el formulario de inicio de sesión
    var loginForm = document.getElementById("myForm");

    // Agrega un evento de escucha para el envío del formulario
    loginForm.addEventListener("submit", function (event) {
        // Previene el envío del formulario predeterminado
        event.preventDefault();

        // Captura los datos del formulario
        var formData = new FormData(loginForm);

        // Crea una nueva solicitud XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "processLogin.php", true);

        // Maneja la carga de la solicitud
        xhr.addEventListener("load", function () {
           
            if (xhr.status === 200) {
                // Respuesta del servidor recibida correctamente
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                if (response.status === "success") {

                    localStorage.setItem('user', JSON.stringify(response.username));
                    // Redirige al usuario a la página de inicio después del inicio de sesión
                    setTimeout(function () {
                        window.location.href = "profileUser.php";
                    }, 2000);
                } else {
                    // Muestra un mensaje de error al usuario
                    alert(response.message);
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
});
