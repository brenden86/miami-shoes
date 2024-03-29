
const productCardsWrapper = document.querySelectorAll('.product-card-wrapper');
const productCards = document.querySelector('.product-cards');
const productCardsContainer = document.querySelector('.product-card-container');
const carouselButtonPrev = document.querySelector('.carousel-control.prev');
const carouselButtonNext = document.querySelector('.carousel-control.next');

let scrollingActive = false;

// incremental scroll distance is half of container
const scrollDistance = (productCardsContainer.getBoundingClientRect().width / 2)
let leftOffset = productCardsWrapper[0].offsetLeft;
let atLastCarouselItem = false;

// observer that checks if the last product card is visible
const carouselObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if(entry.isIntersecting) {
      atLastCarouselItem = true;
    } else {
      atLastCarouselItem = false;
    }
  })
}, {
  threshold: 1.0
})

carouselObserver.observe(productCardsWrapper[productCardsWrapper.length-1]);

export const scrollCarouselLeft = () => {

  // calculate scroll position using left offset and update
  // the left CSS property to shift carousel

  if((productCards.offsetLeft + scrollDistance) > 0) {
    leftOffset = 0;
    productCards.style.left = `${leftOffset}px`;
  } else {
    leftOffset += scrollDistance;
    productCards.style.left = `${leftOffset}px`;
  }
}

export const scrollCarouselRight = () => {

  if(scrollingActive) return; // do nothing if still scrolling from last button click
  scrollingActive = true;
  let lastCardBound = productCardsWrapper[productCardsWrapper.length - 1].getBoundingClientRect().right;
  let containerBound = productCardsContainer.getBoundingClientRect().right;
  
  if((lastCardBound - containerBound) < scrollDistance) {
    // scroll the remaining distance if less than incremental scroll distance
    leftOffset -= (lastCardBound - containerBound);
    productCards.style.left = `${leftOffset}px`;
  } else {
    leftOffset -= scrollDistance;
    productCards.style.left = `${leftOffset}px`;
  }

}

carouselButtonPrev.addEventListener('click', e => {
  scrollCarouselLeft()
})

carouselButtonNext.addEventListener('click', e => {
  if(!atLastCarouselItem) {
    scrollCarouselRight()
  }
})

// listen for end of scroll CSS transition
productCards.addEventListener('transitionend', () => {
  scrollingActive = false;
})


