function ToggleMode() {
    let stilus = document.getElementById("stilus");
    console.log(stilus);
    if (stilus.getAttribute("href") == "../cssek/stilus.css") {
      stilus.href = "../cssek/sotet.css";
      document.getElementById("kep22").src = "../kepek/palyak/las vegas dark.png";
    } else {
      stilus.href = "../cssek/stilus.css";
    }
  }
  