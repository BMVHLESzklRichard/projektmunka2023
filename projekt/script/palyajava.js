setTimeout(() => {

    //menetrend show
    let palyaTabellaelem = document.getElementById("palyaTabellaelem");
    console.log(palyaTabellaelem);
    let palyaAlmenuu2 = document.getElementById("palyaAlmenuu2");
    console.log(palyaAlmenuu2);

    let palyaMenetelem = document.getElementById("palyaMenetelem");
    let palyaAlmenuu = document.getElementById("palyaAlmenuu");
    console.log(palyaAlmenuu);

    console.log(palyaMenetelem);
    const x = window.matchMedia("(max-width: 925px)");

    function myFunction(x) {
        if (x.matches) { // Iha egyezik a képernyő méret
            palyaMenetelem.innerHTML = `<a href="../teljes.php"><span class="hu">Menetrend</span>
   <span class="en">Schedule</span></a>`;
            palyaTabellaelem.innerHTML = `<a href="../teljestabella.php"> <span class="hu">Tabellák</span>
   <span class="en">Standings</span></a>`; ////////////DFdssdfsdfdsfd
        } else {
            palyaTabellaelem.addEventListener("mouseenter", TabellaVan);
            palyaTabellaelem.addEventListener("mouseleave", TabellaNincs);
            palyaAlmenuu2.addEventListener("mouseenter", TabellaVan);
            palyaAlmenuu2.addEventListener("mouseleave", TabellaNincs);

            function TabellaVan() {
                palyaAlmenuu2.classList.add("almenulat2");
            };

            function TabellaNincs() {
                palyaAlmenuu2.classList.remove("almenulat2");
            };
            palyaMenetelem.addEventListener("mouseenter", MenetVan);
            palyaAlmenuu.addEventListener("mouseenter", MenetVan);
            palyaMenetelem.addEventListener("mouseleave", MenetNincs);
            palyaAlmenuu.addEventListener("mouseleave", MenetNincs);


            function MenetVan() {
                palyaAlmenuu.classList.add("almenulat");
                
    console.log(palyaMenetelem);
            };

            function MenetNincs() {
                palyaAlmenuu.classList.remove("almenulat");
            };


        }
    }

    myFunction(x) // meghívja a függvényt az oldal indulásakor
    x.addListener(myFunction);

}, 2600);
