function ToggleMode() {
  let stilus2 = document.getElementById("stilus2");
  console.log(stilus2);
  if (stilus2.getAttribute("href") == "../../cssek/stilus.css") {
    stilus2.href = "../../cssek/sotet.css";
  } else {
    stilus2.href = "../../cssek/stilus.css";
  }
}