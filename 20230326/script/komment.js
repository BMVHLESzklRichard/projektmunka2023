const chatBox = document.querySelector(".chatUzenetek");

const inputField = document.getElementById("szoveg");
const sendBtn = document.getElementById("new");


chatBox.onmouseenter = ()=>{
chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
chatBox.classList.remove("active");
}

//AJAX a chat felülethez
setInterval(() =>{
let xhr = new XMLHttpRequest();
xhr.open("GET", "kommentbe.php", true);
xhr.onload = ()=>{
if (xhr.readyState === XMLHttpRequest.DONE) {
if (xhr.status === 200) {
    let data = xhr.response;
    chatBox.innerHTML = data;
    if(!chatBox.classList.contains("active")){
        scrollToBottom();
    }
}
}
}
xhr.send();
}, 500)

function scrollToBottom(){
chatBox.scrollTop = chatBox.scrollHeight;
}

//Chat üzenet elküldése enter megnyomásakor
inputField.addEventListener("keypress", function(event) {
if (event.key === "Enter") {
event.preventDefault();
sendBtn.click();
scrollToBottom();
}
})

console.log(inputField);


function morecomment()
{
    console.log("bem");    
}


function kommentjelen()
{
    if (document.getElementById("nincskom").className == "nincskomment")
    {
      document.getElementById("nincskom").className = "kommentek";      
    }
    else {
      document.getElementById("nincskom").className = "nincskomment";
    }    
}