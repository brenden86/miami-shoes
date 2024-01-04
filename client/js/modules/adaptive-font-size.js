
// only on non-mobile layouts
export const setAdaptiveFontSize = (function() {
  if(window.innerWidth > 768) {
    const cardProductNames = document.querySelectorAll('.product-name');
    cardProductNames.forEach(name => {
      if(name.textContent.length > 16) {
        name.style.fontSize = '1.35rem';
      }
    });
  }
})();