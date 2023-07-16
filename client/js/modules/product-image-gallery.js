const thumbnails = document.querySelectorAll('.thumbnail')
const selectedImageContainer = document.querySelector('.selected-image')

function selectImage(image) {

  // put selected image in spotlight
  let selectedImage = image.querySelector('img').cloneNode()
  selectedImageContainer.firstElementChild.replaceWith(selectedImage)
}

thumbnails.forEach(el => {
  el.addEventListener('click', () => {
    selectImage(el)
  })
})

// prevent dragging thumbnail images
thumbnails.forEach(thumb => {
  thumb.querySelector('img').draggable = false
})