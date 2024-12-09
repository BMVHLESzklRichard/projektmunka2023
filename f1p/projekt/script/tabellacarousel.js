setTimeout(() => {
    let top3pilota = document.getElementById("top3pilota");
let top3csapat = document.getElementById("top3csapat");
let prevTop3 = document.getElementById("prevTop3");
let nextTop3 = document.getElementById("nextTop3");
console.log(top3pilota);
console.log(top3csapat);

prevTop3.addEventListener("click",pilotaTabellaDisplay);

function pilotaTabellaDisplay() {
    top3pilota.classList.add("active");
    top3pilota.classList.remove("hide");
    top3csapat.classList.add("hide");
    prevTop3.style.display = "none";
    nextTop3.style.display = "block";
};

nextTop3.addEventListener("click",csapatTabellaDisplay);
function csapatTabellaDisplay() {
    top3pilota.classList.add("hide");
    top3csapat.classList.remove("hide");
    top3csapat.classList.add("active");
    nextTop3.style.display = "none";
    prevTop3.style.display = "block";
};
}, 2500);