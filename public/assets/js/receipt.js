
var modalRec = document.getElementById("myReceipt");

// Get the button that opens the modal
var btnRec = document.getElementById("btn-receipt");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-rec")[0];

// When the user clicks the button, open the modal 
function On_click(url){
  modalRec.style.display = "block";

  document.getElementById('modalForm').action = url;

}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modalRec.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modalRec) {
    modalRec.style.display = "none";
  }
}

