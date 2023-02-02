// kereső cucc
let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
// let searchBoxCancel = document.querySelector(".search-box .bx-x");

searchBox.addEventListener("click", () => {
  navbar.classList.toggle("showInput");
  if (navbar.classList.contains("showInput")) {
    searchBox.classList.replace("bx-search", "bx-x");
  } else {
    searchBox.classList.replace("bx-x", "bx-search");
  }
});

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
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function () {
  navLinks.classList.toggle("show1");
}
let moreArrow = document.querySelector(".more-arrow");
moreArrow.onclick = function () {
  navLinks.classList.toggle("show2");
}
let jsArrow = document.querySelector(".js-arrow");
jsArrow.onclick = function () {
  navLinks.classList.toggle("show3");
}


function ToggleMode() {
  let stilus = document.getElementById("stilus");
  if (stilus.getAttribute("href") == "../cssek/stilus.css") {
    stilus.href = "../cssek/darkk.css";
  } else {
    stilus.href = "../cssek/stilus.css";
  }
}

function userjelen() {

  if (document.querySelector(".felnev").innerHTML != "Guest")
  {
    if (document.getElementById("adat").className == "displéj")
      document.getElementById("adat").className = "useradatok";
    else
    {
      document.getElementById("adat").className = "displéj";
      document.querySelectorAll(".akarmi").classList.add("mindre");
    }
      
  }
  else
  {
    document.getElementById("adat").innerHTML = `<div class="kepesnev">
    <div class="belsokep">
        <img src="../kepek/logo2.png">
    </div>
    <div class="belsofelhasznalo">
        <p class="felnev">Guest</p>
    </div>
    <div class="permis">
    <p class="felnev">Guest</p>
    </div>
    <div class="kilep">
        <p><a href="../belepes/belepproj.php">LOG IN</a></p>
    </div>
</div>`;
    if (document.getElementById("adat").className == "displéj")
      document.getElementById("adat").className = "useradatok";
    else
    {
      document.getElementById("adat").className = "displéj";
    }

  }

}



//menetrend show

function Menet()
{
let almenuu = document.getElementById("almenuu");
almenuu.classList.add("almenulat");
};

function Menetkuka()
{
let almenuu = document.getElementById("almenuu");
almenuu.classList.remove("almenulat");
};
