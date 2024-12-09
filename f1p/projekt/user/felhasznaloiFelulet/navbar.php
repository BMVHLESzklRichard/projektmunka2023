<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="user.php"><img src="../../kepek/ujlogo.png" alt="" class="logonk"></a>
        </div>
        <div class="nav-links" id="navkis">
            <div class="sidebar-logo">
                <span class="logo-name">R.N.</span>
                <div class="felhasznalokis" id="kivanbent">
                    <div class="kepbutton">
                        <?php
                        echo "<img src=../../kpes/" . $foto . ">";
                        ?>
                        <div class="felnev">
                            <?php
                            $kivanbent
                                ?>
                        </div>

                    </div>
                </div>
                <i class='bx bx-x'></i>
            </div>
            <ul class="links">
                <li><a href="fohirek.php"> <span class="hu">Fő hírek</span>
                        <span class="en">Main news</span></a></li>
                <li id="mellekhirek">
                    <a href="mellekhirek.php"> <span class="hu">Mellék hírek</span>
                        <span class="en">Other news</span></a>
                </li>
                <li id="menetelem" style="display: flex">
                    <a href="../sport/teljes.php"><span class="hu">Menetrend</span>
                    <span class="en">Schedule</span></a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                </li>
                <li><a href="osszescikk.php"> <span class="hu">Összes cikk</span>
                        <span class="en">All articles</span></a></li>
                <li><a href="#rolunk"> <span class="hu">Rólunk</span>
                        <span class="en">About Us</span></a></li>
                <li><a href="../sport/sport.php"> <span class="hu">Formula 1</span>
                        <span class="en">Formula 1</span></a></li>
            </ul>
        </div>
        <div class="felhasznalo" id="felhasznaloDisplay">
            <div class="kepbutton">
                <a href="#top">
                    <?php
                    echo "<img src=../../kpes/" . $foto . ">";
                    ?>
                </a>
                <div class="felnev">
                    <?php
                    $kivanbent
                        ?>
                </div>
            </div>
        </div>
    </div>
    <div class="almenu" id="almenuu">
        <div class="alalmenu">
            <div class="felirat">
                <h2><span class="hu">A soron következő 4 futam:</span>
                    <span class="en">The next 4 races:</span>
                </h2>
            </div>

            <?php
            echo $futammenu;
            ?>
        </div>
    </div>
    <div class="almenu2" id="almenuu2">
        <div class="alalmenu2">
            <div class="felirat">
                <h2><a href="teljestabella.php"><span class="hu">Tabellák</span>
                        <span class="en">Standings</span></a></h2>
            </div>
            <?php
            echo $tabellamenu;
            ?>
        </div>
    </div>
</nav>