function snackbarAnimate(message) {
    var y = document.getElementById("snackbar");

    // Add the "show" class to DIV
    y.innerHTML = message;
    y.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        y.className = y.className.replace("show", "");
    }, 3000);
}