const featureBlocksWrapper = document.querySelector('.feature-block-wrapper')

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    let featureBlocks = document.querySelectorAll('.feature-block')
    // add show class to each feature block when the
    // parent container is observed
    featureBlocks.forEach(block => {
      block.classList.toggle('show', entry.isIntersecting);
    })
    // only show blocks once
    if(entry.isIntersecting) {
      observer.unobserve(entry.target);
    }
  })
}, {
  threshold: 0.75
})

observer.observe(featureBlocksWrapper)