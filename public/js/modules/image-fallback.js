
// show fallback image if product image not found

function removeImgLoadingPlaceholder(el) {
  // remove class that shows loading image animation
  el.classList.remove('loading');
}

export function checkImagesLoaded() {

  let images = document.querySelectorAll('img');
  images.forEach(img => {

    // only check product images
    if(img.src.match('/product-photos/')) {

      if(!img.complete) {
        // show fallback image on load error
        img.addEventListener('error', (e) => {
          e.target.src = '/images/product-photos/product-fallback.webp';
          removeImgLoadingPlaceholder(img.parentElement);
        })
      } else if(img.complete && img.naturalHeight < 1) {
        // image loaded, but with error (not found)
        img.src = '/images/product-photos/product-fallback.webp';
      }

      // remove loading placeholder animation when image is loaded
      if(img.complete) {
        removeImgLoadingPlaceholder(img.parentElement);
      } else {
        img.addEventListener('load', removeImgLoadingPlaceholder(img.parentElement))
      }

    }
  })

}

checkImagesLoaded();
