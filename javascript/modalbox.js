// Get the modal
var modalCart = document.getElementById('modalCart');
var modalBill = document.getElementById('modalBill');

// Get the button that opens the modal
var cartBtn = document.getElementById("cartBtn");
var billBtn = document.getElementById("billBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal 
cartBtn.onclick = function () {
    modalCart.style.display = "block";
}

billBtn.onclick = function () {
    modalBill.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span[0].onclick = function () {
    modalCart.style.display = "none";
    modalBill.style.display = "none";
}

span[1].onclick = function () {
    modalCart.style.display = "none";
    modalBill.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modalCart) {
        modalCart.style.display = "none";
    }
    else if (event.target == modalBill) {
        modalBill.style.display = "none";
    }
}
