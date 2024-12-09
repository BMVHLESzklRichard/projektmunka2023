setTimeout(() => {

    //menetrend show
    let mellekhirek = document.getElementById("mellekhirek");
    console.log(mellekhirek);

    let menetelem = document.getElementById("menetelem");
    let almenuu = document.getElementById("almenuu");
    console.log(almenuu);

    console.log(menetelem);
    const x = window.matchMedia("(max-width: 925px)");

    function myFunction(x) {
        if (x.matches) { // Iha egyezik a képernyő méret
            menetelem.innerHTML = `<a href="../sport/teljes.php"><span class="hu">Menetrend</span>
   <span class="en">Schedule</span></a>`;
            if (mellekhirek != null) {
                mellekhirek.innerHTML = `<a href="mellekhirek.php"> <span class="hu">Mellék hírek</span>
   <span class="en">Other news</span></a>`; ////////////DFdssdfsdfdsfd
            }
        } else {
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

    myFunction(x) // meghívja a függvényt az oldal indulásakor
    x.addListener(myFunction);

}, 2600);
