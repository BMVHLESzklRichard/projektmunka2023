const hamburger_menu = document.querySelector(".hamburger-menu");
const container = document.querySelector(".fo");

hamburger_menu.addEventListener("click", () => {
  container.classList.toggle("active");
});
