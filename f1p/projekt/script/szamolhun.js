console.log("geefsfesfsf")
setTimeout(() => {
   //Innen számolunk vissza
 const countdown = document.querySelector(".szamlalogrid");
 console.log("ge")
 console.log(document.getElementById("kovfutamido"))
 const kovfutamido = document.getElementById("kovfutamido").innerHTML;


 const interval = setInterval(() => {
   const deadline = new Date (kovfutamido).getTime();
 
   const current = new Date();
 
   const diff = deadline - current;
 
   const days = Math.floor(diff / (1000 * 60 * 60 * 24)) + "";
   const hours = Math.floor((diff / (1000 * 60 * 60)) % 24) + "";
   const minutes = Math.floor((diff / (1000 * 60)) % 60) + "";
   const seconds = Math.floor((diff / 1000) % 60) + "";
 
   countdown.innerHTML = `
     <div data-content="Nap/Days" class="szin" id="napszam">${days.length === 1 ? `0${days}` : days}</div>
     <div data-content="Óra/Hours" class="szin" id="oraszam">${hours.length === 1 ? `0${hours}` : hours}</div>
     <div data-content="Perc/Mins" class="szin" id="percszam">${
       minutes.length === 1 ? `0${minutes}` : minutes
     }</div>
     <div data-content="Mp/Secs" class="szin" id="mpszam">${
       seconds.length === 1 ? `0${seconds}` : seconds
     }</div>
 `;
 
   if (diff < 0) {
     clearInterval(interval);
     countdown.innerHTML = "Kedves olvasóink kapcsolják be biztonsági öveiket!";
     document.getElementById("hh").innerHTML = "";
   }

   let mpszam = document.getElementById('mpszam');
   
   if(mpszam.innerHTML % 2 == 0)
   {
     
     mpszam.classList.add("hatter");
    }

  let percszam = document.getElementById('percszam');

     
 if(mpszam.innerHTML == 59)
 {
   percszam.classList.add("hatter");
  }
  else
  {
    percszam.classList.remove("hatter");
 }



 let oraszam = document.getElementById('oraszam');

    
 if(percszam.innerHTML == 59 && mpszam.innerHTML == 59)
 {
   oraszam.classList.add("hatter");
  }
  else
  {
    oraszam.classList.remove("hatter");
 }

let napszam = document.getElementById('napszam');

   
if(oraszam.innerHTML == 23 && percszam.innerHTML == 59&& mpszam.innerHTML == 59)
{
  napszam.classList.add("hatter");
 }
 else
 {
   napszam.classList.remove("hatter");
}


 }, 1000);





}, 3000);