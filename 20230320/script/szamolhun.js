 //Innen számolunk vissza
 const countdown = document.querySelector(".szamlalogrid");

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
     <div data-content="Nap" class="szin" id="napszam">${days.length === 1 ? `0${days}` : days}</div>
     <div data-content="Óra" class="szin" id="oraszam">${hours.length === 1 ? `0${hours}` : hours}</div>
     <div data-content="Perc" class="szin" id="percszam">${
       minutes.length === 1 ? `0${minutes}` : minutes
     }</div>
     <div data-content="Másodperc" class="szin" id="mpszam">${
       seconds.length === 1 ? `0${seconds}` : seconds
     }</div>
 `;
 
   if (diff < 0) {
     clearInterval(interval);
     countdown.innerHTML = "Kedves olvasóink kapcsolják be biztonsági öveiket!";
     document.getElementById("hh").innerHTML = "";
   }

   let element2 = document.getElementById('mpszam');
   
   
   if(element2.innerHTML % 2 == 0)
   {
     
     element2.classList.add("hatter");
    }

  let element3 = document.getElementById('percszam');

     
 if(element2.innerHTML == 59)
 {
   element3.classList.add("hatter");
  }
  else
  {
    element3.classList.remove("hatter");
 }



 let element4 = document.getElementById('oraszam');

    
 if(element3.innerHTML == 59)
 {
   element4.classList.add("hatter");
  }
  else
  {
    element4.classList.remove("hatter");
 }

let element = document.getElementById('napszam');

   
if(element4.innerHTML == 59)
{
  element.classList.add("hatter");
 }
 else
 {
   element.classList.remove("hatter");
}

 }, 1000);




