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
let tabellaelem = document.getElementById("tabellaelem");
console.log(tabellaelem);
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
    tabellaelem.innerHTML = `<a href="teljestabella.php">Tabellák</a>`;
  } else {
    tabellaelem.addEventListener("mouseenter", TabellaVan);
    tabellaelem.addEventListener("mouseleave", TabellaNincs);
almenuu2.addEventListener("mouseenter", TabellaVan);
almenuu2.addEventListener("mouseleave", TabellaNincs);

function TabellaVan() {
  almenuu2.classList.add("almenulat2");
};

function TabellaNincs() {
  almenuu2.classList.remove("almenulat2");
};
    menetelem.addEventListener("mouseenter", MenetVan);
    almenuu.addEventListener("mouseenter", MenetVan);
    menetelem.addEventListener("mouseleave", MenetNincs);
    almenuu.addEventListener("mouseleave", MenetNincs);


    function MenetVan() {
      almenuu.classList.add("almenulat");
    };

    function MenetNincs() {
      almenuu.classList.remove("almenulat");
    };


  }
}

myFunction(x) // Call listener function at run time
x.addListener(myFunction);


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
    
   for (let index = 0; index < magyar.length; index++)
   {
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



