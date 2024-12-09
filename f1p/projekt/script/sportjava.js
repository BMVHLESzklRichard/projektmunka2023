setTimeout(() => {

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
        if (x.matches) { // Iha egyezik a képernyő méret
            menetelem.innerHTML = `<a href="teljes.php"><span class="hu">Menetrend</span>
   <span class="en">Schedule</span></a>`;
            tabellaelem.innerHTML = `<a href="teljestabella.php"> <span class="hu">Tabellák</span>
   <span class="en">Other news</span></a>`; ////////////DFdssdfsdfdsfd
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

    myFunction(x) // meghívja a függvényt az oldal indulásakor
    x.addListener(myFunction);

}, 2600);
