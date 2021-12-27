const eventDot = document.getElementById("eventDot");
const moreTxt = document.getElementById("Eventmore");
const buttonEvent = document.getElementById("EventButton");
buttonEvent.addEventListener("click", function () {
    if (eventDot.style.display === "none") {
        eventDot.style.display = "inline";
        moreTxt.style.display = "none";
        buttonEvent.innerHTML="read more"

    } else {
        eventDot.style.display = "none";
        moreTxt.style.display = "inline";
        buttonEvent.innerHTML = "read less";
    }
})