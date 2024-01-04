// shift carousel

const productCardsWrapper = document.querySelectorAll('.product-card-wrapper');
const productCards = document.querySelector('.product-cards');
const productCardsContainer = document.querySelector('.product-card-container');
const carouselButtonPrev = document.querySelector('.carousel-control.prev')
const carouselButtonNext = document.querySelector('.carousel-control.next')




// scroll distance is half of container
const scrollDistance = (productCardsContainer?.getBoundingClientRect().width / 2)
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
  if((productCards.offsetLeft + scrollDistance) > 0) {
    leftOffset = 0;
    productCards.style.left = `${leftOffset}px`;
  } else {
    leftOffset += scrollDistance;
    productCards.style.left = `${leftOffset}px`;
  }
}

export const scrollCarouselRight = () => {
  let lastCardBound = productCardsWrapper[productCardsWrapper.length - 1].getBoundingClientRect().right;
  let containerBound = productCardsContainer.getBoundingClientRect().right;
  

  if((lastCardBound - containerBound) < scrollDistance) {
    leftOffset -= (lastCardBound - containerBound);
    productCards.style.left = `${leftOffset}px`;
  } else {
    leftOffset -= scrollDistance;
    productCards.style.left = `${leftOffset}px`;
  }
  
}

carouselButtonPrev?.addEventListener('click', e => {
  scrollCarouselLeft()
})


carouselButtonNext?.addEventListener('click', e => {
  if(!atLastCarouselItem) {
    scrollCarouselRight()
  }
})


