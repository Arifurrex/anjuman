const historyBtn = document.getElementById("historyBtn");
const dot = document.getElementById("dot");
const moreText = document.getElementById("more");

historyBtn.addEventListener('click', function () {

    if (dot.style.display === "none") {
        historyBtn.innerHTML = "বিস্তারিত জানতে";
        moreText.style.display = "none";
        dot.style.display = "inline"; 
    } else {
         dot.style.display = "none"; 
         historyBtn.innerHTML = "read less";
        moreText.style.display = "inline"; 
      }

});



