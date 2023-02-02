let eng = document.getElementById("eng");
let bodii = document.getElementById("bodii");
console.log(eng);
console.log(bodii);
eng.addEventListener("mouseenter", mouseenter);
eng.addEventListener("mouseleave", mouseLeave);

function mouseenter() {
  bodii.classList.add(".csere2");
  bodii.classList.remove(".csere");
}

function mouseLeave() {
    bodii.classList.remove(".csere2");
    bodii.classList.add(".csere");
  }