
var modalNotif = document.getElementById("myNotif");

// Get the button that opens the modal
var btnNotif = document.getElementById("btn-notif-rev");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-notif")[0];

// When the user clicks the button, open the modal 
function On_klik(clicked) {
  modalNotif.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modalNotif.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modalNotif) {
    modalNotif.style.display = "none";
  }
}

