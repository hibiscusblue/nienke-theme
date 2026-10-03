document.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".nienke-menu");
  const toggle = document.querySelector(".nienke-menu-toggle");
  const nav = document.querySelector(".nienke-main-nav");

  if (!menu || !toggle) return;


  /* ========================================
     OPEN / CLOSE
     ======================================== */

  const setMenuState = (open) => {
    menu.classList.toggle("is-open", open);

    toggle.setAttribute(
      "aria-expanded",
      open ? "true" : "false"
    );

    toggle.setAttribute(
      "aria-label",
      open ? "Close menu" : "Open menu"
    );
  };


  /* ========================================
     BUNNY CLICK
     ======================================== */

  toggle.addEventListener("click", () => {
    const isOpen = menu.classList.contains("is-open");

    setMenuState(!isOpen);
  });


  /* ========================================
     ESCAPE KEY
     ======================================== */

  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;

    if (!menu.classList.contains("is-open")) return;

    setMenuState(false);

    toggle.focus();
  });


  /* ========================================
     CLICK NAVIGATION LINK
     ======================================== */

  if (nav) {
    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        setMenuState(false);
      });
    });
  }


  /* ========================================
     CLICK OUTSIDE MENU
     ======================================== */

  document.addEventListener("click", (event) => {
    if (!menu.classList.contains("is-open")) return;

    if (menu.contains(event.target)) return;

    setMenuState(false);
  });

});