setTimeout(() => {

  let navbar = document.querySelector(".navbar");


  // oldalsó cucc
  let navLinks = document.querySelector(".nav-links");
  let menuOpenBtn = document.querySelector(".navbar .bx-menu");
  let menuCloseBtn = document.querySelector(".nav-links .bx-x");
  menuOpenBtn.onclick = function () {
    navLinks.style.left = "0";
  }
  menuCloseBtn.onclick = function () {
    navLinks.style.left = "-100%";
  }


  let navkicsi = document.getElementById("navkis");

  let bezarkep = document.getElementById("bezarkep");
  console.log(bezarkep);
if (bezarkep != null) {
  bezarkep.addEventListener("click", userjelen);
}

  

  let sportBezarkep = document.getElementById("sportBezarkep");
  console.log(sportBezarkep);

  if (sportBezarkep != null) {
    sportBezarkep.addEventListener("click", userjelen);
  }

  let felhasznalo = document.querySelector(".felhasznalo");
  felhasznalo.addEventListener("click", userjelen);

  let felhasznalokis = document.querySelector(".felhasznalokis");
  felhasznalokis.addEventListener("click", userjelen);

  let felhasznaloDisplay = document.getElementById("felhasznaloDisplay");
  console.log("adwdasd " + felhasznaloDisplay);

  if (felhasznaloDisplay != null) {
    felhasznaloDisplay.addEventListener("click", userjelen);
  }

  let sportDisplay = document.getElementById("sportDisplay");

  console.log("SSSS" + sportDisplay);

  if (sportDisplay != null) {
    sportDisplay.addEventListener("click", userjelen);
  }

  function userjelen() {

    if (document.querySelector(".felnev").innerHTML != "Guest") {
      if (document.getElementById("adat").className == "display_data") {
        document.getElementById("adat").className = "system";
        navkicsi.style.left = "-100%";
      }
      else {
        document.getElementById("adat").className = "display_data";
        navkicsi.style.left = "-100%";
      }
    }
    else {
      if (document.getElementById("adat").className == "display_data") {
        document.getElementById("adat").className = "system";
        navkicsi.style.left = "-100%";

      }
      else {
        document.getElementById("adat").className = "display_data";
        navkicsi.style.left = "-100%";
      }

    }

  }

  //Sávok
  const panels = document.querySelectorAll('.panel')
  //klikk esményre az active osztály hozzá adása az adott panelhez
  panels.forEach(panel => {
    panel.addEventListener('click', () => {
      removeActiveClasses()
      panel.classList.add('active');

    })
  })
  //acitve osztály eltávolítása
  function removeActiveClasses() {
    panels.forEach(panel => {
      panel.classList.remove('active');

    })
  }

  let magyar = document.getElementsByClassName("hu");
  let angol = document.getElementsByClassName("en");

  function Changelang() {

    for (let index = 0; index < magyar.length; index++) {
      if (magyar[index].className == "hu") {
        magyar[index].classList.add("magyarnincs");
        angol[index].classList.add("angolvan");
      }
      else {
        magyar[index].classList.remove("magyarnincs");
        angol[index].classList.remove("angolvan");
      }
    }
  }



}, 2600);



