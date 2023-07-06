// display fallback image if product photo is not found

let productCardImages = document.querySelectorAll('.product-card-image');

productCardImages.forEach(el => {
  let image = el.firstElementChild;
  image.addEventListener('error', (e) => {
    e.target.src = 'images/product-photos/product-fallback.jpg';
  })
})