const evento = document.querySelectorAll(".event");
const eventDot = document.querySelectorAll("#eventDot");
const moreTxt = document.querySelectorAll("#Eventmore");
const buttonEvent = document.querySelectorAll("#EventButton");

var i = 0;
for (let i = 0; i < buttonEvent.length; i++) {
    buttonEvent[i].addEventListener("click", function () {
        console.log(i);
        if (eventDot[i].style.display === "none") {
        eventDot[i].style.display = "inline";
        moreTxt[i].style.display = "none";
        buttonEvent[i].innerHTML = "বিস্তারিত জানতে";

    } else {
        eventDot[i].style.display = "none";
        moreTxt[i].style.display = "inline";
        buttonEvent[i].innerHTML = "read less";
    }
    });
}
// buttonEvent.addEventListener("click", function () {
//     if (eventDot.style.display === "none") {
//         eventDot.style.display = "inline";
//         moreTxt.style.display = "none";
//         buttonEvent.innerHTML = "বিস্তারিত জানতে";

//     } else {
//         eventDot.style.display = "none";
//         moreTxt.style.display = "inline";
//         buttonEvent.innerHTML = "read less";
//     }
// })