const featureBlocksWrapper = document.querySelector('.feature-block-wrapper')
const featureBlocks = document.querySelectorAll('.feature-block')
const mobileBreakpoint = 768;

export const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    // add show class to each feature block
    if(window.innerWidth <= mobileBreakpoint) {
      // show individual blocks when visible on mobile
      entry.target.classList.toggle('show', entry.isIntersecting);
      console.log('showing block')
    } else {
      // show all blocks when visible
      featureBlocks.forEach(block => {
        block.classList.toggle('show', entry.isIntersecting);
      })
    }
    // only show blocks once
    if(entry.isIntersecting) {
      observer.unobserve(entry.target);
    }
  })
}, {
  threshold: 0.75
})

// observe individual blocks if on mobile layout
if(window.innerWidth <= mobileBreakpoint) {
  featureBlocks.forEach(block => {
    observer.observe(block)
  })
} else {
  observer.observe(featureBlocksWrapper)
}