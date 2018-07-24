var price_ = document.getElementById("price");
var quantity_ = document.getElementById("quantity");
var total_price = document.getElementById("total_price");

quantity_.onkeyup = function(){
    'use srtics';
    var result = quantity_.value * parseFloat(price_.innerText);
    result = Number(result).toFixed(2);
    total_price.innerHTML = result;
};