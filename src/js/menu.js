(function () {
  const menuButton = document.querySelector("#header__close");
  const menuNav = document.querySelector("#header__nav-bar");

  if (menuButton) {
    menuButton.addEventListener("click", () => {
      menuNav.classList.toggle("mostrar");
    });
  }
})();
