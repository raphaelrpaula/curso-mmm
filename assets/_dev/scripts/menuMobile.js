function menuMobile() {
  const btnMenu = document.getElementById("btn-menu");
  const mobileMenu = document.getElementById("mobile-menu");
  const menuList = mobileMenu.querySelectorAll("nav ul li");

  function handleToggleMenu(e) {
    if (e.type === "touchstart") e.preventDefault();
    btnMenu.classList.toggle("active");
    mobileMenu.classList.toggle("open");

    const active = mobileMenu.classList.contains("open");
    btnMenu.setAttribute("aria-expanded", active);

    if (active) {
      btnMenu.setAttribute("aria-label", "Fechar menu");
    } else {
      btnMenu.setAttribute("aria-label", "Abrir menu");
    }
  }

  function handleCloseMenu() {
    btnMenu.classList.remove("active");
    mobileMenu.classList.remove("open");
    btnMenu.setAttribute("aria-label", "Abrir menu");
    btnMenu.setAttribute("aria-expanded", "false");
  }

  btnMenu.addEventListener("click", handleToggleMenu);
  btnMenu.addEventListener("touchstart", handleToggleMenu);

  menuList.forEach((item) => {
    item.addEventListener("click", handleCloseMenu);
  });
}

menuMobile();
