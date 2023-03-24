// kereső cucc
let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
// let searchBoxCancel = document.querySelector(".search-box .bx-x");

// searchBox.addEventListener("click", () => {
//   navbar.classList.toggle("showInput");
//   if (navbar.classList.contains("showInput")) {
//     searchBox.classList.replace("bx-search", "bx-x");
//   } else {
//     searchBox.classList.replace("bx-x", "bx-search");
//   }
// });

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


// oldalsó cucc almenü
// let htmlcssArrow = document.querySelector(".htmlcss-arrow");
// htmlcssArrow.onclick = function () {
//   navLinks.classList.toggle("show1");
// }
// let moreArrow = document.querySelector(".more-arrow");
// moreArrow.onclick = function () {
//   navLinks.classList.toggle("show2");
// }
// let jsArrow = document.querySelector(".js-arrow");
// jsArrow.onclick = function () {
//   navLinks.classList.toggle("show3");
// }






let navkicsi = document.getElementById("navkis");


console.log(navkicsi);

function userjelen() {

  if (document.querySelector(".felnev").innerHTML != "Guest") {
    if (document.getElementById("adat").className == "displéj")
    {
      document.getElementById("adat").className = "system";
      navkicsi.style.left = "-100%";
      console.log(navkicsi)
      
    }
    else {
      document.getElementById("adat").className = "displéj";
      navkicsi.style.left = "-100%";
      console.log(navkicsi)
    }
  }
  else {
    if (document.getElementById("adat").className == "displéj")
    {
      document.getElementById("adat").className = "system";
      navkicsi.style.left = "-100%";
      console.log(navkicsi)
      
    }
    else {
      document.getElementById("adat").className = "displéj";
      navkicsi.style.left = "-100%";
      console.log(navkicsi)
    }

  }

}


//menetrend show
let menetelem2 = document.getElementById("tabellaelem");
console.log(menetelem2);
let almenuu2 = document.getElementById("almenuu2");
console.log(almenuu2);

let menetelem = document.getElementById("menetelem");
let almenuu = document.getElementById("almenuu");
console.log(almenuu);

console.log(menetelem);
const x = window.matchMedia("(max-width: 925px)");

function myFunction(x) {
  if (x.matches) { // If media query matches
    console.log("He");
    menetelem.innerHTML = `<a href="teljes.php">Menetrend</a>`;
    menetelem2.innerHTML = `<a href="teljestabella.php">Tabellák</a>`;
  } else {
    menetelem2.addEventListener("mouseenter", Menet2);
    menetelem2.addEventListener("mouseleave", Menetkuka2);
almenuu2.addEventListener("mouseenter", Menet2);
almenuu2.addEventListener("mouseleave", Menetkuka2);


console.log("AHUGRABUGBA");
console.log("Collin");

function Menet2() {
  almenuu2.classList.add("almenulat2");
  console.log(almenuu2);
};

function Menetkuka2() {
  almenuu2.classList.remove("almenulat2");
};
    menetelem.addEventListener("mouseenter", Menet);
    almenuu.addEventListener("mouseenter", Menet);
    menetelem.addEventListener("mouseleave", Menetkuka);
    almenuu.addEventListener("mouseleave", Menetkuka);


    console.log("Harry ne");
    function Menet() {
      almenuu.classList.add("almenulat");
      console.log(menetelem);
    };

    function Menetkuka() {
      almenuu.classList.remove("almenulat");
    };


  }
}

myFunction(x) // Call listener function at run time
x.addListener(myFunction);


//Kártyák
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
    
   for (let index = 0; index < magyar.length; index++)
   {
    console.log(magyar[index].className);
    if(magyar[index].className == "hu")
    {
      magyar[index].classList.add("magyarnincs");
      angol[index].classList.add("angolvan");
    }
    else
    {
      magyar[index].classList.remove("magyarnincs");
      angol[index].classList.remove("angolvan");
    }
   }
}



