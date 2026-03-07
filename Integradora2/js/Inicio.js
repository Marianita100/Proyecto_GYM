let currentRotation = 0;
let isPaused = false;
const carousel = document.getElementById("carousel");

function selectSlide(index){

    if(!isPaused){
        carousel.classList.add("paused");
        currentRotation = index * -90;
        carousel.style.transform = "rotateY(" + currentRotation + "deg)";
        isPaused = true;

    }else{
        carousel.classList.remove("paused");
        carousel.style.transform = "";
        isPaused = false;
    }
}
