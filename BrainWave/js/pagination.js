document.addEventListener("DOMContentLoaded", function () {
  var btnBackward = document.querySelector(".btn-backward");
  var btnForward = document.querySelector(".btn-forward");

  var currentIndex = 0;

  var psicologos = document.querySelectorAll(".card");

  mostrarPsicologo(currentIndex);

  btnBackward.addEventListener("click", function () {
    if (currentIndex > 0) {
      currentIndex--;
      mostrarPsicologo(currentIndex);
    }
  });

  btnForward.addEventListener("click", function () {
    if (currentIndex < psicologos.length - 1) {
      currentIndex++;
      mostrarPsicologo(currentIndex);
    }
  });

  function mostrarPsicologo(index) {
    psicologos.forEach(function (psicologo) {
      psicologo.style.display = "none";
    });

    psicologos[index].style.display = "block";

    btnBackward.disabled = index === 0;
    btnForward.disabled = index === psicologos.length - 1;
  }
});
