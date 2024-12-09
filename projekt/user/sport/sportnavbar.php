<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="sport.php"><img src="../../kepek/ujlogo.png" alt="" class="logonk"></a>
        </div>
        <div class="nav-links" id="navkis">
            <div class="sidebar-logo">
                <span class="logo-name">R.N.</span>
                <div class="felhasznalokis" onclick="userjelen()" id="kivanbent">
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
                <li><a href="sport.php">    <span class="hu">Főoldal</span>
    <span class="en">Home page</span></a></li>
                <li id="menetelem">
                    <a href="teljes.php" id="menetrend">    <span class="hu">Menetrend</span>
    <span class="en">Schedule</span></a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                </li>
                <li id="tabellaelem">
                    <a href="teljestabella.php">    <span class="hu">Tabellák</span>
    <span class="en">Standings</span></a>
                    <i class='bx bxs-chevron-down js-arrow arrow '></i>
                </li>
                <li><a href="osszesfutam.php"> <span class="hu">Eredmények</span>
                <span class="en">Results</span></a></li>
                <li><a href="stats.php"><span class="hu">Statisztika</span>
    <span class="en">Statistics</span>
    <!-- <span class="bottom"></span> -->
</li>
                <li><a href="#rolunk">    <span class="hu">Rólunk</span>
    <span class="en">About Us</span></li>
    <li><a href="../felhasznaloiFelulet/user.php">    <span class="hu">Hírek</span>
    <span class="en">News</span></a></li>
            </ul>
        </div>
        <div class="felhasznalo" id="sportDisplay">
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
                <h2> <a href="teljes.php"> <span class="hu">Teljes Menetrend</span>
    <span class="en">Full Schedule</span></a></h2>
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