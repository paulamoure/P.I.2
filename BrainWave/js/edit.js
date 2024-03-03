document.addEventListener("DOMContentLoaded", function () {
  var editButton = document.getElementById("edit-button");
  var editFormContainer = document.getElementById("edit-form-container");

  editButton.addEventListener("click", function () {
    editFormContainer.style.display = "block";

    document.getElementById("overlap").classList.add("blur-background");
  });

  

  document
    .getElementById("edit-user-form")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      var formData = new FormData(this);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "procesar_formulario.php", true);

      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
          let response = JSON.parse(xhr.responseText);

          if (response.status === "success") {
            setTimeout(function () {
              window.location.href = "profileUser.php";
            }, 2000);
          } else {
            alert(response.message);
          }
        } else {
          console.error("Error en la petición: " + xhr.statusText);
        }
      };

      xhr.send(formData);
    });
});
