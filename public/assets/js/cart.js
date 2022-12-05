document.getElementById("decrease").addEventListener("click", function () {
  var input = document.getElementById("quantity");
  var value = parseInt(input.value, 10); 
  if (value > 1) {
    value = isNaN(value)? 0 : value;
    value --;
    input.value = value;
}});

document.getElementById("increase").addEventListener("click", function () {
  var input = document.getElementById("quantity");
        var value = parseInt(input.value, 10); 
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
});


// get value
var nameProd = document.getElementById("product-name").textContent;
var priceProd = document.getElementById("product-price").textContent;
var labelProd = document.getElementById("type").textContent;
var chckBox = document.getElementById("check-item");

// inner html
var nameSumm = document.getElementById("name-summary");
var qntySumm = document.getElementById("quantity-summary");
var priceSumm = document.getElementById("price-summary");
var labelSumm = document.getElementById("label-summary");
var subSumm = document.getElementById("total-price");
var totalSumm = document.getElementById("total-summary");

chckBox.addEventListener("click", function (){
if (chckBox.checked == true){
  document.getElementById("btn-con").removeAttribute("style");
  document.getElementById("product").removeAttribute("style");
  document.getElementById("total").removeAttribute("style");
  nameSumm.innerHTML = nameProd;
  priceSumm.innerHTML = "Rp." + priceProd;
  qntySumm.innerHTML =  document.getElementById("quantity").value;
  labelSumm.innerHTML = labelProd;
  subSumm.innerHTML = "Rp." + priceProd * document.getElementById("quantity").value + ".000";
  var tot = subSumm.innerHTML = "Rp." + priceProd * document.getElementById("quantity").value + ".000";
  totalSumm.innerHTML = tot;
}
else{
  document.getElementById("product").style = "display: none;";
  document.getElementById("btn-con").style = "background-color: #3333; color: black; cursor: no-drop;";
  document.getElementById("total").style = "display: none;";
}});




function trash(url){ 

  let y = document.getElementById('box1')

  $.ajax({
    type: 'GET',
    url: url,
    success: function (response) {
      y.innerHTML = response
    }
  });
}

