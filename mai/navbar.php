<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="user.php"><img src="../kepek/ujlogo.png" alt="" class="logonk"></a>
        </div>
        <div class="nav-links" id="navkis">
            <div class="sidebar-logo">
                <span class="logo-name">R.N.</span>
                <div class="felhasznalokis" id="kivanbent">
                    <div class="kepbutton" onclick="userjelen()">
                        <?php
                        echo "<img src=../kpes/" . $foto . ">";
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
                <li><a href="user.php">Főoldal</a></li>
                <li id="menetelem">
                    <a href="teljes.php" id="menetrend">Menetrend</a>
                    <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                </li>
                <li id="tabellaelem">
                    <a href="teljestabella.php">Tabellák</a>
                    <i class='bx bxs-chevron-down js-arrow arrow '></i>
                </li>
                <li><a href="#rolunk">Rólunk</a></li>
                <li><a href="#elerthetoseg">Elérhetőségeink</a></li>
            </ul>
        </div>
        <div class="search-box">
            <i class='bx bx-search'></i>
            <div class="input-box">
                <input type="text" placeholder="Search...">
            </div>
        </div>
        <div class="felhasznalo">
            <div class="kepbutton" onclick="userjelen()">
                <a href="#top">
                    <?php
                    echo "<img src=../kpes/" . $foto . ">";
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
                <h2> <a href="teljes.php"> Teljes menetrend</a></h2>
            </div>

            <?php
            echo $futammenu;
            ?>
        </div>
    </div>
    <div class="almenu2" id="almenuu2">
        <div class="alalmenu2">
            <div class="felirat">
                <h2><a href="teljestabella.php">Tabellák</a></h2>
            </div>
            <?php
            echo $tabellamenu;
            ?>
        </div>
    </div>
</nav>