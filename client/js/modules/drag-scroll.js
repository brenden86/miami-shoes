let dragContentWrappers = document.querySelectorAll('.drag-scroll')
let dragging = false
let pointerXStart
let offsetRight


dragContentWrappers.forEach(elem => {
  let scrollDistance = 0
  let offset = 0
  let container = elem.parentElement

  // set position for drag-scroll elements
  elem.style.position = 'relative'
  
  // mousedown
  container.addEventListener('mousedown', e => {
    pointerXStart = e.clientX
    elem.classList.add('dragging')
    offsetRight = container.scrollWidth - container.getBoundingClientRect().width
    dragging = true
    
  })

  // mouseup
  document.addEventListener('mouseup', (e) => {
    if (elem.classList.contains('dragging')) {
      offset = elem.offsetLeft
      elem.classList.remove('dragging')
    }
    dragging = false
    
  })
  
  
  // mousemove
  document.addEventListener('mousemove', (e) => {
    if (dragging) {
      // if wrapper not at bounds, move
      scrollDistance = e.clientX - pointerXStart
      
      if (
        offset + scrollDistance <= 0
        && offsetRight + scrollDistance > 0
        && elem.classList.contains('dragging')
        ) {
        travel = scrollDistance
        elem.style.left = `${offset + travel}px`

      }
    }
  })

})




