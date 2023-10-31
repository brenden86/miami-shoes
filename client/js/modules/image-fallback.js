
// display fallback image if product photo is not found

/*
  NOTE: this does not always work. Sometimes the server
  responds with a 404 before the event listener can be
  attached.

*/

export function checkImagesLoaded() {
  let images = document.querySelectorAll('img');
  images.forEach(img => {
    if(img.src.match('/product-photos/')) {
      img.addEventListener('error', (e) => {
        e.target.src = 'images/product-photos/product-fallback.jpg';
      })
    }
  })

}

window.addEventListener('DOMContentLoaded', () => {
  checkImagesLoaded();
})