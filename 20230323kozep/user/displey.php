<div class="displéj" id="adat">
    <div class="useradatok">
      <div class="kepesnev">
        <div class="belsokep">
          <h3>
            <span class="hu">Felhasználónév</span>
            <span class="en">Username</span>
          </h3>
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
          <div class="valtoztatas">
          <?php            echo $kepcsere;         ?>
          </div>
        </div>
        <div class="belsofelhasznalo">
        <h3>
          
        <span class="hu">Jogosultság</span>
            <span class="en">Permission</span>
        </h3>
          <?php
          echo "<p class=" . "felnev" . ">" . $permission . "</p>";
          ?>
        </div>
      </div>
      <div class="beallitasok">
        <h3>
        <span class="hu">Beállítások</span>
            <span class="en">Settings</span>
        </h3>
        <div class="beallitasokkis">
          <div class="csusz"> 
            <p>
              <span class="hu">Sötét mód</span>
             <span class="en">Dark mode</span>
          </p>
                    <label class="switch">
                        <input type="checkbox" onclick="ToggleMode()" id="dark-mode">
                        <span class="slider round"></span>
                   </label></div>
                   <div class="nyelvcs">
                        <p>
                        <span class="hu">Nyelv:</span>
                        <span class="en">Language:</span>
                        </p>
                        <button onclick="Changelang()">
                        <span class="hu"><img src="../kepek/uk-flag.gif" alt="earth" class="langkep"></span>
                        <span class="en"><img src="../kepek/hu-flag.gif" alt="earth" class="langkep"></span>
                      </button>
                   </div>
        </div>
        
      </div>
      <?php
            echo $admin; 
        ?>
    </div>
  </div>