 //Innen számolunk vissza
 const countdown = document.querySelector(".szamlalogrid");

 const interval = setInterval(() => {
   const deadline = new Date ("March 05, 2023 14:55:00").getTime();
 
   const current = new Date();
 
   const diff = deadline - current;
 
   const days = Math.floor(diff / (1000 * 60 * 60 * 24)) + "";
   const hours = Math.floor((diff / (1000 * 60 * 60)) % 24) + "";
   const minutes = Math.floor((diff / (1000 * 60)) % 60) + "";
   const seconds = Math.floor((diff / 1000) % 60) + "";
 
   countdown.innerHTML = `
     <div data-content="Days" class="szin" id="napszam">${days.length === 1 ? `0${days}` : days}</div>
     <div data-content="Hours" class="szin" id="oraszam">${hours.length === 1 ? `0${hours}` : hours}</div>
     <div data-content="Minutes" class="szin" id="percszam">${
       minutes.length === 1 ? `0${minutes}` : minutes
     }</div>
     <div data-content="Seconds" class="szin" id="mpszam">${
       seconds.length === 1 ? `0${seconds}` : seconds
     }</div>
 `;
 
   if (diff < 0) {
     clearInterval(interval);
     countdown.innerHTML = "Biztonsági öveket becsatolni!";
     document.getElementById("hh").innerHTML = "";
   }
 
   document.querySelector(".reset").addEventListener("click", () => {
     clearInterval(interval);
 
     const divs = document.querySelectorAll(".szamlalogrid div");
 
     divs.forEach((div) => {
       div.innerHTML = "00";
     });
   });
 }, 1000);
 