const bgImages = ["./backend/images/one.jpg","./backend/images/two.jpg","./backend/images/three.jpg"];
let currentIndex = 0;
function changeBackgroundImage() {
  const carouselElement = document.getElementById("bg-carousel");
  carouselElement.style.backgroundImage = `url(${bgImages[currentIndex]})`;
  currentIndex = (currentIndex + 1) % bgImages.length;
}
setInterval(changeBackgroundImage, 3000);
