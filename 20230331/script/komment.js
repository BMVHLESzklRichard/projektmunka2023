let morecommentgomb = document.querySelector(".tobbkomment");

const chatBox = document.querySelector(".chatUzenetek");
function morecomment() {
  // let commentclass = document.getElementById("comment");
  if (chatBox.className == "comment chatUzenetek") {
    morecommentgomb.innerHTML = "Kevesebb hozzászólás";
    chatBox.classList.add("morecommentclass");
  }
  else {
    chatBox.classList.remove("morecommentclass");
    morecommentgomb.innerHTML = "Többi hozzászólás";
  }
}


const inputField = document.getElementById("szoveg");
const sendBtn = document.getElementById("new");


chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");

  
}//AJAX a chat felülethez
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "kommentbe.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
        const ovanbent = document.querySelector(".felnev").innerHTML;
        const oirt = document.getElementById("oirt").innerHTML;

        let popdown1 = document.getElementById("elsole");
        let popdown2 = document.getElementById("masodikle");
        let popup1 = document.getElementById("elsofel");


        console.log("szia");
        if (oirt != ovanbent) {
          popdown1.classList.add("popdown");
          popdown2.classList.add("popdown");
          popup1.classList.add("popup");
        }
        else {
          popdown1.classList.remove("popdown");
          popdown2.classList.remove("popdown");
          popup1.classList.remove("popup");
        }

      }
    }
  }
  xhr.send();
}, 3000)

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}

//Chat üzenet elküldése enter megnyomásakor
inputField.addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    sendBtn.click();
    scrollToBottom();
  }
})


function kommentjelen() {
  if (document.getElementById("nincskom").className == "nincskomment") {
    document.getElementById("nincskom").className = "kommentek";
  }
  else {
    document.getElementById("nincskom").className = "nincskomment";
  }
}

