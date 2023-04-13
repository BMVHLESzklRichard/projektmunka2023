function ToggleMode() {
    let stilus = document.getElementById("stilus");
    console.log(stilus);
    if (stilus.getAttribute("href") == "../cssek/stilus.css") {
      stilus.href = "../cssek/sotet.css";
    } else {
      stilus.href = "../cssek/stilus.css";
    }
  }
  