//Made by: Roberto Ochoa Cuevas.
const openEls = document.querySelectorAll("[data-open]");
const closeEls = document.querySelectorAll("[data-close]")

const isVisible = "is-visible";

//Abrir modal
for(const el of openEls) {
  el.addEventListener("click", function() {
    const modalId = this.dataset.open;
    document.getElementById(modalId).classList.add(isVisible);
  });
}

//Cerrar modal usando el boton
for (const el of closeEls) {
    el.addEventListener("click", function() {
      this.parentElement.parentElement.parentElement.classList.remove(isVisible);
    });
  }

//Cerrar modal haciendo click fuera del modal  
document.addEventListener("click", e => {
  if (e.target == document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});

//Cerrar modal usando la tecla ESC
document.addEventListener("keyup", e => {
  if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});