
const sliderWrapper = document.querySelector('.image-wrapper')
const sliderImages = document.querySelectorAll('.slider-image')
const slideDuration = 5000
let slideIndex = 0
let sliderTimers = []

const nextSlideButton = document.querySelector('#slider-next')
const prevSlideButton = document.querySelector('#slider-prev')

export function nextSlide() {
  slideIndex++
  if (slideIndex >= sliderImages.length) {
    // reset index on last image
    slideIndex = 0;
  }
  sliderWrapper.style.left = `-${slideIndex * 100}%`;
  updateSlideARIA(slideIndex);
}

export function prevSlide() {
  slideIndex--;
  if (slideIndex < 0) {
    // go to last slide
    slideIndex = sliderImages.length - 1;
  }
  sliderWrapper.style.left = `-${slideIndex * 100}%`;
  updateSlideARIA(slideIndex);
}

export function resetTimer() {
  sliderTimers.forEach(t => {
    clearInterval(t);
  })
  let timer = setInterval(() => {
      nextSlide()
  }, slideDuration)
  sliderTimers.push(timer);
}

export function updateSlideARIA(slideIndex) {
  console.log(`slide index: ${slideIndex}`)
  sliderImages.forEach((img, i) => {
    if(i === slideIndex) {
      img.setAttribute('aria-hidden', 'false');
    } else {
      img.setAttribute('aria-hidden', 'true');
    }
  })
}

// EVENT HANDLERS
nextSlideButton.addEventListener('click', () => {
  nextSlide()
  resetTimer()
})

prevSlideButton.addEventListener('click', () => {
  prevSlide()
  resetTimer()
})


// start slide rotation
resetTimer()



