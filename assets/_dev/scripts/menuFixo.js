function menuFixo() {
  /* MENU FIXO */
  const mainMenu = document.querySelector(".header");
  const fixedMenu = "fixed";

  function menuFixo() {
    const windowTop = window.pageYOffset;
    if (windowTop > 350) {
      mainMenu.classList.add(fixedMenu);
    } else {
      mainMenu.classList.remove(fixedMenu);
    }
  }

  window.addEventListener("scroll", function () {
    menuFixo();
  });
}

menuFixo();
