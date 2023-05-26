
const sliderWrapper = document.querySelector('.image-wrapper')
const sliderImages = document.querySelectorAll('.slider-image')
const slideDuration = 5000
let slideIndex = 0
let sliderTimers = []

const nextSlideButton = document.querySelector('#slider-next')
const prevSlideButton = document.querySelector('#slider-prev')

function nextSlide() {
  slideIndex++
  if (slideIndex >= sliderImages.length) {
    // reset index on last image
    slideIndex = 0
  }
  sliderWrapper.style.left = `-${slideIndex * 100}%`
}

function prevSlide() {
  console.log('going to prev slide')
  slideIndex--
  if (slideIndex < 0) {
    // go to last slide
    slideIndex = sliderImages.length - 1
  }
  sliderWrapper.style.left = `-${slideIndex * 100}%`
}

function resetTimer() {
  sliderTimers.forEach(t => {
    clearInterval(t)
  })
  let timer = setInterval(() => {
      nextSlide()
  }, slideDuration)
  sliderTimers.push(timer)
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



