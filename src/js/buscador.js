(function () {
  const fechaInput = document.querySelector("#fecha");

  if (fechaInput) {
    fechaInput.addEventListener("input", (e) => {
      const fechaSeleccionada = e.target.value;

      window.location = `?fecha=${fechaSeleccionada}`;
    });
  }
})();
