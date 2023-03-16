<div class="displéj" id="adat">
    <div class="useradatok">
      <div class="kepesnev">
        <div class="belsokep">
          <h3>Felhasználónév</h3>
          <div class="nembaj">
            <div class="bskep">
              <?php
              echo "<img src=../kpes/" . $foto . ">";
              ?>
            </div>
            <div class="bsszoveg">
              <?php
              echo "<p class=" . "felnev" . ">" . $kivanbent . "</p>";
              ?>
            </div>
          </div>
        </div>
        <div class="belsofelhasznalo">
          <h3>Jogosultság</h3>
          <?php
          echo "<p class=" . "felnev" . ">" . $permission . "</p>";
          ?>
        </div>
      </div>
      <div class="beallitasok">
        <h3>Beállítások</h3>
        <div class="beallitasokkis">
          <div class="csusz">  <p>Sötét mód:</p>
                        <label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode">
                        <span class="slider round"></span>
                    </label></div>
                    <div class="nyelvcs">
                        <p>Nyelv:</p>
                        <a href="lang.php">
                            <img src="../kepek/eart.png" alt="">
                        </a>
                    </div>
        </div>
      </div>
      <?php
            echo $admin; 
        ?>
    </div>
  </div>