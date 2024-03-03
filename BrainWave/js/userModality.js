
document.addEventListener("DOMContentLoaded", function() {
    // Obtener los botones de selección por su ID
    var presencialButton = document.getElementById("presencialButton");
    var virtualButton = document.getElementById("virtualButton");
    

    // Agregar un evento de clic a los botones de selección
    presencialButton.addEventListener("click", function() {
     
        // Redirigir al usuario a la página selectPsicology.php
        window.location.href = "selectPsicology.php?modalidad=presential";
    });

    virtualButton.addEventListener("click", function() {
        // Redirigir al usuario a la página selectPsicology.php
        window.location.href = "selectPsicology.php?modalidad=virtual";
    });
});
