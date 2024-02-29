let slideShowIndex = 0;
showImageSlides();

function showImageSlides() {
    let i;
    let slides = document.getElementsByClassName("image-Slides");
    let dots = document.getElementsByClassName("slide-dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideShowIndex++;
    if (slideShowIndex > slides.length) {
        slideShowIndex = 1;
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideShowIndex - 1].style.display = "block";
    dots[slideShowIndex - 1].className += " active";
    setTimeout(showImageSlides, 3000); // Change image every 2 seconds
}
