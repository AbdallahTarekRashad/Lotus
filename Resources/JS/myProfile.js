////////////
/*
    var editProductButton_ = document.getElementById("editProductButton");
    var editProductForm_ = document.getElementById("editProductForm");
    var editButton_ = document.getElementById("editButton");
    var applyButton_ = document.getElementById("applyButton");

    editButton_.onclick = function() {
        "use strict";
        editProductButton_.style.display = "none";
        editProductForm_.style.display = "block";
    };
    applyButton_.onclick = function() {
        "use strict";
        editProductForm_.style.display = "none";
        editProductButton_.style.display = "block";
    };
*/   
    

// Password 
var pwd_ = document.getElementById("pwd");
var rpwd_ = document.getElementById("rpwd");
var notMateched_ = document.getElementById("notMatched");
var matched_ = document.getElementById("matched");

rpwd_.onkeyup = function() {
    if (rpwd_.value == pwd_.value) {
        notMateched_.style.display = "none";
        matched_.style.display = "block";
        rpwd_.style.borderColor = "green";
    }
    else {
        matched_.style.display = "none";
        notMateched_.style.display = "block";
        rpwd_.style.borderColor = "red";
    }
};