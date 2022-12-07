
var modalEmail = document.getElementById("myEmail");

// Get the button that opens the modal
var btnEmail = document.getElementById("btn-email-rev");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-email")[0];

// When the user clicks the button, open the modal 
function On_klik(clicked) {
  modalEmail.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modalEmail.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modalEmail) {
    modalEmail.style.display = "none";
  }
}


var modalPw = document.getElementById("myPw");

// Get the button that opens the modal
var btnPw = document.getElementById("btn-pw-rev");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-pw")[0];

// When the user clicks the button, open the modal 
function On_klick(clicked) {
  modalPw.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modalPw.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modalPw) {
    modalPw.style.display = "none";
  }
}

