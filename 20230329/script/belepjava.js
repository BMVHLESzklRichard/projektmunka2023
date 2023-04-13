const hamburger_menu = document.querySelector(".hamburger-menu");
const container = document.querySelector(".fo");

hamburger_menu.addEventListener("click", () => {
  container.classList.toggle("active");
});






// // Visszaszámláló

// //Innen számolunk vissza
// let countDownDate = new Date ("March 5, 2023 14:00:00").getTime();

// //Frissítjuk a visszaszámlálót sec-enként
// let x = setInterval(function()
// {
//   //Mai dátum
//   let most = new Date().getTime();

//   //A két időpont közötti távolság
//   let tavolsag = countDownDate - most;

//   //Átváltások javarészt

//   let napok = Math.floor(tavolsag / (1000 * 60 * 60 * 24));
//   let orak = Math.floor((tavolsag % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   let percek = Math.floor((tavolsag % (1000 * 60 * 60)) / (1000 * 60));
//   let masodpercek = Math.floor((tavolsag % (1000 * 60)) / 1000);


//   document.getElementById("proba").innerHTML = napok + " nap "+ orak + " óra " + percek +" perc " + masodpercek + " másodperc " + "Van hátra a szezon kezdetéig";


//   //Ha lejárt ezt fogja kiírni elvileg

//   if(tavolsag < 0)
//   {
//     clearInterval(x);
//     document.getElementById("proba").innerHTML = "A szezon elrajtolt juhéé !!!"
//   }
// }, 1000);