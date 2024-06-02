var modal = document.getElementById("zoom");
var modalImg = document.getElementById("zoomImg");
var images = document.querySelectorAll(".galery .image");

images.forEach(function(image) {
  image.addEventListener("click", function() {
    modal.style.display = "block"; 
    modalImg.src = this.querySelector("img").src; 
  });
});


var closeBtn = document.querySelector(".close");
closeBtn.addEventListener("click", function() {
  modal.style.display = "none"; 
});

$(document).ready(function () {
  // Initialize AOS
  AOS.init();
});


    // Get the modal
    var modal = document.getElementById('feedbackModal');

    // Get the button that opens the modal
    var btn = document.getElementById("feedbackBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


