// display fallback image if product photo is not found

let images = document.querySelectorAll('img');

images.forEach(img => {
  if(img.src.match('/product-photos/')) {
    img.addEventListener('error', (e) => {
      e.target.src = 'images/product-photos/product-fallback.jpg';
    })
  }
})